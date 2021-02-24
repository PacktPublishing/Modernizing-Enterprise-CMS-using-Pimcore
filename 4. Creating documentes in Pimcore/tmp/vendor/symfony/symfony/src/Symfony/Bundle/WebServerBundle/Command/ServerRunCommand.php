<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\WebServerBundle\Command;

use Symfony\Bundle\WebServerBundle\WebServer;
use Symfony\Bundle\WebServerBundle\WebServerConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;

/**
 * Runs Symfony application using a local web server.
 *
 * @author Michał Pipa <michal.pipa.xsolve@gmail.com>
 *
 * @deprecated since Symfony 4.4, to be removed in 5.0; the new Symfony local server has more features, you can use it instead.
 */
class ServerRunCommand extends Command
{
    private $documentRoot;
    private $environment;
    private $pidFileDirectory;

    protected static $defaultName = 'server:run';

    public function __construct(string $documentRoot = null, string $environment = null, string $pidFileDirectory = null)
    {
        $this->documentRoot = $documentRoot;
        $this->environment = $environment;
        $this->pidFileDirectory = $pidFileDirectory;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDefinition([
                new InputArgument('addressport', InputArgument::OPTIONAL, 'The address to listen to (can be address:port, address, or port)'),
                new InputOption('docroot', 'd', InputOption::VALUE_REQUIRED, 'Document root, usually where your front controllers are stored'),
                new InputOption('router', 'r', InputOption::VALUE_REQUIRED, 'Path to custom router script'),
            ])
            ->setDescription('Runs a local web server')
            ->setHelp(<<<'EOF'
<info>%command.name%</info> runs a local web server: By default, the server
listens on <comment>127.0.0.1</> address and the port number is automatically selected
as the first free port starting from <comment>8000</>:

  <info>%command.full_name%</info>

This command blocks the console. If you want to run other commands, stop it by
pressing <comment>Control+C</> or use the non-blocking <comment>server:start</>
command instead.

Change the default address and port by passing them as an argument:

  <info>%command.full_name% 127.0.0.1:8080</info>

Use the <info>--docroot</info> option to change the default docroot directory:

  <info>%command.full_name% --docroot=htdocs/</info>

Specify your own router script via the <info>--router</info> option:

  <info>%command.full_name% --router=app/config/router.php</info>

See also: https://php.net/features.commandline.webserver
EOF
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        @trigger_error('Using the WebserverBundle is deprecated since Symfony 4.4. The new Symfony local server has more features, you can use it instead.', \E_USER_DEPRECATED);

        $io = new SymfonyStyle($input, $output instanceof ConsoleOutputInterface ? $output->getErrorOutput() : $output);

        if (null === $documentRoot = $input->getOption('docroot')) {
            if (!$this->documentRoot) {
                $io->error('The document root directory must be either passed as first argument of the constructor or through the "--docroot" input option.');

                return 1;
            }
            $documentRoot = $this->documentRoot;
        }

        if (!$env = $this->environment) {
            if ($input->hasOption('env') && !$env = $input->getOption('env')) {
                $io->error('The environment must be either passed as second argument of the constructor or through the "--env" input option.');

                return 1;
            } else {
                $io->error('The environment must be passed as second argument of the constructor.');

                return 1;
            }
        }

        if ('prod' === $env) {
            $io->error('Running this server in production environment is NOT recommended!');
        }

        $callback = null;
        $disableOutput = false;
        if ($output->isQuiet()) {
            $disableOutput = true;
        } else {
            $callback = function ($type, $buffer) use ($output) {
                if (Process::ERR === $type && $output instanceof ConsoleOutputInterface) {
                    $output = $output->getErrorOutput();
                }
                $output->write($buffer, false, OutputInterface::OUTPUT_RAW);
            };
        }

        try {
            $server = new WebServer($this->pidFileDirectory);
            $config = new WebServerConfig($documentRoot, $env, $input->getArgument('addressport'), $input->getOption('router'));

            $message = sprintf('Server listening on http://%s', $config->getAddress());
            if ('' !== $displayAddress = $config->getDisplayAddress()) {
                $message = sprintf('Server listening on all interfaces, port %s -- see http://%s', $config->getPort(), $displayAddress);
            }
            $io->success($message);
            if (ini_get('xdebug.profiler_enable_trigger')) {
                $io->comment('Xdebug profiler trigger enabled.');
            }
            $io->comment('Quit the server with CONTROL-C.');

            $exitCode = $server->run($config, $disableOutput, $callback);
        } catch (\Exception $e) {
            $io->error($e->getMessage());

            return 1;
        }

        return $exitCode;
    }
}

<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

/**
 * @param string $file
 *
 * @return array
 */
function xmlToArray($file)
{
    $xml = simplexml_load_file($file, null, LIBXML_NOCDATA);
    $json = json_encode((array) $xml);
    $array = json_decode($json, true);

    return $array;
}

/**
 * @param string $source
 * @param int|null $level
 * @param string|null $target
 *
 * @return bool|string
 */
function gzcompressfile($source, $level = null, $target = null)
{
    // this is a very memory efficient way of gzipping files
    if ($target) {
        $dest = $target;
    } else {
        $dest = $source.'.gz';
    }

    $error = false;

    $fp_in = fopen($source, 'rb');

    $fp_out = fopen($dest, 'wb');
    $deflateContext = deflate_init(ZLIB_ENCODING_GZIP, ['level' => $level]);

    if ($fp_out && $fp_in) {
        while (!feof($fp_in)) {
            fwrite($fp_out, deflate_add($deflateContext, fread($fp_in, 1024 * 512), ZLIB_NO_FLUSH));
        }

        fclose($fp_in);

        fwrite($fp_out, deflate_add($deflateContext, '', ZLIB_FINISH));
        fclose($fp_out);
    } else {
        $error = true;
    }

    if ($error) {
        return false;
    }

    return $dest;
}

/**
 * @param string $string
 *
 * @return bool
 */
function is_json($string)
{
    if (is_string($string)) {
        json_decode($string);

        return json_last_error() == JSON_ERROR_NONE;
    } else {
        return false;
    }
}

/**
 * @param string $path
 *
 * @return int
 */
function foldersize($path)
{
    $total_size = 0;
    $files = scandir($path);
    $cleanPath = rtrim($path, '/'). '/';

    foreach ($files as $t) {
        if ($t != '.' && $t != '..') {
            $currentFile = $cleanPath . $t;
            if (is_dir($currentFile)) {
                $size = foldersize($currentFile);
                $total_size += $size;
            } else {
                $size = filesize($currentFile);
                $total_size += $size;
            }
        }
    }

    return $total_size;
}

/**
 * @param string $string
 * @param string[] $values
 *
 * @return mixed
 */
function replace_pcre_backreferences($string, $values)
{
    array_unshift($values, '');
    $string = str_replace('\$', '###PCRE_PLACEHOLDER###', $string);

    foreach ($values as $key => $value) {
        $string = str_replace('$'.$key, $value, $string);
    }

    $string = str_replace('###URLENCODE_PLACEHOLDER###', '$', $string);

    return $string;
}

/**
 * @param array $array
 *
 * @return array
 */
function array_htmlspecialchars($array)
{
    foreach ($array as $key => $value) {
        if (is_string($value) || is_numeric($value)) {
            $array[$key] = htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        } else {
            if (is_array($value)) {
                $array[$key] = array_htmlspecialchars($value);
            }
        }
    }

    return $array;
}

/**
 * @param string $needle
 * @param array $haystack
 *
 * @return bool
 */
function in_arrayi(string $needle, array $haystack)
{
    return in_array(strtolower($needle), array_map('strtolower', $haystack));
}

/**
 * @param string $needle
 * @param array $haystack
 *
 * @return false|int|string the key for needle if it is found in the array, false otherwise.
 */
function array_searchi(string $needle, array $haystack)
{
    return array_search(strtolower($needle), array_map('strtolower', $haystack));
}

/**
 * @param object $node
 *
 * @return array
 */
function object2array($node)
{
    // dirty hack, should be replaced
    $paj = json_encode($node);

    if (JSON_ERROR_NONE !== json_last_error()) {
        throw new \InvalidArgumentException(json_last_error_msg());
    }

    return @json_decode($paj, true);
}

/**
 * @param array $args
 *
 * @return false|string
 */
function array_urlencode($args)
{
    if (!is_array($args)) {
        return false;
    }

    return http_build_query($args);
}

/**
 * same as  array_urlencode but no urlencode()
 *
 * @param array $args
 *
 * @return false|string
 */
function array_toquerystring($args)
{
    if (!is_array($args)) {
        return false;
    }

    return urldecode(http_build_query($args));
}

/**
 * @param array $array with attribute names as keys, and values as values
 *
 * @return string
 */
function array_to_html_attribute_string($array)
{
    $data = [];

    foreach ($array as $key => $value) {
        if (is_scalar($value)) {
            $data[] = $key . '="' . htmlspecialchars($value) . '"';
        } elseif (is_string($key) && is_null($value)) {
            $data[] = $key;
        }
    }

    return implode(' ', $data);
}

/**
 * @param string $var
 *
 * @return string
 */
function urlencode_ignore_slash($var)
{
    $scheme = parse_url($var, PHP_URL_SCHEME);

    if ($scheme) {
        $var = str_replace($scheme . '://', '', $var);
    }

    $placeholder = 'x-X-x-ignore-' . md5(microtime()) . '-slash-x-X-x';
    $var = str_replace('/', $placeholder, $var);
    $var = rawurlencode($var);
    $var = str_replace($placeholder, '/', $var);

    if ($scheme) {
        $var = $scheme . '://' . $var;
    }

    // allow @2x for retina thumbnails, ...
    $var = preg_replace("/%40([\d]+)x\./", '@$1x.', $var);

    return $var;
}

/**
 * @param string $val
 *
 * @return int
 */
function return_bytes($val)
{
    $val = trim($val);
    $last = strtolower($val[strlen($val) - 1]);
    $bytes = (int)$val;
    switch ($last) {
        case 'g':
            $bytes *= 1024;
            // no break
        case 'm':
            $bytes *= 1024;
            // no break
        case 'k':
            $bytes *= 1024;
    }

    return $bytes;
}

/**
 * @param int $bytes
 * @param int $precision
 *
 * @return string
 */
function formatBytes($bytes, $precision = 2)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1000));
    $pow = min($pow, count($units) - 1);

    $bytes /= pow(1000, $pow);

    return round($bytes, $precision) . ' ' . $units[$pow];
}

/**
 * @param string $str
 *
 * @return float|int
 */
function filesize2bytes($str)
{
    $bytes = 0;

    $bytes_array = [
        'K' => 1024,
        'M' => 1024 * 1024,
        'G' => 1024 * 1024 * 1024,
        'T' => 1024 * 1024 * 1024 * 1024,
        'P' => 1024 * 1024 * 1024 * 1024 * 1024,
    ];

    $bytes = floatval($str);

    if (preg_match('#([KMGTP])?B?$#si', $str, $matches) && (array_key_exists(1, $matches) && !empty($bytes_array[$matches[1]]))) {
        $bytes *= $bytes_array[$matches[1]];
    }

    $bytes = intval(round($bytes, 2));

    return $bytes;
}

/**
 * @param string $base
 * @param array $data
 *
 * @return array
 */
function rscandir($base = '', &$data = [])
{
    if (substr($base, -1, 1) != DIRECTORY_SEPARATOR) { //add trailing slash if it doesn't exists
        $base .= DIRECTORY_SEPARATOR;
    }

    $array = array_diff(scandir($base), ['.', '..', '.svn']);
    foreach ($array as $value) {
        if (is_dir($base . $value)) {
            $data[] = $base . $value . DIRECTORY_SEPARATOR;
            $data = rscandir($base . $value . DIRECTORY_SEPARATOR, $data);
        } elseif (is_file($base . $value)) {
            $data[] = $base . $value;
        }
    }

    return $data;
}

/**
 * Wrapper for explode() to get a trimmed array
 *
 * @param string $delimiter
 * @param string $string
 * @param string $limit
 * @param bool $useArrayFilter
 *
 * @return array
 */
function explode_and_trim($delimiter, $string = '', $limit = '', $useArrayFilter = true)
{
    if ($limit === '') {
        $exploded = explode($delimiter, $string);
    } else {
        $exploded = explode($delimiter, $string, $limit);
    }
    foreach ($exploded as $key => $value) {
        $exploded[$key] = trim($value);
    }
    if ($useArrayFilter) {
        $exploded = array_filter($exploded);
    }

    return $exploded;
}

/**
 * @param string $directory
 * @param bool $empty
 *
 * @return bool
 */
function recursiveDelete($directory, $empty = true)
{
    if (is_dir($directory)) {
        $directory = rtrim($directory, '/');

        if (!file_exists($directory) || !is_dir($directory)) {
            return false;
        } elseif (!is_readable($directory)) {
            return false;
        } else {
            $directoryHandle = opendir($directory);
            $contents = '.';

            while ($contents) {
                $contents = readdir($directoryHandle);
                if (strlen($contents) && $contents != '.' && $contents != '..') {
                    $path = $directory . '/' . $contents;

                    if (is_dir($path)) {
                        recursiveDelete($path);
                    } else {
                        unlink($path);
                    }
                }
            }

            closedir($directoryHandle);

            if ($empty == true) {
                if (!rmdir($directory)) {
                    return false;
                }
            }

            return true;
        }
    } elseif (is_file($directory)) {
        return unlink($directory);
    }

    return false;
}

/**
 * @param string $source
 * @param string $destination
 *
 * @return bool
 */
function recursiveCopy($source, $destination)
{
    if (is_dir($source)) {
        if (!is_dir($destination)) {
            \Pimcore\File::mkdir($destination);
        }

        foreach (
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::SELF_FIRST
            ) as $item) {
            if ($item->isDir()) {
                \Pimcore\File::mkdir($destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            } else {
                copy($item, $destination . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
            }
        }
    } elseif (is_file($source)) {
        if (is_dir(dirname($destination))) {
            \Pimcore\File::mkdir(dirname($destination));
        }
        copy($source, $destination);
    }

    return true;
}

function p_r()
{
    $cloner = new \Symfony\Component\VarDumper\Cloner\VarCloner();
    $dumper = 'cli' === PHP_SAPI ? new \Symfony\Component\VarDumper\Dumper\CliDumper() : new \Symfony\Component\VarDumper\Dumper\HtmlDumper();

    foreach (func_get_args() as $var) {
        $dumper->dump($cloner->cloneVar($var));
    }
}

/**
 * @param array $array
 * @param string $prefix
 * @param string $suffix
 *
 * @return array
 */
function wrapArrayElements($array, $prefix = "'", $suffix = "'")
{
    foreach ($array as $key => $value) {
        $array[$key] = $prefix . trim($value). $suffix;
    }

    return $array;
}

/**
 * Checks if an array is associative
 *
 * @param array $arr
 *
 * @return bool
 */
function isAssocArray(array $arr)
{
    return array_keys($arr) !== range(0, count($arr) - 1);
}

/**
 * this is an alternative for realpath() which isn't able to handle symlinks correctly
 *
 * @param string $filename
 *
 * @return string
 */
function resolvePath($filename)
{
    $protocol = '';
    if (!stream_is_local($filename)) {
        $protocol = parse_url($filename, PHP_URL_SCHEME) . '://';
        $filename = str_replace($protocol, '', $filename);
    }

    $filename = str_replace('//', '/', $filename);
    $parts = explode('/', $filename);
    $out = [];
    foreach ($parts as $part) {
        if ($part == '.') {
            continue;
        }
        if ($part == '..') {
            array_pop($out);
            continue;
        }
        $out[] = $part;
    }

    $finalPath = $protocol . implode('/', $out);

    return $finalPath;
}

/**
 * @param Closure $closure
 *
 * @return string
 */
function closureHash(Closure $closure)
{
    $ref = new ReflectionFunction($closure);
    $file = new SplFileObject($ref->getFileName());
    $file->seek($ref->getStartLine() - 1);
    $content = '';
    while ($file->key() < $ref->getEndLine()) {
        $content .= $file->current();
        $file->next();
    }

    $hash = md5(json_encode([
        $content,
        $ref->getStaticVariables(),
    ]));

    return $hash;
}

/**
 * Checks if the given directory is empty
 *
 * @param string $dir
 *
 * @return bool|null
 */
function is_dir_empty($dir)
{
    if (!is_readable($dir)) {
        return null;
    }
    $handle = opendir($dir);
    while (false !== ($entry = readdir($handle))) {
        if ($entry != '.' && $entry != '..') {
            return false;
        }
    }

    return true;
}

/**
 * @param mixed $var
 * @param string $indent
 *
 * @return string
 */
function var_export_pretty($var, $indent = '')
{
    switch (gettype($var)) {
        case 'string':
            return '"' . addcslashes($var, "\\\$\"\r\n\t\v\f") . '"';
        case 'array':
            $indexed = array_keys($var) === range(0, count($var) - 1);
            $r = [];
            foreach ($var as $key => $value) {
                $r[] = "$indent    "
                    . ($indexed ? '' : var_export_pretty($key) . ' => ')
                    . var_export_pretty($value, "$indent    ");
            }

            return "[\n" . implode(",\n", $r) . "\n" . $indent . ']';
        case 'boolean':
            return $var ? 'TRUE' : 'FALSE';
        default:
            return var_export($var, true);
    }
}

/**
 * @param mixed $contents
 *
 * @return string
 */
function to_php_data_file_format($contents, $comments = null)
{
    $contents = var_export_pretty($contents);

    $export = '<?php ';

    if (!empty($comments)) {
        $export .= "\n\n";
        $export .= $comments;
        $export .= "\n";
    }

    $export .= "\n\nreturn ".$contents.";\n";

    return $export;
}

/**
 * @return string
 */
function generateRandomSymfonySecret()
{
    return base64_encode(random_bytes(24));
}

/**
 * @param array $array
 * @param string $glue
 *
 * @return string
 */
function implode_recursive($array, $glue)
{
    $ret = '';

    foreach ($array as $item) {
        if (is_array($item)) {
            $ret .= implode_recursive($item, $glue) . $glue;
        } else {
            $ret .= $item . $glue;
        }
    }

    $ret = substr($ret, 0, 0 - strlen($glue));

    return $ret;
}

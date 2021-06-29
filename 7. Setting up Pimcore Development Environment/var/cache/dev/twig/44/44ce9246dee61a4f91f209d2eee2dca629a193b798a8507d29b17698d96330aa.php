<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @PimcoreCore/Profiler/logo.svg.twig */
class __TwigTemplate_562c985ebaa2770d42ad58a57418045ae2aafd89bc520bb8bf659dbcb8000d74 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Profiler/logo.svg.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Profiler/logo.svg.twig"));

        // line 1
        echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 45 26.25\">
    <path d=\"M38.13,16.63a9.37,9.37,0,0,0-7.82,4.21L23.44,31.18a9.38,9.38,0,1,1,0-10.42l1.23,1.86,2.25-3.4-.33-.5a13.12,13.12,0,1,0,0,14.53l2.55-3.85,1.18,1.78a9.38,9.38,0,1,0,7.82-14.55Zm0,15a5.62,5.62,0,0,1-4.7-2.54l-2-3.09,2.06-3.11a5.62,5.62,0,1,1,4.69,8.73Z\" transform=\"translate(-2.5 -12.88)\" style=\"fill:#fff\"/>
</svg>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreCore/Profiler/logo.svg.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<?xml version=\"1.0\" encoding=\"utf-8\"?>
<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 45 26.25\">
    <path d=\"M38.13,16.63a9.37,9.37,0,0,0-7.82,4.21L23.44,31.18a9.38,9.38,0,1,1,0-10.42l1.23,1.86,2.25-3.4-.33-.5a13.12,13.12,0,1,0,0,14.53l2.55-3.85,1.18,1.78a9.38,9.38,0,1,0,7.82-14.55Zm0,15a5.62,5.62,0,0,1-4.7-2.54l-2-3.09,2.06-3.11a5.62,5.62,0,1,1,4.69,8.73Z\" transform=\"translate(-2.5 -12.88)\" style=\"fill:#fff\"/>
</svg>
", "@PimcoreCore/Profiler/logo.svg.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views/Profiler/logo.svg.twig");
    }
}

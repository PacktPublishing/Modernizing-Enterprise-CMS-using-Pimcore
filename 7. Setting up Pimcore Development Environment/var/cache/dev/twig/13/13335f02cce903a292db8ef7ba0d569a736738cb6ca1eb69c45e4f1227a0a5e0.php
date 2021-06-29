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

/* @PimcoreCore/Targeting/toolbar/icon/toolbar-collapse.svg.twig */
class __TwigTemplate_e8deb56afea624f33f909c60b59de717d98ba581b1b0c986cbcc2c8973d976a5 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Targeting/toolbar/icon/toolbar-collapse.svg.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Targeting/toolbar/icon/toolbar-collapse.svg.twig"));

        // line 2
        echo "<svg version=\"1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 48 48\" enable-background=\"new 0 0 48 48\">
    <polygon fill=\"#AAAAAA\" points=\"30.9,43 34,39.9 18.1,24 34,8.1 30.9,5 12,24\"/>
</svg>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreCore/Targeting/toolbar/icon/toolbar-collapse.svg.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# original file: previous.svg from Pimcore's icon set #}
<svg version=\"1\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 48 48\" enable-background=\"new 0 0 48 48\">
    <polygon fill=\"#AAAAAA\" points=\"30.9,43 34,39.9 18.1,24 34,8.1 30.9,5 12,24\"/>
</svg>
", "@PimcoreCore/Targeting/toolbar/icon/toolbar-collapse.svg.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views/Targeting/toolbar/icon/toolbar-collapse.svg.twig");
    }
}

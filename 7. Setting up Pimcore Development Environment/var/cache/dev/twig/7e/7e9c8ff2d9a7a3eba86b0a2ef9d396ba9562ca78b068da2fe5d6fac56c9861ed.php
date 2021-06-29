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

/* @PimcoreAdmin/Admin/Document/Document/diff-versions-unsupported.html.twig */
class __TwigTemplate_f827244fc4f4476a0e38b042ebcce4de3f19bed592f0bbe0c16a5f96dea3b059 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Document/Document/diff-versions-unsupported.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Document/Document/diff-versions-unsupported.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <style type=\"text/css\">

        html, body {
            height: 100%;
        }

        #message {
            position: absolute;
            width: 100%;
            left: 0;
            top: 45%;
            text-align: center;
            font-family: Arial , Tahoma, Verdana, sans-serif;
            font-size: 16px;
            color: darkred;
        }
    </style>
</head>
<body>

    <div id=\"message\">
        ";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("unsupported_feature", [], "admin"), "html", null, true);
        echo "
        <br>
        <br>
        <b>Wkhtmltoimage binary and PHP extension Imagick are required!</b>
    </div>

</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Document/Document/diff-versions-unsupported.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 26,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <style type=\"text/css\">

        html, body {
            height: 100%;
        }

        #message {
            position: absolute;
            width: 100%;
            left: 0;
            top: 45%;
            text-align: center;
            font-family: Arial , Tahoma, Verdana, sans-serif;
            font-size: 16px;
            color: darkred;
        }
    </style>
</head>
<body>

    <div id=\"message\">
        {{ 'unsupported_feature'|trans([],'admin') }}
        <br>
        <br>
        <b>Wkhtmltoimage binary and PHP extension Imagick are required!</b>
    </div>

</body>
</html>
", "@PimcoreAdmin/Admin/Document/Document/diff-versions-unsupported.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Document/Document/diff-versions-unsupported.html.twig");
    }
}

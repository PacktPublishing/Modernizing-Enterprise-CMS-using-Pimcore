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

/* @PimcoreAdmin/Admin/Login/deeplink.html.twig */
class __TwigTemplate_0f56c02f83bdfbf1759de45aad4bcf2536eb9b32422dade57174d8e55f3afff9 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Login/deeplink.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Login/deeplink.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $context["redirect"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_login", ["deeplink" => "true", "perspective" => (($context["perspective"]) ?? (null))]);
        // line 5
        echo "
        <script src=\"/bundles/pimcoreadmin/js/pimcore/common.js\"></script>
        <script src=\"/bundles/pimcoreadmin/js/pimcore/functions.js\"></script>
        <script src=\"/bundles/pimcoreadmin/js/pimcore/helpers.js\"></script>
        <script>
            ";
        // line 10
        if ((isset($context["tab"]) || array_key_exists("tab", $context) ? $context["tab"] : (function () { throw new RuntimeError('Variable "tab" does not exist.', 10, $this->source); })())) {
            // line 11
            echo "                pimcore.helpers.clearOpenTab();
                pimcore.helpers.rememberOpenTab(\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["tab"]) || array_key_exists("tab", $context) ? $context["tab"] : (function () { throw new RuntimeError('Variable "tab" does not exist.', 12, $this->source); })()), "html", null, true);
            echo "\", true);
            ";
        }
        // line 14
        echo "            window.location.href = \"";
        echo twig_escape_filter($this->env, (isset($context["redirect"]) || array_key_exists("redirect", $context) ? $context["redirect"] : (function () { throw new RuntimeError('Variable "redirect" does not exist.', 14, $this->source); })()), "html", null, true);
        echo "\";
        </script>
    </head>
    <body>
    </body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Login/deeplink.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 14,  62 => 12,  59 => 11,  57 => 10,  50 => 5,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        {% set redirect = path('pimcore_admin_login', {'deeplink': 'true', 'perspective': perspective ?? null }) %}

        <script src=\"/bundles/pimcoreadmin/js/pimcore/common.js\"></script>
        <script src=\"/bundles/pimcoreadmin/js/pimcore/functions.js\"></script>
        <script src=\"/bundles/pimcoreadmin/js/pimcore/helpers.js\"></script>
        <script>
            {% if tab %}
                pimcore.helpers.clearOpenTab();
                pimcore.helpers.rememberOpenTab(\"{{ tab }}\", true);
            {% endif %}
            window.location.href = \"{{ redirect }}\";
        </script>
    </head>
    <body>
    </body>
</html>
", "@PimcoreAdmin/Admin/Login/deeplink.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Login/deeplink.html.twig");
    }
}

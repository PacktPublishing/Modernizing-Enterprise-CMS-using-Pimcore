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

/* @PimcoreAdmin/Admin/Misc/http-error-log-detail.html.twig */
class __TwigTemplate_e89edf10688c94bc59aac082c831ac63de881331449ec601128c75e45e7a56ec extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Misc/http-error-log-detail.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Misc/http-error-log-detail.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>

<style type=\"text/css\">
    body {
        margin: 0;
        padding: 10px;
        font-family: Arial;
        font-size: 12px;
    }

    h2 {
        border-bottom: 1px solid #000;
    }

    .sub {
        font-style: italic;
        border:0;
    }

    table {
        border-left: 1px solid #000;
        border-top: 1px solid #000;
        border-collapse: collapse;
    }

    td, th {
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        padding: 2px;
    }

    th {
        text-align: left;
    }
</style>


</head>

<body>

<h2>";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 44, $this->source); })()), "code", [], "array", false, false, false, 44), "html", null, true);
        echo " | ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 44, $this->source); })()), "uri", [], "array", false, false, false, 44), "html", null, true);
        echo "</h2>

";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 46, $this->source); })()));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 47
            echo "    ";
            if (twig_in_filter($context["key"], [0 => "parametersGet", 1 => "parametersPost", 2 => "serverVars", 3 => "cookies"])) {
                // line 48
                echo "        ";
                if ( !twig_test_empty($context["value"])) {
                    // line 49
                    echo "            <h2 class=\"sub\">";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["key"], [], "admin"), "html", null, true);
                    echo "</h2>

            <table>
                ";
                    // line 52
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["value"]);
                    foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                        // line 53
                        echo "                    <tr>
                        <th valign=\"top\">";
                        // line 54
                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                        echo "</th>
                        <td valign=\"top\">";
                        // line 55
                        echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                        echo "</td>
                    </tr>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 58
                    echo "            </table>
        ";
                }
                // line 60
                echo "    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "

</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Misc/http-error-log-detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 62,  136 => 60,  132 => 58,  123 => 55,  119 => 54,  116 => 53,  112 => 52,  105 => 49,  102 => 48,  99 => 47,  95 => 46,  88 => 44,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>

<style type=\"text/css\">
    body {
        margin: 0;
        padding: 10px;
        font-family: Arial;
        font-size: 12px;
    }

    h2 {
        border-bottom: 1px solid #000;
    }

    .sub {
        font-style: italic;
        border:0;
    }

    table {
        border-left: 1px solid #000;
        border-top: 1px solid #000;
        border-collapse: collapse;
    }

    td, th {
        border-right: 1px solid #000;
        border-bottom: 1px solid #000;
        padding: 2px;
    }

    th {
        text-align: left;
    }
</style>


</head>

<body>

<h2>{{ data[\"code\"] }} | {{ data[\"uri\"] }}</h2>

{% for key,value in data %}
    {% if key in [\"parametersGet\", \"parametersPost\", \"serverVars\", \"cookies\"] %}
        {% if value is not empty %}
            <h2 class=\"sub\">{{ key|trans([], 'admin') }}</h2>

            <table>
                {% for key,value in value %}
                    <tr>
                        <th valign=\"top\">{{ key }}</th>
                        <td valign=\"top\">{{ value }}</td>
                    </tr>
                {% endfor %}
            </table>
        {% endif %}
    {% endif %}
{% endfor %}


</body>
</html>
", "@PimcoreAdmin/Admin/Misc/http-error-log-detail.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Misc/http-error-log-detail.html.twig");
    }
}

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

/* @PimcoreAdmin/Admin/Misc/iconList.html.twig */
class __TwigTemplate_8e0dde2a009d96f8856365c149543b3ee664a2784b0bcb4d0dbfacd034698705 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Misc/iconList.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Misc/iconList.html.twig"));

        // line 1
        $context["webRoot"] = twig_constant("PIMCORE_WEB_ROOT");
        // line 2
        echo "
<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Pimcore :: Icon list</title>
    <style type=\"text/css\">

        body {
            font-family: Arial;
            font-size: 12px;
        }

        .icons {
            width:1200px;
            margin: 0 auto;
        }

        .icon {
            text-align: center;
            width:100px;
            height:75px;
            margin: 0 10px 20px 0;
            float: left;
            font-size: 10px;
            word-wrap: break-word;
        }

        .icon.black {
            background-color: #0C0F12;
        }

        .icon.black .label {
            color: #fff;
        }

        .info {
            text-align: center;
            margin-bottom: 30px;
            clear: both;
            font-size: 22px;
            padding-top: 50px;
        }

        .info small {
            font-size: 16px;
        }

    </style>
</head>
<body>

<div class=\"info\">
    <a target=\"_blank\">Color Icons</a>
    <br>
    <small>based on the <a href=\"https://github.com/google/material-design-icons/blob/master/LICENSE\" target=\"_blank\">Material Design Icons</a></small>
</div>

<div id=\"color_icons\" class=\"icons\">
    ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["colorIcons"]) || array_key_exists("colorIcons", $context) ? $context["colorIcons"] : (function () { throw new RuntimeError('Variable "colorIcons" does not exist.', 61, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["icon"]) {
            // line 62
            echo "        ";
            $context["icon"] = twig_replace_filter($context["icon"], [(isset($context["webRoot"]) || array_key_exists("webRoot", $context) ? $context["webRoot"] : (function () { throw new RuntimeError('Variable "webRoot" does not exist.', 62, $this->source); })()) => ""]);
            // line 63
            echo "        <div class=\"icon\">
            <img style=\"width:50px;\" src=\"";
            // line 64
            echo twig_escape_filter($this->env, $context["icon"], "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Pimcore\Twig\Extension\HelpersExtension']->basenameFilter($context["icon"]), "html", null, true);
            echo "\">
            <div class=\"label\">
                ";
            // line 66
            echo ((twig_in_filter($context["icon"], (isset($context["iconsCss"]) || array_key_exists("iconsCss", $context) ? $context["iconsCss"] : (function () { throw new RuntimeError('Variable "iconsCss" does not exist.', 66, $this->source); })()))) ? ("*") : (""));
            echo "
                ";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Pimcore\Twig\Extension\HelpersExtension']->basenameFilter($context["icon"]), "html", null, true);
            echo "
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['icon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "</div>

<div class=\"info\">
    <a target=\"_blank\">White Icons</a>
    <br>
    <small>based on the <a href=\"https://github.com/google/material-design-icons/blob/master/LICENSE\" target=\"_blank\">Material Design Icons</a></small>
</div>

<div id=\"white_icons\" class=\"icons\">
    ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["whiteIcons"]) || array_key_exists("whiteIcons", $context) ? $context["whiteIcons"] : (function () { throw new RuntimeError('Variable "whiteIcons" does not exist.', 80, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["icon"]) {
            // line 81
            echo "        ";
            $context["icon"] = twig_replace_filter($context["icon"], [(isset($context["webRoot"]) || array_key_exists("webRoot", $context) ? $context["webRoot"] : (function () { throw new RuntimeError('Variable "webRoot" does not exist.', 81, $this->source); })()) => ""]);
            // line 82
            echo "        <div class=\"icon black\">
            <img style=\"width:50px;\" src=\"";
            // line 83
            echo twig_escape_filter($this->env, $context["icon"], "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Pimcore\Twig\Extension\HelpersExtension']->basenameFilter($context["icon"]), "html", null, true);
            echo "\">
            <div class=\"label\">
                ";
            // line 85
            echo ((twig_in_filter($context["icon"], (isset($context["iconsCss"]) || array_key_exists("iconsCss", $context) ? $context["iconsCss"] : (function () { throw new RuntimeError('Variable "iconsCss" does not exist.', 85, $this->source); })()))) ? ("*") : (""));
            echo "
                ";
            // line 86
            echo twig_escape_filter($this->env, $this->extensions['Pimcore\Twig\Extension\HelpersExtension']->basenameFilter($context["icon"]), "html", null, true);
            echo "
            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['icon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        echo "</div>

<div class=\"info\">
    <a href=\"https://github.com/twitter/twemoji\" target=\"_blank\">Source (Twemoji)</a>
</div>

<div id=\"twemoji\" class=\"icons\">
    ";
        // line 97
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["twemoji"]) || array_key_exists("twemoji", $context) ? $context["twemoji"] : (function () { throw new RuntimeError('Variable "twemoji" does not exist.', 97, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["icon"]) {
            // line 98
            echo "        ";
            $context["icon"] = twig_replace_filter($context["icon"], [(isset($context["webRoot"]) || array_key_exists("webRoot", $context) ? $context["webRoot"] : (function () { throw new RuntimeError('Variable "webRoot" does not exist.', 98, $this->source); })()) => ""]);
            // line 99
            echo "        <div class=\"icon\">
            <img style=\"width:50px;\" src=\"";
            // line 100
            echo twig_escape_filter($this->env, $context["icon"], "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Pimcore\Twig\Extension\HelpersExtension']->basenameFilter($context["icon"]), "html", null, true);
            echo "\">
            <div class=\"label\">";
            // line 101
            echo twig_escape_filter($this->env, $this->extensions['Pimcore\Twig\Extension\HelpersExtension']->basenameFilter($context["icon"]), "html", null, true);
            echo "</div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['icon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "</div>

<div class=\"info\">
    Flags
</div>

<table>
    <tr>
        <th>Flag</th>
        <th>Code</th>
        <th>Name</th>
    </tr>
    ";
        // line 116
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languageOptions"]) || array_key_exists("languageOptions", $context) ? $context["languageOptions"] : (function () { throw new RuntimeError('Variable "languageOptions" does not exist.', 116, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["langOpt"]) {
            // line 117
            echo "        <tr>
            <td><img style=\"width:16px\" src=\"";
            // line 118
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["langOpt"], "flag", [], "array", false, false, false, 118), "html", null, true);
            echo "\"></td>
            <td>";
            // line 119
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["langOpt"], "language", [], "array", false, false, false, 119), "html", null, true);
            echo "</td>
            <td>";
            // line 120
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["langOpt"], "display", [], "array", false, false, false, 120), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['langOpt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "</table>


</body>
</html>

";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Misc/iconList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 123,  242 => 120,  238 => 119,  234 => 118,  231 => 117,  227 => 116,  213 => 104,  204 => 101,  198 => 100,  195 => 99,  192 => 98,  188 => 97,  179 => 90,  169 => 86,  165 => 85,  158 => 83,  155 => 82,  152 => 81,  148 => 80,  137 => 71,  127 => 67,  123 => 66,  116 => 64,  113 => 63,  110 => 62,  106 => 61,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set webRoot = constant('PIMCORE_WEB_ROOT') %}

<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Pimcore :: Icon list</title>
    <style type=\"text/css\">

        body {
            font-family: Arial;
            font-size: 12px;
        }

        .icons {
            width:1200px;
            margin: 0 auto;
        }

        .icon {
            text-align: center;
            width:100px;
            height:75px;
            margin: 0 10px 20px 0;
            float: left;
            font-size: 10px;
            word-wrap: break-word;
        }

        .icon.black {
            background-color: #0C0F12;
        }

        .icon.black .label {
            color: #fff;
        }

        .info {
            text-align: center;
            margin-bottom: 30px;
            clear: both;
            font-size: 22px;
            padding-top: 50px;
        }

        .info small {
            font-size: 16px;
        }

    </style>
</head>
<body>

<div class=\"info\">
    <a target=\"_blank\">Color Icons</a>
    <br>
    <small>based on the <a href=\"https://github.com/google/material-design-icons/blob/master/LICENSE\" target=\"_blank\">Material Design Icons</a></small>
</div>

<div id=\"color_icons\" class=\"icons\">
    {% for icon in colorIcons %}
        {% set icon = icon|replace({(webRoot): ''}) %}
        <div class=\"icon\">
            <img style=\"width:50px;\" src=\"{{ icon }}\" title=\"{{ icon|basename }}\">
            <div class=\"label\">
                {{ icon in iconsCss  ? '*' : '' }}
                {{ icon|basename }}
            </div>
        </div>
    {% endfor %}
</div>

<div class=\"info\">
    <a target=\"_blank\">White Icons</a>
    <br>
    <small>based on the <a href=\"https://github.com/google/material-design-icons/blob/master/LICENSE\" target=\"_blank\">Material Design Icons</a></small>
</div>

<div id=\"white_icons\" class=\"icons\">
    {% for icon in whiteIcons %}
        {% set icon = icon|replace({(webRoot): ''}) %}
        <div class=\"icon black\">
            <img style=\"width:50px;\" src=\"{{ icon }}\" title=\"{{ icon|basename }}\">
            <div class=\"label\">
                {{ icon in iconsCss  ? '*' : '' }}
                {{ icon|basename }}
            </div>
        </div>
    {% endfor %}
</div>

<div class=\"info\">
    <a href=\"https://github.com/twitter/twemoji\" target=\"_blank\">Source (Twemoji)</a>
</div>

<div id=\"twemoji\" class=\"icons\">
    {% for icon in twemoji %}
        {% set icon = icon|replace({(webRoot): ''}) %}
        <div class=\"icon\">
            <img style=\"width:50px;\" src=\"{{ icon }}\" title=\"{{ icon|basename }}\">
            <div class=\"label\">{{ icon|basename }}</div>
        </div>
    {% endfor %}
</div>

<div class=\"info\">
    Flags
</div>

<table>
    <tr>
        <th>Flag</th>
        <th>Code</th>
        <th>Name</th>
    </tr>
    {% for langOpt in languageOptions %}
        <tr>
            <td><img style=\"width:16px\" src=\"{{ langOpt['flag'] }}\"></td>
            <td>{{ langOpt['language'] }}</td>
            <td>{{ langOpt['display'] }}</td>
        </tr>
    {% endfor %}
</table>


</body>
</html>

", "@PimcoreAdmin/Admin/Misc/iconList.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Misc/iconList.html.twig");
    }
}

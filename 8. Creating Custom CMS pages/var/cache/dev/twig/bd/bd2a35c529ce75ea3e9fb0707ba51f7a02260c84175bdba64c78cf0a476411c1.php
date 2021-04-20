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

/* @PimcoreAdmin/SearchAdmin/Search/Quicksearch/asset.html.twig */
class __TwigTemplate_67ca99ef2ebf3ed9826ffc3dcca41f07ff7f6f1c415cb96610250831eca659f8 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/asset.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/asset.html.twig"));

        // line 2
        $context["previewImage"] = null;
        // line 3
        $context["params"] = ["id" => twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "treepreview" => true, "hdpi" => true];
        // line 4
        echo "
";
        // line 5
        if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [(isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 5, $this->source); })()), "\\Pimcore\\Model\\Asset\\Image"])) {
            // line 6
            echo "    ";
            $context["previewImage"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_asset_getimagethumbnail", (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 6, $this->source); })()));
        } elseif ((call_user_func_array($this->env->getTest('instanceof')->getCallable(), [        // line 7
(isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 7, $this->source); })()), "\\Pimcore\\Model\\Asset\\Video"]) && Pimcore\Video::isAvailable())) {
            // line 8
            echo "    ";
            $context["previewImage"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_asset_getvideothumbnail", (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 8, $this->source); })()));
        } elseif ((call_user_func_array($this->env->getTest('instanceof')->getCallable(), [        // line 9
(isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 9, $this->source); })()), "\\Pimcore\\Model\\Asset\\Document"]) && Pimcore\Document::isAvailable())) {
            // line 10
            echo "    ";
            $context["previewImage"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_asset_getdocumentthumbnail", (isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 10, $this->source); })()));
        }
        // line 12
        echo "
";
        // line 13
        if (array_key_exists("previewImage", $context)) {
            // line 14
            echo "    <div class=\"full-preview\">
        <img src=\"";
            // line 15
            echo twig_escape_filter($this->env, (isset($context["previewImage"]) || array_key_exists("previewImage", $context) ? $context["previewImage"] : (function () { throw new RuntimeError('Variable "previewImage" does not exist.', 15, $this->source); })()), "html", null, true);
            echo "\" onload=\"this.parentNode.className += ' complete';\">
        ";
            // line 16
            $this->loadTemplate("@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/asset.html.twig", 16)->display(twig_array_merge($context, ["element" => (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 16, $this->source); })())]));
            // line 17
            echo "    </div>
";
        } else {
            // line 19
            echo "    <div class=\"mega-icon ";
            echo twig_escape_filter($this->env, (isset($context["iconCls"]) || array_key_exists("iconCls", $context) ? $context["iconCls"] : (function () { throw new RuntimeError('Variable "iconCls" does not exist.', 19, $this->source); })()), "html", null, true);
            echo "\"></div>
    ";
            // line 20
            $this->loadTemplate("@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/asset.html.twig", 20)->display(twig_array_merge($context, ["element" => (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 20, $this->source); })())]));
        }
        // line 22
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/asset.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 22,  89 => 20,  84 => 19,  80 => 17,  78 => 16,  74 => 15,  71 => 14,  69 => 13,  66 => 12,  62 => 10,  60 => 9,  57 => 8,  55 => 7,  52 => 6,  50 => 5,  47 => 4,  45 => 3,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# @var \$element \\Pimcore\\Model\\Asset\\Image|\\Pimcore\\Model\\Asset\\Document|\\Pimcore\\Model\\Asset\\Video #}
{% set previewImage = null %}
{% set params = { 'id': element.id, 'treepreview': true, 'hdpi': true } %}

{% if element is instanceof('\\\\Pimcore\\\\Model\\\\Asset\\\\Image') %}
    {% set previewImage = path('pimcore_admin_asset_getimagethumbnail', params) %}
{% elseif element is instanceof('\\\\Pimcore\\\\Model\\\\Asset\\\\Video') and pimcore_video_is_available() %}
    {% set previewImage = path('pimcore_admin_asset_getvideothumbnail', params) %}
{% elseif element is instanceof('\\\\Pimcore\\\\Model\\\\Asset\\\\Document') and pimcore_document_is_available() %}
    {% set previewImage = path('pimcore_admin_asset_getdocumentthumbnail', params) %}
{% endif %}

{% if previewImage is defined %}
    <div class=\"full-preview\">
        <img src=\"{{ previewImage }}\" onload=\"this.parentNode.className += ' complete';\">
        {% include '@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig' with {'element': element} %}
    </div>
{% else %}
    <div class=\"mega-icon {{ iconCls }}\"></div>
    {% include '@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig' with {'element': element} %}
{% endif %}

", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/asset.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/SearchAdmin/Search/Quicksearch/asset.html.twig");
    }
}

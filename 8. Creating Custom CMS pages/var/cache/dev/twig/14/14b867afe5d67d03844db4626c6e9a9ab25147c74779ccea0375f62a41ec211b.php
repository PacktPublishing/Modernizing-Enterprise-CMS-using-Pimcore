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

/* Default/helpers.html.twig */
class __TwigTemplate_036fc64ce6fb852bda4190b74d226bb159a0fb55d170e5f1772356bb8992379b extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Default/helpers.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Default/helpers.html.twig"));

        // line 1
        echo "<h2> Fetching object </h2>
";
        // line 2
        $context["myObject"] = Pimcore\Model\DataObject::getById(2);
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["myObject"]) || array_key_exists("myObject", $context) ? $context["myObject"] : (function () { throw new RuntimeError('Variable "myObject" does not exist.', 3, $this->source); })()), "getTitle", [], "any", false, false, false, 3), "html", null, true);
        echo "


<h2> Fetching Document </h2>
";
        // line 7
        $context["myDoc"] = Pimcore\Model\Document::getById(3);
        // line 8
        echo "title: ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["myDoc"]) || array_key_exists("myDoc", $context) ? $context["myDoc"] : (function () { throw new RuntimeError('Variable "myDoc" does not exist.', 8, $this->source); })()), "getTitle", [], "any", false, false, false, 8), "html", null, true);
        echo " </br>
url: ";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["myDoc"]) || array_key_exists("myDoc", $context) ? $context["myDoc"] : (function () { throw new RuntimeError('Variable "myDoc" does not exist.', 9, $this->source); })()), "html", null, true);
        echo "



<h2> Fetching Asset </h2>
";
        // line 14
        $context["myDoc"] = Pimcore\Model\Asset::getById(3);
        // line 15
        echo "url: ";
        echo twig_escape_filter($this->env, (isset($context["myDoc"]) || array_key_exists("myDoc", $context) ? $context["myDoc"] : (function () { throw new RuntimeError('Variable "myDoc" does not exist.', 15, $this->source); })()), "html", null, true);
        echo " <br>
filename: ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["myDoc"]) || array_key_exists("myDoc", $context) ? $context["myDoc"] : (function () { throw new RuntimeError('Variable "myDoc" does not exist.', 16, $this->source); })()), "getFilename", [], "any", false, false, false, 16), "html", null, true);
        echo "
<img src=\"";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["myDoc"]) || array_key_exists("myDoc", $context) ? $context["myDoc"] : (function () { throw new RuntimeError('Variable "myDoc" does not exist.', 17, $this->source); })()), "html", null, true);
        echo "\"  height=\"30\"/>

";
        // line 22
        echo "
</h2> Caching a part of the page </h2>
";
        // line 24
        $context["cache"] = $this->extensions['Pimcore\Twig\Extension\CacheExtension']->init("cache_key", 60, true);
        // line 25
        if ( !twig_get_attribute($this->env, $this->source, (isset($context["cache"]) || array_key_exists("cache", $context) ? $context["cache"] : (function () { throw new RuntimeError('Variable "cache" does not exist.', 25, $this->source); })()), "start", [], "method", false, false, false, 25)) {
            // line 26
            echo "    <h1>Even you refresh the page this date will remain the same</h1>
    ";
            // line 27
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "y-m-d"), "html", null, true);
            echo " v";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "U"), "html", null, true);
            echo "
    ";
            // line 28
            twig_get_attribute($this->env, $this->source, (isset($context["cache"]) || array_key_exists("cache", $context) ? $context["cache"] : (function () { throw new RuntimeError('Variable "cache" does not exist.', 28, $this->source); })()), "end", [], "method", false, false, false, 28);
        }
        // line 30
        echo "

<h2> browser detection </h2>
";
        // line 33
        if (twig_get_attribute($this->env, $this->source, Pimcore\Tool\DeviceDetector::getInstance(), "isPhone", [], "method", false, false, false, 33)) {
            // line 34
            echo "    I'm a phone
";
        } elseif (twig_get_attribute($this->env, $this->source, Pimcore\Tool\DeviceDetector::getInstance(), "isTablet", [], "method", false, false, false, 35)) {
            // line 36
            echo "    I'm a table
";
        } elseif (twig_get_attribute($this->env, $this->source, Pimcore\Tool\DeviceDetector::getInstance(), "isDesktop", [], "method", false, false, false, 37)) {
            // line 38
            echo "    I'm a desktop device
";
        }
        // line 40
        echo "
<h2> Parameters </h2>
";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 42, $this->source); })()), "request", [], "any", false, false, false, 42), "get", [0 => "_dc"], "method", false, false, false, 42), "html", null, true);
        echo "

<h2>Glossary </h2>
";
        // line 45
        $this->env->getExtension('Pimcore\Twig\Extension\GlossaryExtension')->start();
        // line 46
        echo "My content PIMCore loves CMS
";

        $this->env->getExtension('Pimcore\Twig\Extension\GlossaryExtension')->stop();
        // line 48
        echo "
<h2> Placeholder </h2>
";
        // line 50
        twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_placeholder')->getCallable(), ["myplaceholder"]), "setPrefix", [0 => "<h3>"], "method", false, false, false, 50), "setPostfix", [0 => "</h3>"], "method", false, false, false, 51), "setIndent", [0 => 4], "method", false, false, false, 52), "set", [0 => "My content"], "method", false, false, false, 53);
        // line 55
        echo "

";
        // line 57
        echo call_user_func_array($this->env->getFunction('pimcore_placeholder')->getCallable(), ["myplaceholder"]);
        echo "


<h2> HeadLink </h2>
";
        // line 61
        call_user_func_array($this->env->getFunction('pimcore_head_link')->getCallable(), [["rel" => "icon", "href" => "/img/favicon.ico"], "APPEND"]);
        // line 62
        echo " ";
        twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_head_link')->getCallable(), []), "appendStylesheet", [0 => "/my.css"], "method", false, false, false, 62);
        // line 63
        echo "
";
        // line 64
        echo call_user_func_array($this->env->getFunction('pimcore_head_link')->getCallable(), []);
        echo "

<h2> append meta </h2>


";
        // line 69
        twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_head_meta')->getCallable(), []), "appendName", [0 => "description", 1 => "My SEO description for my awesome page"], "method", false, false, false, 69);
        // line 71
        twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_head_meta')->getCallable(), []), "setProperty", [0 => "og:title", 1 => "my article title"], "method", false, false, false, 71);
        // line 72
        twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_head_meta')->getCallable(), []), "setProperty", [0 => "og:type", 1 => "article"], "method", false, false, false, 72);
        // line 74
        twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_head_meta')->getCallable(), []), "appendHttpEquiv", [0 => "Content-Type", 1 => "text/html; charset=UTF-8"], "method", false, false, false, 74), "appendHttpEquiv", [0 => "Content-Language", 1 => "en-US"], "method", false, false, false, 74);
        // line 75
        echo "
";
        // line 76
        echo call_user_func_array($this->env->getFunction('pimcore_head_meta')->getCallable(), []);
        echo "


<h2> head scripts </2>
";
        // line 80
        twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_head_script')->getCallable(), []), "appendFile", [0 => "/myscript.js"], "method", false, false, false, 80);
        // line 81
        echo "
";
        // line 82
        echo call_user_func_array($this->env->getFunction('pimcore_head_script')->getCallable(), []);
        echo "

<h2> Conditional Head Style </2>
";
        // line 85
        twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_head_style')->getCallable(), []), "appendStyle", [0 => "ie.css", 1 => ["conditional" => "lt IE 11"]], "method", false, false, false, 85);
        // line 86
        echo "
";
        // line 87
        echo call_user_func_array($this->env->getFunction('pimcore_head_style')->getCallable(), []);
        echo "

<h2> include a document </h2>
";
        // line 91
        echo "
";
        // line 92
        twig_get_attribute($this->env, $this->source, call_user_func_array($this->env->getFunction('pimcore_inline_script')->getCallable(), []), "appendFile", [0 => "/myscript.js"], "method", false, false, false, 92);
        // line 93
        echo call_user_func_array($this->env->getFunction('pimcore_inline_script')->getCallable(), []);
        echo "

<h2>Navigation </h2>
";
        // line 96
        $context["mainNavStartNode"] = twig_get_attribute($this->env, $this->source, (isset($context["document"]) || array_key_exists("document", $context) ? $context["document"] : (function () { throw new RuntimeError('Variable "document" does not exist.', 96, $this->source); })()), "getProperty", [0 => "mainNavStartNode"], "method", false, false, false, 96);
        // line 97
        $context["navigation"] = $this->extensions['Pimcore\Twig\Extension\NavigationExtension']->buildNavigation(["active" =>         // line 98
(isset($context["document"]) || array_key_exists("document", $context) ? $context["document"] : (function () { throw new RuntimeError('Variable "document" does not exist.', 98, $this->source); })()), "root" =>         // line 99
(isset($context["mainNavStartNode"]) || array_key_exists("mainNavStartNode", $context) ? $context["mainNavStartNode"] : (function () { throw new RuntimeError('Variable "mainNavStartNode" does not exist.', 99, $this->source); })())]);
        // line 101
        echo $this->extensions['Pimcore\Twig\Extension\NavigationExtension']->render((isset($context["navigation"]) || array_key_exists("navigation", $context) ? $context["navigation"] : (function () { throw new RuntimeError('Variable "navigation" does not exist.', 101, $this->source); })()));
        echo "


<h2>include </h2>
";
        // line 105
        echo twig_include($this->env, $context, "Default/include.html.twig", ["par" => "value"]);
        echo "
";
        // line 107
        echo "

<h2>Translation </h2>
";
        // line 110
        $context["message"] = "my-test-key";
        echo " 
";
        // line 111
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 111, $this->source); })())), "html", null, true);
        echo "


<h2> iterable blocks <h2>
";
        // line 115
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->getBlockIterator($this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "block", "contentblock")));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 116
            echo "    <h2>";
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "input", "subline");
            echo "</h2>
    ";
            // line 117
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "wysiwyg", "content");
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        echo "
<h2> Website key </h2>
";
        // line 121
        echo twig_escape_filter($this->env, $this->extensions['Pimcore\Twig\Extension\WebsiteConfigExtension']->getWebsiteConfig("mykey"), "html", null, true);
        echo "

<h2> Thumbnail </h2>
";
        // line 124
        $context["asset"] = Pimcore\Model\Asset::getById(3);
        // line 125
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 125, $this->source); })()), "getThumbnail", [0 => "MyThubnails"], "method", false, false, false, 125), "getHtml", [], "method", false, false, false, 125);
        echo "
<br>
";
        // line 127
        echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 127, $this->source); })()), "getThumbnail", [0 => ["width" => 50, "format" => "png"]], "method", false, false, false, 127), "getHtml", [], "method", false, false, false, 127);
        // line 130
        echo "


<h2> Custom template helper </h2>

";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Default/helpers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  295 => 130,  293 => 127,  288 => 125,  286 => 124,  280 => 121,  276 => 119,  268 => 117,  263 => 116,  259 => 115,  252 => 111,  248 => 110,  243 => 107,  239 => 105,  232 => 101,  230 => 99,  229 => 98,  228 => 97,  226 => 96,  220 => 93,  218 => 92,  215 => 91,  209 => 87,  206 => 86,  204 => 85,  198 => 82,  195 => 81,  193 => 80,  186 => 76,  183 => 75,  181 => 74,  179 => 72,  177 => 71,  175 => 69,  167 => 64,  164 => 63,  161 => 62,  159 => 61,  152 => 57,  148 => 55,  146 => 50,  142 => 48,  137 => 46,  135 => 45,  129 => 42,  125 => 40,  121 => 38,  117 => 36,  113 => 34,  111 => 33,  106 => 30,  103 => 28,  97 => 27,  94 => 26,  92 => 25,  90 => 24,  86 => 22,  81 => 17,  77 => 16,  72 => 15,  70 => 14,  62 => 9,  57 => 8,  55 => 7,  48 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h2> Fetching object </h2>
{% set myObject = pimcore_object(2) %}
{{ myObject.getTitle}}


<h2> Fetching Document </h2>
{% set myDoc = pimcore_document(3) %}
title: {{ myDoc.getTitle}} </br>
url: {{ myDoc}}



<h2> Fetching Asset </h2>
{% set myDoc = pimcore_asset(3) %}
url: {{ myDoc}} <br>
filename: {{ myDoc.getFilename}}
<img src=\"{{ myDoc}}\"  height=\"30\"/>

{# <h2> Fetching Action </h2>
This call the /custom/json action passing items:11 as parameter and print the result here
{{ pimcore_action('json', 'Custom', null, { items: 11 }) }} #}

</h2> Caching a part of the page </h2>
{% set cache = pimcore_cache(\"cache_key\", 60, true) %}
{% if not cache.start() %}
    <h1>Even you refresh the page this date will remain the same</h1>
    {{ 'now'|date('y-m-d') }} v{{ 'now'|date('U') }}
    {% do cache.end() %}
{% endif %}


<h2> browser detection </h2>
{% if pimcore_device().isPhone() %}
    I'm a phone
{% elseif pimcore_device().isTablet() %}
    I'm a table
{% elseif pimcore_device().isDesktop() %}
    I'm a desktop device
{% endif %}

<h2> Parameters </h2>
{{ app.request.get(\"_dc\") }}

<h2>Glossary </h2>
{% pimcoreglossary %}
My content PIMCore loves CMS
{% endpimcoreglossary %}

<h2> Placeholder </h2>
{% do  pimcore_placeholder('myplaceholder')
.setPrefix(\"<h3>\")
.setPostfix(\"</h3>\")
.setIndent(4)
.set(\"My content\") %}


{{ pimcore_placeholder('myplaceholder') }}


<h2> HeadLink </h2>
{% do  pimcore_head_link({'rel' : 'icon', 'href' : '/img/favicon.ico'},\"APPEND\")  %}
 {% do pimcore_head_link().appendStylesheet(\"/my.css\") %}

{{ pimcore_head_link()}}

<h2> append meta </h2>


{% do pimcore_head_meta().appendName('description', 'My SEO description for my awesome page') %}
{# adding addictional properties #}
{% do pimcore_head_meta().setProperty('og:title', 'my article title') %}
{% do pimcore_head_meta().setProperty('og:type', 'article') %}
{# appendHttpEquiv #}
{% do pimcore_head_meta().appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8').appendHttpEquiv('Content-Language', 'en-US') %}

{{ pimcore_head_meta() }}


<h2> head scripts </2>
{% do pimcore_head_script().appendFile(\"/myscript.js\") %}

{{ pimcore_head_script()}}

<h2> Conditional Head Style </2>
{% do pimcore_head_style().appendStyle(\"ie.css\", {'conditional': 'lt IE 11'}) %}

{{ pimcore_head_style() }}

<h2> include a document </h2>
{# pimcore_inc('/MySnippet/') #}

{% do pimcore_inline_script().appendFile(\"/myscript.js\") %}
{{ pimcore_inline_script() | raw }}

<h2>Navigation </h2>
{% set mainNavStartNode = document.getProperty('mainNavStartNode') %}
{% set navigation = pimcore_build_nav({
    active: document,
    root: mainNavStartNode
}) %}
{{ pimcore_render_nav(navigation) }}


<h2>include </h2>
{{ include(\"Default/include.html.twig\", {'par':'value'}) }}
{# include \"Default/include.html.twig\"  #}


<h2>Translation </h2>
{% set message =\"my-test-key\" %} 
{{ message|trans }}


<h2> iterable blocks <h2>
{% for i in pimcore_iterate_block(pimcore_block('contentblock')) %}
    <h2>{{ pimcore_input('subline') }}</h2>
    {{ pimcore_wysiwyg('content') }}
{% endfor %}

<h2> Website key </h2>
{{ pimcore_website_config('mykey') }}

<h2> Thumbnail </h2>
{% set asset = pimcore_asset(3) %}
{{ asset.getThumbnail('MyThubnails').getHtml() | raw }}
<br>
{{ asset.getThumbnail({
    width: 50,
    format: 'png'
}).getHtml() | raw }}


<h2> Custom template helper </h2>

{# {{ timestamp(\"Y-m-d\")}} #}", "Default/helpers.html.twig", "/var/www/html/templates/Default/helpers.html.twig");
    }
}

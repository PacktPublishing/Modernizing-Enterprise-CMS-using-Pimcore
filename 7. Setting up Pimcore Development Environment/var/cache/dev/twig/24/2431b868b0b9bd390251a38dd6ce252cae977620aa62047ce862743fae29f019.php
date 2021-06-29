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

/* @PimcoreAdmin/SearchAdmin/Search/Quicksearch/document.html.twig */
class __TwigTemplate_f7e4d9a408553eb4ac98021671f3652a0e9ecfb0a809a166bc750c3d6f3b8b48 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/document.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/document.html.twig"));

        // line 2
        $context["previewImage"] = null;
        // line 3
        if ((call_user_func_array($this->env->getTest('instanceof')->getCallable(), [(isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 3, $this->source); })()), "\\Pimcore\\Model\\Document\\Page"]) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["config"]) || array_key_exists("config", $context) ? $context["config"] : (function () { throw new RuntimeError('Variable "config" does not exist.', 3, $this->source); })()), "documents", [], "array", false, false, false, 3), "generate_preview", [], "array", false, false, false, 3) == true))) {
            // line 4
            echo "    ";
            $context["thumbnailFileHdpi"] = twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 4, $this->source); })()), "getPreviewImageFilesystemPath", [0 => true], "method", false, false, false, 4);
            // line 5
            echo "    ";
            if (call_user_func_array($this->env->getFunction('pimcore_file_exists')->getCallable(), [(isset($context["thumbnailFileHdpi"]) || array_key_exists("thumbnailFileHdpi", $context) ? $context["thumbnailFileHdpi"] : (function () { throw new RuntimeError('Variable "thumbnailFileHdpi" does not exist.', 5, $this->source); })())])) {
                // line 6
                echo "        ";
                $context["previewImage"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_page_display_preview_image", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 6, $this->source); })()), "id", [], "any", false, false, false, 6), "hdpi" => true]);
                // line 7
                echo "    ";
            }
        }
        // line 9
        echo "
";
        // line 10
        if (((isset($context["previewImage"]) || array_key_exists("previewImage", $context) ? $context["previewImage"] : (function () { throw new RuntimeError('Variable "previewImage" does not exist.', 10, $this->source); })()) != null)) {
            // line 11
            echo "    <div class=\"full-preview\">
        <img src=\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["previewImage"]) || array_key_exists("previewImage", $context) ? $context["previewImage"] : (function () { throw new RuntimeError('Variable "previewImage" does not exist.', 12, $this->source); })()), "html", null, true);
            echo "\" onload=\"this.parentNode.className += ' complete';\">
        ";
            // line 13
            $this->loadTemplate("@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/document.html.twig", 13)->display(twig_array_merge($context, ["element" => (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 13, $this->source); })())]));
            // line 14
            echo "    </div>
";
        } else {
            // line 16
            echo "    <div class=\"mega-icon ";
            echo twig_escape_filter($this->env, (isset($context["iconCls"]) || array_key_exists("iconCls", $context) ? $context["iconCls"] : (function () { throw new RuntimeError('Variable "iconCls" does not exist.', 16, $this->source); })()), "html", null, true);
            echo "\"></div>
    ";
            // line 17
            $this->loadTemplate("@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/document.html.twig", 17)->display(twig_array_merge($context, ["element" => (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 17, $this->source); })())]));
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/document.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 17,  78 => 16,  74 => 14,  72 => 13,  68 => 12,  65 => 11,  63 => 10,  60 => 9,  56 => 7,  53 => 6,  50 => 5,  47 => 4,  45 => 3,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# @var \$element \\Pimcore\\Model\\Document\\Page #}
{% set previewImage = null %}
{% if element is instanceof('\\\\Pimcore\\\\Model\\\\Document\\\\Page') and config['documents']['generate_preview'] == true %}
    {% set thumbnailFileHdpi = element.getPreviewImageFilesystemPath(true) %}
    {% if pimcore_file_exists(thumbnailFileHdpi) %}
        {% set previewImage = path('pimcore_admin_page_display_preview_image', {'id': element.id, 'hdpi': true }) %}
    {% endif %}
{% endif %}

{% if previewImage != null %}
    <div class=\"full-preview\">
        <img src=\"{{ previewImage }}\" onload=\"this.parentNode.className += ' complete';\">
        {% include '@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig' with {'element': element} %}
    </div>
{% else %}
    <div class=\"mega-icon {{ iconCls }}\"></div>
    {% include '@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig' with {'element': element} %}
{% endif %}
", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/document.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/SearchAdmin/Search/Quicksearch/document.html.twig");
    }
}

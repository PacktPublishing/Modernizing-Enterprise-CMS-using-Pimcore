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

/* @PimcoreCore/Areabrick/wrapper.html.twig */
class __TwigTemplate_31c48e5e46b52fc6372cc3bccb2e42b3040ba8c15c2884467a6445dae6a81ee5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'areabrickWrapper' => [$this, 'block_areabrickWrapper'],
            'areabrickOpenTag' => [$this, 'block_areabrickOpenTag'],
            'areabrickFrontend' => [$this, 'block_areabrickFrontend'],
            'areabrickCloseTag' => [$this, 'block_areabrickCloseTag'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Areabrick/wrapper.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Areabrick/wrapper.html.twig"));

        // line 4
        echo "
";
        // line 6
        echo "
";
        // line 10
        echo "
";
        // line 11
        if (((isset($context["editmode"]) || array_key_exists("editmode", $context) ? $context["editmode"] : (function () { throw new RuntimeError('Variable "editmode" does not exist.', 11, $this->source); })()) && (isset($context["isAreaBlock"]) || array_key_exists("isAreaBlock", $context) ? $context["isAreaBlock"] : (function () { throw new RuntimeError('Variable "isAreaBlock" does not exist.', 11, $this->source); })()))) {
            // line 12
            echo "    <div class=\"pimcore_area_entry pimcore_block_entry\" ";
            echo (isset($context["editmodeOuterAttributes"]) || array_key_exists("editmodeOuterAttributes", $context) ? $context["editmodeOuterAttributes"] : (function () { throw new RuntimeError('Variable "editmodeOuterAttributes" does not exist.', 12, $this->source); })());
            echo " ";
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 12, $this->source); })());
            echo ">
        <div class=\"pimcore_area_buttons\" ";
            // line 13
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 13, $this->source); })());
            echo ">
            <div class=\"pimcore_area_buttons_inner\">
                <div class=\"pimcore_block_plus_up\" ";
            // line 15
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 15, $this->source); })());
            echo "></div>
                <div class=\"pimcore_block_plus\" ";
            // line 16
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 16, $this->source); })());
            echo "></div>
                <div class=\"pimcore_block_minus\" ";
            // line 17
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 17, $this->source); })());
            echo "></div>
                <div class=\"pimcore_block_up\" ";
            // line 18
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 18, $this->source); })());
            echo "></div>
                <div class=\"pimcore_block_down\" ";
            // line 19
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 19, $this->source); })());
            echo "></div>

                <div class=\"pimcore_block_type\" ";
            // line 21
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 21, $this->source); })());
            echo "></div>
                <div class=\"pimcore_block_options\" ";
            // line 22
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 22, $this->source); })());
            echo "></div>
                <div class=\"pimcore_block_visibility\" ";
            // line 23
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 23, $this->source); })());
            echo "></div>

                ";
            // line 25
            if ((isset($context["editableDialog"]) || array_key_exists("editableDialog", $context) ? $context["editableDialog"] : (function () { throw new RuntimeError('Variable "editableDialog" does not exist.', 25, $this->source); })())) {
                // line 26
                echo "                    <div class=\"pimcore_block_dialog\" ";
                echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 26, $this->source); })());
                echo " ";
                echo (isset($context["editableDialogAttributes"]) || array_key_exists("editableDialogAttributes", $context) ? $context["editableDialogAttributes"] : (function () { throw new RuntimeError('Variable "editableDialogAttributes" does not exist.', 26, $this->source); })());
                echo "></div>
                ";
            }
            // line 28
            echo "
                <div class=\"pimcore_block_label\" ";
            // line 29
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 29, $this->source); })());
            echo "></div>
                <div class=\"pimcore_block_clear\" ";
            // line 30
            echo (isset($context["editmodeGenericAttributes"]) || array_key_exists("editmodeGenericAttributes", $context) ? $context["editmodeGenericAttributes"] : (function () { throw new RuntimeError('Variable "editmodeGenericAttributes" does not exist.', 30, $this->source); })());
            echo "></div>
            </div>
        </div>
        ";
            // line 33
            if ((isset($context["editableDialog"]) || array_key_exists("editableDialog", $context) ? $context["editableDialog"] : (function () { throw new RuntimeError('Variable "editableDialog" does not exist.', 33, $this->source); })())) {
                // line 34
                echo "            <template id=\"dialogBoxConfig-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["editableDialog"]) || array_key_exists("editableDialog", $context) ? $context["editableDialog"] : (function () { throw new RuntimeError('Variable "editableDialog" does not exist.', 34, $this->source); })()), "id", [], "any", false, false, false, 34), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, json_encode((isset($context["editableDialog"]) || array_key_exists("editableDialog", $context) ? $context["editableDialog"] : (function () { throw new RuntimeError('Variable "editableDialog" does not exist.', 34, $this->source); })())), "html", null, true);
                echo "</template>
            ";
                // line 35
                echo (isset($context["dialogHtml"]) || array_key_exists("dialogHtml", $context) ? $context["dialogHtml"] : (function () { throw new RuntimeError('Variable "dialogHtml" does not exist.', 35, $this->source); })());
                echo "
        ";
            }
        }
        // line 38
        echo "
        ";
        // line 39
        $this->displayBlock('areabrickWrapper', $context, $blocks);
        // line 52
        echo "
";
        // line 53
        if (((isset($context["editmode"]) || array_key_exists("editmode", $context) ? $context["editmode"] : (function () { throw new RuntimeError('Variable "editmode" does not exist.', 53, $this->source); })()) && (isset($context["isAreaBlock"]) || array_key_exists("isAreaBlock", $context) ? $context["isAreaBlock"] : (function () { throw new RuntimeError('Variable "isAreaBlock" does not exist.', 53, $this->source); })()))) {
            // line 54
            echo "    </div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 39
    public function block_areabrickWrapper($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "areabrickWrapper"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "areabrickWrapper"));

        // line 40
        echo "            ";
        $this->displayBlock('areabrickOpenTag', $context, $blocks);
        // line 43
        echo "
                ";
        // line 44
        $this->displayBlock('areabrickFrontend', $context, $blocks);
        // line 47
        echo "
            ";
        // line 48
        $this->displayBlock('areabrickCloseTag', $context, $blocks);
        // line 51
        echo "        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 40
    public function block_areabrickOpenTag($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "areabrickOpenTag"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "areabrickOpenTag"));

        // line 41
        echo "                ";
        echo twig_get_attribute($this->env, $this->source, (isset($context["brick"]) || array_key_exists("brick", $context) ? $context["brick"] : (function () { throw new RuntimeError('Variable "brick" does not exist.', 41, $this->source); })()), "htmlTagOpen", [0 => (isset($context["info"]) || array_key_exists("info", $context) ? $context["info"] : (function () { throw new RuntimeError('Variable "info" does not exist.', 41, $this->source); })())], "method", false, false, false, 41);
        echo "
            ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 44
    public function block_areabrickFrontend($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "areabrickFrontend"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "areabrickFrontend"));

        // line 45
        echo "                    ";
        echo twig_get_attribute($this->env, $this->source, (isset($context["templating"]) || array_key_exists("templating", $context) ? $context["templating"] : (function () { throw new RuntimeError('Variable "templating" does not exist.', 45, $this->source); })()), "render", [0 => (isset($context["viewTemplate"]) || array_key_exists("viewTemplate", $context) ? $context["viewTemplate"] : (function () { throw new RuntimeError('Variable "viewTemplate" does not exist.', 45, $this->source); })()), 1 => (isset($context["viewParameters"]) || array_key_exists("viewParameters", $context) ? $context["viewParameters"] : (function () { throw new RuntimeError('Variable "viewParameters" does not exist.', 45, $this->source); })())], "method", false, false, false, 45);
        echo "
                ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 48
    public function block_areabrickCloseTag($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "areabrickCloseTag"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "areabrickCloseTag"));

        // line 49
        echo "                ";
        echo twig_get_attribute($this->env, $this->source, (isset($context["brick"]) || array_key_exists("brick", $context) ? $context["brick"] : (function () { throw new RuntimeError('Variable "brick" does not exist.', 49, $this->source); })()), "htmlTagClose", [0 => (isset($context["info"]) || array_key_exists("info", $context) ? $context["info"] : (function () { throw new RuntimeError('Variable "info" does not exist.', 49, $this->source); })())], "method", false, false, false, 49);
        echo "
            ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreCore/Areabrick/wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 49,  243 => 48,  230 => 45,  220 => 44,  207 => 41,  197 => 40,  187 => 51,  185 => 48,  182 => 47,  180 => 44,  177 => 43,  174 => 40,  164 => 39,  152 => 54,  150 => 53,  147 => 52,  145 => 39,  142 => 38,  136 => 35,  129 => 34,  127 => 33,  121 => 30,  117 => 29,  114 => 28,  106 => 26,  104 => 25,  99 => 23,  95 => 22,  91 => 21,  86 => 19,  82 => 18,  78 => 17,  74 => 16,  70 => 15,  65 => 13,  58 => 12,  56 => 11,  53 => 10,  50 => 6,  47 => 4,);
    }

    public function getSourceContext()
    {
        return new Source("{# @var brick \\Pimcore\\Extension\\Document\\Areabrick\\AreabrickInterface #}
{# @var info \\Pimcore\\Model\\Document\\Editable\\Area\\Info #}
{# @var templating \\Symfony\\Component\\Templating\\EngineInterface #}

{# @var editmode bool #}

{# @var viewTemplate string #}
{# @var viewParameters array #}
{# @var editableDialog \\Pimcore\\Extension\\Document\\Areabrick\\EditableDialogBoxConfiguration #}

{% if editmode and isAreaBlock %}
    <div class=\"pimcore_area_entry pimcore_block_entry\" {{ editmodeOuterAttributes|raw }} {{ editmodeGenericAttributes|raw }}>
        <div class=\"pimcore_area_buttons\" {{ editmodeGenericAttributes|raw }}>
            <div class=\"pimcore_area_buttons_inner\">
                <div class=\"pimcore_block_plus_up\" {{ editmodeGenericAttributes|raw }}></div>
                <div class=\"pimcore_block_plus\" {{ editmodeGenericAttributes|raw }}></div>
                <div class=\"pimcore_block_minus\" {{ editmodeGenericAttributes|raw }}></div>
                <div class=\"pimcore_block_up\" {{ editmodeGenericAttributes|raw }}></div>
                <div class=\"pimcore_block_down\" {{ editmodeGenericAttributes|raw }}></div>

                <div class=\"pimcore_block_type\" {{ editmodeGenericAttributes|raw }}></div>
                <div class=\"pimcore_block_options\" {{ editmodeGenericAttributes|raw }}></div>
                <div class=\"pimcore_block_visibility\" {{ editmodeGenericAttributes|raw }}></div>

                {% if editableDialog %}
                    <div class=\"pimcore_block_dialog\" {{ editmodeGenericAttributes|raw }} {{ editableDialogAttributes|raw }}></div>
                {% endif %}

                <div class=\"pimcore_block_label\" {{ editmodeGenericAttributes|raw }}></div>
                <div class=\"pimcore_block_clear\" {{ editmodeGenericAttributes|raw }}></div>
            </div>
        </div>
        {% if editableDialog %}
            <template id=\"dialogBoxConfig-{{ editableDialog.id }}\">{{ editableDialog|json_encode() }}</template>
            {{ dialogHtml|raw }}
        {% endif %}
{% endif %}

        {% block areabrickWrapper %}
            {% block areabrickOpenTag %}
                {{ brick.htmlTagOpen(info) | raw }}
            {% endblock %}

                {% block areabrickFrontend %}
                    {{ templating.render(viewTemplate, viewParameters) | raw }}
                {% endblock %}

            {% block areabrickCloseTag %}
                {{ brick.htmlTagClose(info) | raw }}
            {% endblock %}
        {% endblock %}

{% if editmode and isAreaBlock %}
    </div>
{% endif %}
", "@PimcoreCore/Areabrick/wrapper.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views/Areabrick/wrapper.html.twig");
    }
}

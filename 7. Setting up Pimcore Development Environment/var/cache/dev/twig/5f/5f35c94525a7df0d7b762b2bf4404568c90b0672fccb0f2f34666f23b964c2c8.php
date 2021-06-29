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

/* @PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig */
class __TwigTemplate_16c26fd12f20df16ed9c470e441a9a27f47a29abb2c5352bd10ff2886bfd7d58 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig"));

        // line 2
        $context["language"] = twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 2, $this->source); })()), "getProperty", [0 => "language"], "method", false, false, false, 2);
        // line 3
        echo "<div class=\"data-table ";
        (((array_key_exists("cls", $context) &&  !(null === (isset($context["cls"]) || array_key_exists("cls", $context) ? $context["cls"] : (function () { throw new RuntimeError('Variable "cls" does not exist.', 3, $this->source); })())))) ? (print (twig_escape_filter($this->env, (isset($context["cls"]) || array_key_exists("cls", $context) ? $context["cls"] : (function () { throw new RuntimeError('Variable "cls" does not exist.', 3, $this->source); })()), "html", null, true))) : (print ("")));
        echo "\">
    <table>
        ";
        // line 5
        if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [(isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 5, $this->source); })()), "\\Pimcore\\Model\\DataObject\\Concrete"])) {
            // line 6
            echo "            <tr>
                <th>";
            // line 7
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("class", [], "admin"), "html", null, true);
            echo "</th>
                <td>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 8, $this->source); })()), "getClassName", [], "method", false, false, false, 8), "html", null, true);
            echo " [";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 8, $this->source); })()), "getClassId", [], "method", false, false, false, 8), "html", null, true);
            echo "]</td>
            </tr>
        ";
        }
        // line 11
        echo "
        ";
        // line 12
        if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [(isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 12, $this->source); })()), "\\Pimcore\\Model\\Asset"])) {
            // line 13
            echo "            <tr>
                <th>";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("mimetype", [], "admin"), "html", null, true);
            echo "</th>
                <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 15, $this->source); })()), "getMimetype", [], "method", false, false, false, 15), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        // line 18
        echo "
        ";
        // line 19
        if ( !twig_test_empty((isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 19, $this->source); })()))) {
            // line 20
            echo "            <tr>
                <th>";
            // line 21
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("language", [], "admin"), "html", null, true);
            echo "</th>
                <td style=\"padding-left: 40px; background: url(";
            // line 22
            echo twig_escape_filter($this->env, Pimcore\Tool::getLanguageFlagFile((isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 22, $this->source); })()), false), "html", null, true);
            echo ") left top no-repeat; background-size: 31px 21px;\">
                    ";
            // line 23
            $context["locales"] = Pimcore\Tool::getSupportedLocales();
            // line 24
            echo "                    ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["locales"]) || array_key_exists("locales", $context) ? $context["locales"] : (function () { throw new RuntimeError('Variable "locales" does not exist.', 24, $this->source); })()), (isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 24, $this->source); })()), [], "array", false, false, false, 24), "html", null, true);
            echo "
                </td>
            </tr>
        ";
        }
        // line 28
        echo "
        ";
        // line 29
        if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [(isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 29, $this->source); })()), "\\Pimcore\\Model\\Document\\Page"])) {
            // line 30
            echo "            ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 30, $this->source); })()), "title", [], "any", false, false, false, 30))) {
                // line 31
                echo "            <tr>
                <th>";
                // line 32
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("title", [], "admin"), "html", null, true);
                echo "</th>
                <td>";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 33, $this->source); })()), "title", [], "any", false, false, false, 33), "html", null, true);
                echo "</td>
            </tr>
            ";
            }
            // line 36
            echo "
            ";
            // line 37
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 37, $this->source); })()), "description", [], "any", false, false, false, 37))) {
                // line 38
                echo "                <tr>
                    <th>";
                // line 39
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("description", [], "admin"), "html", null, true);
                echo "</th>
                    <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 40, $this->source); })()), "description", [], "any", false, false, false, 40), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            // line 43
            echo "
            ";
            // line 44
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 44, $this->source); })()), "getProperty", [0 => "navigation_name"], "method", false, false, false, 44))) {
                // line 45
                echo "                <tr>
                    <th>";
                // line 46
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("name", [], "admin"), "html", null, true);
                echo "</th>
                    <td>";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 47, $this->source); })()), "getProperty", [0 => "navigation_name"], "method", false, false, false, 47), "html", null, true);
                echo "</td>
                </tr>
            ";
            }
            // line 50
            echo "        ";
        }
        // line 51
        echo "
        ";
        // line 52
        $context["owner"] = Pimcore\Model\User::getById(twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 52, $this->source); })()), "getUserOwner", [], "method", false, false, false, 52));
        // line 53
        echo "        ";
        if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [(isset($context["owner"]) || array_key_exists("owner", $context) ? $context["owner"] : (function () { throw new RuntimeError('Variable "owner" does not exist.', 53, $this->source); })()), "\\Pimcore\\Model\\User"])) {
            // line 54
            echo "            <tr>
                <th>";
            // line 55
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("owner", [], "admin"), "html", null, true);
            echo "</th>
                <td>";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["owner"]) || array_key_exists("owner", $context) ? $context["owner"] : (function () { throw new RuntimeError('Variable "owner" does not exist.', 56, $this->source); })()), "name", [], "any", false, false, false, 56), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        // line 59
        echo "
        ";
        // line 60
        $context["editor"] = Pimcore\Model\User::getById(twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 60, $this->source); })()), "getUserModification", [], "method", false, false, false, 60));
        // line 61
        echo "        ";
        if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [(isset($context["editor"]) || array_key_exists("editor", $context) ? $context["editor"] : (function () { throw new RuntimeError('Variable "editor" does not exist.', 61, $this->source); })()), "\\Pimcore\\Model\\User"])) {
            // line 62
            echo "            <tr>
                <th>";
            // line 63
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("usermodification", [], "admin"), "html", null, true);
            echo "</th>
                <td>";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["editor"]) || array_key_exists("editor", $context) ? $context["editor"] : (function () { throw new RuntimeError('Variable "editor" does not exist.', 64, $this->source); })()), "name", [], "any", false, false, false, 64), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        // line 67
        echo "
        <tr>
            <th>";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("creationdate", [], "admin"), "html", null, true);
        echo "</th>
            <td>";
        // line 70
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 70, $this->source); })()), "getCreationDate", [], "method", false, false, false, 70), "Y-m-d H:i"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("modificationdate", [], "admin"), "html", null, true);
        echo "</th>
            <td>";
        // line 74
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 74, $this->source); })()), "getModificationDate", [], "method", false, false, false, 74), "Y-m-d H:i"), "html", null, true);
        echo "</td>
        </tr>
    </table>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  232 => 74,  228 => 73,  222 => 70,  218 => 69,  214 => 67,  208 => 64,  204 => 63,  201 => 62,  198 => 61,  196 => 60,  193 => 59,  187 => 56,  183 => 55,  180 => 54,  177 => 53,  175 => 52,  172 => 51,  169 => 50,  163 => 47,  159 => 46,  156 => 45,  154 => 44,  151 => 43,  145 => 40,  141 => 39,  138 => 38,  136 => 37,  133 => 36,  127 => 33,  123 => 32,  120 => 31,  117 => 30,  115 => 29,  112 => 28,  104 => 24,  102 => 23,  98 => 22,  94 => 21,  91 => 20,  89 => 19,  86 => 18,  80 => 15,  76 => 14,  73 => 13,  71 => 12,  68 => 11,  60 => 8,  56 => 7,  53 => 6,  51 => 5,  45 => 3,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# @var \$element \\Pimcore\\Model\\Element\\AbstractElement #}
{% set language = element.getProperty('language') %}
<div class=\"data-table {{ cls ?? '' }}\">
    <table>
        {% if element is instanceof ('\\\\Pimcore\\\\Model\\\\DataObject\\\\Concrete') %}
            <tr>
                <th>{{ 'class'|trans([],'admin') }}</th>
                <td>{{ element.getClassName() }} [{{ element.getClassId() }}]</td>
            </tr>
        {% endif %}

        {% if element is instanceof ('\\\\Pimcore\\\\Model\\\\Asset') %}
            <tr>
                <th>{{ 'mimetype'|trans([],'admin') }}</th>
                <td>{{ element.getMimetype() }}</td>
            </tr>
        {% endif %}

        {% if language is not empty %}
            <tr>
                <th>{{ 'language'|trans([],'admin') }}</th>
                <td style=\"padding-left: 40px; background: url({{ pimcore_language_flag(language, false) }}) left top no-repeat; background-size: 31px 21px;\">
                    {% set locales = pimcore_supported_locales() %}
                    {{ locales[language] }}
                </td>
            </tr>
        {% endif %}

        {% if element is instanceof('\\\\Pimcore\\\\Model\\\\Document\\\\Page') %}
            {% if element.title is not empty %}
            <tr>
                <th>{{ 'title'|trans([],'admin') }}</th>
                <td>{{ element.title }}</td>
            </tr>
            {% endif %}

            {% if element.description is not empty %}
                <tr>
                    <th>{{ 'description'|trans([],'admin') }}</th>
                    <td>{{ element.description }}</td>
                </tr>
            {% endif %}

            {% if element.getProperty('navigation_name') is not empty %}
                <tr>
                    <th>{{ 'name'|trans([],'admin') }}</th>
                    <td>{{ element.getProperty('navigation_name') }}</td>
                </tr>
            {% endif %}
        {% endif %}

        {% set owner = pimcore_user(element.getUserOwner()) %}
        {% if owner is instanceof('\\\\Pimcore\\\\Model\\\\User') %}
            <tr>
                <th>{{ 'owner'|trans([],'admin') }}</th>
                <td>{{ owner.name }}</td>
            </tr>
        {% endif %}

        {% set editor = pimcore_user(element.getUserModification()) %}
        {% if editor is instanceof('\\\\Pimcore\\\\Model\\\\User') %}
            <tr>
                <th>{{ 'usermodification'|trans([],'admin') }}</th>
                <td>{{ editor.name }}</td>
            </tr>
        {% endif %}

        <tr>
            <th>{{ 'creationdate'|trans([],'admin') }}</th>
            <td>{{ element.getCreationDate()|date('Y-m-d H:i') }}</td>
        </tr>
        <tr>
            <th>{{ 'modificationdate'|trans([],'admin') }}</th>
            <td>{{ element.getModificationDate()|date('Y-m-d H:i') }}</td>
        </tr>
    </table>
</div>
", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/SearchAdmin/Search/Quicksearch/info-table.html.twig");
    }
}

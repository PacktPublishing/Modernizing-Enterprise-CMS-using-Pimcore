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

/* @PimcoreAdmin/Admin/Misc/admin-css.html.twig */
class __TwigTemplate_4d8fb86bce9c139cb4d507841a8600f1fd568561bf94580b2b7da1f68455d195 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Misc/admin-css.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Misc/admin-css.html.twig"));

        // line 1
        echo "/**
* Pimcore
*
* This source file is available under two different licenses:
* - GNU General Public License version 3 (GPLv3)
* - Pimcore Commercial License (PCL)
* Full copyright and license information is available in
* LICENSE.md which is distributed with this source code.
*
* @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
* @license    http://www.pimcore.org/license     GPLv3 and PCL
*/

/* THIS FILE IS GENERATED DYNAMICALLY BECAUSE OF DYNAMIC CSS CLASSES IN THE ADMIN */

";
        // line 17
        if ((array_key_exists("customviews", $context) && twig_test_iterable((isset($context["customviews"]) || array_key_exists("customviews", $context) ? $context["customviews"] : (function () { throw new RuntimeError('Variable "customviews" does not exist.', 17, $this->source); })())))) {
            // line 18
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["customviews"]) || array_key_exists("customviews", $context) ? $context["customviews"] : (function () { throw new RuntimeError('Variable "customviews" does not exist.', 18, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["cv"]) {
                // line 19
                echo "        ";
                if (twig_get_attribute($this->env, $this->source, $context["cv"], "icon", [], "array", true, true, false, 19)) {
                    // line 20
                    echo "            ";
                    $context["treetype"] = ((twig_get_attribute($this->env, $this->source, $context["cv"], "treetype", [], "array", false, false, false, 20)) ? (twig_get_attribute($this->env, $this->source, $context["cv"], "treetype", [], "array", false, false, false, 20)) : ("object"));
                    // line 21
                    echo ".pimcore_";
                    echo twig_escape_filter($this->env, (isset($context["treetype"]) || array_key_exists("treetype", $context) ? $context["treetype"] : (function () { throw new RuntimeError('Variable "treetype" does not exist.', 21, $this->source); })()), "html", null, true);
                    echo "_customview_icon_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cv"], "id", [], "array", false, false, false, 21), "html", null, true);
                    echo " {
    background: center / contain url(";
                    // line 22
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cv"], "icon", [], "array", false, false, false, 22), "html", null, true);
                    echo ") no-repeat !important;
}
        ";
                }
                // line 25
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cv'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 27
        echo "
";
        // line 29
        if ((array_key_exists("languages", $context) && twig_test_iterable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 29, $this->source); })())))) {
            // line 30
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 30, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 31
                echo "        ";
                $context["iconFile"] = Pimcore\Tool::getLanguageFlagFile($context["language"], false);
                // line 32
                echo "/* tab icon for localized fields [ ";
                echo twig_escape_filter($this->env, $context["language"], "html", null, true);
                echo " ] */
.pimcore_icon_language_";
                // line 33
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["language"]), "html", null, true);
                echo " {
    background: url(";
                // line 34
                echo twig_escape_filter($this->env, (isset($context["iconFile"]) || array_key_exists("iconFile", $context) ? $context["iconFile"] : (function () { throw new RuntimeError('Variable "iconFile" does not exist.', 34, $this->source); })()), "html", null, true);
                echo ") center center/contain no-repeat;
}

/* grid column header icon in translations [ ";
                // line 37
                echo twig_escape_filter($this->env, $context["language"], "html", null, true);
                echo " ] */
.x-column-header_";
                // line 38
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["language"]), "html", null, true);
                echo " {
    background: url(";
                // line 39
                echo twig_escape_filter($this->env, (isset($context["iconFile"]) || array_key_exists("iconFile", $context) ? $context["iconFile"] : (function () { throw new RuntimeError('Variable "iconFile" does not exist.', 39, $this->source); })()), "html", null, true);
                echo ") no-repeat left center/contain !important;
    padding-left:22px !important;
}
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 44
        echo "
";
        // line 46
        if ((array_key_exists("config", $context) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "branding", [], "array", false, true, false, 46), "color_admin_interface", [], "array", true, true, false, 46))) {
            // line 47
            echo "    ";
            $context["interfaceColor"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["config"]) || array_key_exists("config", $context) ? $context["config"] : (function () { throw new RuntimeError('Variable "config" does not exist.', 47, $this->source); })()), "branding", [], "array", false, false, false, 47), "color_admin_interface", [], "array", false, false, false, 47);
            // line 48
            echo "#pimcore_signet {
    background-color: ";
            // line 49
            echo twig_escape_filter($this->env, (isset($context["interfaceColor"]) || array_key_exists("interfaceColor", $context) ? $context["interfaceColor"] : (function () { throw new RuntimeError('Variable "interfaceColor" does not exist.', 49, $this->source); })()), "html", null, true);
            echo " !important;
}

#pimcore_avatar {
    background-color: ";
            // line 53
            echo twig_escape_filter($this->env, (isset($context["interfaceColor"]) || array_key_exists("interfaceColor", $context) ? $context["interfaceColor"] : (function () { throw new RuntimeError('Variable "interfaceColor" does not exist.', 53, $this->source); })()), "html", null, true);
            echo " !important;
}

#pimcore_navigation li:hover:after {
    background-color: ";
            // line 57
            echo twig_escape_filter($this->env, (isset($context["interfaceColor"]) || array_key_exists("interfaceColor", $context) ? $context["interfaceColor"] : (function () { throw new RuntimeError('Variable "interfaceColor" does not exist.', 57, $this->source); })()), "html", null, true);
            echo " !important;
}
";
        }
        // line 60
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Misc/admin-css.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 60,  165 => 57,  158 => 53,  151 => 49,  148 => 48,  145 => 47,  143 => 46,  140 => 44,  129 => 39,  125 => 38,  121 => 37,  115 => 34,  111 => 33,  106 => 32,  103 => 31,  98 => 30,  96 => 29,  93 => 27,  86 => 25,  80 => 22,  73 => 21,  70 => 20,  67 => 19,  62 => 18,  60 => 17,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("/**
* Pimcore
*
* This source file is available under two different licenses:
* - GNU General Public License version 3 (GPLv3)
* - Pimcore Commercial License (PCL)
* Full copyright and license information is available in
* LICENSE.md which is distributed with this source code.
*
* @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
* @license    http://www.pimcore.org/license     GPLv3 and PCL
*/

/* THIS FILE IS GENERATED DYNAMICALLY BECAUSE OF DYNAMIC CSS CLASSES IN THE ADMIN */

{# custom views #}
{% if customviews is defined and customviews is iterable %}
    {% for cv in customviews %}
        {%  if cv['icon'] is defined %}
            {% set treetype = cv[\"treetype\"] ? cv[\"treetype\"] : \"object\" %}
.pimcore_{{ treetype }}_customview_icon_{{ cv[\"id\"] }} {
    background: center / contain url({{ cv[\"icon\"] }}) no-repeat !important;
}
        {% endif %}
    {% endfor %}
{% endif %}

{# language icons #}
{% if languages is defined and languages is iterable %}
    {% for language in languages %}
        {% set iconFile = pimcore_language_flag(language, false) %}
/* tab icon for localized fields [ {{ language }} ] */
.pimcore_icon_language_{{ language|lower }} {
    background: url({{ iconFile }}) center center/contain no-repeat;
}

/* grid column header icon in translations [ {{ language }} ] */
.x-column-header_{{ language|lower }} {
    background: url({{ iconFile }}) no-repeat left center/contain !important;
    padding-left:22px !important;
}
    {% endfor %}
{% endif %}

{# CUSTOM BRANDING #}
{% if config is defined and config['branding']['color_admin_interface'] is defined %}
    {% set interfaceColor = config['branding']['color_admin_interface'] %}
#pimcore_signet {
    background-color: {{ interfaceColor }} !important;
}

#pimcore_avatar {
    background-color: {{ interfaceColor }} !important;
}

#pimcore_navigation li:hover:after {
    background-color: {{ interfaceColor }} !important;
}
{% endif %}

", "@PimcoreAdmin/Admin/Misc/admin-css.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Misc/admin-css.html.twig");
    }
}

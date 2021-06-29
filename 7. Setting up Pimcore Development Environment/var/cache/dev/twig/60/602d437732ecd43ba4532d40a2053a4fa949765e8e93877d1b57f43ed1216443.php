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

/* @PimcoreAdmin/Admin/Login/layout.html.twig */
class __TwigTemplate_1ba1b6d9a45eab54fa9445c0975aba8d7489f92c79400e5c01e62368a175c731 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Login/layout.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Login/layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Pimcore!</title>

        <meta charset=\"UTF-8\">
        <meta name=\"robots\" content=\"noindex, follow\"/>

        <link rel=\"icon\" type=\"image/png\" href=\"/bundles/pimcoreadmin/img/favicon/favicon-32x32.png\"/>

        <link rel=\"stylesheet\" href=\"/bundles/pimcoreadmin/css/login.css\" type=\"text/css\"/>

        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pluginCssPaths"]) || array_key_exists("pluginCssPaths", $context) ? $context["pluginCssPaths"] : (function () { throw new RuntimeError('Variable "pluginCssPaths" does not exist.', 13, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["pluginCssPath"]) {
            // line 14
            echo "            <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, $context["pluginCssPath"], "html", null, true);
            echo "?_dc=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "U"), "html", null, true);
            echo "\"/>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pluginCssPath'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    </head>
    <body class=\"pimcore_version_10 ";
        // line 17
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["config"]) || array_key_exists("config", $context) ? $context["config"] : (function () { throw new RuntimeError('Variable "config" does not exist.', 17, $this->source); })()), "branding", [], "array", false, false, false, 17), "login_screen_invert_colors", [], "array", false, false, false, 17)) ? ("inverted") : (""));
        echo "\">
        ";
        // line 18
        $context["backgroundImageUrl"] = "";
        // line 19
        echo "        ";
        $context["customImage"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["config"]) || array_key_exists("config", $context) ? $context["config"] : (function () { throw new RuntimeError('Variable "config" does not exist.', 19, $this->source); })()), "branding", [], "array", false, false, false, 19), "login_screen_custom_image", [], "array", false, false, false, 19);
        // line 20
        echo "        ";
        // line 21
        echo "        ";
        // line 22
        echo "        ";
        if (preg_match("@^https?://@", (isset($context["customImage"]) || array_key_exists("customImage", $context) ? $context["customImage"] : (function () { throw new RuntimeError('Variable "customImage" does not exist.', 22, $this->source); })()))) {
            // line 23
            echo "            ";
            $context["backgroundImageUrl"] = (isset($context["customImage"]) || array_key_exists("customImage", $context) ? $context["customImage"] : (function () { throw new RuntimeError('Variable "customImage" does not exist.', 23, $this->source); })());
            // line 24
            echo "        ";
        } elseif (call_user_func_array($this->env->getFunction('pimcore_file_exists')->getCallable(), [((twig_constant("PIMCORE_WEB_ROOT") . "/var/assets") . (isset($context["customImage"]) || array_key_exists("customImage", $context) ? $context["customImage"] : (function () { throw new RuntimeError('Variable "customImage" does not exist.', 24, $this->source); })()))])) {
            // line 25
            echo "            ";
            $context["backgroundImageUrl"] = (isset($context["customImage"]) || array_key_exists("customImage", $context) ? $context["customImage"] : (function () { throw new RuntimeError('Variable "customImage" does not exist.', 25, $this->source); })());
            // line 26
            echo "        ";
        } elseif (call_user_func_array($this->env->getFunction('pimcore_file_exists')->getCallable(), [(twig_constant("PIMCORE_WEB_ROOT") . (isset($context["customImage"]) || array_key_exists("customImage", $context) ? $context["customImage"] : (function () { throw new RuntimeError('Variable "customImage" does not exist.', 26, $this->source); })()))])) {
            // line 27
            echo "            ";
            $context["backgroundImageUrl"] = (isset($context["customImage"]) || array_key_exists("customImage", $context) ? $context["customImage"] : (function () { throw new RuntimeError('Variable "customImage" does not exist.', 27, $this->source); })());
            // line 28
            echo "        ";
        } else {
            // line 31
            echo "            ";
            $context["backgroundImageUrl"] = "/bundles/pimcoreadmin/img/login/pcx.svg";
            // line 32
            echo "        ";
        }
        // line 33
        echo "
        <style type=\"text/css\">
            #background {
                background-image: url(\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["backgroundImageUrl"]) || array_key_exists("backgroundImageUrl", $context) ? $context["backgroundImageUrl"] : (function () { throw new RuntimeError('Variable "backgroundImageUrl" does not exist.', 36, $this->source); })()), "html", null, true);
        echo "\");
            }
        </style>

        ";
        // line 40
        $context["customColor"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["config"]) || array_key_exists("config", $context) ? $context["config"] : (function () { throw new RuntimeError('Variable "config" does not exist.', 40, $this->source); })()), "branding", [], "array", false, false, false, 40), "color_login_screen", [], "array", false, false, false, 40);
        // line 41
        echo "        ";
        if ( !twig_test_empty((isset($context["customColor"]) || array_key_exists("customColor", $context) ? $context["customColor"] : (function () { throw new RuntimeError('Variable "customColor" does not exist.', 41, $this->source); })()))) {
            // line 42
            echo "        <style type=\"text/css\">
            #content button {
                background: ";
            // line 44
            echo twig_escape_filter($this->env, (isset($context["customColor"]) || array_key_exists("customColor", $context) ? $context["customColor"] : (function () { throw new RuntimeError('Variable "customColor" does not exist.', 44, $this->source); })()), "html", null, true);
            echo ";
            }

            #content a {
                color: ";
            // line 48
            echo twig_escape_filter($this->env, (isset($context["customColor"]) || array_key_exists("customColor", $context) ? $context["customColor"] : (function () { throw new RuntimeError('Variable "customColor" does not exist.', 48, $this->source); })()), "html", null, true);
            echo ";
            }
        </style>
        ";
        }
        // line 52
        echo "
        <div id=\"logo\">
            <img src=\"";
        // line 54
        echo twig_escape_filter($this->env, ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_settings_display_custom_logo") . ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["config"]) || array_key_exists("config", $context) ? $context["config"] : (function () { throw new RuntimeError('Variable "config" does not exist.', 54, $this->source); })()), "branding", [], "array", false, false, false, 54), "login_screen_invert_colors", [], "array", false, false, false, 54)) ? ("") : ("?white=true"))), "html", null, true);
        echo "\">
        </div>

        <div id=\"content\">
            ";
        // line 58
        $this->displayBlock("content", $context, $blocks);
        echo "
        </div>

        ";
        // line 61
        if ((array_key_exists("debug", $context) && (isset($context["debug"]) || array_key_exists("debug", $context) ? $context["debug"] : (function () { throw new RuntimeError('Variable "debug" does not exist.', 61, $this->source); })()))) {
            // line 62
            echo "            <div id=\"github\">
                <a class=\"github-button\" href=\"https://github.com/pimcore/pimcore\" data-color-scheme=\"no-preference: dark; light: dark; dark: dark;\" data-size=\"large\" aria-label=\"Star pimcore/pimcore on GitHub\">Star</a>
            </div>
            <script async defer src=\"https://buttons.github.io/buttons.js\"></script>
        ";
        }
        // line 67
        echo "
        ";
        // line 81
        echo "
        <div id=\"contentBackground\"></div>
        <div id=\"background\"></div>
        <div id=\"footer\">
            &copy; 2009-";
        // line 85
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " <a href=\"http://www.pimcore.org/\">Pimcore GmbH</a><br>
            BE RESPECTFUL AND HONOR OUR WORK FOR FREE & OPEN SOURCE SOFTWARE BY NOT REMOVING OUR COPYRIGHT NOTICE!
            KEEP IN MIND THAT REMOVING THE COPYRIGHT NOTICE IS VIOLATING OUR LICENSING TERMS!
        </div>

        ";
        // line 90
        if (        $this->hasBlock("below_footer", $context, $blocks)) {
            // line 91
            echo "            ";
            $this->displayBlock("below_footer", $context, $blocks);
            echo "
        ";
        }
        // line 93
        echo "
    </body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Login/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 93,  195 => 91,  193 => 90,  185 => 85,  179 => 81,  176 => 67,  169 => 62,  167 => 61,  161 => 58,  154 => 54,  150 => 52,  143 => 48,  136 => 44,  132 => 42,  129 => 41,  127 => 40,  120 => 36,  115 => 33,  112 => 32,  109 => 31,  106 => 28,  103 => 27,  100 => 26,  97 => 25,  94 => 24,  91 => 23,  88 => 22,  86 => 21,  84 => 20,  81 => 19,  79 => 18,  75 => 17,  72 => 16,  61 => 14,  57 => 13,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Pimcore!</title>

        <meta charset=\"UTF-8\">
        <meta name=\"robots\" content=\"noindex, follow\"/>

        <link rel=\"icon\" type=\"image/png\" href=\"/bundles/pimcoreadmin/img/favicon/favicon-32x32.png\"/>

        <link rel=\"stylesheet\" href=\"/bundles/pimcoreadmin/css/login.css\" type=\"text/css\"/>

        {% for pluginCssPath in pluginCssPaths %}
            <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ pluginCssPath }}?_dc={{ 'now'|date('U') }}\"/>
        {% endfor %}
    </head>
    <body class=\"pimcore_version_10 {{ config['branding']['login_screen_invert_colors'] ? 'inverted' : '' }}\">
        {% set backgroundImageUrl = \"\" %}
        {% set customImage = config['branding']['login_screen_custom_image'] %}
        {# https://github.com/pimcore/pimcore/issues/8016 #}
        {# https://github.com/pimcore/pimcore/issues/8129 #}
        {% if customImage matches '@^https?://@' %}
            {% set backgroundImageUrl = customImage %}
        {% elseif pimcore_file_exists(constant('PIMCORE_WEB_ROOT') ~ '/var/assets' ~ customImage) %}
            {% set backgroundImageUrl = customImage %}
        {% elseif pimcore_file_exists(constant('PIMCORE_WEB_ROOT') ~ customImage) %}
            {% set backgroundImageUrl = customImage %}
        {% else %}
{#            {% set defaultImages = ['pimconaut-ecommerce.svg', 'pimconaut-world.svg', 'pimconaut-engineer.svg', 'pimconaut-moon.svg', 'pimconaut-rocket.svg'] %}#}
{#            {% set backgroundImageUrl = '/bundles/pimcoreadmin/img/login/' ~ random(defaultImages) %}#}
            {% set backgroundImageUrl = '/bundles/pimcoreadmin/img/login/pcx.svg' %}
        {% endif %}

        <style type=\"text/css\">
            #background {
                background-image: url(\"{{ backgroundImageUrl }}\");
            }
        </style>

        {% set customColor = config['branding']['color_login_screen'] %}
        {% if (customColor is not empty) %}
        <style type=\"text/css\">
            #content button {
                background: {{ customColor }};
            }

            #content a {
                color: {{ customColor }};
            }
        </style>
        {% endif %}

        <div id=\"logo\">
            <img src=\"{{ path('pimcore_settings_display_custom_logo') ~ (config['branding']['login_screen_invert_colors'] ? '' : '?white=true') }}\">
        </div>

        <div id=\"content\">
            {{ block('content') }}
        </div>

        {% if debug is defined and debug %}
            <div id=\"github\">
                <a class=\"github-button\" href=\"https://github.com/pimcore/pimcore\" data-color-scheme=\"no-preference: dark; light: dark; dark: dark;\" data-size=\"large\" aria-label=\"Star pimcore/pimcore on GitHub\">Star</a>
            </div>
            <script async defer src=\"https://buttons.github.io/buttons.js\"></script>
        {% endif %}

        {#
            <div id=\"news\">
                <h2>News</h2>
                <hr>
                <p>
                    <a href=\"#\">Where is Master Data Management Heading in the Future?</a>
                </p>
                <hr>
                <p>
                    <a href=\"#\">Priint and Pimcore announce technology partnership to ease publishing workflows</a>
                </p>
            </div>
        #}

        <div id=\"contentBackground\"></div>
        <div id=\"background\"></div>
        <div id=\"footer\">
            &copy; 2009-{{ \"now\"|date(\"Y\") }} <a href=\"http://www.pimcore.org/\">Pimcore GmbH</a><br>
            BE RESPECTFUL AND HONOR OUR WORK FOR FREE & OPEN SOURCE SOFTWARE BY NOT REMOVING OUR COPYRIGHT NOTICE!
            KEEP IN MIND THAT REMOVING THE COPYRIGHT NOTICE IS VIOLATING OUR LICENSING TERMS!
        </div>

        {% if block('below_footer') is defined %}
            {{ block('below_footer') }}
        {% endif %}

    </body>
</html>
", "@PimcoreAdmin/Admin/Login/layout.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Login/layout.html.twig");
    }
}

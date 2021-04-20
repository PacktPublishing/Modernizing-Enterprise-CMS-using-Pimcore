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

/* @PimcoreAdmin/Admin/Asset/showVersionImage.html.twig */
class __TwigTemplate_efd306f25ec195cb5f020166d507b1108cafb5a1f79eb90187e06b816ab339e3 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Asset/showVersionImage.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Asset/showVersionImage.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">

    <style type=\"text/css\">

        html, body, #wrapper {
            height: 100%;
            margin: 0;
            padding: 0;
            border: none;
            text-align: center;
        }

        #wrapper {
            margin: 0 auto;
            text-align: left;
            vertical-align: middle;
            width: 400px;
        }


    </style>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/pimcoreadmin/css/object_versions.css\"/>

</head>

<body>

";
        // line 31
        $context["tempFile"] = twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 31, $this->source); })()), "getTemporaryFile", [], "method", false, false, false, 31);
        // line 32
        $context["dataUri"] = $this->extensions['Pimcore\Twig\Extension\HelpersExtension']->getImageVersionPreview((isset($context["tempFile"]) || array_key_exists("tempFile", $context) ? $context["tempFile"] : (function () { throw new RuntimeError('Variable "tempFile" does not exist.', 32, $this->source); })()));
        // line 33
        echo "
<table id=\"wrapper\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
    <tr>
        <td align=\"center\">
            <img src=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["dataUri"]) || array_key_exists("dataUri", $context) ? $context["dataUri"] : (function () { throw new RuntimeError('Variable "dataUri" does not exist.', 37, $this->source); })()), "html", null, true);
        echo "\"/>
              <table class=\"preview\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                    <tbody>
                        <tr class=\"odd\">
                            <th>Name</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 46, $this->source); })()), "getFileName", [], "method", false, false, false, 46), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Creation Date</td>
                            <td>";
        // line 50
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 50, $this->source); })()), "getCreationDate", [], "method", false, false, false, 50), "m/d/Y H:i:s"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Modification Date</td>
                            <td>";
        // line 54
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 54, $this->source); })()), "getModificationDate", [], "method", false, false, false, 54), "m/d/Y H:i:s"), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>File Size</td>
                            <td>";
        // line 58
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 58, $this->source); })()), "getFileSize", [0 => true], "method", false, false, false, 58), "html", null, true);
        echo " </td>
                        </tr>
                        <tr>
                            <td>Mime Type</td>
                            <td>";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 62, $this->source); })()), "getMimetype", [], "method", false, false, false, 62), "html", null, true);
        echo "</td>
                        </tr>
                        <tr>
                            <td>Dimensions</td>
                            <td>
                                ";
        // line 67
        if (twig_test_iterable(twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 67, $this->source); })()), "getDimensions", [], "method", false, false, false, 67))) {
            // line 68
            echo "                                    ";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 68, $this->source); })()), "getDimensions", [], "method", false, false, false, 68), "width", [], "array", false, false, false, 68) . " X ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 68, $this->source); })()), "getDimensions", [], "method", false, false, false, 68), "height", [], "array", false, false, false, 68)), "html", null, true);
            echo "
                                ";
        }
        // line 70
        echo "                            </td>
                        </tr>
                        ";
        // line 72
        if (twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 72, $this->source); })()), "getHasMetadata", [], "method", false, false, false, 72)) {
            // line 73
            echo "                            ";
            $context["metaData"] = twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 73, $this->source); })()), "getMetadata", [], "method", false, false, false, 73);
            // line 74
            echo "
                            ";
            // line 75
            if ((twig_test_iterable((isset($context["metaData"]) || array_key_exists("metaData", $context) ? $context["metaData"] : (function () { throw new RuntimeError('Variable "metaData" does not exist.', 75, $this->source); })())) && (twig_length_filter($this->env, (isset($context["metaData"]) || array_key_exists("metaData", $context) ? $context["metaData"] : (function () { throw new RuntimeError('Variable "metaData" does not exist.', 75, $this->source); })())) > 0))) {
                // line 76
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["metaData"]) || array_key_exists("metaData", $context) ? $context["metaData"] : (function () { throw new RuntimeError('Variable "metaData" does not exist.', 76, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
                    // line 77
                    echo "                                    ";
                    $context["preview"] = twig_get_attribute($this->env, $this->source, $context["data"], "data", [], "array", false, false, false, 77);
                    // line 78
                    echo "                                    ";
                    $context["instance"] = twig_get_attribute($this->env, $this->source, (isset($context["loader"]) || array_key_exists("loader", $context) ? $context["loader"] : (function () { throw new RuntimeError('Variable "loader" does not exist.', 78, $this->source); })()), "build", [0 => twig_get_attribute($this->env, $this->source, $context["data"], "type", [], "array", false, false, false, 78)], "method", false, false, false, 78);
                    // line 79
                    echo "                                    ";
                    $context["preview"] = twig_get_attribute($this->env, $this->source, (isset($context["instance"]) || array_key_exists("instance", $context) ? $context["instance"] : (function () { throw new RuntimeError('Variable "instance" does not exist.', 79, $this->source); })()), "getVersionPreview", [0 => (isset($context["preview"]) || array_key_exists("preview", $context) ? $context["preview"] : (function () { throw new RuntimeError('Variable "preview" does not exist.', 79, $this->source); })()), 1 => $context["data"]], "method", false, false, false, 79);
                    // line 80
                    echo "
                                    <tr>
                                        <td>";
                    // line 82
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "name", [], "array", false, false, false, 82), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "type", [], "array", false, false, false, 82), "html", null, true);
                    echo ")</td>
                                        <td>";
                    // line 83
                    echo twig_escape_filter($this->env, (isset($context["preview"]) || array_key_exists("preview", $context) ? $context["preview"] : (function () { throw new RuntimeError('Variable "preview" does not exist.', 83, $this->source); })()), "html", null, true);
                    echo "</td>
                                    </tr>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 86
                echo "                            ";
            }
            // line 87
            echo "                        ";
        }
        // line 88
        echo "                    </tbody>
              </table>
        </td>
    </tr>
</table>

</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Asset/showVersionImage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 88,  191 => 87,  188 => 86,  179 => 83,  173 => 82,  169 => 80,  166 => 79,  163 => 78,  160 => 77,  155 => 76,  153 => 75,  150 => 74,  147 => 73,  145 => 72,  141 => 70,  135 => 68,  133 => 67,  125 => 62,  118 => 58,  111 => 54,  104 => 50,  97 => 46,  85 => 37,  79 => 33,  77 => 32,  75 => 31,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">

    <style type=\"text/css\">

        html, body, #wrapper {
            height: 100%;
            margin: 0;
            padding: 0;
            border: none;
            text-align: center;
        }

        #wrapper {
            margin: 0 auto;
            text-align: left;
            vertical-align: middle;
            width: 400px;
        }


    </style>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/pimcoreadmin/css/object_versions.css\"/>

</head>

<body>

{% set tempFile = asset.getTemporaryFile() %}
{% set dataUri = pimcore_image_version_preview(tempFile) %}

<table id=\"wrapper\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
    <tr>
        <td align=\"center\">
            <img src=\"{{ dataUri }}\"/>
              <table class=\"preview\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                    <tbody>
                        <tr class=\"odd\">
                            <th>Name</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ asset.getFileName() }}</td>
                        </tr>
                        <tr>
                            <td>Creation Date</td>
                            <td>{{ asset.getCreationDate()|date('m/d/Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td>Modification Date</td>
                            <td>{{ asset.getModificationDate()|date('m/d/Y H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td>File Size</td>
                            <td>{{ asset.getFileSize(true) }} </td>
                        </tr>
                        <tr>
                            <td>Mime Type</td>
                            <td>{{ asset.getMimetype() }}</td>
                        </tr>
                        <tr>
                            <td>Dimensions</td>
                            <td>
                                {% if asset.getDimensions() is iterable %}
                                    {{ asset.getDimensions()[\"width\"] ~ ' X ' ~ asset.getDimensions()[\"height\"] }}
                                {% endif %}
                            </td>
                        </tr>
                        {% if asset.getHasMetadata() %}
                            {% set metaData = asset.getMetadata() %}

                            {% if metaData is iterable and metaData|length > 0 %}
                                {% for data in metaData %}
                                    {% set preview = data[\"data\"] %}
                                    {% set instance = loader.build(data['type']) %}
                                    {% set preview = instance.getVersionPreview(preview,data) %}

                                    <tr>
                                        <td>{{ data['name'] }} ({{ data['type'] }})</td>
                                        <td>{{ preview }}</td>
                                    </tr>
                                {% endfor %}
                            {% endif %}
                        {% endif %}
                    </tbody>
              </table>
        </td>
    </tr>
</table>

</body>
</html>
", "@PimcoreAdmin/Admin/Asset/showVersionImage.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Asset/showVersionImage.html.twig");
    }
}

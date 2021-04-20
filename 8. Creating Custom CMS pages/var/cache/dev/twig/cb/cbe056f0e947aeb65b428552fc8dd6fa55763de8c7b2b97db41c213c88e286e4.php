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

/* @PimcoreAdmin/Admin/Asset/getPreviewVideoDisplay.html.twig */
class __TwigTemplate_46c5cea19f7b0d9b1283bcd99caec19d4ca4fb925b600d3c16323c2ab98f49e2 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Asset/getPreviewVideoDisplay.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Asset/getPreviewVideoDisplay.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">

    <style type=\"text/css\">

        /* hide from ie on mac \\*/
        html {
            height: 100%;
            overflow: hidden;
        }
        /* end hide */

        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: #000;
        }

        #videoContainer {
            text-align: center;
            position: absolute;
            top:50%;
            margin-top: -200px;
            width: 100%;
        }

        video {

        }

    </style>

</head>

<body>

";
        // line 40
        $context["previewImage"] = "";
        // line 41
        if (Pimcore\Video::isAvailable()) {
            // line 42
            echo "    ";
            $context["previewImage"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_asset_getvideothumbnail", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 42, $this->source); })()), "getId", [], "method", false, false, false, 42), "treepreview" => "true"]);
        }
        // line 44
        echo "
";
        // line 45
        $context["serveVideoPreview"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_asset_servevideopreview", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 45, $this->source); })()), "getId", [], "method", false, false, false, 45)]);
        // line 46
        echo "
<div id=\"videoContainer\">
    <video id=\"video\" controls=\"controls\" height=\"400\" poster=\"";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["previewImage"]) || array_key_exists("previewImage", $context) ? $context["previewImage"] : (function () { throw new RuntimeError('Variable "previewImage" does not exist.', 48, $this->source); })()), "html", null, true);
        echo "\">
        <source src=\"";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["serveVideoPreview"]) || array_key_exists("serveVideoPreview", $context) ? $context["serveVideoPreview"] : (function () { throw new RuntimeError('Variable "serveVideoPreview" does not exist.', 49, $this->source); })()), "html", null, true);
        echo "\" type=\"video/mp4\" />
    </video>
</div>


</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Asset/getPreviewVideoDisplay.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 49,  101 => 48,  97 => 46,  95 => 45,  92 => 44,  88 => 42,  86 => 41,  84 => 40,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">

    <style type=\"text/css\">

        /* hide from ie on mac \\*/
        html {
            height: 100%;
            overflow: hidden;
        }
        /* end hide */

        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background: #000;
        }

        #videoContainer {
            text-align: center;
            position: absolute;
            top:50%;
            margin-top: -200px;
            width: 100%;
        }

        video {

        }

    </style>

</head>

<body>

{% set previewImage = '' %}
{% if pimcore_video_is_available() %}
    {% set previewImage = path('pimcore_admin_asset_getvideothumbnail', {id: asset.getId(), treepreview: 'true'}) %}
{% endif %}

{% set serveVideoPreview = path('pimcore_admin_asset_servevideopreview', {id: asset.getId()}) %}

<div id=\"videoContainer\">
    <video id=\"video\" controls=\"controls\" height=\"400\" poster=\"{{ previewImage }}\">
        <source src=\"{{ serveVideoPreview }}\" type=\"video/mp4\" />
    </video>
</div>


</body>
</html>
", "@PimcoreAdmin/Admin/Asset/getPreviewVideoDisplay.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Asset/getPreviewVideoDisplay.html.twig");
    }
}

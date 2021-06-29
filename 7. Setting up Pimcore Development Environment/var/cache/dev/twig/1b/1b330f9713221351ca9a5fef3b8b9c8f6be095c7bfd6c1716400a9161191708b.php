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

/* @PimcoreAdmin/Admin/Asset/imageEditor.html.twig */
class __TwigTemplate_195e5908308040803a122833d19cd09000b1f38230ecd48ccae2a8c5fb7e6919 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Asset/imageEditor.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Asset/imageEditor.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html dir=\"ltr\" lang=\"en-US\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <base href=\"/bundles/pimcoreadmin/js/lib/minipaint/\" />
    <script src=\"/bundles/pimcoreadmin/js/lib/minipaint/dist/bundle.js\"></script>
</head>
<body>
<div class=\"wrapper\">

    <div class=\"submenu\">
        <div class=\"block attributes\" id=\"action_attributes\"></div>
        <div class=\"clear\"></div>
    </div>

    <div class=\"sidebar_left\" id=\"tools_container\"></div>

    <div class=\"main_wrapper\" id=\"main_wrapper\">
        <div class=\"canvas_wrapper\" id=\"canvas_wrapper\">
            <div id=\"mouse\"></div>
            <div class=\"transparent-grid\" id=\"canvas_minipaint_background\"></div>
            <canvas id=\"canvas_minipaint\">
                <div class=\"trn error\">
                    Your browser does not support canvas or JavaScript is not enabled.
                </div>
            </canvas>
        </div>
    </div>

    <div class=\"sidebar_right\">
        <div class=\"preview block\">
            <h2 class=\"trn toggle\" data-target=\"toggle_preview\">Preview</h2>
            <div id=\"toggle_preview\"></div>
        </div>

        <div class=\"colors block\">
            <h2 class=\"trn toggle\" data-target=\"toggle_colors\">Colors</h2>
            <input
                title=\"Click to change color\"
                type=\"color\"
                class=\"color_area\"
                id=\"main_color\"
                value=\"#0000ff\"\t/>
            <div class=\"content\" id=\"toggle_colors\"></div>
        </div>

        <div class=\"block\" id=\"info_base\">
            <h2 class=\"trn toggle toggle-full\" data-target=\"toggle_info\">Information</h2>
            <div class=\"content\" id=\"toggle_info\"></div>
        </div>

        <div class=\"details block\" id=\"details_base\">
            <h2 class=\"trn toggle toggle-full\" data-target=\"toggle_details\">Layer details</h2>
            <div class=\"content\" id=\"toggle_details\"></div>
        </div>

        <div class=\"layers block\">
            <h2 class=\"trn\">Layers</h2>
            <div class=\"content\" id=\"layers_base\"></div>
        </div>
    </div>
</div>
<div class=\"mobile_menu\">
    <button class=\"right_mobile_menu\" id=\"mobile_menu_button\" type=\"button\"></button>
</div>
<div class=\"ddsmoothmenu\" id=\"main_menu\"></div>
<div class=\"hidden\" id=\"tmp\"></div>
<div id=\"popup\"></div>

";
        // line 71
        $context["imageFileExtension"] = Pimcore\File::getFileExtension(twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 71, $this->source); })()), "getFilename", [], "method", false, false, false, 71));
        // line 72
        $context["imageUrl"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_asset_getasset", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 72, $this->source); })()), "getId", [], "method", false, false, false, 72)]);
        // line 73
        echo "
";
        // line 74
        if (twig_in_filter( !(isset($context["imageFileExtension"]) || array_key_exists("imageFileExtension", $context) ? $context["imageFileExtension"] : (function () { throw new RuntimeError('Variable "imageFileExtension" does not exist.', 74, $this->source); })()), [0 => "png", 1 => "jpg", 2 => "jpeg"])) {
            // line 75
            echo "    ";
            $context["imageUrl"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_asset_getimagethumbnail", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 75, $this->source); })()), "getId", [], "method", false, false, false, 75), "format" => "png"]);
        }
        // line 77
        echo "
<img style=\"visibility: hidden\" id='image' src=\"";
        // line 78
        echo twig_escape_filter($this->env, (isset($context["imageUrl"]) || array_key_exists("imageUrl", $context) ? $context["imageUrl"] : (function () { throw new RuntimeError('Variable "imageUrl" does not exist.', 78, $this->source); })()), "html", null, true);
        echo "\" />
<script>
    window.addEventListener('load', function (e) {
        var image = document.getElementById('image');
        window.Layers.insert({
            name: \"";
        // line 83
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 83, $this->source); })()), "getFilename", [], "method", false, false, false, 83), "html", null, true);
        echo "\",
            type: 'image',
            data: image,
            width: image.naturalWidth || image.width,
            height: image.naturalHeight || image.height,
            width_original: image.naturalWidth || image.width,
            height_original: image.naturalHeight || image.height,
        });

        document.getElementById('save_button').addEventListener('click', function () {

            var tempCanvas = document.createElement(\"canvas\");
            var tempCtx = tempCanvas.getContext(\"2d\");
            var dim = window.Layers.get_dimensions();
            tempCanvas.width = dim.width;
            tempCanvas.height = dim.height;
            Layers.convert_layers_to_canvas(tempCtx);
            var dataUri = tempCanvas.toDataURL('image/";
        // line 100
        echo ((((isset($context["imageFileExtension"]) || array_key_exists("imageFileExtension", $context) ? $context["imageFileExtension"] : (function () { throw new RuntimeError('Variable "imageFileExtension" does not exist.', 100, $this->source); })()) == "png")) ? ("png") : ("jpeg"));
        echo "');

            parent.Ext.Ajax.request({
                url: \"";
        // line 103
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_asset_imageeditorsave", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 103, $this->source); })()), "getId", [], "method", false, false, false, 103)]), "html", null, true);
        echo "\",
                method: 'PUT',
                params: {
                    dataUri: dataUri
                }
            });

            return false;
        });
    }, false);
</script>

</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Asset/imageEditor.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 103,  159 => 100,  139 => 83,  131 => 78,  128 => 77,  124 => 75,  122 => 74,  119 => 73,  117 => 72,  115 => 71,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html dir=\"ltr\" lang=\"en-US\">
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <base href=\"/bundles/pimcoreadmin/js/lib/minipaint/\" />
    <script src=\"/bundles/pimcoreadmin/js/lib/minipaint/dist/bundle.js\"></script>
</head>
<body>
<div class=\"wrapper\">

    <div class=\"submenu\">
        <div class=\"block attributes\" id=\"action_attributes\"></div>
        <div class=\"clear\"></div>
    </div>

    <div class=\"sidebar_left\" id=\"tools_container\"></div>

    <div class=\"main_wrapper\" id=\"main_wrapper\">
        <div class=\"canvas_wrapper\" id=\"canvas_wrapper\">
            <div id=\"mouse\"></div>
            <div class=\"transparent-grid\" id=\"canvas_minipaint_background\"></div>
            <canvas id=\"canvas_minipaint\">
                <div class=\"trn error\">
                    Your browser does not support canvas or JavaScript is not enabled.
                </div>
            </canvas>
        </div>
    </div>

    <div class=\"sidebar_right\">
        <div class=\"preview block\">
            <h2 class=\"trn toggle\" data-target=\"toggle_preview\">Preview</h2>
            <div id=\"toggle_preview\"></div>
        </div>

        <div class=\"colors block\">
            <h2 class=\"trn toggle\" data-target=\"toggle_colors\">Colors</h2>
            <input
                title=\"Click to change color\"
                type=\"color\"
                class=\"color_area\"
                id=\"main_color\"
                value=\"#0000ff\"\t/>
            <div class=\"content\" id=\"toggle_colors\"></div>
        </div>

        <div class=\"block\" id=\"info_base\">
            <h2 class=\"trn toggle toggle-full\" data-target=\"toggle_info\">Information</h2>
            <div class=\"content\" id=\"toggle_info\"></div>
        </div>

        <div class=\"details block\" id=\"details_base\">
            <h2 class=\"trn toggle toggle-full\" data-target=\"toggle_details\">Layer details</h2>
            <div class=\"content\" id=\"toggle_details\"></div>
        </div>

        <div class=\"layers block\">
            <h2 class=\"trn\">Layers</h2>
            <div class=\"content\" id=\"layers_base\"></div>
        </div>
    </div>
</div>
<div class=\"mobile_menu\">
    <button class=\"right_mobile_menu\" id=\"mobile_menu_button\" type=\"button\"></button>
</div>
<div class=\"ddsmoothmenu\" id=\"main_menu\"></div>
<div class=\"hidden\" id=\"tmp\"></div>
<div id=\"popup\"></div>

{% set imageFileExtension = pimcore_file_extension(asset.getFilename()) %}
{% set imageUrl = path('pimcore_admin_asset_getasset', {id: asset.getId()}) %}

{% if not imageFileExtension in ['png', 'jpg', 'jpeg'] %}
    {% set imageUrl = path('pimcore_admin_asset_getimagethumbnail', {id: asset.getId(), format: 'png' }) %}
{% endif %}

<img style=\"visibility: hidden\" id='image' src=\"{{ imageUrl }}\" />
<script>
    window.addEventListener('load', function (e) {
        var image = document.getElementById('image');
        window.Layers.insert({
            name: \"{{ asset.getFilename() }}\",
            type: 'image',
            data: image,
            width: image.naturalWidth || image.width,
            height: image.naturalHeight || image.height,
            width_original: image.naturalWidth || image.width,
            height_original: image.naturalHeight || image.height,
        });

        document.getElementById('save_button').addEventListener('click', function () {

            var tempCanvas = document.createElement(\"canvas\");
            var tempCtx = tempCanvas.getContext(\"2d\");
            var dim = window.Layers.get_dimensions();
            tempCanvas.width = dim.width;
            tempCanvas.height = dim.height;
            Layers.convert_layers_to_canvas(tempCtx);
            var dataUri = tempCanvas.toDataURL('image/{{ imageFileExtension == \"png\" ? \"png\" : \"jpeg\" }}');

            parent.Ext.Ajax.request({
                url: \"{{ path('pimcore_admin_asset_imageeditorsave', {id: asset.getId()}) }}\",
                method: 'PUT',
                params: {
                    dataUri: dataUri
                }
            });

            return false;
        });
    }, false);
</script>

</body>
</html>
", "@PimcoreAdmin/Admin/Asset/imageEditor.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Asset/imageEditor.html.twig");
    }
}

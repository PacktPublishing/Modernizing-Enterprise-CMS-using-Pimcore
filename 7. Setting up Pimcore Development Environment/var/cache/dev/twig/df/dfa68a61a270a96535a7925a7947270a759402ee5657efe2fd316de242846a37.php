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

/* @PimcoreAdmin/Admin/Asset/getPreviewVideoError.html.twig */
class __TwigTemplate_4d58b51d2e935c393b63297a6df732fe60e758b911907b35e94d72c2bf97ca02 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Asset/getPreviewVideoError.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Asset/getPreviewVideoError.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/pimcoreadmin/css/admin.css\"/>

    <style type=\"text/css\">

        /* hide from ie on mac \\*/
        html {
            height: 100%;
            overflow: hidden;
        }

        #wrapper {
            height: 100%;
        }

        /* end hide */

        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>

</head>

<body>

<table id=\"wrapper\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
    <tr>
        <td class=\"error\" align=\"center\" valign=\"center\">
            ";
        // line 36
        if ((array_key_exists("thumbnail", $context) && (twig_get_attribute($this->env, $this->source, (isset($context["thumbnail"]) || array_key_exists("thumbnail", $context) ? $context["thumbnail"] : (function () { throw new RuntimeError('Variable "thumbnail" does not exist.', 36, $this->source); })()), "status", [], "array", false, false, false, 36) == "inprogress"))) {
            // line 37
            echo "                <style type=\"text/css\">
                    .pimcore_editable_video_progress {
                        position:relative;
                        background:#555 url( ";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["asset"]) || array_key_exists("asset", $context) ? $context["asset"] : (function () { throw new RuntimeError('Variable "asset" does not exist.', 40, $this->source); })()), "getImageThumbnail", [0 => ["width" => 640]], "method", false, false, false, 40), "html", null, true);
            echo " ) no-repeat center center;
                        font-family:Arial,Verdana,sans-serif;
                        color:#fff;
                        text-shadow: 0 0 3px #000, 0 0 5px #000, 0 0 1px #000;
                    }
                    .pimcore_editable_video_progress_status {
                        font-size:16px;
                        color:#555;
                        font-family:Arial,Verdana,sans-serif;
                        line-height:66px;
                        background:#fff url(/bundles/pimcoreadmin/img/video-loading.gif) center center no-repeat;
                        width:66px;
                        height:66px;
                        padding:20px;
                        border:1px solid #555;
                        text-align:center;
                        box-shadow: 2px 2px 5px #333;
                        border-radius:20px;
                        top: 137px;
                        left: 267px;
                        position:absolute;
                        opacity: 0.8;
                        text-shadow: none;
                    }
                </style>
                <div class=\"pimcore_editable_video_progress\" style=\"width:640px; height:380px;\">

                    <br />
                    ";
            // line 68
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("video_preview_in_progress", [], "admin"), "html", null, true);
            echo "
                    <br />
                    ";
            // line 70
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("please_wait", [], "admin"), "html", null, true);
            echo "

                    <div class=\"pimcore_editable_video_progress_status\"></div>
                </div>


                <script>
                    window.setTimeout(function () {
                        location.reload();
                    }, 5000);
                </script>
            ";
        } elseif ( !Pimcore\Video::isAvailable()) {
            // line 82
            echo "                ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("preview_not_available", [], "admin"), "html", null, true);
            echo "
                <br />
                ";
            // line 84
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("php_cli_binary_and_or_ffmpeg_binary_setting_is_missing", [], "admin"), "html", null, true);
            echo "
            ";
        } else {
            // line 86
            echo "                ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("preview_not_available", [], "admin"), "html", null, true);
            echo "
                <br />
                Error unknown, please check the log files
            ";
        }
        // line 90
        echo "        </td>
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
        return "@PimcoreAdmin/Admin/Asset/getPreviewVideoError.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 90,  149 => 86,  144 => 84,  138 => 82,  123 => 70,  118 => 68,  87 => 40,  82 => 37,  80 => 36,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/pimcoreadmin/css/admin.css\"/>

    <style type=\"text/css\">

        /* hide from ie on mac \\*/
        html {
            height: 100%;
            overflow: hidden;
        }

        #wrapper {
            height: 100%;
        }

        /* end hide */

        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

    </style>

</head>

<body>

<table id=\"wrapper\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
    <tr>
        <td class=\"error\" align=\"center\" valign=\"center\">
            {% if thumbnail is defined and thumbnail[\"status\"] == \"inprogress\" %}
                <style type=\"text/css\">
                    .pimcore_editable_video_progress {
                        position:relative;
                        background:#555 url( {{ asset.getImageThumbnail({\"width\": 640}) }} ) no-repeat center center;
                        font-family:Arial,Verdana,sans-serif;
                        color:#fff;
                        text-shadow: 0 0 3px #000, 0 0 5px #000, 0 0 1px #000;
                    }
                    .pimcore_editable_video_progress_status {
                        font-size:16px;
                        color:#555;
                        font-family:Arial,Verdana,sans-serif;
                        line-height:66px;
                        background:#fff url(/bundles/pimcoreadmin/img/video-loading.gif) center center no-repeat;
                        width:66px;
                        height:66px;
                        padding:20px;
                        border:1px solid #555;
                        text-align:center;
                        box-shadow: 2px 2px 5px #333;
                        border-radius:20px;
                        top: 137px;
                        left: 267px;
                        position:absolute;
                        opacity: 0.8;
                        text-shadow: none;
                    }
                </style>
                <div class=\"pimcore_editable_video_progress\" style=\"width:640px; height:380px;\">

                    <br />
                    {{ 'video_preview_in_progress'|trans([],'admin') }}
                    <br />
                    {{ 'please_wait'|trans([],'admin') }}

                    <div class=\"pimcore_editable_video_progress_status\"></div>
                </div>


                <script>
                    window.setTimeout(function () {
                        location.reload();
                    }, 5000);
                </script>
            {% elseif not pimcore_video_is_available() %}
                {{ 'preview_not_available'|trans([],'admin') }}
                <br />
                {{ 'php_cli_binary_and_or_ffmpeg_binary_setting_is_missing'|trans([],'admin') }}
            {% else %}
                {{ 'preview_not_available'|trans([],'admin') }}
                <br />
                Error unknown, please check the log files
            {% endif %}
        </td>
    </tr>
</table>


</body>
</html>
", "@PimcoreAdmin/Admin/Asset/getPreviewVideoError.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Asset/getPreviewVideoError.html.twig");
    }
}

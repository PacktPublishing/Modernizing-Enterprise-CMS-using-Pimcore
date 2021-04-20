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

/* templates/default/default.html.twig */
class __TwigTemplate_c4560da796df0d721b8658968254c20511b5749cc3115eb1b44658a808e36808 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templates/default/default.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "templates/default/default.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Example</title>
</head>

<body>

<style type=\"text/css\">
    body {
        padding:0;
        margin: 0;
        font-family: \"Lucida Sans Unicode\", Arial;
        font-size: 14px;
    }

    #site {
        margin: 0 auto;
        width: 600px;
        padding: 30px 0 0 0;
        color:#65615E;
    }

    h1, h2, h3 {
        font-size: 18px;
        padding: 0 0 5px 0;
        border-bottom: 1px solid #001428;
        margin-bottom: 5px;
    }

    h3 {
        font-size: 14px;
        padding: 15px 0 5px 0;
        margin-bottom: 5px;
        border-color: #cccccc;
    }

    img {
        border: 0;
    }

    p {
        padding: 0 0 5px 0;
    }

    a {
        color: #000;
    }

    #logo {
        text-align: center;
        padding: 50px 0;
    }

    #logo hr {
        display: block;
        height: 1px;
        overflow: hidden;
        background: #BBB;
        border: 0;
        padding:0;
        margin:30px 0 20px 0;
    }

    .claim {
        text-transform: uppercase;
        color:#BBB;
    }

    #site ul {
        padding: 10px 0 10px 20px;
        list-style: circle;
    }

    .buttons {
        margin-bottom: 100px;
        text-align: center;
    }

    .buttons a {
        display: inline-block;
        background: #6428b4;
        color:#fff;
        padding: 5px 10px;
        margin-right: 10px;
        width:40%;
        border-radius: 2px;
        text-decoration: none;
    }

    .buttons a:hover {
        background: #1C8BC1;
    }

    .buttons a:last-child {
        margin: 0;
    }

</style>


<div id=\"site\">
    <div id=\"logo\">
        <a href=\"http://www.pimcore.com/\"><img src=\"/bundles/pimcoreadmin/img/logo-claim-gray.svg\" style=\"width: 400px;\" /></a>
        <hr />
    </div>

    ";
        // line 109
        if ((isset($context["editmode"]) || array_key_exists("editmode", $context) ? $context["editmode"] : (function () { throw new RuntimeError('Variable "editmode" does not exist.', 109, $this->source); })())) {
            // line 110
            echo "        <div class=\"buttons\">
            <a target=\"_blank\" href=\"https://pimcore.com/docs/6.x/Development_Documentation/Getting_Started/Installation.html\">Install Sample Data / Boilerplate</a>
            <a target=\"_blank\" href=\"https://pimcore.com/docs/6.x/Development_Documentation/Getting_Started/index.html\">Getting Started</a>
        </div>

        <div class=\"info\">
            <h2>Where can I edit some pages?</h2>
            <p>
                Well, it seems that you're using the professional distribution of pimcore which doesn't include any
                templates / themes or contents, it's designed to start a project from scratch. If you need a jump start
                please consider using our sample data / boilerplate package which includes everything you need to get started.
            </p>
        </div>
    ";
        }
        // line 124
        echo "</div>

</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "templates/default/default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 124,  155 => 110,  153 => 109,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Example</title>
</head>

<body>

<style type=\"text/css\">
    body {
        padding:0;
        margin: 0;
        font-family: \"Lucida Sans Unicode\", Arial;
        font-size: 14px;
    }

    #site {
        margin: 0 auto;
        width: 600px;
        padding: 30px 0 0 0;
        color:#65615E;
    }

    h1, h2, h3 {
        font-size: 18px;
        padding: 0 0 5px 0;
        border-bottom: 1px solid #001428;
        margin-bottom: 5px;
    }

    h3 {
        font-size: 14px;
        padding: 15px 0 5px 0;
        margin-bottom: 5px;
        border-color: #cccccc;
    }

    img {
        border: 0;
    }

    p {
        padding: 0 0 5px 0;
    }

    a {
        color: #000;
    }

    #logo {
        text-align: center;
        padding: 50px 0;
    }

    #logo hr {
        display: block;
        height: 1px;
        overflow: hidden;
        background: #BBB;
        border: 0;
        padding:0;
        margin:30px 0 20px 0;
    }

    .claim {
        text-transform: uppercase;
        color:#BBB;
    }

    #site ul {
        padding: 10px 0 10px 20px;
        list-style: circle;
    }

    .buttons {
        margin-bottom: 100px;
        text-align: center;
    }

    .buttons a {
        display: inline-block;
        background: #6428b4;
        color:#fff;
        padding: 5px 10px;
        margin-right: 10px;
        width:40%;
        border-radius: 2px;
        text-decoration: none;
    }

    .buttons a:hover {
        background: #1C8BC1;
    }

    .buttons a:last-child {
        margin: 0;
    }

</style>


<div id=\"site\">
    <div id=\"logo\">
        <a href=\"http://www.pimcore.com/\"><img src=\"/bundles/pimcoreadmin/img/logo-claim-gray.svg\" style=\"width: 400px;\" /></a>
        <hr />
    </div>

    {% if editmode %}
        <div class=\"buttons\">
            <a target=\"_blank\" href=\"https://pimcore.com/docs/6.x/Development_Documentation/Getting_Started/Installation.html\">Install Sample Data / Boilerplate</a>
            <a target=\"_blank\" href=\"https://pimcore.com/docs/6.x/Development_Documentation/Getting_Started/index.html\">Getting Started</a>
        </div>

        <div class=\"info\">
            <h2>Where can I edit some pages?</h2>
            <p>
                Well, it seems that you're using the professional distribution of pimcore which doesn't include any
                templates / themes or contents, it's designed to start a project from scratch. If you need a jump start
                please consider using our sample data / boilerplate package which includes everything you need to get started.
            </p>
        </div>
    {% endif %}
</div>

</body>
</html>
", "templates/default/default.html.twig", "/var/www/html/templates/templates/default/default.html.twig");
    }
}

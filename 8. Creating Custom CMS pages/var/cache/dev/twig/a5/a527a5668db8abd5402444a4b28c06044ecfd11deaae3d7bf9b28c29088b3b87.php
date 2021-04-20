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

/* @PimcoreCore/Workflow/NotificationEmail/notificationEmail.html.twig */
class __TwigTemplate_679d95e8d5511b9fa0325874313295b27cccc12b0633d76c6fd9f55b4a7943d9 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Workflow/NotificationEmail/notificationEmail.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Workflow/NotificationEmail/notificationEmail.html.twig"));

        // line 8
        echo "
<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
</head>
<body>
";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["translator"]) || array_key_exists("translator", $context) ? $context["translator"] : (function () { throw new RuntimeError('Variable "translator" does not exist.', 15, $this->source); })()), "trans", [0 => "workflow_change_email_notification_text", 1 => [0 => (((isset($context["subjectType"]) || array_key_exists("subjectType", $context) ? $context["subjectType"] : (function () { throw new RuntimeError('Variable "subjectType" does not exist.', 15, $this->source); })()) . " ") . twig_get_attribute($this->env, $this->source, (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 15, $this->source); })()), "getFullPath", [], "method", false, false, false, 15)), 1 => twig_get_attribute($this->env, $this->source, (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 15, $this->source); })()), "getId", [], "method", false, false, false, 15), 2 => twig_get_attribute($this->env, $this->source, (isset($context["translator"]) || array_key_exists("translator", $context) ? $context["translator"] : (function () { throw new RuntimeError('Variable "translator" does not exist.', 15, $this->source); })()), "trans", [0 => (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 15, $this->source); })()), 1 => [], 2 => "admin", 3 => (isset($context["lang"]) || array_key_exists("lang", $context) ? $context["lang"] : (function () { throw new RuntimeError('Variable "lang" does not exist.', 15, $this->source); })())], "method", false, false, false, 15), 3 => twig_get_attribute($this->env, $this->source, (isset($context["translator"]) || array_key_exists("translator", $context) ? $context["translator"] : (function () { throw new RuntimeError('Variable "translator" does not exist.', 15, $this->source); })()), "trans", [0 => twig_get_attribute($this->env, $this->source, (isset($context["workflow"]) || array_key_exists("workflow", $context) ? $context["workflow"] : (function () { throw new RuntimeError('Variable "workflow" does not exist.', 15, $this->source); })()), "getName", [], "method", false, false, false, 15), 1 => [], 2 => "admin", 3 => (isset($context["lang"]) || array_key_exists("lang", $context) ? $context["lang"] : (function () { throw new RuntimeError('Variable "lang" does not exist.', 15, $this->source); })())], "method", false, false, false, 15)], 2 => "admin", 3 => (isset($context["lang"]) || array_key_exists("lang", $context) ? $context["lang"] : (function () { throw new RuntimeError('Variable "lang" does not exist.', 15, $this->source); })())], "method", false, false, false, 15), "html", null, true);
        echo "<br>
";
        // line 16
        if ( !twig_test_empty(twig_trim_filter((isset($context["deeplink"]) || array_key_exists("deeplink", $context) ? $context["deeplink"] : (function () { throw new RuntimeError('Variable "deeplink" does not exist.', 16, $this->source); })())))) {
            // line 17
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["deeplink"]) || array_key_exists("deeplink", $context) ? $context["deeplink"] : (function () { throw new RuntimeError('Variable "deeplink" does not exist.', 17, $this->source); })()), "html", null, true);
            echo "\" target=\"_blank\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["translator"]) || array_key_exists("translator", $context) ? $context["translator"] : (function () { throw new RuntimeError('Variable "translator" does not exist.', 17, $this->source); })()), "trans", [0 => "workflow_change_email_notification_deeplink", 1 => [], 2 => "admin", 3 => (isset($context["lang"]) || array_key_exists("lang", $context) ? $context["lang"] : (function () { throw new RuntimeError('Variable "lang" does not exist.', 17, $this->source); })())], "method", false, false, false, 17), "html", null, true);
            echo "</a><br>
";
        }
        // line 19
        echo "<br>

";
        // line 21
        if ( !twig_test_empty(twig_trim_filter((isset($context["note_description"]) || array_key_exists("note_description", $context) ? $context["note_description"] : (function () { throw new RuntimeError('Variable "note_description" does not exist.', 21, $this->source); })())))) {
            // line 22
            echo "    <strong>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["translator"]) || array_key_exists("translator", $context) ? $context["translator"] : (function () { throw new RuntimeError('Variable "translator" does not exist.', 22, $this->source); })()), "trans", [0 => "workflow_change_email_notification_note", 1 => [], 2 => "admin", 3 => (isset($context["lang"]) || array_key_exists("lang", $context) ? $context["lang"] : (function () { throw new RuntimeError('Variable "lang" does not exist.', 22, $this->source); })())], "method", false, false, false, 22), "html", null, true);
            echo "</strong>
    <p>";
            // line 23
            echo twig_escape_filter($this->env, (isset($context["note_description"]) || array_key_exists("note_description", $context) ? $context["note_description"] : (function () { throw new RuntimeError('Variable "note_description" does not exist.', 23, $this->source); })()), "html", null, true);
            echo "</p>
";
        }
        // line 25
        echo "</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreCore/Workflow/NotificationEmail/notificationEmail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 25,  77 => 23,  72 => 22,  70 => 21,  66 => 19,  58 => 17,  56 => 16,  52 => 15,  43 => 8,);
    }

    public function getSourceContext()
    {
        return new Source("{# @var subjectType string #}
{# @var subject AbstractElement #}
{# @var action string #}
{# @var deeplink string #}
{# @var note_description string #}
{# @var translator \\Symfony\\Contracts\\Translation\\TranslatorInterface #}
{# @var lang string #}

<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
</head>
<body>
{{ translator.trans('workflow_change_email_notification_text', [subjectType ~ ' ' ~ subject.getFullPath(), subject.getId(), translator.trans(action, [], 'admin', lang), translator.trans(workflow.getName(), [], 'admin', lang)], 'admin', lang) }}<br>
{% if deeplink|trim is not empty %}
    <a href=\"{{ deeplink }}\" target=\"_blank\">{{ translator.trans('workflow_change_email_notification_deeplink', [], 'admin', lang) }}</a><br>
{% endif %}
<br>

{% if note_description|trim is not empty %}
    <strong>{{ translator.trans('workflow_change_email_notification_note', [], 'admin', lang) }}</strong>
    <p>{{ note_description }}</p>
{% endif %}
</body>
</html>", "@PimcoreCore/Workflow/NotificationEmail/notificationEmail.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views/Workflow/NotificationEmail/notificationEmail.html.twig");
    }
}

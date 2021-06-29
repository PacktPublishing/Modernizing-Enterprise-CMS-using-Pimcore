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

/* @PimcoreAdmin/Admin/Login/lostpassword.html.twig */
class __TwigTemplate_9718e3ce667d9563279c62b43514239b0938e91b11468eb21630bd6127f02206 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@PimcoreAdmin/Admin/Login/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Login/lostpassword.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/Login/lostpassword.html.twig"));

        $this->parent = $this->loadTemplate("@PimcoreAdmin/Admin/Login/layout.html.twig", "@PimcoreAdmin/Admin/Login/lostpassword.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "
    ";
        // line 5
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 5, $this->source); })()), "request", [], "any", false, false, false, 5), "method", [], "any", false, false, false, 5) == "POST")) {
            // line 6
            echo "        <div class=\"text error\">
            ";
            // line 7
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("A temporary login link has been sent to your email address.", [], "admin"), "html", null, true);
            echo "
            <br/>
            ";
            // line 9
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Please check your mailbox.", [], "admin"), "html", null, true);
            echo "
        </div>
    ";
        } else {
            // line 12
            echo "        <div class=\"text info\">
            ";
            // line 13
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Enter your username and pimcore will send a login link to your email address", [], "admin"), "html", null, true);
            echo "
        </div>

        <form method=\"post\" action=\"";
            // line 16
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_login_lostpassword");
            echo "\">
            <input type=\"text\" name=\"username\" autocomplete=\"username\" placeholder=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("username", [], "admin"), "html", null, true);
            echo "\" required autofocus>
            <input type=\"hidden\" name=\"csrfToken\" value=\"";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["pimcore_csrf"]) || array_key_exists("pimcore_csrf", $context) ? $context["pimcore_csrf"] : (function () { throw new RuntimeError('Variable "pimcore_csrf" does not exist.', 18, $this->source); })()), "getCsrfToken", [], "method", false, false, false, 18), "html", null, true);
            echo "\">

            <button type=\"submit\" name=\"submit\">";
            // line 20
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("submit", [], "admin"), "html", null, true);
            echo "</button>
        </form>
    ";
        }
        // line 23
        echo "
    <a href=\"";
        // line 24
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pimcore_admin_login");
        echo "\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Back to Login", [], "admin"), "html", null, true);
        echo "</a>

    ";
        // line 26
        $this->extensions['Pimcore\Twig\Extension\HelpersExtension']->breachAttackRandomContent();
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/Login/lostpassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 26,  118 => 24,  115 => 23,  109 => 20,  104 => 18,  100 => 17,  96 => 16,  90 => 13,  87 => 12,  81 => 9,  76 => 7,  73 => 6,  71 => 5,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@PimcoreAdmin/Admin/Login/layout.html.twig' %}

{% block content %}

    {% if (app.request.method == 'POST') %}
        <div class=\"text error\">
            {{ 'A temporary login link has been sent to your email address.'|trans([],'admin') }}
            <br/>
            {{ 'Please check your mailbox.'|trans([],'admin') }}
        </div>
    {% else %}
        <div class=\"text info\">
            {{ 'Enter your username and pimcore will send a login link to your email address'|trans([],'admin') }}
        </div>

        <form method=\"post\" action=\"{{ path('pimcore_admin_login_lostpassword') }}\">
            <input type=\"text\" name=\"username\" autocomplete=\"username\" placeholder=\"{{ 'username'|trans([], 'admin') }}\" required autofocus>
            <input type=\"hidden\" name=\"csrfToken\" value=\"{{ pimcore_csrf.getCsrfToken() }}\">

            <button type=\"submit\" name=\"submit\">{{ 'submit'|trans([],'admin') }}</button>
        </form>
    {% endif %}

    <a href=\"{{ path('pimcore_admin_login') }}\">{{ 'Back to Login'|trans([],'admin') }}</a>

    {% do pimcore_breach_attack_random_content() %}
{% endblock %}


", "@PimcoreAdmin/Admin/Login/lostpassword.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/Login/lostpassword.html.twig");
    }
}

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

/* @PimcoreCore/Workflow/statusinfo/toolbarStatusInfo.html.twig */
class __TwigTemplate_26834f7be934a79e989b4e44103b45479033776a9e745e58edb13e6f01d2a845 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Workflow/statusinfo/toolbarStatusInfo.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Workflow/statusinfo/toolbarStatusInfo.html.twig"));

        // line 3
        echo "
<div class=\"pimcore-workflow-place-indicator-wrapper\">
    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["places"]) || array_key_exists("places", $context) ? $context["places"] : (function () { throw new RuntimeError('Variable "places" does not exist.', 5, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["place"]) {
            // line 6
            echo "
        <div class=\"pimcore-workflow-place-indicator\" style=\"background-color: ";
            // line 7
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["place"], "backgroundColor", [], "any", false, false, false, 7), "html", null, true);
            echo "; color:";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["place"], "fontColor", [], "any", false, false, false, 7), "html", null, true);
            echo "; border: 1px solid ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["place"], "borderColor", [], "any", false, false, false, 7), "html", null, true);
            echo ";\"  title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["place"], "title", [], "any", false, false, false, 7), "html", null, true);
            echo "\">
            ";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["translator"]) || array_key_exists("translator", $context) ? $context["translator"] : (function () { throw new RuntimeError('Variable "translator" does not exist.', 8, $this->source); })()), "trans", [0 => twig_get_attribute($this->env, $this->source, $context["place"], "label", [], "any", false, false, false, 8), 1 => [], 2 => "admin"], "method", false, false, false, 8), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['place'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreCore/Workflow/statusinfo/toolbarStatusInfo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 11,  64 => 8,  54 => 7,  51 => 6,  47 => 5,  43 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("{# @var places \\Pimcore\\Workflow\\Place\\PlaceConfig[] #}
{# @var translator \\Symfony\\Contracts\\Translation\\TranslatorInterface #}

<div class=\"pimcore-workflow-place-indicator-wrapper\">
    {% for place in places %}

        <div class=\"pimcore-workflow-place-indicator\" style=\"background-color: {{ place.backgroundColor }}; color:{{ place.fontColor }}; border: 1px solid {{ place.borderColor }};\"  title=\"{{ place.title }}\">
            {{ translator.trans(place.label,[],'admin') }}
        </div>
    {% endfor %}
</div>", "@PimcoreCore/Workflow/statusinfo/toolbarStatusInfo.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views/Workflow/statusinfo/toolbarStatusInfo.html.twig");
    }
}

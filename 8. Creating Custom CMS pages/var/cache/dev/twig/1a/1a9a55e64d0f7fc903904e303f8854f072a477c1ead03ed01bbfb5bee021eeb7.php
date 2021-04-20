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

/* Custom/gallery.html.twig */
class __TwigTemplate_956c7b2eca49a1608824033439a1fec38d04f070befe3a8442a24eaae1d42536 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Custom/gallery.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Custom/gallery.html.twig"));

        // line 1
        echo "The gallery

";
        // line 3
        if ((isset($context["assets"]) || array_key_exists("assets", $context) ? $context["assets"] : (function () { throw new RuntimeError('Variable "assets" does not exist.', 3, $this->source); })())) {
            // line 4
            echo "
\t\t";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["assets"]) || array_key_exists("assets", $context) ? $context["assets"] : (function () { throw new RuntimeError('Variable "assets" does not exist.', 5, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["asset"]) {
                // line 6
                echo "\t\t\t";
                if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["asset"], "\\Pimcore\\Model\\Asset\\Image"])) {
                    echo "\t
                <div style=\"border: 1px solid red; width:200px; padding 10px; margin:10px;\">\t\t\t
                    ";
                    // line 8
                    echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["asset"], "getThumbnail", [0 => "MiniIcons"], "method", false, false, false, 8), "getHTML", [], "method", false, false, false, 8);
                    echo "\t\t\t\t
                </div>
\t\t\t";
                }
                // line 11
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['asset'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 12
            echo "
";
        }
        // line 14
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Custom/gallery.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 14,  74 => 12,  68 => 11,  62 => 8,  56 => 6,  52 => 5,  49 => 4,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("The gallery

{% if assets %}

\t\t{% for asset in assets %}
\t\t\t{% if asset is instanceof('\\\\Pimcore\\\\Model\\\\Asset\\\\Image') %}\t
                <div style=\"border: 1px solid red; width:200px; padding 10px; margin:10px;\">\t\t\t
                    {{ asset.getThumbnail('MiniIcons').getHTML()|raw}}\t\t\t\t
                </div>
\t\t\t{% endif %}
\t\t{% endfor %}

{% endif %}

", "Custom/gallery.html.twig", "/var/www/html/templates/Custom/gallery.html.twig");
    }
}

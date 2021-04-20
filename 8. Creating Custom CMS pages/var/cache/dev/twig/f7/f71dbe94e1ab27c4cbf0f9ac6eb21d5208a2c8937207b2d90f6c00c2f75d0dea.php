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

/* @PimcoreCore/Profiler/targeting_data_collector.html.twig */
class __TwigTemplate_d6206c33908b9418faa4d80e3d8b193a05046377c2f6d970f5a2513116f713cf extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'toolbar' => [$this, 'block_toolbar'],
            'menu' => [$this, 'block_menu'],
            'panel' => [$this, 'block_panel'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Profiler/targeting_data_collector.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Profiler/targeting_data_collector.html.twig"));

        $this->parent = $this->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig", "@PimcoreCore/Profiler/targeting_data_collector.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 4, $this->source); })()), "hasData", [], "any", false, false, false, 4)) {
            // line 5
            echo "        ";
            ob_start();
            // line 6
            echo "            ";
            echo twig_include($this->env, $context, "@PimcoreCore/Profiler/target.svg.twig");
            echo "

            ";
            // line 8
            if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 8, $this->source); })()), "documentTargetGroup", [], "any", false, false, false, 8))) {
                // line 9
                echo "                <span class=\"sf-toolbar-value\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 9, $this->source); })()), "documentTargetGroup", [], "any", false, false, false, 9), "name", [], "any", false, false, false, 9), "html", null, true);
                echo "</span>
            ";
            }
            // line 11
            echo "        ";
            $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 12
            echo "
        ";
            // line 13
            ob_start();
            // line 14
            echo "            <div class=\"sf-toolbar-info-group\">
                ";
            // line 15
            if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 15, $this->source); })()), "documentTargetGroup", [], "any", false, false, false, 15))) {
                // line 16
                echo "                    <div class=\"sf-toolbar-info-piece\">
                        <b>Document Target Group</b>
                        <span>";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 18, $this->source); })()), "documentTargetGroup", [], "any", false, false, false, 18), "name", [], "any", false, false, false, 18), "html", null, true);
                echo "</span>
                    </div>
                ";
            }
            // line 21
            echo "
                <div class=\"sf-toolbar-info-piece\">
                    <b>Matched Rules</b>
                    <span class=\"sf-toolbar-status\">";
            // line 24
            echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 24, $this->source); })()), "rules", [], "any", false, false, false, 24)), "html", null, true);
            echo "</span>
                </div>

                ";
            // line 27
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 27, $this->source); })()), "targetGroups", [], "any", false, false, false, 27))) {
                // line 28
                echo "                    <div class=\"sf-toolbar-info-piece\">
                        <h5 style=\"display: table-caption; margin-bottom: 5px; font-size: 13px\">Target Groups</h5>
                    </div>

                    ";
                // line 32
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 32, $this->source); })()), "targetGroups", [], "any", false, false, false, 32));
                foreach ($context['_seq'] as $context["_key"] => $context["targetGroup"]) {
                    // line 33
                    echo "                        <div class=\"sf-toolbar-info-piece\">
                            <b>";
                    // line 34
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["targetGroup"], "name", [], "any", false, false, false, 34), "html", null, true);
                    echo "</b>
                            <span class=\"sf-toolbar-status\">";
                    // line 35
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["targetGroup"], "count", [], "any", false, false, false, 35), "html", null, true);
                    echo "</span>
                        </div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['targetGroup'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "                ";
            } else {
                // line 39
                echo "                    <div class=\"sf-toolbar-info-piece\">
                        <b>Target Groups</b>
                        <span class=\"sf-toolbar-status\">0</span>
                    </div>
                ";
            }
            // line 44
            echo "            </div>
        ";
            $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 46
            echo "
        ";
            // line 47
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", ["link" => true]);
            echo "
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 51
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 52
        echo "    <span class=\"label ";
        echo (( !twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 52, $this->source); })()), "hasData", [], "any", false, false, false, 52)) ? ("disabled") : (""));
        echo "\">
        <span class=\"icon\">
            ";
        // line 54
        echo twig_include($this->env, $context, "@PimcoreCore/Profiler/target.svg.twig");
        echo "
        </span>
        <strong>Targeting</strong>
    </span>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 60
    public function block_panel($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 61
        echo "    <h2>Targeting</h2>

    ";
        // line 63
        if ( !twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 63, $this->source); })()), "hasData", [], "any", false, false, false, 63)) {
            // line 64
            echo "        <div class=\"empty\">
            <p>No targeting data available.</p>
        </div>
    ";
        } else {
            // line 68
            echo "
        <div class=\"metrics\" style=\"margin-bottom: 25px\">
            ";
            // line 70
            if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 70, $this->source); })()), "documentTargetGroup", [], "any", false, false, false, 70))) {
                // line 71
                echo "                <div class=\"metric\">
                    <span class=\"value\">";
                // line 72
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 72, $this->source); })()), "documentTargetGroup", [], "any", false, false, false, 72), "name", [], "any", false, false, false, 72), "html", null, true);
                echo "</span>
                    <span class=\"label\">Document Target Group</span>
                </div>
            ";
            }
            // line 76
            echo "
            <div class=\"metric\">
                <span class=\"value\">";
            // line 78
            echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 78, $this->source); })()), "rules", [], "any", false, false, false, 78)), "html", null, true);
            echo "</span>
                <span class=\"label\">Matched Rules</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">";
            // line 83
            echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 83, $this->source); })()), "targetGroups", [], "any", false, false, false, 83)), "html", null, true);
            echo "</span>
                <span class=\"label\">Assigned Target Groups</span>
            </div>
        </div>

        <div class=\"sf-tabs\">
            <div class=\"tab\">
                <h3 class=\"tab-title\">Results</h3>

                <div class=\"tab-content\">
                    <h3>Matched Targeting Rules</h3>

                    <table class=\"";
            // line 95
            echo twig_escape_filter($this->env, ((array_key_exists("class", $context)) ? (_twig_default_filter((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 95, $this->source); })()), "")) : ("")), "html", null, true);
            echo "\">
                        <thead>
                        <tr>
                            <th scope=\"col\" class=\"key\">ID</th>
                            <th scope=\"col\">Name</th>
                            <th scope=\"col\">Duration</th>
                            <th scope=\"col\">Conditions</th>
                            <th scope=\"col\">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
            // line 106
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 106, $this->source); })()), "rules", [], "any", false, false, false, 106));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["rule"]) {
                // line 107
                echo "                            <tr>
                                <th>";
                // line 108
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rule"], "id", [], "any", false, false, false, 108), "html", null, true);
                echo "</th>
                                <td>";
                // line 109
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rule"], "name", [], "any", false, false, false, 109), "html", null, true);
                echo "</td>
                                <td>";
                // line 110
                echo twig_escape_filter($this->env, twig_round(twig_get_attribute($this->env, $this->source, $context["rule"], "duration", [], "any", false, false, false, 110), 2), "html", null, true);
                echo " ms</td>
                                <td>";
                // line 111
                echo $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, twig_get_attribute($this->env, $this->source, $context["rule"], "conditions", [], "any", false, false, false, 111), ((array_key_exists("maxDepth", $context)) ? (_twig_default_filter((isset($context["maxDepth"]) || array_key_exists("maxDepth", $context) ? $context["maxDepth"] : (function () { throw new RuntimeError('Variable "maxDepth" does not exist.', 111, $this->source); })()), 0)) : (0)));
                echo "</td>
                                <td>";
                // line 112
                echo $this->extensions['Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension']->dumpData($this->env, twig_get_attribute($this->env, $this->source, $context["rule"], "actions", [], "any", false, false, false, 112), ((array_key_exists("maxDepth", $context)) ? (_twig_default_filter((isset($context["maxDepth"]) || array_key_exists("maxDepth", $context) ? $context["maxDepth"] : (function () { throw new RuntimeError('Variable "maxDepth" does not exist.', 112, $this->source); })()), 0)) : (0)));
                echo "</td>
                            </tr>
                        ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 115
                echo "                            <tr>
                                <td colspan=\"2\">(no rules matched)</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rule'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 119
            echo "                        </tbody>
                    </table>

                    <h3>Assigned Target Groups</h3>

                    <table class=\"";
            // line 124
            echo twig_escape_filter($this->env, ((array_key_exists("class", $context)) ? (_twig_default_filter((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 124, $this->source); })()), "")) : ("")), "html", null, true);
            echo "\">
                        <thead>
                        <tr>
                            <th scope=\"col\" class=\"key\">ID</th>
                            <th scope=\"col\">Name</th>
                            <th scope=\"col\">Threshold</th>
                            <th scope=\"col\">Assignment Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
            // line 134
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 134, $this->source); })()), "targetGroups", [], "any", false, false, false, 134));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["targetGroup"]) {
                // line 135
                echo "                            <tr>
                                <th>";
                // line 136
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["targetGroup"], "id", [], "any", false, false, false, 136), "html", null, true);
                echo "</th>
                                <td>";
                // line 137
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["targetGroup"], "name", [], "any", false, false, false, 137), "html", null, true);
                echo "</td>
                                <td>";
                // line 138
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["targetGroup"], "threshold", [], "any", false, false, false, 138), "html", null, true);
                echo "</td>
                                <td>";
                // line 139
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["targetGroup"], "count", [], "any", false, false, false, 139), "html", null, true);
                echo "</td>
                            </tr>
                        ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 142
                echo "                            <tr>
                                <td colspan=\"2\">(no target group assignments)</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['targetGroup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            echo "                        </tbody>
                    </table>

                    <h3>Target Groups assigned to Documents</h3>

                    <table class=\"";
            // line 151
            echo twig_escape_filter($this->env, ((array_key_exists("class", $context)) ? (_twig_default_filter((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 151, $this->source); })()), "")) : ("")), "html", null, true);
            echo "\">
                        <thead>
                        <tr>
                            <th scope=\"col\">Document ID</th>
                            <th scope=\"col\">Path</th>
                            <th scope=\"col\">Target Group ID</th>
                            <th scope=\"col\">Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
            // line 161
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 161, $this->source); })()), "documentTargetGroups", [], "any", false, false, false, 161));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["assignment"]) {
                // line 162
                echo "                            <tr>
                                <th>";
                // line 163
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["assignment"], "document", [], "any", false, false, false, 163), "id", [], "any", false, false, false, 163), "html", null, true);
                echo "</th>
                                <td>";
                // line 164
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["assignment"], "document", [], "any", false, false, false, 164), "path", [], "any", false, false, false, 164), "html", null, true);
                echo "</td>
                                <th>";
                // line 165
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["assignment"], "targetGroup", [], "any", false, false, false, 165), "id", [], "any", false, false, false, 165), "html", null, true);
                echo "</th>
                                <td>";
                // line 166
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["assignment"], "targetGroup", [], "any", false, false, false, 166), "name", [], "any", false, false, false, 166), "html", null, true);
                echo "</td>
                            </tr>
                        ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 169
                echo "                            <tr>
                                <td colspan=\"2\">(no target groups were assigned to documents)</td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assignment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            echo "                        </tbody>
                    </table>
                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Visitor Info</h3>

                <div class=\"tab-content\">
                    <h3>Visitor Info</h3>

                    ";
            // line 184
            echo twig_include($this->env, $context, "@PimcoreCore/Profiler/key_value_table.html.twig", ["data" => twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 184, $this->source); })()), "visitorInfo", [], "any", false, false, false, 184)], false);
            echo "
                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Storage</h3>

                <div class=\"tab-content\">
                    <h3>Session Storage</h3>

                    ";
            // line 194
            echo twig_include($this->env, $context, "@PimcoreCore/Profiler/key_value_table.html.twig", ["data" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 194, $this->source); })()), "storage", [], "any", false, false, false, 194), "session", [], "any", false, false, false, 194)], false);
            echo "
                </div>

                <div class=\"tab-content\">
                    <h3>Visitor Storage</h3>

                    ";
            // line 200
            echo twig_include($this->env, $context, "@PimcoreCore/Profiler/key_value_table.html.twig", ["data" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 200, $this->source); })()), "storage", [], "any", false, false, false, 200), "visitor", [], "any", false, false, false, 200)], false);
            echo "
                </div>
            </div>
        </div>

    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreCore/Profiler/targeting_data_collector.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  482 => 200,  473 => 194,  460 => 184,  447 => 173,  438 => 169,  430 => 166,  426 => 165,  422 => 164,  418 => 163,  415 => 162,  410 => 161,  397 => 151,  390 => 146,  381 => 142,  373 => 139,  369 => 138,  365 => 137,  361 => 136,  358 => 135,  353 => 134,  340 => 124,  333 => 119,  324 => 115,  316 => 112,  312 => 111,  308 => 110,  304 => 109,  300 => 108,  297 => 107,  292 => 106,  278 => 95,  263 => 83,  255 => 78,  251 => 76,  244 => 72,  241 => 71,  239 => 70,  235 => 68,  229 => 64,  227 => 63,  223 => 61,  213 => 60,  198 => 54,  192 => 52,  182 => 51,  169 => 47,  166 => 46,  162 => 44,  155 => 39,  152 => 38,  143 => 35,  139 => 34,  136 => 33,  132 => 32,  126 => 28,  124 => 27,  118 => 24,  113 => 21,  107 => 18,  103 => 16,  101 => 15,  98 => 14,  96 => 13,  93 => 12,  90 => 11,  84 => 9,  82 => 8,  76 => 6,  73 => 5,  70 => 4,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'WebProfilerBundle:Profiler:layout.html.twig' %}

{% block toolbar %}
    {% if collector.hasData %}
        {% set icon %}
            {{ include(\"@PimcoreCore/Profiler/target.svg.twig\") }}

            {% if collector.documentTargetGroup is not null %}
                <span class=\"sf-toolbar-value\">{{ collector.documentTargetGroup.name }}</span>
            {% endif %}
        {% endset %}

        {% set text %}
            <div class=\"sf-toolbar-info-group\">
                {% if collector.documentTargetGroup is not null %}
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Document Target Group</b>
                        <span>{{ collector.documentTargetGroup.name }}</span>
                    </div>
                {% endif %}

                <div class=\"sf-toolbar-info-piece\">
                    <b>Matched Rules</b>
                    <span class=\"sf-toolbar-status\">{{ collector.rules|length }}</span>
                </div>

                {% if collector.targetGroups is not empty %}
                    <div class=\"sf-toolbar-info-piece\">
                        <h5 style=\"display: table-caption; margin-bottom: 5px; font-size: 13px\">Target Groups</h5>
                    </div>

                    {% for targetGroup in collector.targetGroups %}
                        <div class=\"sf-toolbar-info-piece\">
                            <b>{{ targetGroup.name }}</b>
                            <span class=\"sf-toolbar-status\">{{ targetGroup.count }}</span>
                        </div>
                    {% endfor %}
                {% else %}
                    <div class=\"sf-toolbar-info-piece\">
                        <b>Target Groups</b>
                        <span class=\"sf-toolbar-status\">0</span>
                    </div>
                {% endif %}
            </div>
        {% endset %}

        {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: true }) }}
    {% endif %}
{% endblock %}

{% block menu %}
    <span class=\"label {{ (not collector.hasData) ? 'disabled' }}\">
        <span class=\"icon\">
            {{ include(\"@PimcoreCore/Profiler/target.svg.twig\") }}
        </span>
        <strong>Targeting</strong>
    </span>
{% endblock %}

{% block panel %}
    <h2>Targeting</h2>

    {% if not collector.hasData %}
        <div class=\"empty\">
            <p>No targeting data available.</p>
        </div>
    {% else %}

        <div class=\"metrics\" style=\"margin-bottom: 25px\">
            {% if collector.documentTargetGroup is not null %}
                <div class=\"metric\">
                    <span class=\"value\">{{ collector.documentTargetGroup.name }}</span>
                    <span class=\"label\">Document Target Group</span>
                </div>
            {% endif %}

            <div class=\"metric\">
                <span class=\"value\">{{ collector.rules|length }}</span>
                <span class=\"label\">Matched Rules</span>
            </div>

            <div class=\"metric\">
                <span class=\"value\">{{ collector.targetGroups|length }}</span>
                <span class=\"label\">Assigned Target Groups</span>
            </div>
        </div>

        <div class=\"sf-tabs\">
            <div class=\"tab\">
                <h3 class=\"tab-title\">Results</h3>

                <div class=\"tab-content\">
                    <h3>Matched Targeting Rules</h3>

                    <table class=\"{{ class|default('') }}\">
                        <thead>
                        <tr>
                            <th scope=\"col\" class=\"key\">ID</th>
                            <th scope=\"col\">Name</th>
                            <th scope=\"col\">Duration</th>
                            <th scope=\"col\">Conditions</th>
                            <th scope=\"col\">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        {% for rule in collector.rules %}
                            <tr>
                                <th>{{ rule.id }}</th>
                                <td>{{ rule.name }}</td>
                                <td>{{ rule.duration|round(2) }} ms</td>
                                <td>{{ profiler_dump(rule.conditions, maxDepth=maxDepth|default(0)) }}</td>
                                <td>{{ profiler_dump(rule.actions, maxDepth=maxDepth|default(0)) }}</td>
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan=\"2\">(no rules matched)</td>
                            </tr>
                        {% endfor %}
                        </tbody>
                    </table>

                    <h3>Assigned Target Groups</h3>

                    <table class=\"{{ class|default('') }}\">
                        <thead>
                        <tr>
                            <th scope=\"col\" class=\"key\">ID</th>
                            <th scope=\"col\">Name</th>
                            <th scope=\"col\">Threshold</th>
                            <th scope=\"col\">Assignment Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        {% for targetGroup in collector.targetGroups %}
                            <tr>
                                <th>{{ targetGroup.id }}</th>
                                <td>{{ targetGroup.name }}</td>
                                <td>{{ targetGroup.threshold }}</td>
                                <td>{{ targetGroup.count }}</td>
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan=\"2\">(no target group assignments)</td>
                            </tr>
                        {% endfor %}
                        </tbody>
                    </table>

                    <h3>Target Groups assigned to Documents</h3>

                    <table class=\"{{ class|default('') }}\">
                        <thead>
                        <tr>
                            <th scope=\"col\">Document ID</th>
                            <th scope=\"col\">Path</th>
                            <th scope=\"col\">Target Group ID</th>
                            <th scope=\"col\">Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        {% for assignment in collector.documentTargetGroups %}
                            <tr>
                                <th>{{ assignment.document.id }}</th>
                                <td>{{ assignment.document.path }}</td>
                                <th>{{ assignment.targetGroup.id }}</th>
                                <td>{{ assignment.targetGroup.name }}</td>
                            </tr>
                        {% else %}
                            <tr>
                                <td colspan=\"2\">(no target groups were assigned to documents)</td>
                            </tr>
                        {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Visitor Info</h3>

                <div class=\"tab-content\">
                    <h3>Visitor Info</h3>

                    {{ include('@PimcoreCore/Profiler/key_value_table.html.twig', { data: collector.visitorInfo }, with_context = false) }}
                </div>
            </div>

            <div class=\"tab\">
                <h3 class=\"tab-title\">Storage</h3>

                <div class=\"tab-content\">
                    <h3>Session Storage</h3>

                    {{ include('@PimcoreCore/Profiler/key_value_table.html.twig', { data: collector.storage.session }, with_context = false) }}
                </div>

                <div class=\"tab-content\">
                    <h3>Visitor Storage</h3>

                    {{ include('@PimcoreCore/Profiler/key_value_table.html.twig', { data: collector.storage.visitor }, with_context = false) }}
                </div>
            </div>
        </div>

    {% endif %}
{% endblock %}
", "@PimcoreCore/Profiler/targeting_data_collector.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views/Profiler/targeting_data_collector.html.twig");
    }
}

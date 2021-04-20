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

/* @PimcoreAdmin/Admin/DataObject/DataObject/previewVersion.html.twig */
class __TwigTemplate_f536969c831c0aa832d5b4eb9f62b8977d3beb877ff0aec129b94f36fc3c17f5 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/DataObject/DataObject/previewVersion.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/Admin/DataObject/DataObject/previewVersion.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/pimcoreadmin/css/object_versions.css\"/>
</head>

<body>


";
        // line 11
        $context["fields"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 11, $this->source); })()), "getClass", [], "method", false, false, false, 11), "getFieldDefinitions", [], "method", false, false, false, 11);
        // line 12
        echo "
<table class=\"preview\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
    <tr>
        <th>Name</th>
        <th>Key</th>
        <th>Value</th>
    </tr>
    <tr class=\"system\">
        <td>Date</td>
        <td>o_modificationDate</td>
        <td>";
        // line 22
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 22, $this->source); })()), "getModificationDate", [], "method", false, false, false, 22), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
    </tr>
    <tr class=\"system\">
        <td>Path</td>
        <td>o_path</td>
        <td>";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 27, $this->source); })()), "getRealFullPath", [], "method", false, false, false, 27), "html", null, true);
        echo "</td>
    </tr>
    <tr class=\"system\">
        <td>Published</td>
        <td>o_published</td>
        <td>";
        // line 32
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 32, $this->source); })()), "getPublished", [], "method", false, false, false, 32)) ? ("true") : ("false"));
        echo "</td>
    </tr>
    ";
        // line 34
        if ((isset($context["versionNote"]) || array_key_exists("versionNote", $context) ? $context["versionNote"] : (function () { throw new RuntimeError('Variable "versionNote" does not exist.', 34, $this->source); })())) {
            // line 35
            echo "        <tr class=\"system\">
            <td>Version Note</td>
            <td>&nbsp;</td>
            <td>";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["versionNote"]) || array_key_exists("versionNote", $context) ? $context["versionNote"] : (function () { throw new RuntimeError('Variable "versionNote" does not exist.', 38, $this->source); })()), "html", null, true);
            echo "</td>
        </tr>
    ";
        }
        // line 41
        echo "
    <tr class=\"\">
        <td colspan=\"3\">&nbsp;</td>
    </tr>
    ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["fields"]) || array_key_exists("fields", $context) ? $context["fields"] : (function () { throw new RuntimeError('Variable "fields" does not exist.', 45, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["fieldName"] => $context["definition"]) {
            // line 46
            echo "        ";
            if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["definition"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Localizedfields"])) {
                // line 47
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["validLanguages"]) || array_key_exists("validLanguages", $context) ? $context["validLanguages"] : (function () { throw new RuntimeError('Variable "validLanguages" does not exist.', 47, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                    // line 48
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["definition"], "getFieldDefinitions", [], "method", false, false, false, 48));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["lfd"]) {
                        // line 49
                        echo "                    <tr ";
                        if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 49) % 2 != 0)) {
                            echo "class=\"odd\"";
                        }
                        echo ">
                        <td>";
                        // line 50
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["lfd"], "getTitle", [], "method", false, false, false, 50), [], "admin"), "html", null, true);
                        echo " (";
                        echo twig_escape_filter($this->env, $context["language"], "html", null, true);
                        echo ")</td>
                        <td>";
                        // line 51
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lfd"], "getName", [], "method", false, false, false, 51), "html", null, true);
                        echo "</td>
                        <td>
                                ";
                        // line 53
                        if (twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 53, $this->source); })()), "getValueForFieldName", [0 => $context["fieldName"]], "method", false, false, false, 53)) {
                            // line 54
                            echo "                                    ";
                            echo twig_get_attribute($this->env, $this->source, $context["lfd"], "getVersionPreview", [0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 54, $this->source); })()), "getValueForFieldName", [0 => $context["fieldName"]], "method", false, false, false, 54), "getLocalizedValue", [0 => twig_get_attribute($this->env, $this->source, $context["lfd"], "getName", [], "method", false, false, false, 54), 1 => $context["language"]], "method", false, false, false, 54)], "method", false, false, false, 54);
                            echo "
                                ";
                        }
                        // line 56
                        echo "                        </td>
                    </tr>
                ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lfd'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 59
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                echo "        ";
            } elseif (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["definition"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Objectbricks"])) {
                // line 61
                echo "            ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["definition"], "getAllowedTypes", [], "method", false, false, false, 61));
                foreach ($context['_seq'] as $context["_key"] => $context["asAllowedType"]) {
                    // line 62
                    echo "                ";
                    $context["collectionDef"] = Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($context["asAllowedType"]);
                    // line 63
                    echo "
                ";
                    // line 64
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collectionDef"]) || array_key_exists("collectionDef", $context) ? $context["collectionDef"] : (function () { throw new RuntimeError('Variable "collectionDef" does not exist.', 64, $this->source); })()), "getFieldDefinitions", [], "method", false, false, false, 64));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["lfd"]) {
                        // line 65
                        echo "                    ";
                        $context["value"] = null;
                        // line 66
                        echo "
                    ";
                        // line 67
                        $context["fieldGetter"] = ("get" . twig_capitalize_string_filter($this->env, $context["fieldName"]));
                        // line 68
                        echo "                    ";
                        $context["brick"] = twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 68, $this->source); })()), (isset($context["fieldGetter"]) || array_key_exists("fieldGetter", $context) ? $context["fieldGetter"] : (function () { throw new RuntimeError('Variable "fieldGetter" does not exist.', 68, $this->source); })()), [], "any", false, false, false, 68);
                        // line 69
                        echo "
                    ";
                        // line 70
                        if ( !twig_test_empty((isset($context["brick"]) || array_key_exists("brick", $context) ? $context["brick"] : (function () { throw new RuntimeError('Variable "brick" does not exist.', 70, $this->source); })()))) {
                            // line 71
                            echo "                        ";
                            $context["allowedMethod"] = ("get" . $context["asAllowedType"]);
                            // line 72
                            echo "                        ";
                            $context["brickValue"] = twig_get_attribute($this->env, $this->source, (isset($context["brick"]) || array_key_exists("brick", $context) ? $context["brick"] : (function () { throw new RuntimeError('Variable "brick" does not exist.', 72, $this->source); })()), (isset($context["allowedMethod"]) || array_key_exists("allowedMethod", $context) ? $context["allowedMethod"] : (function () { throw new RuntimeError('Variable "allowedMethod" does not exist.', 72, $this->source); })()), [], "any", false, false, false, 72);
                            // line 73
                            echo "
                        ";
                            // line 74
                            if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["lfd"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Localizedfields"])) {
                                // line 75
                                echo "                            ";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable((isset($context["validLanguages"]) || array_key_exists("validLanguages", $context) ? $context["validLanguages"] : (function () { throw new RuntimeError('Variable "validLanguages" does not exist.', 75, $this->source); })()));
                                foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                                    // line 76
                                    echo "                                ";
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["lfd"], "getFieldDefinitions", [], "method", false, false, false, 76));
                                    $context['loop'] = [
                                      'parent' => $context['_parent'],
                                      'index0' => 0,
                                      'index'  => 1,
                                      'first'  => true,
                                    ];
                                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                                        $length = count($context['_seq']);
                                        $context['loop']['revindex0'] = $length - 1;
                                        $context['loop']['revindex'] = $length;
                                        $context['loop']['length'] = $length;
                                        $context['loop']['last'] = 1 === $length;
                                    }
                                    foreach ($context['_seq'] as $context["_key"] => $context["localizedFieldDefinition"]) {
                                        // line 77
                                        echo "                                    <tr ";
                                        if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 77) % 2 != 0)) {
                                            echo "class=\"odd\"";
                                        }
                                        echo ">
                                        <td>";
                                        // line 78
                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getTitle", [], "method", false, false, false, 78), [], "admin"), "html", null, true);
                                        echo " (";
                                        echo twig_escape_filter($this->env, $context["language"], "html", null, true);
                                        echo ")</td>
                                        <td>";
                                        // line 79
                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getName", [], "method", false, false, false, 79), "html", null, true);
                                        echo "</td>
                                        <td>
                                            ";
                                        // line 81
                                        if ((isset($context["brickValue"]) || array_key_exists("brickValue", $context) ? $context["brickValue"] : (function () { throw new RuntimeError('Variable "brickValue" does not exist.', 81, $this->source); })())) {
                                            // line 82
                                            echo "                                                ";
                                            $context["localizedBrickValues"] = twig_get_attribute($this->env, $this->source, (isset($context["brickValue"]) || array_key_exists("brickValue", $context) ? $context["brickValue"] : (function () { throw new RuntimeError('Variable "brickValue" does not exist.', 82, $this->source); })()), "getLocalizedFields", [], "method", false, false, false, 82);
                                            // line 83
                                            echo "                                                ";
                                            $context["localizedBrickValue"] = twig_get_attribute($this->env, $this->source, (isset($context["localizedBrickValues"]) || array_key_exists("localizedBrickValues", $context) ? $context["localizedBrickValues"] : (function () { throw new RuntimeError('Variable "localizedBrickValues" does not exist.', 83, $this->source); })()), "getLocalizedValue", [0 => twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getName", [], "method", false, false, false, 83), 1 => $context["language"]], "method", false, false, false, 83);
                                            // line 84
                                            echo "                                                ";
                                            echo twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getVersionPreview", [0 => (isset($context["localizedBrickValue"]) || array_key_exists("localizedBrickValue", $context) ? $context["localizedBrickValue"] : (function () { throw new RuntimeError('Variable "localizedBrickValue" does not exist.', 84, $this->source); })())], "method", false, false, false, 84);
                                            echo "
                                            ";
                                        }
                                        // line 86
                                        echo "                                        </td>
                                    </tr>
                                ";
                                        ++$context['loop']['index0'];
                                        ++$context['loop']['index'];
                                        $context['loop']['first'] = false;
                                        if (isset($context['loop']['length'])) {
                                            --$context['loop']['revindex0'];
                                            --$context['loop']['revindex'];
                                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                                        }
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['localizedFieldDefinition'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 89
                                    echo "                            ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 90
                                echo "                        ";
                            } else {
                                // line 91
                                echo "                            ";
                                if ((isset($context["brickValue"]) || array_key_exists("brickValue", $context) ? $context["brickValue"] : (function () { throw new RuntimeError('Variable "brickValue" does not exist.', 91, $this->source); })())) {
                                    // line 92
                                    echo "                                ";
                                    $context["value"] = twig_get_attribute($this->env, $this->source, $context["lfd"], "getVersionPreview", [0 => twig_get_attribute($this->env, $this->source, (isset($context["brickValue"]) || array_key_exists("brickValue", $context) ? $context["brickValue"] : (function () { throw new RuntimeError('Variable "brickValue" does not exist.', 92, $this->source); })()), "getValueForFieldName", [0 => twig_get_attribute($this->env, $this->source, $context["lfd"], "getName", [], "method", false, false, false, 92)], "method", false, false, false, 92)], "method", false, false, false, 92);
                                    // line 93
                                    echo "                            ";
                                }
                                // line 94
                                echo "                            <tr ";
                                if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 94) % 2 != 0)) {
                                    echo "class=\"odd\"";
                                }
                                echo ">
                                <td>";
                                // line 95
                                echo twig_escape_filter($this->env, ((twig_capitalize_string_filter($this->env, $context["asAllowedType"]) . " - ") . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["lfd"], "getTitle", [], "method", false, false, false, 95), [], "admin")), "html", null, true);
                                echo "</td>
                                <td>";
                                // line 96
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lfd"], "getName", [], "method", false, false, false, 96), "html", null, true);
                                echo "</td>
                                <td>";
                                // line 97
                                echo (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 97, $this->source); })());
                                echo "</td>
                            </tr>
                        ";
                            }
                            // line 100
                            echo "                    ";
                        }
                        // line 101
                        echo "
                ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lfd'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 103
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['asAllowedType'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 104
                echo "        ";
            } elseif (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["definition"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Classificationstore"])) {
                // line 105
                echo "            ";
                $context["storedata"] = twig_get_attribute($this->env, $this->source, $context["definition"], "getVersionPreview", [0 => twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 105, $this->source); })()), "getValueForFieldName", [0 => $context["fieldName"]], "method", false, false, false, 105)], "method", false, false, false, 105);
                // line 106
                echo "
            ";
                // line 107
                $context["existingGroups"] = [];
                // line 108
                echo "            ";
                $context["activeGroups"] = [];
                // line 109
                echo "
            ";
                // line 110
                if ((isset($context["storedata"]) || array_key_exists("storedata", $context) ? $context["storedata"] : (function () { throw new RuntimeError('Variable "storedata" does not exist.', 110, $this->source); })())) {
                    // line 111
                    echo "                ";
                    $context["activeGroups"] = twig_get_attribute($this->env, $this->source, (isset($context["storedata"]) || array_key_exists("storedata", $context) ? $context["storedata"] : (function () { throw new RuntimeError('Variable "storedata" does not exist.', 111, $this->source); })()), "getActiveGroups", [], "method", false, false, false, 111);
                    // line 112
                    echo "            ";
                }
                // line 113
                echo "
            ";
                // line 114
                if ( !twig_test_empty((isset($context["existingGroups"]) || array_key_exists("existingGroups", $context) ? $context["existingGroups"] : (function () { throw new RuntimeError('Variable "existingGroups" does not exist.', 114, $this->source); })()))) {
                    // line 115
                    echo "                ";
                    $context["languages"] = [0 => "default"];
                    // line 116
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["definition"], "isLocalized", [], "method", false, false, false, 116)) {
                        // line 117
                        echo "                    ";
                        $context["languages"] = twig_array_merge((isset($context["validLanguages"]) || array_key_exists("validLanguages", $context) ? $context["validLanguages"] : (function () { throw new RuntimeError('Variable "validLanguages" does not exist.', 117, $this->source); })()), (isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 117, $this->source); })()));
                        // line 118
                        echo "                ";
                    }
                    // line 119
                    echo "
                ";
                    // line 120
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["existingGroups"]) || array_key_exists("existingGroups", $context) ? $context["existingGroups"] : (function () { throw new RuntimeError('Variable "existingGroups" does not exist.', 120, $this->source); })()));
                    foreach ($context['_seq'] as $context["activeGroupId"] => $context["enabled"]) {
                        // line 121
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["activeGroups"]) || array_key_exists("activeGroups", $context) ? $context["activeGroups"] : (function () { throw new RuntimeError('Variable "activeGroups" does not exist.', 121, $this->source); })()), $context["activeGroupId"], [], "array", false, false, false, 121))) {
                            // line 122
                            echo "                        continue;
                    ";
                        }
                        // line 124
                        echo "
                    ";
                        // line 125
                        $context["groupDefinition"] = Pimcore\Model\DataObject\Classificationstore\GroupConfig::getById($context["activeGroupId"]);
                        // line 126
                        echo "                    ";
                        if ( !twig_test_empty((isset($context["groupDefinition"]) || array_key_exists("groupDefinition", $context) ? $context["groupDefinition"] : (function () { throw new RuntimeError('Variable "groupDefinition" does not exist.', 126, $this->source); })()))) {
                            // line 127
                            echo "                        ";
                            $context["keyGroupRelations"] = twig_get_attribute($this->env, $this->source, (isset($context["groupDefinition"]) || array_key_exists("groupDefinition", $context) ? $context["groupDefinition"] : (function () { throw new RuntimeError('Variable "groupDefinition" does not exist.', 127, $this->source); })()), "getRelations", [], "method", false, false, false, 127);
                            // line 128
                            echo "
                        ";
                            // line 129
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable((isset($context["keyGroupRelations"]) || array_key_exists("keyGroupRelations", $context) ? $context["keyGroupRelations"] : (function () { throw new RuntimeError('Variable "keyGroupRelations" does not exist.', 129, $this->source); })()));
                            foreach ($context['_seq'] as $context["_key"] => $context["keyGroupRelation"]) {
                                // line 130
                                echo "                            ";
                                $context["keyDef"] = $this->extensions['Pimcore\Twig\Extension\PimcoreObjectExtension']->getFieldDefinitionFromJson(twig_get_attribute($this->env, $this->source, $context["keyGroupRelation"], "getDefinition", [], "method", false, false, false, 130), twig_get_attribute($this->env, $this->source, $context["keyGroupRelation"], "getType", [], "method", false, false, false, 130));
                                // line 131
                                echo "
                            ";
                                // line 132
                                if ( !twig_test_empty((isset($context["keyDef"]) || array_key_exists("keyDef", $context) ? $context["keyDef"] : (function () { throw new RuntimeError('Variable "keyDef" does not exist.', 132, $this->source); })()))) {
                                    // line 133
                                    echo "                                ";
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 133, $this->source); })()));
                                    $context['loop'] = [
                                      'parent' => $context['_parent'],
                                      'index0' => 0,
                                      'index'  => 1,
                                      'first'  => true,
                                    ];
                                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                                        $length = count($context['_seq']);
                                        $context['loop']['revindex0'] = $length - 1;
                                        $context['loop']['revindex'] = $length;
                                        $context['loop']['length'] = $length;
                                        $context['loop']['last'] = 1 === $length;
                                    }
                                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                                        // line 134
                                        echo "                                    ";
                                        $context["keyData"] = (((isset($context["storeData"]) || array_key_exists("storeData", $context) ? $context["storeData"] : (function () { throw new RuntimeError('Variable "storeData" does not exist.', 134, $this->source); })())) ? (twig_get_attribute($this->env, $this->source, (isset($context["storeData"]) || array_key_exists("storeData", $context) ? $context["storeData"] : (function () { throw new RuntimeError('Variable "storeData" does not exist.', 134, $this->source); })()), "getLocalizedKeyValue", [0 => $context["activeGroupId"], 1 => twig_get_attribute($this->env, $this->source, $context["keyGroupRelation"], "getKeyId", [], "method", false, false, false, 134), 2 => $context["language"], 3 => true, 4 => true], "method", false, false, false, 134)) : (null));
                                        // line 135
                                        echo "
                                    ";
                                        // line 136
                                        $context["preview"] = twig_get_attribute($this->env, $this->source, (isset($context["keyDef"]) || array_key_exists("keyDef", $context) ? $context["keyDef"] : (function () { throw new RuntimeError('Variable "keyDef" does not exist.', 136, $this->source); })()), "getVersionPreview", [0 => (isset($context["keyData"]) || array_key_exists("keyData", $context) ? $context["keyData"] : (function () { throw new RuntimeError('Variable "keyData" does not exist.', 136, $this->source); })())], "method", false, false, false, 136);
                                        // line 137
                                        echo "                                    <tr ";
                                        if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 137) % 2 != 0)) {
                                            echo "class=\"odd\"";
                                        }
                                        echo ">
                                        <td>";
                                        // line 138
                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["definition"], "getTitle", [], "method", false, false, false, 138), [], "admin"), "html", null, true);
                                        echo "</td>
                                        <td>";
                                        // line 139
                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, (isset($context["groupDefinition"]) || array_key_exists("groupDefinition", $context) ? $context["groupDefinition"] : (function () { throw new RuntimeError('Variable "groupDefinition" does not exist.', 139, $this->source); })()), "getName", [], "method", false, false, false, 139) . "-") . twig_get_attribute($this->env, $this->source, $context["keyGroupRelation"], "getName", [], "method", false, false, false, 139)), "html", null, true);
                                        echo " ";
                                        ((twig_get_attribute($this->env, $this->source, $context["definition"], "isLocalized", [], "method", false, false, false, 139)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, "/ ", "language", [], "any", false, false, false, 139), "html", null, true))) : (print ("")));
                                        echo "</td>
                                        ";
                                        // line 140
                                        if (((isset($context["isImportPreview"]) || array_key_exists("isImportPreview", $context) ? $context["isImportPreview"] : (function () { throw new RuntimeError('Variable "isImportPreview" does not exist.', 140, $this->source); })()) || (isset($context["isNew"]) || array_key_exists("isNew", $context) ? $context["isNew"] : (function () { throw new RuntimeError('Variable "isNew" does not exist.', 140, $this->source); })()))) {
                                            // line 141
                                            echo "                                            ";
                                            echo twig_escape_filter($this->env, (isset($context["preview"]) || array_key_exists("preview", $context) ? $context["preview"] : (function () { throw new RuntimeError('Variable "preview" does not exist.', 141, $this->source); })()), "html", null, true);
                                            echo "
                                        ";
                                        }
                                        // line 143
                                        echo "                                    </tr>
                                ";
                                        ++$context['loop']['index0'];
                                        ++$context['loop']['index'];
                                        $context['loop']['first'] = false;
                                        if (isset($context['loop']['length'])) {
                                            --$context['loop']['revindex0'];
                                            --$context['loop']['revindex'];
                                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                                        }
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 145
                                    echo "                            ";
                                }
                                // line 146
                                echo "                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['keyGroupRelation'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 147
                            echo "                    ";
                        }
                        // line 148
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['activeGroupId'], $context['enabled'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 149
                    echo "            ";
                }
                // line 150
                echo "        ";
            } elseif (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["definition"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Fieldcollections"])) {
                // line 151
                echo "            ";
                $context["fields"] = twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 151, $this->source); })()), "get", [0 => $context["fieldName"]], "method", false, false, false, 151);
                // line 152
                echo "            ";
                $context["fieldDefinitions"] = null;
                // line 153
                echo "            ";
                $context["fieldItems"] = null;
                // line 154
                echo "
            ";
                // line 155
                if ((isset($context["fields"]) || array_key_exists("fields", $context) ? $context["fields"] : (function () { throw new RuntimeError('Variable "fields" does not exist.', 155, $this->source); })())) {
                    // line 156
                    echo "                ";
                    $context["fieldDefinitions"] = twig_get_attribute($this->env, $this->source, (isset($context["fields"]) || array_key_exists("fields", $context) ? $context["fields"] : (function () { throw new RuntimeError('Variable "fields" does not exist.', 156, $this->source); })()), "getItemDefinitions", [], "method", false, false, false, 156);
                    // line 157
                    echo "                ";
                    $context["fieldItems"] = twig_get_attribute($this->env, $this->source, (isset($context["fields"]) || array_key_exists("fields", $context) ? $context["fields"] : (function () { throw new RuntimeError('Variable "fields" does not exist.', 157, $this->source); })()), "getItems", [], "method", false, false, false, 157);
                    // line 158
                    echo "            ";
                }
                // line 159
                echo "
            ";
                // line 160
                if ((twig_test_iterable((isset($context["fieldItems"]) || array_key_exists("fieldItems", $context) ? $context["fieldItems"] : (function () { throw new RuntimeError('Variable "fieldItems" does not exist.', 160, $this->source); })())) && (twig_length_filter($this->env, (isset($context["fieldItems"]) || array_key_exists("fieldItems", $context) ? $context["fieldItems"] : (function () { throw new RuntimeError('Variable "fieldItems" does not exist.', 160, $this->source); })())) > 0))) {
                    // line 161
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["fieldItems"]) || array_key_exists("fieldItems", $context) ? $context["fieldItems"] : (function () { throw new RuntimeError('Variable "fieldItems" does not exist.', 161, $this->source); })()));
                    foreach ($context['_seq'] as $context["fkey"] => $context["fieldItem"]) {
                        // line 162
                        echo "                    ";
                        $context["fieldKeys"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["fieldDefinitions"]) || array_key_exists("fieldDefinitions", $context) ? $context["fieldDefinitions"] : (function () { throw new RuntimeError('Variable "fieldDefinitions" does not exist.', 162, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["fieldItem"], "getType", [], "method", false, false, false, 162), [], "array", false, false, false, 162), "getFieldDefinitions", [], "method", false, false, false, 162);
                        // line 163
                        echo "                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["fieldKeys"]) || array_key_exists("fieldKeys", $context) ? $context["fieldKeys"] : (function () { throw new RuntimeError('Variable "fieldKeys" does not exist.', 163, $this->source); })()));
                        $context['loop'] = [
                          'parent' => $context['_parent'],
                          'index0' => 0,
                          'index'  => 1,
                          'first'  => true,
                        ];
                        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                            $length = count($context['_seq']);
                            $context['loop']['revindex0'] = $length - 1;
                            $context['loop']['revindex'] = $length;
                            $context['loop']['length'] = $length;
                            $context['loop']['last'] = 1 === $length;
                        }
                        foreach ($context['_seq'] as $context["_key"] => $context["fieldKey"]) {
                            // line 164
                            echo "                        ";
                            $context["value"] = twig_get_attribute($this->env, $this->source, $context["fieldItem"], "get", [0 => twig_get_attribute($this->env, $this->source, $context["fieldKey"], "getName", [], "method", false, false, false, 164)], "method", false, false, false, 164);
                            // line 165
                            echo "                        <tr ";
                            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 165) % 2 != 0)) {
                                echo "class=\"odd\"";
                            }
                            echo ">
                            <td>";
                            // line 166
                            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["fieldItem"], "getType", [], "method", false, false, false, 166) . " - ") . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["fieldKey"], "getTitle", [], "method", false, false, false, 166), [], "admin")), "html", null, true);
                            echo "</td>
                            <td>";
                            // line 167
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["fieldKey"], "getName", [], "method", false, false, false, 167), "html", null, true);
                            echo "</td>
                            <td>";
                            // line 168
                            echo twig_get_attribute($this->env, $this->source, $context["fieldKey"], "getVersionPreview", [0 => (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 168, $this->source); })())], "method", false, false, false, 168);
                            echo "</td>
                        </tr>
                    ";
                            ++$context['loop']['index0'];
                            ++$context['loop']['index'];
                            $context['loop']['first'] = false;
                            if (isset($context['loop']['length'])) {
                                --$context['loop']['revindex0'];
                                --$context['loop']['revindex'];
                                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                            }
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['fieldKey'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 171
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['fkey'], $context['fieldItem'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 172
                    echo "            ";
                }
                // line 173
                echo "        ";
            } else {
                // line 174
                echo "            <tr ";
                if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 174) % 2 != 0)) {
                    echo "class=\"odd\"";
                }
                echo ">
                <td>";
                // line 175
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["definition"], "getTitle", [], "method", false, false, false, 175), [], "admin"), "html", null, true);
                echo "</td>
                <td>";
                // line 176
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["definition"], "getName", [], "method", false, false, false, 176), "html", null, true);
                echo "</td>
                <td>";
                // line 177
                echo twig_get_attribute($this->env, $this->source, $context["definition"], "getVersionPreview", [0 => twig_get_attribute($this->env, $this->source, (isset($context["object"]) || array_key_exists("object", $context) ? $context["object"] : (function () { throw new RuntimeError('Variable "object" does not exist.', 177, $this->source); })()), "getValueForFieldName", [0 => $context["fieldName"]], "method", false, false, false, 177)], "method", false, false, false, 177);
                echo "</td>
            </tr>
        ";
            }
            // line 180
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['fieldName'], $context['definition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 181
        echo "</table>
</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/Admin/DataObject/DataObject/previewVersion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  700 => 181,  686 => 180,  680 => 177,  676 => 176,  672 => 175,  665 => 174,  662 => 173,  659 => 172,  653 => 171,  636 => 168,  632 => 167,  628 => 166,  621 => 165,  618 => 164,  600 => 163,  597 => 162,  592 => 161,  590 => 160,  587 => 159,  584 => 158,  581 => 157,  578 => 156,  576 => 155,  573 => 154,  570 => 153,  567 => 152,  564 => 151,  561 => 150,  558 => 149,  552 => 148,  549 => 147,  543 => 146,  540 => 145,  525 => 143,  519 => 141,  517 => 140,  511 => 139,  507 => 138,  500 => 137,  498 => 136,  495 => 135,  492 => 134,  474 => 133,  472 => 132,  469 => 131,  466 => 130,  462 => 129,  459 => 128,  456 => 127,  453 => 126,  451 => 125,  448 => 124,  444 => 122,  441 => 121,  437 => 120,  434 => 119,  431 => 118,  428 => 117,  425 => 116,  422 => 115,  420 => 114,  417 => 113,  414 => 112,  411 => 111,  409 => 110,  406 => 109,  403 => 108,  401 => 107,  398 => 106,  395 => 105,  392 => 104,  386 => 103,  371 => 101,  368 => 100,  362 => 97,  358 => 96,  354 => 95,  347 => 94,  344 => 93,  341 => 92,  338 => 91,  335 => 90,  329 => 89,  313 => 86,  307 => 84,  304 => 83,  301 => 82,  299 => 81,  294 => 79,  288 => 78,  281 => 77,  263 => 76,  258 => 75,  256 => 74,  253 => 73,  250 => 72,  247 => 71,  245 => 70,  242 => 69,  239 => 68,  237 => 67,  234 => 66,  231 => 65,  214 => 64,  211 => 63,  208 => 62,  203 => 61,  200 => 60,  194 => 59,  178 => 56,  172 => 54,  170 => 53,  165 => 51,  159 => 50,  152 => 49,  134 => 48,  129 => 47,  126 => 46,  109 => 45,  103 => 41,  97 => 38,  92 => 35,  90 => 34,  85 => 32,  77 => 27,  69 => 22,  57 => 12,  55 => 11,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/pimcoreadmin/css/object_versions.css\"/>
</head>

<body>


{% set fields = object.getClass().getFieldDefinitions()  %}

<table class=\"preview\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
    <tr>
        <th>Name</th>
        <th>Key</th>
        <th>Value</th>
    </tr>
    <tr class=\"system\">
        <td>Date</td>
        <td>o_modificationDate</td>
        <td>{{ object.getModificationDate()|date('Y-m-d H:i:s') }}</td>
    </tr>
    <tr class=\"system\">
        <td>Path</td>
        <td>o_path</td>
        <td>{{ object.getRealFullPath() }}</td>
    </tr>
    <tr class=\"system\">
        <td>Published</td>
        <td>o_published</td>
        <td>{{ object.getPublished() ? 'true' : 'false' }}</td>
    </tr>
    {% if versionNote %}
        <tr class=\"system\">
            <td>Version Note</td>
            <td>&nbsp;</td>
            <td>{{ versionNote }}</td>
        </tr>
    {% endif %}

    <tr class=\"\">
        <td colspan=\"3\">&nbsp;</td>
    </tr>
    {% for fieldName, definition in fields %}
        {% if definition is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Localizedfields') %}
            {% for language in validLanguages %}
                {% for lfd in definition.getFieldDefinitions() %}
                    <tr {% if loop.index is odd %}class=\"odd\"{% endif %}>
                        <td>{{ lfd.getTitle()|trans([],'admin') }} ({{ language }})</td>
                        <td>{{ lfd.getName() }}</td>
                        <td>
                                {% if object.getValueForFieldName(fieldName) %}
                                    {{ lfd.getVersionPreview(object.getValueForFieldName(fieldName).getLocalizedValue(lfd.getName(), language)) | raw }}
                                {% endif %}
                        </td>
                    </tr>
                {% endfor %}
            {% endfor %}
        {% elseif definition is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Objectbricks') %}
            {% for asAllowedType in definition.getAllowedTypes() %}
                {% set collectionDef = pimcore_object_brick_definition_key(asAllowedType) %}

                {% for lfd in collectionDef.getFieldDefinitions() %}
                    {% set value = null %}

                    {% set fieldGetter = \"get\" ~ (fieldName|capitalize) %}
                    {% set brick = attribute(object, fieldGetter) %}

                    {% if brick is not empty %}
                        {% set allowedMethod = \"get\" ~ asAllowedType %}
                        {% set brickValue = attribute(brick,allowedMethod) %}

                        {% if lfd is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Localizedfields') %}
                            {% for language in validLanguages %}
                                {% for localizedFieldDefinition in lfd.getFieldDefinitions() %}
                                    <tr {% if loop.index is odd %}class=\"odd\"{% endif %}>
                                        <td>{{ localizedFieldDefinition.getTitle()|trans([],'admin') }} ({{ language }})</td>
                                        <td>{{ localizedFieldDefinition.getName() }}</td>
                                        <td>
                                            {% if brickValue %}
                                                {% set localizedBrickValues = brickValue.getLocalizedFields() %}
                                                {% set localizedBrickValue = localizedBrickValues.getLocalizedValue(localizedFieldDefinition.getName(), language) %}
                                                {{ localizedFieldDefinition.getVersionPreview(localizedBrickValue) | raw }}
                                            {% endif %}
                                        </td>
                                    </tr>
                                {% endfor %}
                            {% endfor %}
                        {% else %}
                            {% if brickValue %}
                                {% set value = lfd.getVersionPreview(brickValue.getValueForFieldName(lfd.getName())) %}
                            {% endif %}
                            <tr {% if loop.index is odd %}class=\"odd\"{% endif %}>
                                <td>{{ asAllowedType|capitalize ~ \" - \" ~ lfd.getTitle()|trans([],'admin')  }}</td>
                                <td>{{ lfd.getName() }}</td>
                                <td>{{ value | raw }}</td>
                            </tr>
                        {% endif %}
                    {% endif %}

                {% endfor %}
            {% endfor %}
        {% elseif definition is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Classificationstore') %}
            {% set storedata = definition.getVersionPreview(object.getValueForFieldName(fieldName)) %}

            {% set existingGroups = [] %}
            {% set activeGroups = [] %}

            {% if storedata %}
                {% set activeGroups = storedata.getActiveGroups() %}
            {% endif %}

            {% if existingGroups is not empty %}
                {% set languages = ['default'] %}
                {% if definition.isLocalized() %}
                    {% set languages = validLanguages|merge(languages) %}
                {% endif %}

                {% for activeGroupId, enabled in existingGroups %}
                    {% if activeGroups[activeGroupId] is not empty %}
                        continue;
                    {% endif %}

                    {% set groupDefinition = pimcore_object_classificationstore_group(activeGroupId) %}
                    {% if groupDefinition is not empty %}
                        {% set keyGroupRelations = groupDefinition.getRelations() %}

                        {% for keyGroupRelation in keyGroupRelations %}
                            {% set keyDef = pimcore_object_classificationstore_get_field_definition_from_json(keyGroupRelation.getDefinition(), keyGroupRelation.getType())  %}

                            {% if keyDef is not empty %}
                                {% for language in languages %}
                                    {% set keyData = storeData ? storeData.getLocalizedKeyValue(activeGroupId, keyGroupRelation.getKeyId(), language, true, true) : null %}

                                    {% set preview = keyDef.getVersionPreview(keyData) %}
                                    <tr {% if loop.index is odd %}class=\"odd\"{% endif %}>
                                        <td>{{ definition.getTitle()|trans([],'admin') }}</td>
                                        <td>{{ groupDefinition.getName() ~ \"-\" ~ keyGroupRelation.getName() }} {{ definition.isLocalized() ? \"/ \" . language : \"\"  }}</td>
                                        {% if isImportPreview or isNew %}
                                            {{ preview }}
                                        {% endif %}
                                    </tr>
                                {% endfor %}
                            {% endif %}
                        {% endfor %}
                    {% endif %}
                {% endfor %}
            {% endif %}
        {% elseif definition is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Fieldcollections') %}
            {% set fields = object.get(fieldName) %}
            {% set fieldDefinitions = null %}
            {% set fieldItems = null %}

            {% if fields %}
                {% set fieldDefinitions = fields.getItemDefinitions() %}
                {% set fieldItems = fields.getItems() %}
            {% endif %}

            {% if fieldItems is iterable and fieldItems|length > 0 %}
                {% for fkey,fieldItem  in fieldItems %}
                    {% set fieldKeys = fieldDefinitions[fieldItem.getType()].getFieldDefinitions() %}
                    {% for fieldKey in fieldKeys %}
                        {% set value = fieldItem.get(fieldKey.getName()) %}
                        <tr {% if loop.index is odd %}class=\"odd\"{% endif %}>
                            <td>{{ fieldItem.getType() ~ \" - \" ~ fieldKey.getTitle()|trans([],'admin') }}</td>
                            <td>{{ fieldKey.getName() }}</td>
                            <td>{{ fieldKey.getVersionPreview(value) | raw }}</td>
                        </tr>
                    {% endfor %}
                {% endfor %}
            {% endif %}
        {% else %}
            <tr {% if loop.index is odd %}class=\"odd\"{% endif %}>
                <td>{{ definition.getTitle()|trans([],'admin') }}</td>
                <td>{{ definition.getName() }}</td>
                <td>{{ definition.getVersionPreview(object.getValueForFieldName(fieldName)) | raw }}</td>
            </tr>
        {% endif %}
    {% endfor %}
</table>
</body>
</html>
", "@PimcoreAdmin/Admin/DataObject/DataObject/previewVersion.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/Admin/DataObject/DataObject/previewVersion.html.twig");
    }
}

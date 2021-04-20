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

/* @PimcoreAdmin/SearchAdmin/Search/Quicksearch/object.html.twig */
class __TwigTemplate_685f1bf365e670498d43c9a1e137ea2e260e1cb2208167ea1c4e087d0c466b1e extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/object.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/object.html.twig"));

        // line 1
        $context["fields"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 1, $this->source); })()), "getClass", [], "method", false, false, false, 1), "getFieldDefinitions", [], "method", false, false, false, 1);
        // line 2
        echo "
<div class=\"small-icon ";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["iconCls"]) || array_key_exists("iconCls", $context) ? $context["iconCls"] : (function () { throw new RuntimeError('Variable "iconCls" does not exist.', 3, $this->source); })()), "html", null, true);
        echo "\"></div>
";
        // line 4
        $this->loadTemplate("@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/object.html.twig", 4)->display(twig_array_merge($context, ["element" => (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 4, $this->source); })()), "cls" => "no-opacity"]));
        // line 5
        echo "
<table class=\"data-table\" style=\"top: 70px;\">
    ";
        // line 7
        $context["c"] = 0;
        // line 8
        echo "    ";
        $context["break"] = false;
        // line 9
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["fields"]) || array_key_exists("fields", $context) ? $context["fields"] : (function () { throw new RuntimeError('Variable "fields" does not exist.', 9, $this->source); })()), 0, 30));
        foreach ($context['_seq'] as $context["fieldName"] => $context["definition"]) {
            // line 10
            echo "        ";
            if ( !(isset($context["break"]) || array_key_exists("break", $context) ? $context["break"] : (function () { throw new RuntimeError('Variable "break" does not exist.', 10, $this->source); })())) {
                // line 11
                echo "            ";
                if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["definition"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Localizedfields"])) {
                    // line 12
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["validLanguages"]) || array_key_exists("validLanguages", $context) ? $context["validLanguages"] : (function () { throw new RuntimeError('Variable "validLanguages" does not exist.', 12, $this->source); })()));
                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                        // line 13
                        echo "                    ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["definition"], "getFieldDefinitions", [], "method", false, false, false, 13));
                        foreach ($context['_seq'] as $context["_key"] => $context["lfd"]) {
                            // line 14
                            echo "                        ";
                            $context["trClass"] = ((((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 14, $this->source); })()) % 2)) ? ("odd") : (""));
                            // line 15
                            echo "                        <tr class=\"";
                            echo twig_escape_filter($this->env, (isset($context["trClass"]) || array_key_exists("trClass", $context) ? $context["trClass"] : (function () { throw new RuntimeError('Variable "trClass" does not exist.', 15, $this->source); })()), "html", null, true);
                            echo "\">
                            <th>";
                            // line 16
                            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["lfd"], "getTitle", [], "method", false, false, false, 16)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["lfd"], "getTitle", [], "method", false, false, false, 16), [], "admin")) : (twig_get_attribute($this->env, $this->source, $context["lfd"], "getName", [], "method", false, false, false, 16))), "html", null, true);
                            echo " (";
                            echo twig_escape_filter($this->env, $context["language"], "html", null, true);
                            echo ")</th>
                            <td>
                                <div class=\"limit-height\">
                                    ";
                            // line 19
                            if (twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 19, $this->source); })()), "getValueForFieldName", [0 => $context["fieldName"]], "method", false, false, false, 19)) {
                                // line 20
                                echo "                                        ";
                                echo twig_get_attribute($this->env, $this->source, $context["lfd"], "getVersionPreview", [0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 20, $this->source); })()), "getValueForFieldName", [0 => $context["fieldName"]], "method", false, false, false, 20), "getLocalizedValue", [0 => twig_get_attribute($this->env, $this->source, $context["lfd"], "getName", [], "method", false, false, false, 20), 1 => $context["language"]], "method", false, false, false, 20)], "method", false, false, false, 20);
                                echo "
                                    ";
                            }
                            // line 22
                            echo "                                </div>
                            </td>
                        </tr>
                        ";
                            // line 25
                            $context["c"] = ((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 25, $this->source); })()) + 1);
                            // line 26
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lfd'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 27
                        echo "                    ";
                        $context["break"] = true;
                        // line 28
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 29
                    echo "            ";
                } elseif (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["definition"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Classificationstore"])) {
                    // line 30
                    echo "                ";
                    $context["storedata"] = twig_get_attribute($this->env, $this->source, $context["definition"], "getVersionPreview", [0 => twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 30, $this->source); })()), "getValueForFieldName", [0 => $context["fieldName"]], "method", false, false, false, 30)], "method", false, false, false, 30);
                    // line 31
                    echo "
                ";
                    // line 32
                    $context["existingGroups"] = [];
                    // line 33
                    echo "                ";
                    $context["activeGroups"] = [];
                    // line 34
                    echo "
                ";
                    // line 35
                    if ((isset($context["storedata"]) || array_key_exists("storedata", $context) ? $context["storedata"] : (function () { throw new RuntimeError('Variable "storedata" does not exist.', 35, $this->source); })())) {
                        // line 36
                        echo "                    ";
                        $context["activeGroups"] = twig_get_attribute($this->env, $this->source, (isset($context["storedata"]) || array_key_exists("storedata", $context) ? $context["storedata"] : (function () { throw new RuntimeError('Variable "storedata" does not exist.', 36, $this->source); })()), "getActiveGroups", [], "method", false, false, false, 36);
                        // line 37
                        echo "                ";
                    }
                    // line 38
                    echo "
                ";
                    // line 39
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((isset($context["activeGroups"]) || array_key_exists("activeGroups", $context) ? $context["activeGroups"] : (function () { throw new RuntimeError('Variable "activeGroups" does not exist.', 39, $this->source); })()));
                    foreach ($context['_seq'] as $context["activeGroupId"] => $context["enabled"]) {
                        // line 40
                        echo "                    ";
                        $context["arr"] = twig_array_merge((isset($context["existingGroups"]) || array_key_exists("existingGroups", $context) ? $context["existingGroups"] : (function () { throw new RuntimeError('Variable "existingGroups" does not exist.', 40, $this->source); })()), ["activeGroupId" => $context["activeGroupId"]]);
                        // line 41
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['activeGroupId'], $context['enabled'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 42
                    echo "
                ";
                    // line 43
                    if ( !twig_test_empty((isset($context["existingGroups"]) || array_key_exists("existingGroups", $context) ? $context["existingGroups"] : (function () { throw new RuntimeError('Variable "existingGroups" does not exist.', 43, $this->source); })()))) {
                        // line 44
                        echo "                    ";
                        $context["languages"] = [0 => "default"];
                        // line 45
                        echo "                    ";
                        if (twig_get_attribute($this->env, $this->source, $context["definition"], "isLocalized", [], "method", false, false, false, 45)) {
                            // line 46
                            echo "                        ";
                            $context["languages"] = twig_array_merge((isset($context["validLanguages"]) || array_key_exists("validLanguages", $context) ? $context["validLanguages"] : (function () { throw new RuntimeError('Variable "validLanguages" does not exist.', 46, $this->source); })()), (isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 46, $this->source); })()));
                            // line 47
                            echo "                    ";
                        }
                        // line 48
                        echo "
                    ";
                        // line 49
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["existingGroups"]) || array_key_exists("existingGroups", $context) ? $context["existingGroups"] : (function () { throw new RuntimeError('Variable "existingGroups" does not exist.', 49, $this->source); })()));
                        foreach ($context['_seq'] as $context["activeGroupId"] => $context["enabled"]) {
                            // line 50
                            echo "                        ";
                            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["activeGroups"]) || array_key_exists("activeGroups", $context) ? $context["activeGroups"] : (function () { throw new RuntimeError('Variable "activeGroups" does not exist.', 50, $this->source); })()), $context["activeGroupId"], [], "array", false, false, false, 50))) {
                                // line 51
                                echo "                            ";
                                $context["groupDefinition"] = Pimcore\Model\DataObject\Classificationstore\GroupConfig::getById($context["activeGroupId"]);
                                // line 52
                                echo "                            ";
                                if ( !twig_test_empty((isset($context["groupDefinition"]) || array_key_exists("groupDefinition", $context) ? $context["groupDefinition"] : (function () { throw new RuntimeError('Variable "groupDefinition" does not exist.', 52, $this->source); })()))) {
                                    // line 53
                                    echo "                                ";
                                    $context["keyGroupRelations"] = twig_get_attribute($this->env, $this->source, (isset($context["groupDefinition"]) || array_key_exists("groupDefinition", $context) ? $context["groupDefinition"] : (function () { throw new RuntimeError('Variable "groupDefinition" does not exist.', 53, $this->source); })()), "getRelations", [], "method", false, false, false, 53);
                                    // line 54
                                    echo "
                                ";
                                    // line 55
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable((isset($context["keyGroupRelations"]) || array_key_exists("keyGroupRelations", $context) ? $context["keyGroupRelations"] : (function () { throw new RuntimeError('Variable "keyGroupRelations" does not exist.', 55, $this->source); })()));
                                    foreach ($context['_seq'] as $context["_key"] => $context["keyGroupRelation"]) {
                                        // line 56
                                        echo "                                    ";
                                        $context["keyDef"] = $this->extensions['Pimcore\Twig\Extension\PimcoreObjectExtension']->getFieldDefinitionFromJson(twig_get_attribute($this->env, $this->source, $context["keyGroupRelation"], "getDefinition", [], "method", false, false, false, 56), twig_get_attribute($this->env, $this->source, $context["keyGroupRelation"], "getType", [], "method", false, false, false, 56));
                                        // line 57
                                        echo "
                                    ";
                                        // line 58
                                        if ( !twig_test_empty((isset($context["keyDef"]) || array_key_exists("keyDef", $context) ? $context["keyDef"] : (function () { throw new RuntimeError('Variable "keyDef" does not exist.', 58, $this->source); })()))) {
                                            // line 59
                                            echo "                                        ";
                                            $context['_parent'] = $context;
                                            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 59, $this->source); })()));
                                            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                                                // line 60
                                                echo "                                            ";
                                                $context["keyData"] = (((isset($context["storeData"]) || array_key_exists("storeData", $context) ? $context["storeData"] : (function () { throw new RuntimeError('Variable "storeData" does not exist.', 60, $this->source); })())) ? (twig_get_attribute($this->env, $this->source, (isset($context["storeData"]) || array_key_exists("storeData", $context) ? $context["storeData"] : (function () { throw new RuntimeError('Variable "storeData" does not exist.', 60, $this->source); })()), "getLocalizedKeyValue", [0 => $context["activeGroupId"], 1 => twig_get_attribute($this->env, $this->source, $context["keyGroupRelation"], "getKeyId", [], "method", false, false, false, 60), 2 => $context["language"], 3 => true, 4 => true], "method", false, false, false, 60)) : (null));
                                                // line 61
                                                echo "
                                            ";
                                                // line 62
                                                $context["preview"] = twig_get_attribute($this->env, $this->source, (isset($context["keyDef"]) || array_key_exists("keyDef", $context) ? $context["keyDef"] : (function () { throw new RuntimeError('Variable "keyDef" does not exist.', 62, $this->source); })()), "getVersionPreview", [0 => (isset($context["keyData"]) || array_key_exists("keyData", $context) ? $context["keyData"] : (function () { throw new RuntimeError('Variable "keyData" does not exist.', 62, $this->source); })())], "method", false, false, false, 62);
                                                // line 63
                                                echo "                                            ";
                                                $context["trClass2"] = ((((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 63, $this->source); })()) % 2)) ? ("odd") : (""));
                                                // line 64
                                                echo "                                            <tr class=\" ";
                                                echo twig_escape_filter($this->env, (isset($context["trClass2"]) || array_key_exists("trClass2", $context) ? $context["trClass2"] : (function () { throw new RuntimeError('Variable "trClass2" does not exist.', 64, $this->source); })()), "html", null, true);
                                                echo "\">
                                                <td>";
                                                // line 65
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["definition"], "getTitle", [], "method", false, false, false, 65), [], "admin"), "html", null, true);
                                                echo "</td>
                                                <td>";
                                                // line 66
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, (isset($context["groupDefinition"]) || array_key_exists("groupDefinition", $context) ? $context["groupDefinition"] : (function () { throw new RuntimeError('Variable "groupDefinition" does not exist.', 66, $this->source); })()), "getName", [], "method", false, false, false, 66) . "-") . twig_get_attribute($this->env, $this->source, $context["keyGroupRelation"], "getName", [], "method", false, false, false, 66)), "html", null, true);
                                                echo " ";
                                                ((twig_get_attribute($this->env, $this->source, $context["definition"], "isLocalized", [], "method", false, false, false, 66)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, "/ ", "language", [], "any", false, false, false, 66), "html", null, true))) : (print ("")));
                                                echo "</td>
                                                ";
                                                // line 67
                                                if (((isset($context["isImportPreview"]) || array_key_exists("isImportPreview", $context) ? $context["isImportPreview"] : (function () { throw new RuntimeError('Variable "isImportPreview" does not exist.', 67, $this->source); })()) || (isset($context["isNew"]) || array_key_exists("isNew", $context) ? $context["isNew"] : (function () { throw new RuntimeError('Variable "isNew" does not exist.', 67, $this->source); })()))) {
                                                    // line 68
                                                    echo "                                                    ";
                                                    echo twig_escape_filter($this->env, (isset($context["preview"]) || array_key_exists("preview", $context) ? $context["preview"] : (function () { throw new RuntimeError('Variable "preview" does not exist.', 68, $this->source); })()), "html", null, true);
                                                    echo "
                                                ";
                                                }
                                                // line 70
                                                echo "                                            </tr>
                                            ";
                                                // line 71
                                                $context["c"] = ((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 71, $this->source); })()) + 1);
                                                // line 72
                                                echo "                                        ";
                                            }
                                            $_parent = $context['_parent'];
                                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                                            $context = array_intersect_key($context, $_parent) + $_parent;
                                            // line 73
                                            echo "                                    ";
                                        }
                                        // line 74
                                        echo "                                ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['keyGroupRelation'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 75
                                    echo "                            ";
                                }
                                // line 76
                                echo "                        ";
                            }
                            // line 77
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['activeGroupId'], $context['enabled'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 78
                        echo "                ";
                    }
                    // line 79
                    echo "

            ";
                } elseif (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [                // line 81
$context["definition"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Objectbricks"])) {
                    // line 82
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["definition"], "getAllowedTypes", [], "method", false, false, false, 82));
                    foreach ($context['_seq'] as $context["_key"] => $context["asAllowedType"]) {
                        // line 83
                        echo "                    ";
                        $context["collectionDef"] = Pimcore\Model\DataObject\Objectbrick\Definition::getByKey($context["asAllowedType"]);
                        // line 84
                        echo "
                    ";
                        // line 85
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collectionDef"]) || array_key_exists("collectionDef", $context) ? $context["collectionDef"] : (function () { throw new RuntimeError('Variable "collectionDef" does not exist.', 85, $this->source); })()), "getFieldDefinitions", [], "method", false, false, false, 85));
                        foreach ($context['_seq'] as $context["_key"] => $context["lfd"]) {
                            // line 86
                            echo "                        ";
                            $context["value"] = null;
                            // line 87
                            echo "
                        ";
                            // line 88
                            $context["fieldGetter"] = ("get" . twig_capitalize_string_filter($this->env, $context["fieldName"]));
                            // line 89
                            echo "                        ";
                            $context["brick"] = twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 89, $this->source); })()), (isset($context["fieldGetter"]) || array_key_exists("fieldGetter", $context) ? $context["fieldGetter"] : (function () { throw new RuntimeError('Variable "fieldGetter" does not exist.', 89, $this->source); })()), [], "any", false, false, false, 89);
                            // line 90
                            echo "
                        ";
                            // line 91
                            if ( !twig_test_empty((isset($context["brick"]) || array_key_exists("brick", $context) ? $context["brick"] : (function () { throw new RuntimeError('Variable "brick" does not exist.', 91, $this->source); })()))) {
                                // line 92
                                echo "                            ";
                                $context["allowedMethod"] = ("get" . $context["asAllowedType"]);
                                // line 93
                                echo "                            ";
                                $context["brickValue"] = twig_get_attribute($this->env, $this->source, (isset($context["brick"]) || array_key_exists("brick", $context) ? $context["brick"] : (function () { throw new RuntimeError('Variable "brick" does not exist.', 93, $this->source); })()), (isset($context["allowedMethod"]) || array_key_exists("allowedMethod", $context) ? $context["allowedMethod"] : (function () { throw new RuntimeError('Variable "allowedMethod" does not exist.', 93, $this->source); })()), [], "any", false, false, false, 93);
                                // line 94
                                echo "
                            ";
                                // line 95
                                if (call_user_func_array($this->env->getTest('instanceof')->getCallable(), [$context["lfd"], "\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Localizedfields"])) {
                                    // line 96
                                    echo "                                ";
                                    $context['_parent'] = $context;
                                    $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 96, $this->source); })()));
                                    foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                                        // line 97
                                        echo "                                    ";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["lfd"], "getFieldDefinitions", [], "method", false, false, false, 97));
                                        foreach ($context['_seq'] as $context["_key"] => $context["localizedFieldDefinition"]) {
                                            // line 98
                                            echo "                                        ";
                                            $context["trClass"] = ((((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 98, $this->source); })()) % 2)) ? ("odd") : (""));
                                            // line 99
                                            echo "                                        <tr class=\"";
                                            echo twig_escape_filter($this->env, (isset($context["trClass"]) || array_key_exists("trClass", $context) ? $context["trClass"] : (function () { throw new RuntimeError('Variable "trClass" does not exist.', 99, $this->source); })()), "html", null, true);
                                            echo "\">
                                            <th>";
                                            // line 100
                                            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getTitle", [], "method", false, false, false, 100)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getTitle", [], "method", false, false, false, 100), [], "admin")) : (twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getName", [], "method", false, false, false, 100))), "html", null, true);
                                            echo " (";
                                            echo twig_escape_filter($this->env, $context["language"], "html", null, true);
                                            echo ")</th>
                                            <td>
                                                <div class=\"limit-height\">
                                                    ";
                                            // line 103
                                            if ((isset($context["brickValue"]) || array_key_exists("brickValue", $context) ? $context["brickValue"] : (function () { throw new RuntimeError('Variable "brickValue" does not exist.', 103, $this->source); })())) {
                                                // line 104
                                                echo "                                                        ";
                                                $context["localizedBrickValues"] = twig_get_attribute($this->env, $this->source, (isset($context["brickValue"]) || array_key_exists("brickValue", $context) ? $context["brickValue"] : (function () { throw new RuntimeError('Variable "brickValue" does not exist.', 104, $this->source); })()), "getLocalizedFields", [], "method", false, false, false, 104);
                                                // line 105
                                                echo "                                                        ";
                                                $context["localizedBrickValue"] = twig_get_attribute($this->env, $this->source, (isset($context["localizedBrickValues"]) || array_key_exists("localizedBrickValues", $context) ? $context["localizedBrickValues"] : (function () { throw new RuntimeError('Variable "localizedBrickValues" does not exist.', 105, $this->source); })()), "getLocalizedValue", [0 => twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getName", [], "method", false, false, false, 105), 1 => $context["language"]], "method", false, false, false, 105);
                                                // line 106
                                                echo "                                                        ";
                                                echo twig_get_attribute($this->env, $this->source, $context["localizedFieldDefinition"], "getVersionPreview", [0 => (isset($context["localizedBrickValue"]) || array_key_exists("localizedBrickValue", $context) ? $context["localizedBrickValue"] : (function () { throw new RuntimeError('Variable "localizedBrickValue" does not exist.', 106, $this->source); })())], "method", false, false, false, 106);
                                                echo "
                                                    ";
                                            }
                                            // line 108
                                            echo "                                                </div>
                                            </td>
                                        </tr>
                                        ";
                                            // line 111
                                            $context["c"] = ((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 111, $this->source); })()) + 1);
                                            // line 112
                                            echo "                                    ";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['localizedFieldDefinition'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 113
                                        echo "                                    ";
                                        $context["break"] = true;
                                        // line 114
                                        echo "                                ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 115
                                    echo "                            ";
                                } else {
                                    // line 116
                                    echo "                                ";
                                    if ((isset($context["brickValue"]) || array_key_exists("brickValue", $context) ? $context["brickValue"] : (function () { throw new RuntimeError('Variable "brickValue" does not exist.', 116, $this->source); })())) {
                                        // line 117
                                        echo "                                    ";
                                        $context["value"] = twig_get_attribute($this->env, $this->source, $context["lfd"], "getVersionPreview", [0 => twig_get_attribute($this->env, $this->source, (isset($context["brickValue"]) || array_key_exists("brickValue", $context) ? $context["brickValue"] : (function () { throw new RuntimeError('Variable "brickValue" does not exist.', 117, $this->source); })()), "getValueForFieldName", [0 => twig_get_attribute($this->env, $this->source, $context["lfd"], "getName", [], "method", false, false, false, 117)], "method", false, false, false, 117)], "method", false, false, false, 117);
                                        // line 118
                                        echo "                                ";
                                    }
                                    // line 119
                                    echo "                                ";
                                    $context["trClass"] = ((((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 119, $this->source); })()) % 2)) ? ("odd") : (""));
                                    // line 120
                                    echo "                                <tr class=\"";
                                    echo twig_escape_filter($this->env, (isset($context["trClass"]) || array_key_exists("trClass", $context) ? $context["trClass"] : (function () { throw new RuntimeError('Variable "trClass" does not exist.', 120, $this->source); })()), "html", null, true);
                                    echo "\">
                                    <th>";
                                    // line 121
                                    echo twig_escape_filter($this->env, ((twig_capitalize_string_filter($this->env, $context["asAllowedType"]) . " - ") . ((twig_get_attribute($this->env, $this->source, $context["lfd"], "getTitle", [], "method", false, false, false, 121)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["lfd"], "getTitle", [], "method", false, false, false, 121), [], "admin")) : (twig_get_attribute($this->env, $this->source, $context["lfd"], "getName", [], "method", false, false, false, 121)))), "html", null, true);
                                    echo "</th>
                                    <td>
                                        <div class=\"limit-height\">
                                            ";
                                    // line 124
                                    echo (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 124, $this->source); })());
                                    echo "
                                        </div>
                                    </td>
                                </tr>
                            ";
                                }
                                // line 129
                                echo "                        ";
                            }
                            // line 130
                            echo "
                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lfd'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 132
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['asAllowedType'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 133
                    echo "            ";
                } else {
                    // line 134
                    echo "                ";
                    $context["trClass"] = ((((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 134, $this->source); })()) % 2)) ? ("odd") : (""));
                    // line 135
                    echo "                <tr class=\"";
                    echo twig_escape_filter($this->env, (isset($context["trClass"]) || array_key_exists("trClass", $context) ? $context["trClass"] : (function () { throw new RuntimeError('Variable "trClass" does not exist.', 135, $this->source); })()), "html", null, true);
                    echo "\">
                <th>";
                    // line 136
                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["definition"], "getTitle", [], "method", false, false, false, 136)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["definition"], "getTitle", [], "method", false, false, false, 136), [], "admin")) : (twig_get_attribute($this->env, $this->source, $context["definition"], "getName", [], "method", false, false, false, 136))), "html", null, true);
                    echo "</th>
                <td>
                    <div class=\"limit-height\">
                        ";
                    // line 139
                    echo twig_get_attribute($this->env, $this->source, $context["definition"], "getVersionPreview", [0 => twig_get_attribute($this->env, $this->source, (isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 139, $this->source); })()), "getValueForFieldName", [0 => $context["fieldName"]], "method", false, false, false, 139)], "method", false, false, false, 139);
                    echo "
                    </div>
                </td>
                </tr>
            ";
                }
                // line 144
                echo "            ";
                $context["c"] = ((isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 144, $this->source); })()) + 1);
                // line 145
                echo "        ";
            }
            // line 146
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['fieldName'], $context['definition'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        echo "</table>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/object.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  493 => 147,  487 => 146,  484 => 145,  481 => 144,  473 => 139,  467 => 136,  462 => 135,  459 => 134,  456 => 133,  450 => 132,  443 => 130,  440 => 129,  432 => 124,  426 => 121,  421 => 120,  418 => 119,  415 => 118,  412 => 117,  409 => 116,  406 => 115,  400 => 114,  397 => 113,  391 => 112,  389 => 111,  384 => 108,  378 => 106,  375 => 105,  372 => 104,  370 => 103,  362 => 100,  357 => 99,  354 => 98,  349 => 97,  344 => 96,  342 => 95,  339 => 94,  336 => 93,  333 => 92,  331 => 91,  328 => 90,  325 => 89,  323 => 88,  320 => 87,  317 => 86,  313 => 85,  310 => 84,  307 => 83,  302 => 82,  300 => 81,  296 => 79,  293 => 78,  287 => 77,  284 => 76,  281 => 75,  275 => 74,  272 => 73,  266 => 72,  264 => 71,  261 => 70,  255 => 68,  253 => 67,  247 => 66,  243 => 65,  238 => 64,  235 => 63,  233 => 62,  230 => 61,  227 => 60,  222 => 59,  220 => 58,  217 => 57,  214 => 56,  210 => 55,  207 => 54,  204 => 53,  201 => 52,  198 => 51,  195 => 50,  191 => 49,  188 => 48,  185 => 47,  182 => 46,  179 => 45,  176 => 44,  174 => 43,  171 => 42,  165 => 41,  162 => 40,  158 => 39,  155 => 38,  152 => 37,  149 => 36,  147 => 35,  144 => 34,  141 => 33,  139 => 32,  136 => 31,  133 => 30,  130 => 29,  124 => 28,  121 => 27,  115 => 26,  113 => 25,  108 => 22,  102 => 20,  100 => 19,  92 => 16,  87 => 15,  84 => 14,  79 => 13,  74 => 12,  71 => 11,  68 => 10,  63 => 9,  60 => 8,  58 => 7,  54 => 5,  52 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set fields = element.getClass().getFieldDefinitions() %}

<div class=\"small-icon {{ iconCls }}\"></div>
{% include '@PimcoreAdmin/SearchAdmin/Search/Quicksearch/info-table.html.twig' with {'element': element, 'cls': 'no-opacity'} %}

<table class=\"data-table\" style=\"top: 70px;\">
    {% set c = 0 %}
    {% set break = false %}
    {% for fieldName, definition in fields|slice(0,30) %}
        {% if not break %}
            {% if definition is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Localizedfields') %}
                {% for language in validLanguages %}
                    {% for lfd in definition.getFieldDefinitions() %}
                        {% set trClass = (c % 2) ? 'odd' : '' %}
                        <tr class=\"{{ trClass }}\">
                            <th>{{ lfd.getTitle() ? lfd.getTitle()|trans([],'admin') : lfd.getName() }} ({{ language }})</th>
                            <td>
                                <div class=\"limit-height\">
                                    {% if element.getValueForFieldName(fieldName) %}
                                        {{ lfd.getVersionPreview(element.getValueForFieldName(fieldName).getLocalizedValue(lfd.getName(), language)) | raw }}
                                    {% endif %}
                                </div>
                            </td>
                        </tr>
                        {% set c = c + 1 %}
                    {% endfor %}
                    {% set break = true %}
                {% endfor %}
            {% elseif definition is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Classificationstore') %}
                {% set storedata = definition.getVersionPreview(element.getValueForFieldName(fieldName)) %}

                {% set existingGroups = [] %}
                {% set activeGroups = [] %}

                {% if storedata %}
                    {% set activeGroups = storedata.getActiveGroups() %}
                {% endif %}

                {% for activeGroupId, enabled in activeGroups %}
                    {% set arr = existingGroups|merge({activeGroupId: activeGroupId}) %}
                {% endfor %}

                {% if existingGroups is not empty %}
                    {% set languages = ['default'] %}
                    {% if definition.isLocalized() %}
                        {% set languages = validLanguages|merge(languages) %}
                    {% endif %}

                    {% for activeGroupId, enabled in existingGroups %}
                        {% if activeGroups[activeGroupId] is not empty %}
                            {% set groupDefinition = pimcore_object_classificationstore_group(activeGroupId) %}
                            {% if groupDefinition is not empty %}
                                {% set keyGroupRelations = groupDefinition.getRelations() %}

                                {% for keyGroupRelation in keyGroupRelations %}
                                    {% set keyDef = pimcore_object_classificationstore_get_field_definition_from_json(keyGroupRelation.getDefinition(), keyGroupRelation.getType())  %}

                                    {% if keyDef is not empty %}
                                        {% for language in languages %}
                                            {% set keyData = storeData ? storeData.getLocalizedKeyValue(activeGroupId, keyGroupRelation.getKeyId(), language, true, true) : null %}

                                            {% set preview = keyDef.getVersionPreview(keyData) %}
                                            {% set trClass2 = (c % 2) ? 'odd' : '' %}
                                            <tr class=\" {{ trClass2 }}\">
                                                <td>{{ definition.getTitle()|trans([],'admin') }}</td>
                                                <td>{{ groupDefinition.getName() ~ \"-\" ~ keyGroupRelation.getName() }} {{ definition.isLocalized() ? \"/ \" . language : \"\"  }}</td>
                                                {% if isImportPreview or isNew %}
                                                    {{ preview }}
                                                {% endif %}
                                            </tr>
                                            {% set c = c + 1 %}
                                        {% endfor %}
                                    {% endif %}
                                {% endfor %}
                            {% endif %}
                        {% endif %}
                    {% endfor %}
                {% endif %}


            {% elseif definition is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Objectbricks') %}
                {% for asAllowedType in definition.getAllowedTypes() %}
                    {% set collectionDef = pimcore_object_brick_definition_key(asAllowedType) %}

                    {% for lfd in collectionDef.getFieldDefinitions() %}
                        {% set value = null %}

                        {% set fieldGetter = \"get\" ~ (fieldName|capitalize) %}
                        {% set brick = attribute(element, fieldGetter) %}

                        {% if brick is not empty %}
                            {% set allowedMethod = \"get\" ~ asAllowedType %}
                            {% set brickValue = attribute(brick,allowedMethod) %}

                            {% if lfd is instanceof('\\\\Pimcore\\\\Model\\\\DataObject\\\\ClassDefinition\\\\Data\\\\Localizedfields') %}
                                {% for language in languages %}
                                    {% for localizedFieldDefinition in lfd.getFieldDefinitions() %}
                                        {% set trClass = (c % 2) ? 'odd' : '' %}
                                        <tr class=\"{{ trClass }}\">
                                            <th>{{ localizedFieldDefinition.getTitle() ? localizedFieldDefinition.getTitle()|trans([],'admin') : localizedFieldDefinition.getName() }} ({{ language }})</th>
                                            <td>
                                                <div class=\"limit-height\">
                                                    {% if brickValue %}
                                                        {% set localizedBrickValues = brickValue.getLocalizedFields() %}
                                                        {% set localizedBrickValue = localizedBrickValues.getLocalizedValue(localizedFieldDefinition.getName(), language) %}
                                                        {{ localizedFieldDefinition.getVersionPreview(localizedBrickValue) | raw }}
                                                    {% endif %}
                                                </div>
                                            </td>
                                        </tr>
                                        {% set c = c + 1 %}
                                    {% endfor %}
                                    {% set break = true %}
                                {% endfor %}
                            {% else %}
                                {% if brickValue %}
                                    {% set value = lfd.getVersionPreview(brickValue.getValueForFieldName(lfd.getName())) %}
                                {% endif %}
                                {% set trClass = (c % 2) ? 'odd' : '' %}
                                <tr class=\"{{ trClass }}\">
                                    <th>{{ asAllowedType|capitalize ~ \" - \" ~ (lfd.getTitle() ? lfd.getTitle()|trans([],'admin') : lfd.getName() ) }}</th>
                                    <td>
                                        <div class=\"limit-height\">
                                            {{ value | raw }}
                                        </div>
                                    </td>
                                </tr>
                            {% endif %}
                        {% endif %}

                    {% endfor %}
                {% endfor %}
            {% else %}
                {% set trClass = (c % 2) ? 'odd' : '' %}
                <tr class=\"{{ trClass }}\">
                <th>{{ definition.getTitle() ? definition.getTitle()|trans([],'admin') : definition.getName() }}</th>
                <td>
                    <div class=\"limit-height\">
                        {{ definition.getVersionPreview(element.getValueForFieldName(fieldName)) | raw }}
                    </div>
                </td>
                </tr>
            {% endif %}
            {% set c = c + 1 %}
        {% endif %}
    {% endfor %}
</table>
", "@PimcoreAdmin/SearchAdmin/Search/Quicksearch/object.html.twig", "/var/www/html/vendor/pimcore/pimcore/bundles/AdminBundle/Resources/views/SearchAdmin/Search/Quicksearch/object.html.twig");
    }
}

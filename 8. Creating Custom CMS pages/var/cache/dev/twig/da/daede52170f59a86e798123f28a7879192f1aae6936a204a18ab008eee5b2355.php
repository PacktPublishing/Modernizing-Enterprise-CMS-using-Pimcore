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

/* Default/editable.html.twig */
class __TwigTemplate_0e6ba9173dbcc0fad47e6233e8d2f5ec35cd54a15b44b53ea2305882f5b5cfd6 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Default/editable.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Default/editable.html.twig"));

        // line 1
        echo "<h2>Checkbox</h2>
Checkbox / bool implementation for documents.
";
        // line 3
        if ((isset($context["editmode"]) || array_key_exists("editmode", $context) ? $context["editmode"] : (function () { throw new RuntimeError('Variable "editmode" does not exist.', 3, $this->source); })())) {
            // line 4
            echo "    ";
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "checkbox", "myCheckbox");
            echo "
";
        }
        // line 6
        echo "
<h2>Date</h2>
Datepicker, showing the date in a specified format.
";
        // line 9
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "date", "myDate", ["format" => "d.m.Y", "outputFormat" => "%d.%m.%Y"]);
        // line 13
        echo "

<h2>Relation</h2>
Provides possibility to create a reference to any other element in Pimcore (document, asset, object). 
";
        // line 17
        if ((isset($context["editmode"]) || array_key_exists("editmode", $context) ? $context["editmode"] : (function () { throw new RuntimeError('Variable "editmode" does not exist.', 17, $this->source); })())) {
            // line 18
            echo "
";
            // line 19
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "relation", "myRelation", ["types" => [0 => "asset", 1 => "object"], "subtypes" => ["asset" => [0 => "video", 1 => "image"], "object" => [0 => "object"]], "classes" => [0 => "MyObject"]]);
            // line 26
            echo "
";
        } else {
            // line 28
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "relation", "myRelation"), "getFullPath", [], "method", false, false, false, 28), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Go to"), "html", null, true);
            echo "</a>
";
        }
        // line 30
        echo "
<h2>Relations (Many-To-Many Relation)</h2>
Provides possibility to edit multiple references to other elements in Pimcore (documents, assets, objects).
";
        // line 33
        if ((isset($context["editmode"]) || array_key_exists("editmode", $context) ? $context["editmode"] : (function () { throw new RuntimeError('Variable "editmode" does not exist.', 33, $this->source); })())) {
            // line 34
            echo "    ";
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "relations", "objectPaths");
            echo "
";
        } else {
            // line 36
            echo "<ul>
    ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "relations", "objectPaths"));
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 38
                echo "        <li><a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["element"], "getFullPath", [], "any", false, false, false, 38), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["element"], "getTitle", [], "any", false, false, false, 38), "html", null, true);
                echo "</a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "</ul>
";
        }
        // line 42
        echo "
<h2>Image</h2>
A place where you can assign an image (from the assets module).
";
        // line 45
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "image", "myImage", ["title" => "Drag your image here", "width" => 300, "height" => 100, "thumbnail" => "myThumbnails"]);
        // line 50
        echo "


<h2>Input</h2>
A single-line text-input.
";
        // line 55
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "input", "myHeadline");
        echo "


<h2>Link</h2>
An editable link component.
";
        // line 60
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "link", "blogLink");
        echo "

<h2>Multiselect</h2>
Multiselect implementation for selecting documents.
";
        // line 64
        if ((isset($context["editmode"]) || array_key_exists("editmode", $context) ? $context["editmode"] : (function () { throw new RuntimeError('Variable "editmode" does not exist.', 64, $this->source); })())) {
            // line 65
            echo "    ";
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "multiselect", "categories", ["width" => 200, "height" => 100, "store" => [0 => [0 => "key", 1 => "value"], 1 => [0 => "key2", 1 => "value2"]]]);
            // line 73
            echo "
";
        } else {
            // line 75
            echo "  Selected value:  ";
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "multiselect", "categories");
            echo "
";
        }
        // line 77
        echo "
<h2>Numeric</h2>
The numeric editable is like the input editable but with special options for numbers (like minimum value, decimal precision...).
";
        // line 80
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "numeric", "myNumber");
        echo "

    



<h2>Renderlet</h2>
The renderlet is a special container which is able to handle every object in Pimcore (Documents, Assets, Objects).
";
        // line 88
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "renderlet", "myGallery", ["controller" => "Custom", "action" => "gallery", "title" => "Drag an asset folder here to get a gallery", "height" => 400]);
        // line 95
        echo "

<h2>Select</h2>
Select box as an editable.
";
        // line 99
        if ((isset($context["editmode"]) || array_key_exists("editmode", $context) ? $context["editmode"] : (function () { throw new RuntimeError('Variable "editmode" does not exist.', 99, $this->source); })())) {
            // line 100
            echo "    ";
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "select", "myItem", ["store" => [0 => [0 => "otion1", 1 => "Option One"], 1 => [0 => "option2", 1 => "Option 2"], 2 => [0 => "option3", 1 => "Option 3"]], "defaultValue" => "otion1"]);
            // line 107
            echo "
";
        } else {
            // line 108
            echo "    
    Your choice:";
            // line 109
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "select", "myItem"), "getData", [], "method", false, false, false, 109), "html", null, true);
            echo "    
";
        }
        // line 111
        echo "
<br><br><br><br><br><br><br>

<h2>Snippet (embed)</h2>
Use the snippet editable to embed a reusable document, for example to create teasers, boxes, etc.

";
        // line 117
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "snippet", "mySnippet", ["width" => 250, "height" => 100]);
        echo "

<h2>Table</h2>
This editable allows you to add a fully editable table.
";
        // line 121
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "table", "productProperties", ["width" => 700, "height" => 400, "defaults" => ["cols" => 2, "rows" => 3, "data" => [0 => [0 => "Attribute name", 1 => "Value"], 1 => [0 => "Color", 1 => "Black"], 2 => [0 => "Size", 1 => "Large"], 3 => [0 => "Availability", 1 => "Out of stock"]]]]);
        // line 135
        echo "

<h2>Textarea</h2>
Textarea implementation for documents.
  ";
        // line 139
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "textarea", "product_description", ["nl2br" => true, "height" => 300, "placeholder" => "Product Description"]);
        // line 143
        echo "

<h2>Video</h2>
Use the Video editable to insert asset movies in pages content. (from https://www.sample-videos.com/)
  ";
        // line 147
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "video", "campaignVideo2");
        echo "

<h2>WYSIWYG</h2>
WYSIWYG editor.
";
        // line 151
        echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "wysiwyg", "specialContent", ["height" => 200]);
        // line 154
        echo "

<h2>Block</h2>
The following snipper iterates a block of code. 
";
        // line 158
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->getBlockIterator($this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "block", "contentblock")));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 159
            echo "    <h2>";
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "input", "subline");
            echo "</h2>
    ";
            // line 160
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "wysiwyg", "content");
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 162
        echo "
<h2>Scheduled Block</h2>
";
        // line 164
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->getBlockIterator($this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "scheduledblock", "block")));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 165
            echo "    <h2>";
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "input", "sched_subline");
            echo "</h2>
    ";
            // line 166
            echo $this->extensions['Pimcore\Twig\Extension\DocumentEditableExtension']->renderEditable($context, "wysiwyg", "sched_content");
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Default/editable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  283 => 166,  278 => 165,  274 => 164,  270 => 162,  262 => 160,  257 => 159,  253 => 158,  247 => 154,  245 => 151,  238 => 147,  232 => 143,  230 => 139,  224 => 135,  222 => 121,  215 => 117,  207 => 111,  202 => 109,  199 => 108,  195 => 107,  192 => 100,  190 => 99,  184 => 95,  182 => 88,  171 => 80,  166 => 77,  160 => 75,  156 => 73,  153 => 65,  151 => 64,  144 => 60,  136 => 55,  129 => 50,  127 => 45,  122 => 42,  118 => 40,  107 => 38,  103 => 37,  100 => 36,  94 => 34,  92 => 33,  87 => 30,  79 => 28,  75 => 26,  73 => 19,  70 => 18,  68 => 17,  62 => 13,  60 => 9,  55 => 6,  49 => 4,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h2>Checkbox</h2>
Checkbox / bool implementation for documents.
{% if editmode %}
    {{ pimcore_checkbox('myCheckbox') }}
{% endif %}

<h2>Date</h2>
Datepicker, showing the date in a specified format.
{{ pimcore_date('myDate', {
    'format': 'd.m.Y',
    'outputFormat': '%d.%m.%Y'
    })
}}

<h2>Relation</h2>
Provides possibility to create a reference to any other element in Pimcore (document, asset, object). 
{% if editmode %}

{{ pimcore_relation(\"myRelation\",{
    \"types\": [\"asset\",\"object\"],
    \"subtypes\": {
        \"asset\": [\"video\", \"image\"],
        \"object\": [\"object\"],
    },
    \"classes\": [\"MyObject\"]
}) }}
{% else %}
    <a href=\"{{ pimcore_relation(\"myRelation\").getFullPath() }}\">{{ \"Go to\" | trans }}</a>
{% endif %}

<h2>Relations (Many-To-Many Relation)</h2>
Provides possibility to edit multiple references to other elements in Pimcore (documents, assets, objects).
{% if editmode %}
    {{ pimcore_relations(\"objectPaths\") }}
{% else %}
<ul>
    {% for element in pimcore_relations(\"objectPaths\") %}
        <li><a href=\"{{ element.getFullPath }}\">{{  element.getTitle  }}</a></li>
    {% endfor %}
</ul>
{% endif %}

<h2>Image</h2>
A place where you can assign an image (from the assets module).
{{ pimcore_image(\"myImage\", {
    \"title\": \"Drag your image here\",
    \"width\": 300,
    \"height\": 100,
    \"thumbnail\": \"myThumbnails\"
}) }}


<h2>Input</h2>
A single-line text-input.
{{ pimcore_input(\"myHeadline\") }}


<h2>Link</h2>
An editable link component.
{{ pimcore_link('blogLink') }}

<h2>Multiselect</h2>
Multiselect implementation for selecting documents.
{% if editmode %}
    {{ pimcore_multiselect(\"categories\", {
            \"width\" : 200,
            \"height\" : 100,
            \"store\" : [
                [\"key\",\"value\"],
                [\"key2\",\"value2\"],
            ],
            
        }) }}
{% else %}
  Selected value:  {{ pimcore_multiselect(\"categories\")}}
{% endif %}

<h2>Numeric</h2>
The numeric editable is like the input editable but with special options for numbers (like minimum value, decimal precision...).
{{ pimcore_numeric('myNumber') }}

    



<h2>Renderlet</h2>
The renderlet is a special container which is able to handle every object in Pimcore (Documents, Assets, Objects).
{{
        pimcore_renderlet('myGallery', {
            \"controller\" : \"Custom\",
            \"action\" : \"gallery\",
            \"title\" : \"Drag an asset folder here to get a gallery\",
            \"height\" : 400
        })
    }}

<h2>Select</h2>
Select box as an editable.
{% if editmode %}
    {{ pimcore_select(\"myItem\", {
            \"store\": [
                [\"otion1\", \"Option One\"],
                [\"option2\", \"Option 2\"],
                [\"option3\", \"Option 3\"]
            ],
            \"defaultValue\" : \"otion1\"
        }) }}
{% else %}    
    Your choice:{{ pimcore_select(\"myItem\").getData() }}    
{% endif %}

<br><br><br><br><br><br><br>

<h2>Snippet (embed)</h2>
Use the snippet editable to embed a reusable document, for example to create teasers, boxes, etc.

{{ pimcore_snippet(\"mySnippet\", {\"width\": 250, \"height\": 100}) }}

<h2>Table</h2>
This editable allows you to add a fully editable table.
{{ pimcore_table(\"productProperties\", {
    \"width\": 700,
    \"height\": 400,
    \"defaults\": {
        \"cols\": 2,
        \"rows\": 3,
        \"data\": [
            [\"Attribute name\", \"Value\"],
            [\"Color\", \"Black\"],
            [\"Size\", \"Large\"],
            [\"Availability\", \"Out of stock\"]
            ]
        }
    })
}}

<h2>Textarea</h2>
Textarea implementation for documents.
  {{ pimcore_textarea(\"product_description\",{
        \"nl2br\": true,
        \"height\": 300,
        \"placeholder\": \"Product Description\"
    }) }}

<h2>Video</h2>
Use the Video editable to insert asset movies in pages content. (from https://www.sample-videos.com/)
  {{ pimcore_video('campaignVideo2') }}

<h2>WYSIWYG</h2>
WYSIWYG editor.
{{  pimcore_wysiwyg(\"specialContent\", {
            \"height\": 200
        }) 
    }}

<h2>Block</h2>
The following snipper iterates a block of code. 
{% for i in pimcore_iterate_block(pimcore_block('contentblock')) %}
    <h2>{{ pimcore_input('subline') }}</h2>
    {{ pimcore_wysiwyg('content') }}
{% endfor %}

<h2>Scheduled Block</h2>
{% for i in pimcore_iterate_block(pimcore_scheduledblock('block')) %}
    <h2>{{ pimcore_input('sched_subline') }}</h2>
    {{ pimcore_wysiwyg('sched_content') }}
{% endfor %}
", "Default/editable.html.twig", "/var/www/html/templates/Default/editable.html.twig");
    }
}

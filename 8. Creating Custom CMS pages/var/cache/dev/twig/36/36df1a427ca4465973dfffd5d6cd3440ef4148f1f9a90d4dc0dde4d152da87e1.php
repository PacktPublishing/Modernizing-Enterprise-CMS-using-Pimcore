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

/* @PimcoreCore/Targeting/toolbar/toolbar.css */
class __TwigTemplate_9b726c3adfff1369d2aaa1e6a7bb4589e4a0c6dbb09f2d841a0e800e230aa161 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Targeting/toolbar/toolbar.css"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@PimcoreCore/Targeting/toolbar/toolbar.css"));

        // line 1
        echo "._ptgtb {
  display: block;
  width: 450px;
  height: 100%;
  overflow: auto;
  position: fixed;
  right: 0;
  top: 0;
  z-index: 10000;
  background: rgba(68, 68, 68, 0.97);
  border-bottom-left-radius: 4px;
  font: 12px Arial, \"Helvetica Neue\", Helvetica, sans-serif;
  color: #fff;
}
._ptgtb._ptgtb--collapsed {
  right: -414px;
}
._ptgtb ._ptgtb--hidden {
  display: none !important;
}
._ptgtb ._ptgtb__trigger {
  position: absolute;
  left: 0;
  top: 0;
  width: 36px;
  height: 100%;
  background: #222;
  border-bottom-left-radius: 4px;
  cursor: pointer;
}
._ptgtb ._ptgtb__toolbar-icon {
  display: block;
  position: absolute;
  width: 36px;
  height: 36px;
  text-align: center;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--target {
  top: 5px;
  left: 0;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--collapse {
  bottom: 0;
  left: 0;
  transform: rotate(180deg);
  transition: 0.3s ease-in-out;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--close, ._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--advanced-features {
  top: 0;
  cursor: pointer;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--close:hover, ._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--advanced-features:hover {
  background: #626262;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--close {
  right: 0;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--advanced-features {
  right: 36px;
  background: #626262;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--advanced-features._ptgtb__collapse__trigger--collapsed {
  background: transparent;
}
._ptgtb ._ptgtb__toolbar-icon svg {
  display: inline-block;
  height: 18px;
  max-height: 18px;
  margin-top: 10px;
}
._ptgtb._ptgtb--collapsed ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--collapse {
  transform: rotate(0);
}
._ptgtb ._ptgtb__content {
  margin-left: 36px;
}
._ptgtb ._ptgtb__content ._ptgtb__content-inner {
  padding: 15px;
}
._ptgtb ._ptgtb__content h1 {
  font-size: 18px;
  margin-top: 0;
}
._ptgtb ._ptgtb__content h2, ._ptgtb ._ptgtb__content h3 {
  padding-bottom: 3px;
  border-bottom: 1px dotted #686868;
  line-height: normal;
  letter-spacing: normal;
}
._ptgtb ._ptgtb__content h2 ._ptgtb__label, ._ptgtb ._ptgtb__content h3 ._ptgtb__label {
  position: relative;
  top: -1px;
  margin-left: 3px;
}
._ptgtb ._ptgtb__content h2 {
  font-size: 14px;
  margin: 20px 0 5px 0;
}
._ptgtb ._ptgtb__content h3 {
  font-size: 13px;
  margin: 15px 0 5px 0;
}
._ptgtb ._ptgtb__content table {
  width: 100%;
}
._ptgtb ._ptgtb__content table td, ._ptgtb ._ptgtb__content table th {
  padding: 3px 0;
}
._ptgtb ._ptgtb__table__col-number {
  text-align: right;
}
._ptgtb ._ptgtb__table__col-right {
  text-align: right;
}
._ptgtb ._ptgtb__table__row-details td:first-child {
  padding-left: 10px;
}
._ptgtb ._ptgtb__storage {
  padding: 0 0 0 15px;
}
._ptgtb ._ptgtb__collapse--collapsed {
  display: none;
}
._ptgtb ._ptgtb__collapse__arrow {
  display: inline-block;
  margin-left: 4px;
}
._ptgtb ._ptgtb__collapse__trigger:hover {
  cursor: pointer;
}
._ptgtb ._ptgtb__collapse__trigger._ptgtb__collapse__trigger--block {
  display: block;
  clear: both;
}
._ptgtb ._ptgtb__collapse__trigger._ptgtb__collapse__trigger--block ._ptgtb__collapse__arrow {
  float: right;
}
._ptgtb ._ptgtb__label,
._ptgtb ._ptgtb__metric {
  font: 11px Menlo, Monaco, Consolas, \"Courier New\", monospace;
}
._ptgtb ._ptgtb__label {
  display: inline-block;
  padding: 3px 5px;
  background: #888;
  border-radius: 1px;
}
._ptgtb ._ptgtb__label._ptgtb__label--target-group {
  background: #4f805d;
}
._ptgtb ._ptgtb__label._ptgtb__label--rule {
  background: #a46a1f;
}
._ptgtb ._ptgtb__metric {
  display: inline-block;
  margin: 0 5px 3px 0;
  border-radius: 1px;
}
._ptgtb ._ptgtb__metric__label,
._ptgtb ._ptgtb__metric__value {
  display: inline-block;
  padding: 3px 5px;
  background: #333;
  border-top-left-radius: 1px;
  border-bottom-left-radius: 1px;
}
._ptgtb ._ptgtb__metric__label {
  background: #656565;
  border-top-right-radius: 1px;
  border-bottom-right-radius: 1px;
}
._ptgtb ._ptgtb__override-form label {
  display: block;
  margin: 10px 0 3px 0;
}
._ptgtb ._ptgtb__override-form input,
._ptgtb ._ptgtb__override-form select,
._ptgtb ._ptgtb__override-form textarea {
  color: #000;
  background: #fff;
  padding: 5px 10px;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 2px;
}
._ptgtb ._ptgtb__override-form input:disabled,
._ptgtb ._ptgtb__override-form select:disabled,
._ptgtb ._ptgtb__override-form textarea:disabled {
  cursor: not-allowed;
  background: #d3d3d3;
}
._ptgtb ._ptgtb__override-form input,
._ptgtb ._ptgtb__override-form textarea {
  font: 11px Menlo, Monaco, Consolas, \"Courier New\", monospace;
}
._ptgtb ._ptgtb__override-form button {
  display: inline-block;
  margin: 0 0 0 3px;
  padding: 6px 15px;
  background: #838383;
  border-radius: 2px;
  border: 0;
  color: #f5f5f5;
  font-size: 12px;
}
._ptgtb ._ptgtb__override-form button:hover {
  cursor: pointer;
  opacity: 0.8;
  text-decoration: none;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__button-row {
  margin-top: 12px;
  text-align: right;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__button-row [type=submit] {
  background: #4f805d;
  color: #fff;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__collapse-section-container {
  margin-top: 20px;
  margin-bottom: 10px;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__collapse-section-container:first-child {
  margin-top: 10px;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__collapse-section-container > label {
  margin-top: 0;
  padding-bottom: 3px;
  border-bottom: 1px dotted #686868;
}
._ptgtb .sf-dump {
  font-size: 11px;
  background: #2f2f2f;
  border: none;
}

/*# sourceMappingURL=toolbar.css.map */
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@PimcoreCore/Targeting/toolbar/toolbar.css";
    }

    public function getDebugInfo()
    {
        return array (  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("._ptgtb {
  display: block;
  width: 450px;
  height: 100%;
  overflow: auto;
  position: fixed;
  right: 0;
  top: 0;
  z-index: 10000;
  background: rgba(68, 68, 68, 0.97);
  border-bottom-left-radius: 4px;
  font: 12px Arial, \"Helvetica Neue\", Helvetica, sans-serif;
  color: #fff;
}
._ptgtb._ptgtb--collapsed {
  right: -414px;
}
._ptgtb ._ptgtb--hidden {
  display: none !important;
}
._ptgtb ._ptgtb__trigger {
  position: absolute;
  left: 0;
  top: 0;
  width: 36px;
  height: 100%;
  background: #222;
  border-bottom-left-radius: 4px;
  cursor: pointer;
}
._ptgtb ._ptgtb__toolbar-icon {
  display: block;
  position: absolute;
  width: 36px;
  height: 36px;
  text-align: center;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--target {
  top: 5px;
  left: 0;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--collapse {
  bottom: 0;
  left: 0;
  transform: rotate(180deg);
  transition: 0.3s ease-in-out;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--close, ._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--advanced-features {
  top: 0;
  cursor: pointer;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--close:hover, ._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--advanced-features:hover {
  background: #626262;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--close {
  right: 0;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--advanced-features {
  right: 36px;
  background: #626262;
}
._ptgtb ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--advanced-features._ptgtb__collapse__trigger--collapsed {
  background: transparent;
}
._ptgtb ._ptgtb__toolbar-icon svg {
  display: inline-block;
  height: 18px;
  max-height: 18px;
  margin-top: 10px;
}
._ptgtb._ptgtb--collapsed ._ptgtb__toolbar-icon._ptgtb__toolbar-icon--collapse {
  transform: rotate(0);
}
._ptgtb ._ptgtb__content {
  margin-left: 36px;
}
._ptgtb ._ptgtb__content ._ptgtb__content-inner {
  padding: 15px;
}
._ptgtb ._ptgtb__content h1 {
  font-size: 18px;
  margin-top: 0;
}
._ptgtb ._ptgtb__content h2, ._ptgtb ._ptgtb__content h3 {
  padding-bottom: 3px;
  border-bottom: 1px dotted #686868;
  line-height: normal;
  letter-spacing: normal;
}
._ptgtb ._ptgtb__content h2 ._ptgtb__label, ._ptgtb ._ptgtb__content h3 ._ptgtb__label {
  position: relative;
  top: -1px;
  margin-left: 3px;
}
._ptgtb ._ptgtb__content h2 {
  font-size: 14px;
  margin: 20px 0 5px 0;
}
._ptgtb ._ptgtb__content h3 {
  font-size: 13px;
  margin: 15px 0 5px 0;
}
._ptgtb ._ptgtb__content table {
  width: 100%;
}
._ptgtb ._ptgtb__content table td, ._ptgtb ._ptgtb__content table th {
  padding: 3px 0;
}
._ptgtb ._ptgtb__table__col-number {
  text-align: right;
}
._ptgtb ._ptgtb__table__col-right {
  text-align: right;
}
._ptgtb ._ptgtb__table__row-details td:first-child {
  padding-left: 10px;
}
._ptgtb ._ptgtb__storage {
  padding: 0 0 0 15px;
}
._ptgtb ._ptgtb__collapse--collapsed {
  display: none;
}
._ptgtb ._ptgtb__collapse__arrow {
  display: inline-block;
  margin-left: 4px;
}
._ptgtb ._ptgtb__collapse__trigger:hover {
  cursor: pointer;
}
._ptgtb ._ptgtb__collapse__trigger._ptgtb__collapse__trigger--block {
  display: block;
  clear: both;
}
._ptgtb ._ptgtb__collapse__trigger._ptgtb__collapse__trigger--block ._ptgtb__collapse__arrow {
  float: right;
}
._ptgtb ._ptgtb__label,
._ptgtb ._ptgtb__metric {
  font: 11px Menlo, Monaco, Consolas, \"Courier New\", monospace;
}
._ptgtb ._ptgtb__label {
  display: inline-block;
  padding: 3px 5px;
  background: #888;
  border-radius: 1px;
}
._ptgtb ._ptgtb__label._ptgtb__label--target-group {
  background: #4f805d;
}
._ptgtb ._ptgtb__label._ptgtb__label--rule {
  background: #a46a1f;
}
._ptgtb ._ptgtb__metric {
  display: inline-block;
  margin: 0 5px 3px 0;
  border-radius: 1px;
}
._ptgtb ._ptgtb__metric__label,
._ptgtb ._ptgtb__metric__value {
  display: inline-block;
  padding: 3px 5px;
  background: #333;
  border-top-left-radius: 1px;
  border-bottom-left-radius: 1px;
}
._ptgtb ._ptgtb__metric__label {
  background: #656565;
  border-top-right-radius: 1px;
  border-bottom-right-radius: 1px;
}
._ptgtb ._ptgtb__override-form label {
  display: block;
  margin: 10px 0 3px 0;
}
._ptgtb ._ptgtb__override-form input,
._ptgtb ._ptgtb__override-form select,
._ptgtb ._ptgtb__override-form textarea {
  color: #000;
  background: #fff;
  padding: 5px 10px;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 2px;
}
._ptgtb ._ptgtb__override-form input:disabled,
._ptgtb ._ptgtb__override-form select:disabled,
._ptgtb ._ptgtb__override-form textarea:disabled {
  cursor: not-allowed;
  background: #d3d3d3;
}
._ptgtb ._ptgtb__override-form input,
._ptgtb ._ptgtb__override-form textarea {
  font: 11px Menlo, Monaco, Consolas, \"Courier New\", monospace;
}
._ptgtb ._ptgtb__override-form button {
  display: inline-block;
  margin: 0 0 0 3px;
  padding: 6px 15px;
  background: #838383;
  border-radius: 2px;
  border: 0;
  color: #f5f5f5;
  font-size: 12px;
}
._ptgtb ._ptgtb__override-form button:hover {
  cursor: pointer;
  opacity: 0.8;
  text-decoration: none;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__button-row {
  margin-top: 12px;
  text-align: right;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__button-row [type=submit] {
  background: #4f805d;
  color: #fff;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__collapse-section-container {
  margin-top: 20px;
  margin-bottom: 10px;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__collapse-section-container:first-child {
  margin-top: 10px;
}
._ptgtb ._ptgtb__override-form ._ptgtb__override-form__collapse-section-container > label {
  margin-top: 0;
  padding-bottom: 3px;
  border-bottom: 1px dotted #686868;
}
._ptgtb .sf-dump {
  font-size: 11px;
  background: #2f2f2f;
  border: none;
}

/*# sourceMappingURL=toolbar.css.map */
", "@PimcoreCore/Targeting/toolbar/toolbar.css", "/var/www/html/vendor/pimcore/pimcore/bundles/CoreBundle/Resources/views/Targeting/toolbar/toolbar.css");
    }
}

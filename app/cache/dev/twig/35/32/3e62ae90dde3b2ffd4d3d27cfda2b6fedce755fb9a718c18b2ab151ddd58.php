<?php

/* ZonaComixWebsiteBundle:Website:Dashboard/Referral.html.twig */
class __TwigTemplate_35323e62ae90dde3b2ffd4d3d27cfda2b6fedce755fb9a718c18b2ab151ddd58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ZonaComixWebsiteBundle:Website:Dashboard/Dashboard.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'container' => array($this, 'block_container'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ZonaComixWebsiteBundle:Website:Dashboard/Dashboard.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Escritorio (Programa de referidos) - Zona Comix";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "\t<h2 class=\"sub-header\">Programa de referidos</h2>
\t
\t<p>El programa de referidos funciona de una manera muy sencilla: Por cada usuario que se registre utilizando tu enlace de referencia (el cual se muestra enseguida) obtendrás el 3% de todo lo que el usuario genere con sus publicaciones de comics durante un <strong>año completo</strong> ¡sin necesidad de hacer nada más! Es nuestra forma de agradecerte por ayudarnos a promocionar la página.</p>

\t<p>No hay límite para la cantidad de usuarios que puedes referir o la cantidad de dinero que puedes ganar.</p>
\t
\t<div class=\"form-group\">
\t\t<label for=\"exampleInputEmail1\">URL de referido:</label>
\t\t<div class=\"input-group\">
\t\t\t<input type=\"text\" id=\"url\" class=\"form-control input-lg\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("zona_comix_website_register", array("username" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username", array()))), "html", null, true);
        echo "\" readonly>
\t\t\t<span class=\"input-group-btn\">
\t\t\t\t<button class=\"btn btn-default input-lg\" id=\"select\"><span class=\"glyphicon glyphicon-copy\" aria-hidden=\"true\"></span></button>
\t\t\t</span>
\t\t</div>
\t</div>
";
    }

    // line 23
    public function block_javascript($context, array $blocks = array())
    {
        // line 24
        echo "\t";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
\t
\t<script type=\"text/javascript\">
\t\$(document).ready(function(){
\t\t\$(\"#url\").focus(function() {
\t\t\t\$(this).select();
\t\t});
\t\t\$(\"#select\").click(function() {
\t\t    \$('#url').focus();
\t\t});
\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Dashboard/Referral.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 24,  61 => 23,  50 => 15,  39 => 6,  36 => 5,  30 => 3,);
    }
}

<?php

/* ZonaComixWebsiteBundle:Website:Login.html.twig */
class __TwigTemplate_020806331afb5b3a4eb4db92634014a4d7b0b7ad0161613d3f7fc96d8d9acbfb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::WebsiteBase.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::WebsiteBase.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Identificarse - Zona Comix";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "\t<div class=\"container\">
\t\t<div class=\"row\">
\t        <h1 class=\"page-header\">Identificarse</h1>

\t\t\t";
        // line 10
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 11
            echo "\t\t\t\t<div>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "</div>
\t\t\t";
        }
        // line 13
        echo "
\t\t\t<div class=\"form-container\">
\t\t\t\t<form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\" class=\"form-horizontal\">
\t\t\t\t\t<fieldset>
\t\t\t\t\t\t<!-- Usuario -->
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"col-md-4 control-label\" for=\"username\">Nombre de usuario</label>  
\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t<input id=\"username\" name=\"_username\" placeholder=\"Nombre de usuario\" class=\"form-control input-md\" required type=\"text\" value=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- Contraseña -->
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"col-md-4 control-label\" for=\"password\">Contraseña</label>  
\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t<input id=\"password\" name=\"_password\" placeholder=\"Password\" class=\"form-control input-md\" required type=\"password\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<!-- Recordarme -->
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<label class=\"col-md-4 control-label\" for=\"password\">No cerrar sesión</label>  
\t\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" checked> Recordar mi sesión en esta computadora.<br>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">
\t\t\t\t\t\t<div class=\"form-group text-center\">
\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">Enviar</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</fieldset>
\t\t\t\t</form>
\t\t\t</div>

\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 38,  65 => 21,  56 => 15,  52 => 13,  46 => 11,  44 => 10,  38 => 6,  35 => 5,  29 => 3,);
    }
}

<?php

/* ::WebsiteBase.html.twig */
class __TwigTemplate_3058a17f804e37664302ab980168a42ba7d74aec80a31a095657c73f88455f24 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'navigation' => array($this, 'block_navigation'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"es\">
\t<head>
\t\t<meta charset=\"utf-8\">
\t\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t\t<title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
\t\t";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "\t</head>
\t<body>
\t\t<div class=\"wrapper\">
\t\t\t";
        // line 16
        $this->displayBlock('navigation', $context, $blocks);
        // line 63
        echo "\t\t\t
\t\t\t";
        // line 64
        $this->displayBlock('body', $context, $blocks);
        // line 65
        echo "
\t\t\t";
        // line 66
        $this->displayBlock('javascript', $context, $blocks);
        // line 71
        echo "\t\t\t<div class=\"push\"></div>
\t\t</div>
\t\t<div class=\"footer\">
\t\t\t<a href=\"";
        // line 74
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_home");
        echo "\">Zona Comix</a> &copy; 2015 | Politica de Privacidad | Política de uso | Ventajas de publicar con nosotros | contacto
\t\t</div>
\t</body>
</html>";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Zona Comix - ¡Lee y publica comics gratis!";
    }

    // line 9
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 10
        echo "\t\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\">
\t\t";
    }

    // line 16
    public function block_navigation($context, array $blocks = array())
    {
        // line 17
        echo "\t\t\t<nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
\t\t\t\t<div class=\"navbar-header\">
\t\t\t\t\t<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
\t\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<a class=\"navbar-brand\" href=\"";
        // line 25
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_cover");
        echo "\"><img alt=\"ZonaComix\" height=\"20\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo.png"), "html", null, true);
        echo "\"><!--Zona Comix <small>(Beta)</small> --></a>
\t\t\t\t</div>
\t\t\t\t<div id=\"navbar\" class=\"collapse navbar-collapse\">
\t\t\t\t\t<ul class=\"nav navbar-nav\">
\t\t\t\t\t\t<li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_home");
        echo "\"><span class=\"glyphicon glyphicon-home\" aria-hidden=\"true\"></span> Inicio</a></li>
\t\t\t\t\t\t<li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_explore");
        echo "\"><span class=\"glyphicon glyphicon-screenshot\" aria-hidden=\"true\"></span> Explorar</a></li>
\t\t\t\t\t\t";
        // line 31
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 32
            echo "\t\t\t\t\t\t<li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("zona_comix_website_library");
            echo "\"><span class=\"glyphicon glyphicon-book\" aria-hidden=\"true\"></span> Librería</a></li>
\t\t\t\t\t\t<li><a href=\"";
            // line 33
            echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard");
            echo "\"><span class=\"glyphicon glyphicon-dashboard\" aria-hidden=\"true\"></span> Escritorio</a></li>
\t\t\t\t\t\t<li><a href=\"";
            // line 34
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\"><span class=\"glyphicon glyphicon-off\" aria-hidden=\"true\"></span> Desconectarse</a></li>
\t\t\t\t\t";
        } else {
            // line 36
            echo "\t\t\t\t\t\t<li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("zona_comix_website_register");
            echo "\"><span class=\"glyphicon glyphicon-user\" aria-hidden=\"true\"></span> Registrarse</a></li>
\t\t\t\t\t\t<li><a href=\"";
            // line 37
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\"><span class=\"glyphicon glyphicon-lock\" aria-hidden=\"true\"></span> Identificarse</a></li>
\t\t\t\t\t";
        }
        // line 39
        echo "\t\t\t\t\t\t<!--<li class=\"dropdown\">
\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\"><span class=\"glyphicon glyphicon-th-large\" aria-hidden=\"true\"></span> Apps <span class=\"caret\"></span></a>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" role=\"menu\">
\t\t\t\t\t\t\t\t<li><a href=\"#\">iOS</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Android</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Windows</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Mac</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Linux</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>-->
\t\t\t\t\t</ul>
\t\t\t\t\t<div class=\"col-sm-3\">
\t\t\t\t\t\t<form class=\"navbar-form\" role=\"search\" action=\"";
        // line 51
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_search");
        echo "\" method=\"post\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" placeholder=\"Buscar Comics\" id=\"filter\" name=\"filter\">
\t\t\t\t\t\t\t\t<span class=\"input-group-btn\">
\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-default\"><span class=\"glyphicon glyphicon-search\" aria-hidden=\"true\"></span></button>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</nav>
\t\t\t";
    }

    // line 64
    public function block_body($context, array $blocks = array())
    {
    }

    // line 66
    public function block_javascript($context, array $blocks = array())
    {
        // line 67
        echo "\t\t\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t\t\t<script type=\"text/javascript\" src=\"";
        // line 69
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/main.js"), "html", null, true);
        echo "\"></script>
\t\t\t";
    }

    public function getTemplateName()
    {
        return "::WebsiteBase.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 69,  191 => 68,  186 => 67,  183 => 66,  178 => 64,  162 => 51,  148 => 39,  143 => 37,  138 => 36,  133 => 34,  129 => 33,  124 => 32,  122 => 31,  118 => 30,  114 => 29,  105 => 25,  95 => 17,  92 => 16,  86 => 11,  81 => 10,  78 => 9,  72 => 7,  64 => 74,  59 => 71,  57 => 66,  54 => 65,  52 => 64,  49 => 63,  47 => 16,  42 => 13,  40 => 9,  36 => 8,  32 => 7,  24 => 1,);
    }
}

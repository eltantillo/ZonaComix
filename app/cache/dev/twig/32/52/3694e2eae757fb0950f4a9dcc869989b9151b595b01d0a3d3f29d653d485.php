<?php

/* ZonaComixWebsiteBundle:Website:Dashboard/Dashboard.html.twig */
class __TwigTemplate_32523694e2eae757fb0950f4a9dcc869989b9151b595b01d0a3d3f29d653d485 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::WebsiteBase.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'container' => array($this, 'block_container'),
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
        echo "Escritorio - Zona Comix";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "\t<div class=\"container-fluid\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-sm-3 col-md-2 sidebar\">
\t\t\t\t<ul class=\"nav nav-sidebar\">
\t\t\t\t\t<li><a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_profile");
        echo "\"><span class=\"glyphicon glyphicon-user\" aria-hidden=\"true\"></span> Perfil</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_comics");
        echo "\"><span class=\"glyphicon glyphicon-book\" aria-hidden=\"true\"></span> Comics</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_revenue");
        echo "\"><span class=\"glyphicon glyphicon-piggy-bank\" aria-hidden=\"true\"></span> Balance</a></li>
\t\t\t\t\t<li><a href=\"";
        // line 13
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_referral");
        echo "\"><span class=\"glyphicon glyphicon-usd\" aria-hidden=\"true\"></span> Programa de Referidos</a></li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">
\t\t\t\t<div class=\"row placeholder-nav\">
\t\t\t\t\t<div class=\"col-xs-3 placeholder\">
\t\t\t\t\t\t<a href=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_profile");
        echo "\"><span class=\"glyphicon glyphicon-user glyphiconbig\" aria-hidden=\"true\"></span>
\t\t\t\t\t\t<h4>Perfil</h4></a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-3 placeholder\">
\t\t\t\t\t\t<a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_comics");
        echo "\"><span class=\"glyphicon glyphicon-book glyphiconbig\" aria-hidden=\"true\"></span>
\t\t\t\t\t\t<h4>Comics</h4></a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-3 placeholder\">
\t\t\t\t\t\t<a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_revenue");
        echo "\"><span class=\"glyphicon glyphicon-piggy-bank glyphiconbig\" aria-hidden=\"true\"></span>
\t\t\t\t\t\t<h4>Balance</h4></a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-xs-3 placeholder\">
\t\t\t\t\t\t<a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_referral");
        echo "\"><span class=\"glyphicon glyphicon-usd glyphiconbig\" aria-hidden=\"true\"></span>
\t\t\t\t\t\t<h4>Programa de Referidos</h4></a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        // line 35
        $this->displayBlock('container', $context, $blocks);
        // line 36
        echo "\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    // line 35
    public function block_container($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Dashboard/Dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 35,  96 => 36,  94 => 35,  87 => 31,  80 => 27,  73 => 23,  66 => 19,  57 => 13,  53 => 12,  49 => 11,  45 => 10,  39 => 6,  36 => 5,  30 => 3,);
    }
}

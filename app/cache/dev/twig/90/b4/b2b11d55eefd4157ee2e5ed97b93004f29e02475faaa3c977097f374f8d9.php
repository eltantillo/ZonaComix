<?php

/* ZonaComixWebsiteBundle:Website:Dashboard/Comics.html.twig */
class __TwigTemplate_90b4b2b11d55eefd4157ee2e5ed97b93004f29e02475faaa3c977097f374f8d9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ZonaComixWebsiteBundle:Website:Dashboard/Dashboard.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'container' => array($this, 'block_container'),
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
        echo "Escritorio (Comics) - Zona Comix";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "\t<h2 class=\"sub-header\">Administrar Comics</h2>

\t<div class=\"text-center\">
\t\t<p><a class=\"btn btn-primary btn-lg\" href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_new_comic");
        echo "\" role=\"button\">Nuevo Comic <span class=\"glyphicon glyphicon-book\" aria-hidden=\"true\"></span></a></p>
\t</div>

\t";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comics"]) ? $context["comics"] : $this->getContext($context, "comics")));
        foreach ($context['_seq'] as $context["_key"] => $context["comic"]) {
            // line 13
            echo "\t    <div class=\"col-sm-4 text-center\">
\t        <h3>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["comic"], "title", array()), "html", null, true);
            echo "</h3>
\t        <p><a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_chapters", array("comic" => $this->getAttribute($context["comic"], "title", array()))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("comics/" . $this->getAttribute($context["comic"], "id", array())) . "/cover.jpg")), "html", null, true);
            echo "\" class=\"img-responsive\"></a></p>
\t        <p>
\t        \t<a class=\"btn btn-primary btn-lg\" href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_new_chapter", array("comic" => $this->getAttribute($context["comic"], "title", array()))), "html", null, true);
            echo "\" role=\"button\">Nuevo Capítulo <span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span></a> 
\t        \t<a class=\"btn btn-default btn-lg\" href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_edit_comic", array("comic" => $this->getAttribute($context["comic"], "title", array()))), "html", null, true);
            echo "\" role=\"button\">Editar <span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></a>
\t        </p>
\t    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "    <div class=\"col-xs-12\">
\t    <nav>
\t\t\t<ul class=\"pager\">
\t\t\t\t";
        // line 25
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > 1)) {
            // line 26
            echo "\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_comics", array("page" => ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1))), "html", null, true);
            echo "\">Anterior</a></li>
\t\t\t\t";
        }
        // line 28
        echo "\t\t\t\t";
        if (((isset($context["entries"]) ? $context["entries"] : $this->getContext($context, "entries")) == 10)) {
            // line 29
            echo "\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_dashboard_comics", array("page" => ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1))), "html", null, true);
            echo "\">Siguiente</a></li>
\t\t\t\t";
        }
        // line 31
        echo "\t\t\t</ul>
\t\t</nav>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Dashboard/Comics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 31,  97 => 29,  94 => 28,  88 => 26,  86 => 25,  81 => 22,  71 => 18,  67 => 17,  60 => 15,  56 => 14,  53 => 13,  49 => 12,  43 => 9,  38 => 6,  35 => 5,  29 => 3,);
    }
}

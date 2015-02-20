<?php

/* ZonaComixWebsiteBundle:Website:Dashboard/Profile.html.twig */
class __TwigTemplate_d2bb8b4be8261fd2ca1fa3d19a2b30ce69d67348b481671fe998af46fae4ddde extends Twig_Template
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
        echo "Escritorio (Perfil) - Zona Comix";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "\t<h2 class=\"sub-header\">Perfil</h2>
\t
\t";
        // line 8
        $this->env->getExtension('form')->renderer->setTheme((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), array(0 => "form/fields.html.twig"));
        // line 9
        echo "\t";
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "
\t";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
\t";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "

";
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Dashboard/Profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  49 => 10,  44 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,);
    }
}

<?php

/* ZonaComixWebsiteBundle:Website:Mail/ValidateMail.html.twig */
class __TwigTemplate_5affac8785ee0112da1665831d52bbb6ce8b09f003d242cb822339e87aea81ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ZonaComixWebsiteBundle:Website:Mail/BaseMail.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ZonaComixWebsiteBundle:Website:Mail/BaseMail.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Gracias por registrarte en Zona Comix";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "\tTu cuenta aun se encuentra desactivada. Para completar tu registro por favor pulsa el siguiente botón:

\t<br><br>
\t
\t<a style=\"border-radius:3px;display:inline-block;font-size:14px;font-weight:700;line-height:24px;padding:13px 35px 12px 35px;text-align:center;text-decoration:none;color:#fff;font-family:sans-serif;background-color:#1a232b\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl("zona_comix_website_validate_account", array("username" => (isset($context["username"]) ? $context["username"] : $this->getContext($context, "username")), "key" => (isset($context["key"]) ? $context["key"] : $this->getContext($context, "key")))), "html", null, true);
        echo "\" target=\"_blank\">Validar Cuenta</a>

\t<br><br>

\tNos vemos en Zona Comix.
";
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Mail/ValidateMail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 10,  38 => 6,  35 => 5,  29 => 3,);
    }
}

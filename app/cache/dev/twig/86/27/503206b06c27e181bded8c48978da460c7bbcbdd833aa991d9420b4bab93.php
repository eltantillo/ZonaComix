<?php

/* ZonaComixWebsiteBundle:Website:Cover.html.twig */
class __TwigTemplate_8627503206b06c27e181bded8c48978da460c7bbcbdd833aa991d9420b4bab93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"es\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>Zona Comix - ¡Lee y publica comics gratis!</title>
        <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\">
        <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/cover.css"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
       <div class=\"site-wrapper\">
            <div class=\"site-wrapper-inner\">
                <div class=\"cover-container\">
                    <div class=\"masthead clearfix\">
                        <div class=\"inner\">
                            <h3 class=\"masthead-brand\"><img height=\"35\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/logo.png"), "html", null, true);
        echo "\"> Zona Comix</h3>
                            <nav>
                                <ul class=\"nav masthead-nav\">
                                    <li class=\"active\"><a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_cover");
        echo "\">Portada</a></li>
                                    <li><a href=\"";
        // line 22
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_register");
        echo "\">Registro</a></li>
                                    <li><a href=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("login");
        echo "\">Identificarse</a></li>
                                    <li><a href=\"#\">Contacto</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class=\"inner cover\">
                        <h1 class=\"cover-heading\">¡Lee y publica comics gratis!</h1>
                        <p class=\"lead\">Zona Comix es un sitio completamente gratuito donde puedes leer y publicar comics completamente gratis.</p>
                        <p class=\"lead\">
                            <a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_home");
        echo "\" class=\"btn btn-lg btn-default\">Comenzar</a>
                        </p>
                    </div>
                    <div class=\"mastfoot\">
                        <div class=\"inner\">
                            <p><a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("zona_comix_website_home");
        echo "\">Zona Comix</a> &copy; 2015, los comics son propiedad de sus respectivos creadores.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Cover.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 38,  74 => 33,  61 => 23,  57 => 22,  53 => 21,  47 => 18,  36 => 10,  32 => 9,  28 => 8,  19 => 1,);
    }
}

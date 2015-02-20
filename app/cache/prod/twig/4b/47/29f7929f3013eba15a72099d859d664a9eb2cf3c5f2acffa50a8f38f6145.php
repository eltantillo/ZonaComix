<?php

/* ZonaComixWebsiteBundle:Website:Home.html.twig */
class __TwigTemplate_4b4729f7929f3013eba15a72099d859d664a9eb2cf3c5f2acffa50a8f38f6145 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::WebsiteBase.html.twig");

        $this->blocks = array(
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "\t<div class=\"container\">
\t\t<div class=\"main-container\">
\t\t\t<div class=\"row\">
\t\t\t\t<!-- Right Column -->
\t\t\t\t<div class=\"col-md-3 col-md-push-9 text-center\">
\t\t\t\t\t";
        // line 9
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 10
            echo "\t\t\t\t\t\t<h2>
\t\t\t\t\t\t";
            // line 11
            if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "displayName", array()) == "")) {
                // line 12
                echo "\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            } else {
                // line 14
                echo "\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "displayName", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            }
            // line 16
            echo "\t\t\t\t\t\t</h2>
\t\t\t\t\t\t";
            // line 17
            if (file_exists((("avatars/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array())) . ".jpg"))) {
                // line 18
                echo "\t\t\t\t\t\t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("avatars/" . $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id", array())) . ".jpg")), "html", null, true);
                echo "\" class=\"img-circle small-margin\" height=\"200\">
\t\t\t\t\t\t";
            } else {
                // line 20
                echo "\t\t\t\t\t\t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/guest.png"), "html", null, true);
                echo "\" class=\"img-circle small-margin\" height=\"200\">
\t\t\t\t\t\t";
            }
            // line 22
            echo "\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-xs-6 text-right\">Comics</div>
\t\t\t\t\t\t\t<div class=\"col-xs-6 text-left\">";
            // line 24
            echo twig_escape_filter($this->env, (isset($context["published"]) ? $context["published"] : null), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t<div class=\"col-xs-6 text-right\">Seguidores</div>
\t\t\t\t\t\t\t<div class=\"col-xs-6 text-left\">";
            // line 26
            echo twig_escape_filter($this->env, (isset($context["followers"]) ? $context["followers"] : null), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t<!--<div class=\"col-xs-6 text-right\">Fondos</div>
\t\t\t\t\t\t\t<div class=\"col-xs-6 text-left\">\$150.00</div>-->
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<br>
\t\t\t\t\t";
        }
        // line 32
        echo "\t\t\t\t</div>
\t\t\t\t<!-- Left Column -->
\t\t\t\t";
        // line 34
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 35
            echo "\t\t\t\t\t<div class=\"col-md-9 col-md-pull-3\">
\t\t\t\t";
        } else {
            // line 37
            echo "\t\t\t\t\t<div class=\"col-md-12\">
\t\t\t\t";
        }
        // line 39
        echo "
\t\t\t\t";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["chapters"]) ? $context["chapters"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["chapter"]) {
            // line 41
            echo "

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-3 text-center\">
\t\t\t\t\t\t<a href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_user", array("username" => $this->getAttribute($this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "user", array()), "username", array()))), "html", null, true);
            echo "\" class=\"clean-link\">
\t\t\t\t\t\t";
            // line 46
            if (file_exists((("avatars/" . $this->getAttribute($this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "user", array()), "id", array())) . ".jpg"))) {
                // line 47
                echo "\t\t\t\t\t\t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((("avatars/" . $this->getAttribute($this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "user", array()), "id", array())) . ".jpg")), "html", null, true);
                echo "\" class=\"img-circle\" height=\"100\">
\t\t\t\t\t\t";
            } else {
                // line 49
                echo "\t\t\t\t\t\t\t<img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/guest.png"), "html", null, true);
                echo "\" class=\"img-circle\" height=\"100\">
\t\t\t\t\t\t";
            }
            // line 51
            echo "
\t\t\t\t\t\t<h3>
\t\t\t\t\t\t";
            // line 53
            if (($this->getAttribute($this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "user", array()), "displayName", array()) == "")) {
                // line 54
                echo "\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "user", array()), "username", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            } else {
                // line 56
                echo "\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "user", array()), "displayName", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            }
            // line 58
            echo "\t\t\t\t\t\t</h3></a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-sm-9 text-center bubble\">
\t\t\t\t\t\t<h2><a href=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_comic", array("comic" => $this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "title", array()))), "html", null, true);
            echo "\" class=\"clean-link\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "title", array()), "html", null, true);
            echo "</a>
\t\t\t\t\t\t<span class=\"lead\">( <a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_read_chapter", array("comic" => $this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "title", array()), "chapter" => $this->getAttribute($context["chapter"], "number", array()))), "html", null, true);
            echo "\" class=\"clean-link\">
\t\t\t\t\t\tCapítulo ";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($context["chapter"], "number", array()), "html", null, true);
            echo " 
\t\t\t\t\t\t";
            // line 64
            if (($this->getAttribute($context["chapter"], "title", array()) != "")) {
                // line 65
                echo "\t\t\t\t\t\t - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["chapter"], "title", array()), "html", null, true);
                echo "
\t\t\t\t\t\t";
            }
            // line 67
            echo "\t\t\t\t\t\t</a>
\t\t\t\t\t\t)</span></h2>

\t\t\t\t\t\t<a href=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_read_chapter", array("comic" => $this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "title", array()), "chapter" => $this->getAttribute($context["chapter"], "number", array()))), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl((((("comics/" . $this->getAttribute($this->getAttribute($context["chapter"], "comic", array()), "id", array())) . "/") . $this->getAttribute($context["chapter"], "number", array())) . "/0.jpg")), "html", null, true);
            echo "\" class=\"img-responsive\"></a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chapter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "
\t\t\t\t<div class=\"col-xs-12\">
\t\t\t\t\t<nav>
\t\t\t\t\t\t<ul class=\"pager\">
\t\t\t\t\t\t\t";
        // line 78
        if (((isset($context["page"]) ? $context["page"] : null) > 1)) {
            // line 79
            echo "\t\t\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_home", array("page" => ((isset($context["page"]) ? $context["page"] : null) - 1))), "html", null, true);
            echo "\">Anterior</a></li>
\t\t\t\t\t\t\t";
        }
        // line 81
        echo "\t\t\t\t\t\t\t";
        if (((isset($context["entries"]) ? $context["entries"] : null) == 11)) {
            // line 82
            echo "\t\t\t\t\t\t\t\t<li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("zona_comix_website_home", array("page" => ((isset($context["page"]) ? $context["page"] : null) + 1))), "html", null, true);
            echo "\">Siguiente</a></li>
\t\t\t\t\t\t\t";
        }
        // line 84
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</nav>
\t\t\t\t</div>

\t\t\t\t\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 84,  216 => 82,  213 => 81,  207 => 79,  205 => 78,  199 => 74,  187 => 70,  182 => 67,  176 => 65,  174 => 64,  170 => 63,  166 => 62,  160 => 61,  155 => 58,  149 => 56,  143 => 54,  141 => 53,  137 => 51,  131 => 49,  125 => 47,  123 => 46,  119 => 45,  113 => 41,  109 => 40,  106 => 39,  102 => 37,  98 => 35,  96 => 34,  92 => 32,  83 => 26,  78 => 24,  74 => 22,  68 => 20,  62 => 18,  60 => 17,  57 => 16,  51 => 14,  45 => 12,  43 => 11,  40 => 10,  38 => 9,  31 => 4,  28 => 3,);
    }
}

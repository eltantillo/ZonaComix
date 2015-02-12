<?php

/* ZonaComixWebsiteBundle:Website:Dashboard/Revenue.html.twig */
class __TwigTemplate_b5df01213a251958a07aa2d8a79196f09f2bf4c87d24dcf7b4cb12c95bd8e103 extends Twig_Template
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
        echo "Escritorio (Balance de Cuenta) - Zona Comix";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "\t<h2 class=\"sub-header\">Balance de Cuenta</h2>
\t<div class=\"table-responsive\">
\t\t<table class=\"table\">
\t\t\t<tr class=\"info\">
\t\t\t\t<th>Ganancias</th>
\t\t\t\t<th>Depósitos</th>
\t\t\t\t<th>Gastos</th>
\t\t\t\t<th>Retiros</th>
\t\t\t\t<th>Fondos</th>
\t\t\t</tr>
\t\t\t<tr>
\t\t\t\t<td>\$";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "revenue", array()), "earnings", array()), "html", null, true);
        echo "</td>
\t\t\t\t<td>\$";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "revenue", array()), "deposits", array()), "html", null, true);
        echo "</td>
\t\t\t\t<td>\$";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "revenue", array()), "expenses", array()), "html", null, true);
        echo "</td>
\t\t\t\t<td>\$";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "revenue", array()), "withdrawals", array()), "html", null, true);
        echo "</td>
\t\t\t\t<td>\$";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "revenue", array()), "funds", array()), "html", null, true);
        echo "</td>
\t\t\t</tr>
\t\t</table>
\t</div>
\t<h3 class=\"sub-header\">Detalle</h3>
\t<div class=\"table-responsive\">
\t\t<table class=\"table table-striped\">
\t\t\t<tr>
\t\t\t\t<th>Concepto</th>
\t\t\t\t<th>Lecturas</th>
\t\t\t\t<th>Ganancias</th>
\t\t\t</tr>
\t\t\t";
        // line 33
        $context["totalReadings"] = 0;
        // line 34
        echo "\t\t\t";
        $context["totalRevenue"] = 0;
        // line 35
        echo "\t\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "comics", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["comic"]) {
            // line 36
            echo "\t\t\t<tr>
\t\t\t\t";
            // line 37
            $context["chapterReadings"] = 0;
            // line 38
            echo "\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["comic"], "chapters", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["chapter"]) {
                // line 39
                echo "\t\t\t\t\t";
                $context["chapterReadings"] = ((isset($context["chapterReadings"]) ? $context["chapterReadings"] : $this->getContext($context, "chapterReadings")) + $this->getAttribute($context["chapter"], "readings", array()));
                // line 40
                echo "\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['chapter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "\t\t\t\t";
            $context["totalReadings"] = ((isset($context["totalReadings"]) ? $context["totalReadings"] : $this->getContext($context, "totalReadings")) + (isset($context["chapterReadings"]) ? $context["chapterReadings"] : $this->getContext($context, "chapterReadings")));
            // line 42
            echo "\t\t\t\t";
            $context["totalRevenue"] = ((isset($context["totalRevenue"]) ? $context["totalRevenue"] : $this->getContext($context, "totalRevenue")) + ((isset($context["chapterReadings"]) ? $context["chapterReadings"] : $this->getContext($context, "chapterReadings")) * 0.005));
            // line 43
            echo "
\t\t\t\t<td>Comic: <em>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["comic"], "title", array()), "html", null, true);
            echo "</em></td>
\t\t\t\t<td>";
            // line 45
            echo twig_escape_filter($this->env, (isset($context["chapterReadings"]) ? $context["chapterReadings"] : $this->getContext($context, "chapterReadings")), "html", null, true);
            echo "</td>
\t\t\t\t<td>\$";
            // line 46
            echo twig_escape_filter($this->env, ((isset($context["chapterReadings"]) ? $context["chapterReadings"] : $this->getContext($context, "chapterReadings")) * 0.005), "html", null, true);
            echo "</td>
\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "\t\t\t<tr class=\"active\">
\t\t\t\t<td>Programa de Referidos</td>
\t\t\t\t<td>No disponible</td>
\t\t\t\t<td>\$";
        // line 52
        echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "revenue", array()), "funds", array()) - (isset($context["totalRevenue"]) ? $context["totalRevenue"] : $this->getContext($context, "totalRevenue"))), "html", null, true);
        echo "</td>
\t\t\t</tr>
\t\t\t<tr class=\"success\">
\t\t\t\t<td><strong >Total</strong></td>
\t\t\t\t<td>";
        // line 56
        echo twig_escape_filter($this->env, (isset($context["totalReadings"]) ? $context["totalReadings"] : $this->getContext($context, "totalReadings")), "html", null, true);
        echo "</td>
\t\t\t\t<td>\$";
        // line 57
        echo twig_escape_filter($this->env, (isset($context["totalRevenue"]) ? $context["totalRevenue"] : $this->getContext($context, "totalRevenue")), "html", null, true);
        echo "</td>
\t\t\t</tr>
\t\t</table>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Dashboard/Revenue.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 57,  149 => 56,  142 => 52,  137 => 49,  128 => 46,  124 => 45,  120 => 44,  117 => 43,  114 => 42,  111 => 41,  105 => 40,  102 => 39,  97 => 38,  95 => 37,  92 => 36,  87 => 35,  84 => 34,  82 => 33,  67 => 21,  63 => 20,  59 => 19,  55 => 18,  51 => 17,  38 => 6,  35 => 5,  29 => 3,);
    }
}

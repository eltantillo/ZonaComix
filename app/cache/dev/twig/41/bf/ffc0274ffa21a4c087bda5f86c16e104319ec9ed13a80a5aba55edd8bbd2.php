<?php

/* form/fields.html.twig */
class __TwigTemplate_41bfffc0274ffa21a4c087bda5f86c16e104319ec9ed13a80a5aba55edd8bbd2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_row' => array($this, 'block_form_row'),
            'button_row' => array($this, 'block_button_row'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('form_row', $context, $blocks);
        // line 32
        echo "
";
        // line 33
        $this->displayBlock('button_row', $context, $blocks);
    }

    // line 1
    public function block_form_row($context, array $blocks = array())
    {
        // line 2
        ob_start();
        // line 3
        echo "
\t";
        // line 4
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array()))) {
            // line 5
            echo "\t\t<div class=\"form-group has-error\">
\t";
        } else {
            // line 7
            echo "\t\t<div class=\"form-group\">
\t";
        }
        // line 9
        echo "
\t\t<div class=\"col-md-4  control-label\">
\t\t\t";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label');
        echo "
\t\t</div>
\t\t<div class=\"col-md-4\">
\t\t\t";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget', array("attr" => array("class" => "form-control input-md")));
        echo "
\t\t\t";
        // line 15
        if (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array()))) {
            // line 16
            echo "\t\t\t\t<br>
\t\t\t\t<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
\t\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t\t\t";
            // line 19
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        // line 22
        echo "
\t\t\t";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["attr"]) ? $context["attr"] : $this->getContext($context, "attr")));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 24
            echo "\t\t\t\t";
            if (($context["attrname"] == "help")) {
                // line 25
                echo "\t\t\t\t\t<span class=\"help-block\">";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "</span>
\t\t\t\t";
            }
            // line 27
            echo "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "\t\t</div>
\t</div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 33
    public function block_button_row($context, array $blocks = array())
    {
        // line 34
        echo "<div class=\"form-group text-center\">
\t\t";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget', array("attr" => array("class" => "btn btn-primary")));
        echo "
\t</div>
";
    }

    public function getTemplateName()
    {
        return "form/fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  110 => 35,  107 => 34,  104 => 33,  97 => 28,  91 => 27,  85 => 25,  82 => 24,  78 => 23,  75 => 22,  69 => 19,  64 => 16,  62 => 15,  58 => 14,  52 => 11,  48 => 9,  44 => 7,  40 => 5,  38 => 4,  35 => 3,  33 => 2,  30 => 1,  26 => 33,  23 => 32,  21 => 1,);
    }
}

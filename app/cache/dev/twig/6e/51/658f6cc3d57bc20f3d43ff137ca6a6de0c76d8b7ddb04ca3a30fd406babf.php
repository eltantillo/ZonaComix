<?php

/* ZonaComixWebsiteBundle:Website:Mail/BaseMail.html.twig */
class __TwigTemplate_6e51658f6cc3d57bc20f3d43ff137ca6a6de0c76d8b7ddb04ca3a30fd406babf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<center style=\"display:table;table-layout:fixed;width:100%;background-color:#ffffff\">
\t<table style=\"border-collapse:collapse;border-spacing:0;width:100%\">
\t\t<tbody><tr>
\t\t<td style=\"padding:0;vertical-align:top\">&nbsp;</td>
\t\t\t<td style=\"padding:0;vertical-align:top;padding-top:16px;padding-bottom:16px;\">
\t\t\t\t<div style=\"text-align:center\" align=\"center\">

\t\t\t\t\t<a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getUrl("zona_comix_website_cover");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, (isset($context["logo"]) ? $context["logo"] : $this->getContext($context, "logo")), "html", null, true);
        echo "\"></a>

\t\t\t\t</div>

\t\t\t</td>
\t\t\t<td style=\"padding:0;vertical-align:top\">&nbsp;</td>
\t\t</tr>
\t</tbody></table>
\t
\t\t\t<table style=\"border-collapse:collapse;border-spacing:0;width:100%;background-color:#ffffff\">
\t\t\t\t<tbody><tr>
\t\t\t\t\t<td style=\"padding:0;vertical-align:top\" align=\"center\">
\t\t\t\t\t\t<table style=\"border-collapse:collapse;border-spacing:0;Margin-left:auto;Margin-right:auto;\">
\t\t\t\t\t\t\t<tbody><tr>
\t\t\t\t\t\t\t\t<td style=\"padding:0;vertical-align:top;text-align:left\">
\t\t\t\t\t\t\t\t\t<div><div style=\"font-size:52px;line-height:52px\">&nbsp;</div></div>
\t\t\t\t\t\t\t\t\t\t<table style=\"border-collapse:collapse;border-spacing:0;width:100%\">
\t\t\t\t\t\t\t\t\t\t\t<tbody><tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td style=\"padding:0;vertical-align:top;padding-left:90px;padding-right:90px\">
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t<h1 style=\"Margin-top:0;color:#2e3b4e;font-size:36px;Margin-bottom:24px;font-family:Avenir,sans-serif;text-align:center;line-height:44px\">";
        // line 28
        $this->displayBlock('title', $context, $blocks);
        echo "</h1>
\t\t\t\t<p style=\"Margin-top:0;color:#4e5561;font-size:16px;font-family:sans-serif;line-height:25px;Margin-bottom:25px;font-weight:300;text-align:center;\">";
        // line 29
        $this->displayBlock('body', $context, $blocks);
        echo "</p>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</tbody></table>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t<div style=\"font-size:26px;line-height:26px\">&nbsp;</div>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</tbody></table>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t</tbody></table>
\t\t
\t<table style=\"border-collapse:collapse;border-spacing:0;width:100%;background-color:#ffffff\">
\t\t<tbody><tr>
\t\t\t<td style=\"padding:0;vertical-align:top;padding-top:60px;padding-bottom:55px\" align=\"center\">
\t\t\t\t<table style=\"border-collapse:collapse;border-spacing:0;\">
\t\t\t\t\t<tbody><tr>
\t\t\t\t\t\t<td style=\"padding:0;vertical-align:top;font-size:11px;font-weight:400;letter-spacing:0.01em;line-height:17px;padding-bottom:22px;text-align:left;width:55%;padding-right:5px;color:#b3b3b3;font-family:sans-serif\">
\t\t\t\t\t\t\t<table style=\"border-collapse:collapse;border-spacing:0\">
\t\t\t\t\t\t\t\t<tbody><tr>
\t\t\t\t\t\t\t\t\t<td style=\"padding:0;vertical-align:top;padding-right:15px;padding-bottom:20px;text-transform:uppercase;font-size:11px\">
\t\t\t\t\t\t\t\t\t\t<a style=\"font-weight:700;letter-spacing:0.03em;text-decoration:none;color:#b3b3b3;display:block;line-height:21px;font-family:sans-serif\" href=\"http://preview14120507.cmail2.com/t/t-tw-jkuiltl-l-j/\" target=\"_blank\"><img style=\"border:0\" src=\"https://ci3.googleusercontent.com/proxy/VdlLQYBEyqRBTSroL2-oL35m8yxqYFlNvHs7BLLysGdx-hSu-I7G3cJsgF_iBVBP4jBFSfF53px-DZQZGpixYvSN0FeB37giAtszOMiBp5xd5RwAwKfMQxVWjWc=s0-d-e1-ft#http://i4.cmail2.com/static/eb/master/05-slate/images/twitter-dark.png\" height=\"20\" width=\"25\" align=\"top\"><span>Tweet</span></a>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td style=\"padding:0;vertical-align:top;padding-right:15px;padding-bottom:20px;text-transform:uppercase;font-size:11px\">
\t\t\t\t\t\t\t\t\t\t<a style=\"font-weight:700;letter-spacing:0.03em;text-decoration:none;color:#b3b3b3;display:block;line-height:21px;font-family:sans-serif\" href=\"http://preview14120507.cmail2.com/t/t-fb-jkuiltl-l-t/\" rel=\"cs_facebox\" target=\"_blank\"><img style=\"border:0\" src=\"https://ci5.googleusercontent.com/proxy/B7jkS81m303UNMrN6qKMaaUpZ1ESXUuoRUfLbPUgx-_Zebh8tadMeLo63J1suC0GUSmzoH2R-LNv4xEVrg1gWVZALC9jRyZGpoHic-XqJ15BxLWQOkgsAr9a-7Fp=s0-d-e1-ft#http://i6.cmail2.com/static/eb/master/05-slate/images/facebook-dark.png\" height=\"20\" width=\"25\" align=\"top\"><span>Like</span></a>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td style=\"padding:0;vertical-align:top;padding-right:15px;padding-bottom:20px;text-transform:uppercase;font-size:11px\">
\t\t\t\t\t\t\t\t\t\t<a style=\"font-weight:700;letter-spacing:0.03em;text-decoration:none;color:#b3b3b3;display:block;line-height:21px;font-family:sans-serif\" href=\"http://client.forwardtomyfriend.com/t-l-2AD73FFF-jkuiltl-l-i\" target=\"_blank\"><img style=\"border:0\" src=\"https://ci3.googleusercontent.com/proxy/UIYd7ZORefwCLXpf82GyykLMom7N10b6jF2XSBAPsJRofRpoYy5DFURFEK9IuBU8WIXZB5Wh8-aTmVhVYTgqzvtj4WiZ4MMcRG5KWssCqTsLbtCkXADAUBMEDjg=s0-d-e1-ft#http://i5.cmail2.com/static/eb/master/05-slate/images/forward-dark.png\" height=\"20\" width=\"25\" align=\"top\"><span>Forward</span></a>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t</tr>
\t\t\t\t</tbody></table>
\t\t\t</td>
\t\t</tr>
\t</tbody></table>
</center>";
    }

    // line 28
    public function block_title($context, array $blocks = array())
    {
    }

    // line 29
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ZonaComixWebsiteBundle:Website:Mail/BaseMail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 29,  102 => 28,  59 => 29,  55 => 28,  30 => 8,  21 => 1,);
    }
}

<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/business/templates/page.html.twig */
class __TwigTemplate_285fcce3c633fd419f587e9df25dee737910a3d86e22fc5ed31dc23dfb410a90 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 80, "for" => 83];
        $filters = ["escape" => 76];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 73
        echo "<div id=\"page-wrapper\" class=\"container\">

  <header role=\"banner\" id=\"header\" class=\"clearfix\">
    ";
        // line 76
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "
  </header>

  ";
        // line 80
        echo "  ";
        if (($context["slider"] ?? null)) {
            // line 81
            echo "    <div class=\"flexslider\">
      <ul class=\"slides\">
        ";
            // line 83
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["slider"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["slide"]) {
                // line 84
                echo "          <li>
            <a href=\"";
                // line 85
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["slide"], "url", [])), "html", null, true);
                echo "\"><img src=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["slide"], "src", [])), "html", null, true);
                echo "\"></a>
            <p class=\"flex-caption\">";
                // line 86
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["slide"], "title", [])), "html", null, true);
                echo "</p>
          </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slide'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 89
            echo "      </ul>
    </div>
  ";
        }
        // line 92
        echo "
  ";
        // line 93
        if ($this->getAttribute(($context["page"] ?? null), "homequotes", [])) {
            // line 94
            echo "    <div id=\"home-quote\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "homequotes", [])), "html", null, true);
            echo "</div>
  ";
        }
        // line 96
        echo "
  ";
        // line 98
        echo "  ";
        if ((($this->getAttribute(($context["page"] ?? null), "home_high1", []) || $this->getAttribute(($context["page"] ?? null), "home_high2", [])) || $this->getAttribute(($context["page"] ?? null), "home_high3", []))) {
            // line 99
            echo "    <div id=\"home-highlights\" class=\"row\">
      ";
            // line 100
            if ($this->getAttribute(($context["page"] ?? null), "home_high1", [])) {
                // line 101
                echo "        <div class=\"home-high-1 col-md-4\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "home_high1", [])), "html", null, true);
                echo "</div>
      ";
            }
            // line 103
            echo "      ";
            if ($this->getAttribute(($context["page"] ?? null), "home_high2", [])) {
                // line 104
                echo "        <div class=\"home-high-2 col-md-4\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "home_high2", [])), "html", null, true);
                echo "</div>
      ";
            }
            // line 106
            echo "      ";
            if ($this->getAttribute(($context["page"] ?? null), "home_high3", [])) {
                // line 107
                echo "        <div class=\"home-high-3 col-md-4\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "home_high3", [])), "html", null, true);
                echo "</div>
      ";
            }
            // line 109
            echo "    </div>
  ";
        }
        // line 111
        echo "
  <main id=\"main\" class=\"clearfix\">
    ";
        // line 113
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])) {
            // line 114
            echo "      <div id=\"sidebar-first\" class=\"sidebar ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarfirst"] ?? null)), "html", null, true);
            echo "\" role=\"complementary\">
        ";
            // line 115
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])), "html", null, true);
            echo "
      </div> <!-- /#sidebar-first -->
    ";
        }
        // line 118
        echo "
    <div class=\"";
        // line 119
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["contentlayout"] ?? null)), "html", null, true);
        echo "\" role=\"main\">
      ";
        // line 120
        if ($this->getAttribute(($context["page"] ?? null), "content_top", [])) {
            // line 121
            echo "        <div id=\"content_top\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content_top", [])), "html", null, true);
            echo "</div>
      ";
        }
        // line 123
        echo "
      ";
        // line 124
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "

    </div>";
        // line 127
        echo "
    ";
        // line 128
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])) {
            // line 129
            echo "      <div id=\"sidebar-second\" class=\"sidebar ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarsecond"] ?? null)), "html", null, true);
            echo "\" role=\"complementary\">
        ";
            // line 130
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])), "html", null, true);
            echo "
      </div> <!-- /#sidebar-first -->
    ";
        }
        // line 133
        echo "
  </main>

  ";
        // line 137
        echo "  ";
        if (((($this->getAttribute(($context["page"] ?? null), "footer_first", []) || $this->getAttribute(($context["page"] ?? null), "footer_second", [])) || $this->getAttribute(($context["page"] ?? null), "footer_third", [])) || $this->getAttribute(($context["page"] ?? null), "footer_fourth", []))) {
            // line 138
            echo "    <div id=\"footer-saran\" class=\"row\">
      <div id=\"footer-wrap\">
        ";
            // line 140
            if ($this->getAttribute(($context["page"] ?? null), "footer_first", [])) {
                // line 141
                echo "          <div class=\"footer-1 col-md-3\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_first", [])), "html", null, true);
                echo "</div>
        ";
            }
            // line 143
            echo "        ";
            if ($this->getAttribute(($context["page"] ?? null), "footer_second", [])) {
                // line 144
                echo "          <div class=\"footer-2 col-md-3\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_second", [])), "html", null, true);
                echo "</div>
        ";
            }
            // line 146
            echo "        ";
            if ($this->getAttribute(($context["page"] ?? null), "footer_third", [])) {
                // line 147
                echo "          <div class=\"footer-3 col-md-3\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_third", [])), "html", null, true);
                echo "</div>
        ";
            }
            // line 149
            echo "        ";
            if ($this->getAttribute(($context["page"] ?? null), "footer_fourth", [])) {
                // line 150
                echo "          <div class=\"footer-4 col-md-3\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_fourth", [])), "html", null, true);
                echo "</div>
        ";
            }
            // line 152
            echo "      </div>
    </div>
    <div class=\"clear\"></div>
  ";
        }
        // line 156
        echo "
  ";
        // line 157
        if ($this->getAttribute(($context["page"] ?? null), "footer", [])) {
            // line 158
            echo "    <footer role=\"contentinfo\">
      ";
            // line 159
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true);
            echo "
    </footer>
  ";
        }
        // line 162
        echo "
  <div class=\"clear\"></div>
  <div id=\"copyright\">
  Copyright © 2017
  </div>

</div>";
    }

    public function getTemplateName()
    {
        return "themes/business/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  273 => 162,  267 => 159,  264 => 158,  262 => 157,  259 => 156,  253 => 152,  247 => 150,  244 => 149,  238 => 147,  235 => 146,  229 => 144,  226 => 143,  220 => 141,  218 => 140,  214 => 138,  211 => 137,  206 => 133,  200 => 130,  195 => 129,  193 => 128,  190 => 127,  185 => 124,  182 => 123,  176 => 121,  174 => 120,  170 => 119,  167 => 118,  161 => 115,  156 => 114,  154 => 113,  150 => 111,  146 => 109,  140 => 107,  137 => 106,  131 => 104,  128 => 103,  122 => 101,  120 => 100,  117 => 99,  114 => 98,  111 => 96,  105 => 94,  103 => 93,  100 => 92,  95 => 89,  86 => 86,  80 => 85,  77 => 84,  73 => 83,  69 => 81,  66 => 80,  60 => 76,  55 => 73,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/business/templates/page.html.twig", "/app/countries/themes/business/templates/page.html.twig");
    }
}

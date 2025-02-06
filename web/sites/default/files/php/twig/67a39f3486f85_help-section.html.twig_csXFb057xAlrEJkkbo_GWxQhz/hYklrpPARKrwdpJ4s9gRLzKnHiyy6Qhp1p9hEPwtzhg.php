<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* core/themes/claro/templates/classy/misc/help-section.html.twig */
class __TwigTemplate_d2afbdb6ba815a366d0c43a3fdc968dd extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 15
        yield "<div class=\"clearfix\">
  <h2>";
        // line 16
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "</h2>
  <p>";
        // line 17
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["description"] ?? null), "html", null, true);
        yield "</p>
  ";
        // line 18
        if (($context["links"] ?? null)) {
            // line 19
            yield "    ";
            // line 20
            yield "    ";
            $context["size"] = (int) floor((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["links"] ?? null)) / 4));
            // line 21
            yield "    ";
            if (((($context["size"] ?? null) * 4) < Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["links"] ?? null)))) {
                // line 22
                yield "      ";
                $context["size"] = (($context["size"] ?? null) + 1);
                // line 23
                yield "    ";
            }
            // line 24
            yield "
    ";
            // line 26
            yield "    ";
            $context["count"] = 0;
            // line 27
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["links"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 28
                yield "      ";
                if ((($context["count"] ?? null) == 0)) {
                    // line 29
                    yield "        ";
                    // line 30
                    yield "        <div class=\"layout-column layout-column--quarter\"><ul>
      ";
                }
                // line 32
                yield "      <li>";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["link"], "html", null, true);
                yield "</li>
      ";
                // line 33
                $context["count"] = (($context["count"] ?? null) + 1);
                // line 34
                yield "      ";
                if ((($context["count"] ?? null) >= ($context["size"] ?? null))) {
                    // line 35
                    yield "        ";
                    // line 36
                    yield "        ";
                    $context["count"] = 0;
                    // line 37
                    yield "        </ul></div>
      ";
                }
                // line 39
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['link'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            yield "
    ";
            // line 42
            yield "    ";
            if ((($context["count"] ?? null) > 0)) {
                // line 43
                yield "      </ul></div>
    ";
            }
            // line 45
            yield "  ";
        } else {
            // line 46
            yield "    <p>";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["empty"] ?? null), "html", null, true);
            yield "</p>
  ";
        }
        // line 48
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["title", "description", "links", "empty"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/claro/templates/classy/misc/help-section.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  135 => 48,  129 => 46,  126 => 45,  122 => 43,  119 => 42,  116 => 40,  110 => 39,  106 => 37,  103 => 36,  101 => 35,  98 => 34,  96 => 33,  91 => 32,  87 => 30,  85 => 29,  82 => 28,  77 => 27,  74 => 26,  71 => 24,  68 => 23,  65 => 22,  62 => 21,  59 => 20,  57 => 19,  55 => 18,  51 => 17,  47 => 16,  44 => 15,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/themes/claro/templates/classy/misc/help-section.html.twig", "/var/www/html/web/core/themes/claro/templates/classy/misc/help-section.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 18, "set" => 20, "for" => 27);
        static $filters = array("escape" => 16, "length" => 20);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for'],
                ['escape', 'length'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

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
}

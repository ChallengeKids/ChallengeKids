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

/* @NelmioApiDoc/Redocly/index.html.twig */
class __TwigTemplate_320bb30ecfc49be1f6e8e8f90d462607 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'meta' => [$this, 'block_meta'],
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'swagger_data' => [$this, 'block_swagger_data'],
            'swagger_ui' => [$this, 'block_swagger_ui'],
            'javascripts' => [$this, 'block_javascripts'],
            'swagger_initialization' => [$this, 'block_swagger_initialization'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@NelmioApiDoc/Redocly/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@NelmioApiDoc/Redocly/index.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    ";
        // line 4
        yield from $this->unwrap()->yieldBlock('meta', $context, $blocks);
        // line 8
        yield "    <title>";
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>

    ";
        // line 10
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 22
        yield "
    ";
        // line 23
        yield from $this->unwrap()->yieldBlock('swagger_data', $context, $blocks);
        // line 27
        yield "</head>
<body>
    ";
        // line 29
        yield from $this->unwrap()->yieldBlock('swagger_ui', $context, $blocks);
        // line 32
        yield "
    ";
        // line 33
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 36
        yield "
    ";
        // line 37
        yield $this->extensions['Nelmio\ApiDocBundle\Render\Html\GetNelmioAsset']->__invoke((isset($context["assets_mode"]) || array_key_exists("assets_mode", $context) ? $context["assets_mode"] : (function () { throw new RuntimeError('Variable "assets_mode" does not exist.', 37, $this->source); })()), "init-redocly-ui.js");
        yield "

    ";
        // line 39
        yield from $this->unwrap()->yieldBlock('swagger_initialization', $context, $blocks);
        // line 46
        yield "</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        return; yield '';
    }

    // line 4
    public function block_meta($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta"));

        // line 5
        yield "        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 8
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["swagger_data"]) || array_key_exists("swagger_data", $context) ? $context["swagger_data"] : (function () { throw new RuntimeError('Variable "swagger_data" does not exist.', 8, $this->source); })()), "spec", [], "any", false, false, false, 8), "info", [], "any", false, false, false, 8), "title", [], "any", false, false, false, 8), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 10
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 11
        yield "        <link
                href=\"https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto:300,400,700\"
                rel=\"stylesheet\"
        />
        <style>
            body {
                margin: 0;
                padding: 0;
            }
        </style>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 23
    public function block_swagger_data($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "swagger_data"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "swagger_data"));

        // line 24
        yield "        ";
        // line 25
        yield "        <script id=\"swagger-data\" type=\"application/json\">";
        yield json_encode((isset($context["swagger_data"]) || array_key_exists("swagger_data", $context) ? $context["swagger_data"] : (function () { throw new RuntimeError('Variable "swagger_data" does not exist.', 25, $this->source); })()), 65);
        yield "</script>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 29
    public function block_swagger_ui($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "swagger_ui"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "swagger_ui"));

        // line 30
        yield "        <div id=\"swagger-ui\"></div>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 33
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 34
        yield "        ";
        yield $this->extensions['Nelmio\ApiDocBundle\Render\Html\GetNelmioAsset']->__invoke((isset($context["assets_mode"]) || array_key_exists("assets_mode", $context) ? $context["assets_mode"] : (function () { throw new RuntimeError('Variable "assets_mode" does not exist.', 34, $this->source); })()), "redocly/redoc.standalone.js");
        yield "
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 39
    public function block_swagger_initialization($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "swagger_initialization"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "swagger_initialization"));

        // line 40
        yield "        <script type=\"text/javascript\">
            window.onload = () => {
                loadRedocly(";
        // line 42
        yield json_encode((isset($context["redocly_config"]) || array_key_exists("redocly_config", $context) ? $context["redocly_config"] : (function () { throw new RuntimeError('Variable "redocly_config" does not exist.', 42, $this->source); })()), 81);
        yield ");
            };
        </script>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "@NelmioApiDoc/Redocly/index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  265 => 42,  261 => 40,  251 => 39,  237 => 34,  227 => 33,  215 => 30,  205 => 29,  191 => 25,  189 => 24,  179 => 23,  158 => 11,  148 => 10,  128 => 8,  115 => 5,  105 => 4,  92 => 46,  90 => 39,  85 => 37,  82 => 36,  80 => 33,  77 => 32,  75 => 29,  71 => 27,  69 => 23,  66 => 22,  64 => 10,  58 => 8,  56 => 4,  51 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    {% block meta %}
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
    {% endblock meta %}
    <title>{% block title %}{{ swagger_data.spec.info.title }}{% endblock title %}</title>

    {% block stylesheets %}
        <link
                href=\"https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto:300,400,700\"
                rel=\"stylesheet\"
        />
        <style>
            body {
                margin: 0;
                padding: 0;
            }
        </style>
    {% endblock stylesheets %}

    {% block swagger_data %}
        {# json_encode(65) is for JSON_UNESCAPED_SLASHES|JSON_HEX_TAG to avoid JS XSS #}
        <script id=\"swagger-data\" type=\"application/json\">{{ swagger_data|json_encode(65)|raw }}</script>
    {% endblock swagger_data %}
</head>
<body>
    {% block swagger_ui %}
        <div id=\"swagger-ui\"></div>
    {% endblock %}

    {% block javascripts %}
        {{ nelmioAsset(assets_mode, 'redocly/redoc.standalone.js') }}
    {% endblock javascripts %}

    {{ nelmioAsset(assets_mode, 'init-redocly-ui.js') }}

    {% block swagger_initialization %}
        <script type=\"text/javascript\">
            window.onload = () => {
                loadRedocly({{ redocly_config|json_encode(81)|raw }});
            };
        </script>
    {% endblock swagger_initialization %}
</body>
</html>
", "@NelmioApiDoc/Redocly/index.html.twig", "C:\\Users\\Ahmad\\Desktop\\ChallengeKids\\backendKids\\vendor\\nelmio\\api-doc-bundle\\templates\\Redocly\\index.html.twig");
    }
}

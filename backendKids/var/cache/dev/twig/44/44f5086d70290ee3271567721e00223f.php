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

/* kid/show.html.twig */
class __TwigTemplate_bba124676f556a38a43a7bb5b6d0d3ec extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "kid/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "kid/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "kid/show.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Kid";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <h1>Kid</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>FirstName</th>
                <td>";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 16, $this->source); })()), "firstName", [], "any", false, false, false, 16), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>SecondName</th>
                <td>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 20, $this->source); })()), "secondName", [], "any", false, false, false, 20), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 24, $this->source); })()), "email", [], "any", false, false, false, 24), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 28, $this->source); })()), "password", [], "any", false, false, false, 28), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>RegistrationDate</th>
                <td>";
        // line 32
        ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 32, $this->source); })()), "registrationDate", [], "any", false, false, false, 32)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 32, $this->source); })()), "registrationDate", [], "any", false, false, false, 32), "Y-m-d H:i:s"), "html", null, true)) : (yield ""));
        yield "</td>
            </tr>
            <tr>
                <th>BirthDate</th>
                <td>";
        // line 36
        ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 36, $this->source); })()), "birthDate", [], "any", false, false, false, 36)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 36, $this->source); })()), "birthDate", [], "any", false, false, false, 36), "Y-m-d H:i:s"), "html", null, true)) : (yield ""));
        yield "</td>
            </tr>
            <tr>
                <th>Interests</th>
                <td>";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 40, $this->source); })()), "interests", [], "any", false, false, false, 40), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Friends</th>
                <td>";
        // line 44
        ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 44, $this->source); })()), "friends", [], "any", false, false, false, 44)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 44, $this->source); })()), "friends", [], "any", false, false, false, 44)), "html", null, true)) : (yield ""));
        yield "</td>
            </tr>
            <tr>
                <th>Points</th>
                <td>";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 48, $this->source); })()), "points", [], "any", false, false, false, 48), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Level</th>
                <td>";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 52, $this->source); })()), "level", [], "any", false, false, false, 52), "html", null, true);
        yield "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 57
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_kid_index");
        yield "\">back to list</a>

    <a href=\"";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_kid_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid"]) || array_key_exists("kid", $context) ? $context["kid"] : (function () { throw new RuntimeError('Variable "kid" does not exist.', 59, $this->source); })()), "id", [], "any", false, false, false, 59)]), "html", null, true);
        yield "\">edit</a>

    ";
        // line 61
        yield Twig\Extension\CoreExtension::include($this->env, $context, "kid/_delete_form.html.twig");
        yield "
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
        return "kid/show.html.twig";
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
        return array (  186 => 61,  181 => 59,  176 => 57,  168 => 52,  161 => 48,  154 => 44,  147 => 40,  140 => 36,  133 => 32,  126 => 28,  119 => 24,  112 => 20,  105 => 16,  98 => 12,  90 => 6,  80 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Kid{% endblock %}

{% block body %}
    <h1>Kid</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ kid.id }}</td>
            </tr>
            <tr>
                <th>FirstName</th>
                <td>{{ kid.firstName }}</td>
            </tr>
            <tr>
                <th>SecondName</th>
                <td>{{ kid.secondName }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ kid.email }}</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>{{ kid.password }}</td>
            </tr>
            <tr>
                <th>RegistrationDate</th>
                <td>{{ kid.registrationDate ? kid.registrationDate|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th>BirthDate</th>
                <td>{{ kid.birthDate ? kid.birthDate|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th>Interests</th>
                <td>{{ kid.interests }}</td>
            </tr>
            <tr>
                <th>Friends</th>
                <td>{{ kid.friends ? kid.friends|json_encode : '' }}</td>
            </tr>
            <tr>
                <th>Points</th>
                <td>{{ kid.points }}</td>
            </tr>
            <tr>
                <th>Level</th>
                <td>{{ kid.level }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_kid_index') }}\">back to list</a>

    <a href=\"{{ path('app_kid_edit', {'id': kid.id}) }}\">edit</a>

    {{ include('kid/_delete_form.html.twig') }}
{% endblock %}
", "kid/show.html.twig", "C:\\Users\\Ahmad\\Desktop\\ChallengeKids\\backendKids\\templates\\kid\\show.html.twig");
    }
}

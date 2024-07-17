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

/* kid_parent/show.html.twig */
class __TwigTemplate_fef801f5b58485ba5443ddd5abed0c72 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "kid_parent/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "kid_parent/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "kid_parent/show.html.twig", 1);
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

        yield "KidParent";
        
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
        yield "    <h1>KidParent</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>FirstName</th>
                <td>";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 16, $this->source); })()), "firstName", [], "any", false, false, false, 16), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>SecondName</th>
                <td>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 20, $this->source); })()), "secondName", [], "any", false, false, false, 20), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 24, $this->source); })()), "email", [], "any", false, false, false, 24), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 28, $this->source); })()), "password", [], "any", false, false, false, 28), "html", null, true);
        yield "</td>
            </tr>
            <tr>
                <th>RegistrationDate</th>
                <td>";
        // line 32
        ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 32, $this->source); })()), "registrationDate", [], "any", false, false, false, 32)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 32, $this->source); })()), "registrationDate", [], "any", false, false, false, 32), "Y-m-d H:i:s"), "html", null, true)) : (yield ""));
        yield "</td>
            </tr>
            <tr>
                <th>BirthDate</th>
                <td>";
        // line 36
        ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 36, $this->source); })()), "birthDate", [], "any", false, false, false, 36)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 36, $this->source); })()), "birthDate", [], "any", false, false, false, 36), "Y-m-d H:i:s"), "html", null, true)) : (yield ""));
        yield "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 41
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_kid_parent_index");
        yield "\">back to list</a>

    <a href=\"";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_kid_parent_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["kid_parent"]) || array_key_exists("kid_parent", $context) ? $context["kid_parent"] : (function () { throw new RuntimeError('Variable "kid_parent" does not exist.', 43, $this->source); })()), "id", [], "any", false, false, false, 43)]), "html", null, true);
        yield "\">edit</a>

    ";
        // line 45
        yield Twig\Extension\CoreExtension::include($this->env, $context, "kid_parent/_delete_form.html.twig");
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
        return "kid_parent/show.html.twig";
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
        return array (  158 => 45,  153 => 43,  148 => 41,  140 => 36,  133 => 32,  126 => 28,  119 => 24,  112 => 20,  105 => 16,  98 => 12,  90 => 6,  80 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}KidParent{% endblock %}

{% block body %}
    <h1>KidParent</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ kid_parent.id }}</td>
            </tr>
            <tr>
                <th>FirstName</th>
                <td>{{ kid_parent.firstName }}</td>
            </tr>
            <tr>
                <th>SecondName</th>
                <td>{{ kid_parent.secondName }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ kid_parent.email }}</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>{{ kid_parent.password }}</td>
            </tr>
            <tr>
                <th>RegistrationDate</th>
                <td>{{ kid_parent.registrationDate ? kid_parent.registrationDate|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
            <tr>
                <th>BirthDate</th>
                <td>{{ kid_parent.birthDate ? kid_parent.birthDate|date('Y-m-d H:i:s') : '' }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_kid_parent_index') }}\">back to list</a>

    <a href=\"{{ path('app_kid_parent_edit', {'id': kid_parent.id}) }}\">edit</a>

    {{ include('kid_parent/_delete_form.html.twig') }}
{% endblock %}
", "kid_parent/show.html.twig", "C:\\Users\\Ahmad\\Desktop\\ChallengeKids\\backendKids\\templates\\kid_parent\\show.html.twig");
    }
}

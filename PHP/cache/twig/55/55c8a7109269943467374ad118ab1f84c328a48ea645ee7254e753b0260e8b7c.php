<?php

/* index.twig */
class __TwigTemplate_e4fd1d3ae315a7ed6a2d118d8cd3d4c7172f93fc463dba2abfc06068287f389e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "index.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div class=\"row\">
    <div class=\"col\">
        <h5>Каталог</h5>
    </div>
</div>
<div class=\"container mt-4\">
    <div class=\"card-columns\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cars"]) || array_key_exists("cars", $context) ? $context["cars"] : (function () { throw new Twig_Error_Runtime('Variable "cars" does not exist.', 12, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["car"]) {
            // line 13
            echo "
        <div class=\"card border-danger mt-2\">
            <div class=\"card-block\">
                <img class=\"card-img-top img-fluid\" src=\"";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["img_folder"]) || array_key_exists("img_folder", $context) ? $context["img_folder"] : (function () { throw new Twig_Error_Runtime('Variable "img_folder" does not exist.', 16, $this->getSourceContext()); })()), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["car"], "img_path", array()), "html", null, true);
            echo "\" alt=\"Card image cap\">
            </div>
            <div class=\"card-block px-3\">
                <div class=\"card-body\">
                    ";
            // line 21
            echo "                    <h4 class=\"text-center\"> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["car"], "name", array()), "html", null, true);
            echo "</h4>
                    <ul class=\"list-group list-group-flush\">
                        ";
            // line 29
            echo "                    </ul>

                    <div class=\"text-center\">
                        <a href=\"/car/";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["car"], "ID", array()), "html", null, true);
            echo "\" class=\"btn btn-danger mt-3\">Подробнее</a>
                    </div>

                </div>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 39,  69 => 32,  64 => 29,  58 => 21,  50 => 16,  45 => 13,  41 => 12,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.twig\" %}
{#  Content here  #}
{% block content %}

<div class=\"row\">
    <div class=\"col\">
        <h5>Каталог</h5>
    </div>
</div>
<div class=\"container mt-4\">
    <div class=\"card-columns\">
        {% for car in cars %}

        <div class=\"card border-danger mt-2\">
            <div class=\"card-block\">
                <img class=\"card-img-top img-fluid\" src=\"{{img_folder}}{{ car.img_path }}\" alt=\"Card image cap\">
            </div>
            <div class=\"card-block px-3\">
                <div class=\"card-body\">
                    {# <h5 class=\"text-center\"> {{ car.get_category_name }}</h5> #}
                    <h4 class=\"text-center\"> {{ car.name }}</h4>
                    <ul class=\"list-group list-group-flush\">
                        {# {% for values in car.get_char_values %} {% for value in values %}
                        <li class=\"row list-group-item\">
                            {% if value.unit %} {{ value.name }}, {{value.unit}} {% else %} {{value.name}} {% endif %}
                            <strong class=\"float-right\">{{ value.value }}</strong>
                        </li>
                        {% endfor %} {% endfor %} #}
                    </ul>

                    <div class=\"text-center\">
                        <a href=\"/car/{{ car.ID }}\" class=\"btn btn-danger mt-3\">Подробнее</a>
                    </div>

                </div>
            </div>
        </div>
        {% endfor %}
    </div>
</div>
{% endblock %}", "index.twig", "D:\\git\\site\\PHP\\src\\views\\index.twig");
    }
}

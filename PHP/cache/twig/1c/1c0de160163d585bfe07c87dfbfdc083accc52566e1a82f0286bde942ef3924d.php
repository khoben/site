<?php

/* admin-page.twig */
class __TwigTemplate_8d16ddbaaf59024f0bed1b906526c014466e9fbc61c43b3b196d743b2ed1e059 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "admin-page.twig", 1);
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

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"row\">
    <div class=\"col\">
        <h5>Администрирование</h5>
    </div>
    <div class=\"col\">
        <a href=\"/add\" class=\"btn btn-outline-primary float-right\" role=\"button\">Добавить</a>
    </div>
</div>
<div class=\"container\">
    <div class=\"card-deck-wrapper\">
        <div class=\"row\">
            ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cars"]) || array_key_exists("cars", $context) ? $context["cars"] : (function () { throw new Twig_Error_Runtime('Variable "cars" does not exist.', 16, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["car"]) {
            // line 17
            echo "            <div class=\"col-lg-4 col-md-6 col-sm-8 col-xs-10 mt-4\">
                <div class=\"card border-danger h-100 justify-content-center\">
                    <div class=\"card-block\">
                        <img class=\"card-img-top\" src=\"";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["img_folder"]) || array_key_exists("img_folder", $context) ? $context["img_folder"] : (function () { throw new Twig_Error_Runtime('Variable "img_folder" does not exist.', 20, $this->getSourceContext()); })()), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["car"], "img_path", array()), "html", null, true);
            echo "\" alt=\"Card image cap\">
                    </div>
                    <div class=\"card-block px-3\">
                        <div class=\"card-body\">
                            ";
            // line 25
            echo "                            <h4 class=\"text-center\"> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["car"], "name", array()), "html", null, true);
            echo "</h4>
                            <ul class=\"list-group list-group-flush\">
                                ";
            // line 33
            echo "                            </ul>

                            <div class=\"row justify-content-center\">
                                <a href=\"/car/";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["car"], "ID", array()), "html", null, true);
            echo "\" class=\"btn btn-danger mt-3 ml-3\">Подробнее</a>
                                <a href=\"/edit/car/";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["car"], "ID", array()), "html", null, true);
            echo "\" title=\"Редактировать\" class=\"btn btn-outline-success mt-3 ml-3\">
                                    <i class=\"fas fa-edit\"></i>
                                </a>
                                <a href=\"/delete/car/";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["car"], "ID", array()), "html", null, true);
            echo "\" title=\"Удалить\" class=\"btn btn-outline-primary mt-3 ml-3\">
                                    <i class=\"fas fa-trash\"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin-page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 50,  82 => 40,  76 => 37,  72 => 36,  67 => 33,  61 => 25,  53 => 20,  48 => 17,  44 => 16,  31 => 5,  28 => 4,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.twig\" %}
{# Content here #}

{% block content %}
<div class=\"row\">
    <div class=\"col\">
        <h5>Администрирование</h5>
    </div>
    <div class=\"col\">
        <a href=\"/add\" class=\"btn btn-outline-primary float-right\" role=\"button\">Добавить</a>
    </div>
</div>
<div class=\"container\">
    <div class=\"card-deck-wrapper\">
        <div class=\"row\">
            {% for car in cars %}
            <div class=\"col-lg-4 col-md-6 col-sm-8 col-xs-10 mt-4\">
                <div class=\"card border-danger h-100 justify-content-center\">
                    <div class=\"card-block\">
                        <img class=\"card-img-top\" src=\"{{ img_folder }}{{ car.img_path }}\" alt=\"Card image cap\">
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

                            <div class=\"row justify-content-center\">
                                <a href=\"/car/{{ car.ID }}\" class=\"btn btn-danger mt-3 ml-3\">Подробнее</a>
                                <a href=\"/edit/car/{{ car.ID }}\" title=\"Редактировать\" class=\"btn btn-outline-success mt-3 ml-3\">
                                    <i class=\"fas fa-edit\"></i>
                                </a>
                                <a href=\"/delete/car/{{ car.ID }}\" title=\"Удалить\" class=\"btn btn-outline-primary mt-3 ml-3\">
                                    <i class=\"fas fa-trash\"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    </div>
</div>
{% endblock %}", "admin-page.twig", "D:\\git\\site\\PHP\\src\\views\\admin-page.twig");
    }
}

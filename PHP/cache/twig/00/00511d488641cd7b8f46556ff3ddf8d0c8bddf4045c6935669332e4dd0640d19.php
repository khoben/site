<?php

/* item-page.twig */
class __TwigTemplate_44812c979b24f62c12d8d91af9f15bbe90bfd9b94a7ec8be1aa940e975c97114 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "item-page.twig", 1);
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
        echo "<div class=\"row\">
    <div class=\"col\">
        <h5>Каталог / Подробнее</h5>
    </div>
    <div class=\"col\">
        <a href=\"/edit/car/";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 9, $this->getSourceContext()); })()), "ID", array()), "html", null, true);
        echo "\" class=\"btn btn-outline-primary float-right\" role=\"button\">Редактировать</a>
    </div>
</div>
<div class=\"row mt-5\">
    <div class=\"col-xs-12 col-sm-10 col-md-6 mb-3\">
        <ul class=\"list-group list-group-flush\">
            <li class=\"list-group-item\">
                <h4 class=\"text-center\">";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 16, $this->getSourceContext()); })()), "category", array()), "html", null, true);
        echo "</h4>
                <h3 class=\"text-center\">";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 17, $this->getSourceContext()); })()), "name", array()), "html", null, true);
        echo "</h3>
            </li>
            ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mods"]) || array_key_exists("mods", $context) ? $context["mods"] : (function () { throw new Twig_Error_Runtime('Variable "mods" does not exist.', 19, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mod"]) {
            // line 20
            echo "            <li class=\"row list-group-item\">
                ";
            // line 21
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "unit", array())) {
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "name", array()), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "unit", array()), "html", null, true);
                echo " ";
            } else {
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "name", array()), "html", null, true);
                echo " ";
            }
            // line 22
            echo "                <strong class=\"float-right\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "value", array()), "html", null, true);
            echo "</strong>
            </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mod'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "        </ul>
    </div>
    <div class=\"col-xs-12 col-sm-8 col-md-5 ml-4\">

        <div class=\"card\">
            <img class=\"card-img-top\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["img_folder"]) || array_key_exists("img_folder", $context) ? $context["img_folder"] : (function () { throw new Twig_Error_Runtime('Variable "img_folder" does not exist.', 30, $this->getSourceContext()); })()), "html", null, true);
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 30, $this->getSourceContext()); })()), "img_path", array()), "html", null, true);
        echo "\" alt=\"Card image cap\">
        </div>

    </div>
</div>
<div class=\"row mt-3\">
    <h3 class=\"text-center\">Технические характеристики ";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 36, $this->getSourceContext()); })()), "name", array()), "html", null, true);
        echo "</h3>

    <div class=\"card mt-3\">
        <div class=\"card-body\">
            <p class=\"card-text\">Рабочая масса, кг 3140 Масса без ковша, кг 2990 Объем ковша, м3 0.46 Грузоподъемность, кг 750 Опрокидывающая
                нагрузка, кг 1500 Мак скорость движения, км/ч 12 Тяговое усилие, кН 18 Расход топлива, л/час 4,5 Емкость
                аккумулятора, км/ч 12/90 В/Ач Емкость аккумулятора, км/ч 12/90 В/Ач Полная мощность двигателя, кВт/лс 38/51
                Масса двигателя, кг 184 Трансмиссия Гидростатическая Привод Роликовая цепь со звездочками в картере цепной
                передачи Тормоза Гидравлические встроенные в гидромотор Шины 10/75x15.3
            </p>
        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "item-page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 36,  93 => 30,  86 => 25,  76 => 22,  64 => 21,  61 => 20,  57 => 19,  52 => 17,  48 => 16,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.twig\" %}

{% block content %}
<div class=\"row\">
    <div class=\"col\">
        <h5>Каталог / Подробнее</h5>
    </div>
    <div class=\"col\">
        <a href=\"/edit/car/{{ car.ID }}\" class=\"btn btn-outline-primary float-right\" role=\"button\">Редактировать</a>
    </div>
</div>
<div class=\"row mt-5\">
    <div class=\"col-xs-12 col-sm-10 col-md-6 mb-3\">
        <ul class=\"list-group list-group-flush\">
            <li class=\"list-group-item\">
                <h4 class=\"text-center\">{{ car.category }}</h4>
                <h3 class=\"text-center\">{{ car.name }}</h3>
            </li>
            {% for mod in mods %}
            <li class=\"row list-group-item\">
                {% if mod.unit %} {{ mod.name }}, {{mod.unit}} {% else %} {{mod.name}} {% endif %}
                <strong class=\"float-right\">{{ mod.value }}</strong>
            </li>
            {% endfor %}
        </ul>
    </div>
    <div class=\"col-xs-12 col-sm-8 col-md-5 ml-4\">

        <div class=\"card\">
            <img class=\"card-img-top\" src=\"{{img_folder}}{{ car.img_path }}\" alt=\"Card image cap\">
        </div>

    </div>
</div>
<div class=\"row mt-3\">
    <h3 class=\"text-center\">Технические характеристики {{ car.name }}</h3>

    <div class=\"card mt-3\">
        <div class=\"card-body\">
            <p class=\"card-text\">Рабочая масса, кг 3140 Масса без ковша, кг 2990 Объем ковша, м3 0.46 Грузоподъемность, кг 750 Опрокидывающая
                нагрузка, кг 1500 Мак скорость движения, км/ч 12 Тяговое усилие, кН 18 Расход топлива, л/час 4,5 Емкость
                аккумулятора, км/ч 12/90 В/Ач Емкость аккумулятора, км/ч 12/90 В/Ач Полная мощность двигателя, кВт/лс 38/51
                Масса двигателя, кг 184 Трансмиссия Гидростатическая Привод Роликовая цепь со звездочками в картере цепной
                передачи Тормоза Гидравлические встроенные в гидромотор Шины 10/75x15.3
            </p>
        </div>
    </div>
</div>

{% endblock %}", "item-page.twig", "D:\\git\\site\\PHP\\src\\views\\item-page.twig");
    }
}

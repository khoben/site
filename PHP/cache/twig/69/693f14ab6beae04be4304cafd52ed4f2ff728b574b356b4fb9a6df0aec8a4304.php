<?php

/* edit-page.twig */
class __TwigTemplate_3cfb4fdd331d33c83d043491af9a59e7fe18c2bb1cb5be2647031e683626b0ec extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "edit-page.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"row\">
    <div class=\"col\">
        <h5>";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["pageName"]) || array_key_exists("pageName", $context) ? $context["pageName"] : (function () { throw new Twig_Error_Runtime('Variable "pageName" does not exist.', 5, $this->getSourceContext()); })()), "html", null, true);
        echo "</h5>
    </div>
</div>

<div class=\"row justify-content-center mt-3\">
    ";
        // line 10
        if (array_key_exists("img_folder", $context)) {
            // line 11
            echo "    <div class=\"col-xs-4 col-md-5\">
        <div class=\"card\">
            <img class=\"card-img-top\" src=\"";
            // line 13
            echo twig_escape_filter($this->env, (isset($context["img_folder"]) || array_key_exists("img_folder", $context) ? $context["img_folder"] : (function () { throw new Twig_Error_Runtime('Variable "img_folder" does not exist.', 13, $this->getSourceContext()); })()), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 13, $this->getSourceContext()); })()), "img_path", array()), "html", null, true);
            echo "\" alt=\"Card image cap\">
        </div>
    </div>
    ";
        }
        // line 17
        echo "  
    <div class=\"col\">
        <form role=\"form\" method=\"POST\" enctype=\"multipart/form-data\" class=\"row form\">
            <div class=\"col-12 mb-4\">
                <h2>Основное</h2>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label mr-3\">Наименование</label>
                        <div class=\"col-sm-5\">
                            <input name=\"name\" type=\"text\" class=\"form-control\" value=\"";
        // line 25
        if (array_key_exists("car", $context)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 25, $this->getSourceContext()); })()), "name", array()), "html", null, true);
        }
        echo "\">
                        </div>
                </div>
                <div class=\"row mb-3\">
                        <label class=\"col-sm-3 col-form-label mr-3\">Изображение</label>
                        <div class=\"col-sm-5\">
                            <input name = \"img_path\" id=\"imageInput\" type=\"file\" value=\"";
        // line 31
        if (array_key_exists("car", $context)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 31, $this->getSourceContext()); })()), "img_path", array()), "html", null, true);
        }
        echo "\" />
                        </div>
                </div>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label mr-3\">Производитель</label>
                        <div class=\"col-sm-5\">
                            <select name=\"mark\" class=\"selectpicker\" data-style=\"btn-outline-dark\">
                                    ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["marks"]) || array_key_exists("marks", $context) ? $context["marks"] : (function () { throw new Twig_Error_Runtime('Variable "marks" does not exist.', 38, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mark"]) {
            // line 39
            echo "                                      <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mark"], "ID", array()), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mark"], "name", array()), "html", null, true);
            echo " </option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mark'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                            </select>
                        </div>
                </div>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label mr-3\">Категория</label>
                        <div class=\"col-sm-5\">
                            <select name=\"category\" class=\"selectpicker\" data-style=\"btn-outline-dark\">
                                    ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new Twig_Error_Runtime('Variable "categories" does not exist.', 48, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 49
            echo "                                      <option  value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["category"], "ID", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["category"], "name", array()), "html", null, true);
            echo "</option>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                            </select>

                        </div>
                </div>
                
            </div>
            <div class=\"col-12 mb-4\">
                <h3>Характеристики</h3>
                ";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["mods"]) || array_key_exists("mods", $context) ? $context["mods"] : (function () { throw new Twig_Error_Runtime('Variable "mods" does not exist.', 59, $this->getSourceContext()); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["mod"]) {
            // line 60
            echo "                    <div class=\"form-group row\">
                        <label class=\"col-sm-4 col-form-label mr-3\">";
            // line 61
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "name", array()), "html", null, true);
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "unit", array(), "any", true, true)) {
                echo ", ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "unit", array()), "html", null, true);
                echo " ";
            }
            echo "</label>
                        <div class=\"col-sm-5\">
                            <input name=\"";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "ID_char_name", array()), "html", null, true);
            echo "\" type=\"text\" class=\"form-control\" 
                            value=\"";
            // line 64
            if (array_key_exists("exist_mods", $context)) {
                $context["break"] = false;
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["exist_mods"]) || array_key_exists("exist_mods", $context) ? $context["exist_mods"] : (function () { throw new Twig_Error_Runtime('Variable "exist_mods" does not exist.', 64, $this->getSourceContext()); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["exist_mod"]) {
                    if ( !(isset($context["break"]) || array_key_exists("break", $context) ? $context["break"] : (function () { throw new Twig_Error_Runtime('Variable "break" does not exist.', 64, $this->getSourceContext()); })())) {
                        if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["exist_mod"], "name", array()) == twig_get_attribute($this->env, $this->getSourceContext(), $context["mod"], "name", array()))) {
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["exist_mod"], "value", array()), "html", null, true);
                            $context["break"] = true;
                        }
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exist_mod'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            echo "\">
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mod'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "                <button type=\"submit\" class=\"btn btn-primary\">";
        echo twig_escape_filter($this->env, (isset($context["btnName"]) || array_key_exists("btnName", $context) ? $context["btnName"] : (function () { throw new Twig_Error_Runtime('Variable "btnName" does not exist.', 68, $this->getSourceContext()); })()), "html", null, true);
        echo "</button>
            </div>
        </form>
    </div>
</div>

";
    }

    // line 76
    public function block_javascripts($context, array $blocks = array())
    {
        // line 77
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo " 

";
        // line 79
        if (array_key_exists("car", $context)) {
            // line 80
            echo "<script>
        jQuery(document).ready(function(\$){
            jQuery('select[name=mark]').val(";
            // line 82
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 82, $this->getSourceContext()); })()), "ID_mark", array()), "html", null, true);
            echo ");
            jQuery('select[name=category]').val(";
            // line 83
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), (isset($context["car"]) || array_key_exists("car", $context) ? $context["car"] : (function () { throw new Twig_Error_Runtime('Variable "car" does not exist.', 83, $this->getSourceContext()); })()), "ID_category", array()), "html", null, true);
            echo ");
            jQuery('.selectpicker').selectpicker('refresh');
            jQuery('.selectpicker').selectpicker('refresh');
    });
</script>
";
        }
        // line 89
        echo "
";
    }

    public function getTemplateName()
    {
        return "edit-page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 89,  216 => 83,  212 => 82,  208 => 80,  206 => 79,  201 => 77,  198 => 76,  186 => 68,  161 => 64,  157 => 63,  147 => 61,  144 => 60,  140 => 59,  130 => 51,  119 => 49,  115 => 48,  106 => 41,  95 => 39,  91 => 38,  79 => 31,  68 => 25,  58 => 17,  50 => 13,  46 => 11,  44 => 10,  36 => 5,  32 => 3,  29 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.twig\" %}
{% block content %}
<div class=\"row\">
    <div class=\"col\">
        <h5>{{pageName}}</h5>
    </div>
</div>

<div class=\"row justify-content-center mt-3\">
    {% if img_folder is defined %}
    <div class=\"col-xs-4 col-md-5\">
        <div class=\"card\">
            <img class=\"card-img-top\" src=\"{{ img_folder }}{{car.img_path}}\" alt=\"Card image cap\">
        </div>
    </div>
    {% endif %}
  
    <div class=\"col\">
        <form role=\"form\" method=\"POST\" enctype=\"multipart/form-data\" class=\"row form\">
            <div class=\"col-12 mb-4\">
                <h2>Основное</h2>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label mr-3\">Наименование</label>
                        <div class=\"col-sm-5\">
                            <input name=\"name\" type=\"text\" class=\"form-control\" value=\"{% if car is defined %}{{car.name}}{% endif %}\">
                        </div>
                </div>
                <div class=\"row mb-3\">
                        <label class=\"col-sm-3 col-form-label mr-3\">Изображение</label>
                        <div class=\"col-sm-5\">
                            <input name = \"img_path\" id=\"imageInput\" type=\"file\" value=\"{% if car is defined %}{{ car.img_path }}{% endif %}\" />
                        </div>
                </div>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label mr-3\">Производитель</label>
                        <div class=\"col-sm-5\">
                            <select name=\"mark\" class=\"selectpicker\" data-style=\"btn-outline-dark\">
                                    {% for mark in marks %}
                                      <option value=\"{{mark.ID}}\"> {{ mark.name }} </option>
                                    {% endfor %}
                            </select>
                        </div>
                </div>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label mr-3\">Категория</label>
                        <div class=\"col-sm-5\">
                            <select name=\"category\" class=\"selectpicker\" data-style=\"btn-outline-dark\">
                                    {% for category in categories %}
                                      <option  value=\"{{category.ID}}\">{{ category.name }}</option>
                                    {% endfor %}
                            </select>

                        </div>
                </div>
                
            </div>
            <div class=\"col-12 mb-4\">
                <h3>Характеристики</h3>
                {% for mod in mods %}
                    <div class=\"form-group row\">
                        <label class=\"col-sm-4 col-form-label mr-3\">{{ mod.name }}{% if mod.unit is defined %}, {{mod.unit}} {% endif %}</label>
                        <div class=\"col-sm-5\">
                            <input name=\"{{ mod.ID_char_name }}\" type=\"text\" class=\"form-control\" 
                            value=\"{% if exist_mods is defined %}{% set break = false %}{% for exist_mod in exist_mods if not break %}{% if exist_mod.name == mod.name %}{{exist_mod.value}}{% set break = true %}{% endif %}{% endfor %}{% endif %}\">
                        </div>
                    </div>
                {% endfor %}
                <button type=\"submit\" class=\"btn btn-primary\">{{btnName}}</button>
            </div>
        </form>
    </div>
</div>

{% endblock %}

{% block javascripts %}
{{ parent() }} 

{% if car is defined %}
<script>
        jQuery(document).ready(function(\$){
            jQuery('select[name=mark]').val({{car.ID_mark}});
            jQuery('select[name=category]').val({{car.ID_category}});
            jQuery('.selectpicker').selectpicker('refresh');
            jQuery('.selectpicker').selectpicker('refresh');
    });
</script>
{% endif %}

{% endblock %}", "edit-page.twig", "D:\\git\\site\\PHP\\src\\views\\edit-page.twig");
    }
}

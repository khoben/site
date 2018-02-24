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
    
    <div class=\"col-xs-4 col-md-5\">
        <div class=\"card\">
            <img class=\"card-img-top\" src=\"\" alt=\"Card image cap\">
        </div>
    </div>
  
    <div class=\"col\">
        <form role=\"form\" method=\"POST\" enctype=\"multipart/form-data\" class=\"row form\">
            <div class=\"col-12 mb-4\">
                <h2>Основное</h2>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label\">Наименование</label>
                        <div class=\"col-sm-5\">
                            <input name=\"name\" type=\"text\" class=\"form-control\" value=\"АНТ750\">
                        </div>
                </div>
                <div class=\"row mb-3\">
                        <label class=\"col-sm-3 col-form-label\">Изображение</label>
                        <div class=\"col-sm-5\">
                            <input id=\"imageInput\" type=\"file\" style=\"display:none;\" />
                            <input name=\"img_path\" class=\"btn btn-primary\" type=\"button\" value=\"Выбрать изображение\" onclick=\"document.getElementById('imageInput').click();\" />
                        </div>
                </div>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label\">Производитель</label>
                        <div class=\"col-sm-5\">
                            <input name=\"mark\" type=\"text\" class=\"form-control\" value=\"АНТ750\">
                        </div>
                </div>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label\">Категория</label>
                        <div class=\"col-sm-5\">
                            <input name=\"category\" type=\"text\" class=\"form-control\" value=\"АНТ750\">
                        </div>
                </div>
                
            </div>
            <div class=\"col-12 mb-4\">
                <h3>Характеристики</h3>
                
                <button type=\"submit\" class=\"btn btn-primary\">";
        // line 51
        echo twig_escape_filter($this->env, (isset($context["btnName"]) || array_key_exists("btnName", $context) ? $context["btnName"] : (function () { throw new Twig_Error_Runtime('Variable "btnName" does not exist.', 51, $this->getSourceContext()); })()), "html", null, true);
        echo "</button>
            </div>
        </form>
    </div>
</div>


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
        return array (  84 => 51,  35 => 5,  31 => 3,  28 => 2,  11 => 1,);
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
    
    <div class=\"col-xs-4 col-md-5\">
        <div class=\"card\">
            <img class=\"card-img-top\" src=\"\" alt=\"Card image cap\">
        </div>
    </div>
  
    <div class=\"col\">
        <form role=\"form\" method=\"POST\" enctype=\"multipart/form-data\" class=\"row form\">
            <div class=\"col-12 mb-4\">
                <h2>Основное</h2>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label\">Наименование</label>
                        <div class=\"col-sm-5\">
                            <input name=\"name\" type=\"text\" class=\"form-control\" value=\"АНТ750\">
                        </div>
                </div>
                <div class=\"row mb-3\">
                        <label class=\"col-sm-3 col-form-label\">Изображение</label>
                        <div class=\"col-sm-5\">
                            <input id=\"imageInput\" type=\"file\" style=\"display:none;\" />
                            <input name=\"img_path\" class=\"btn btn-primary\" type=\"button\" value=\"Выбрать изображение\" onclick=\"document.getElementById('imageInput').click();\" />
                        </div>
                </div>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label\">Производитель</label>
                        <div class=\"col-sm-5\">
                            <input name=\"mark\" type=\"text\" class=\"form-control\" value=\"АНТ750\">
                        </div>
                </div>
                <div class=\"form-group row\">
                        <label class=\"col-sm-3 col-form-label\">Категория</label>
                        <div class=\"col-sm-5\">
                            <input name=\"category\" type=\"text\" class=\"form-control\" value=\"АНТ750\">
                        </div>
                </div>
                
            </div>
            <div class=\"col-12 mb-4\">
                <h3>Характеристики</h3>
                
                <button type=\"submit\" class=\"btn btn-primary\">{{btnName}}</button>
            </div>
        </form>
    </div>
</div>


{% endblock %}", "edit-page.twig", "D:\\git\\site\\PHP\\src\\views\\edit-page.twig");
    }
}

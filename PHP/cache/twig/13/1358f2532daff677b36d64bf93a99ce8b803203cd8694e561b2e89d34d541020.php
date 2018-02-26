<?php

/* base.twig */
class __TwigTemplate_8f75f0babc0a609f0af9908f824b8382f74ae30aae925738333c64233c4813c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">

<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"/static/css/bootstrap/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"/static/css/mystyles.css\">
    <link rel=\"stylesheet\" href=\"/static/css/fontawesome/fontawesome-all.css\">
    <link rel=\"stylesheet\" href=\"/static/css/bootstrap-select/bootstrap-select.css\">
    <link rel=\"shortcut icon\" href=\"/static/assets/favicon.png\" type=\"image/png\">

    <title>Каталог спец. техники</title>
</head>

<body>

    <!-- Image and text -->
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light ml-auto\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"/\">
                <img src=\"/static/assets/logo.png\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\"> Каталог спец. техники
            </a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\"
                aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse ml-3\" id=\"navbarNav\">
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item active\">
                        <a class=\"nav-link\" href=\"/\">Главная
                            <span class=\"sr-only\">(текущая)</span>
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/admin\">Администрирование</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class=\"container mt-3\">
        ";
        // line 47
        $this->displayBlock('content', $context, $blocks);
        // line 48
        echo "    </div>

    <footer>
        <nav class=\"footer bg-light text-center\">© 2014-20!8. Каталог спец. техники</nav>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    ";
        // line 56
        $this->displayBlock('javascripts', $context, $blocks);
        // line 62
        echo "    
</body>

</html>";
    }

    // line 47
    public function block_content($context, array $blocks = array())
    {
        echo " ";
    }

    // line 56
    public function block_javascripts($context, array $blocks = array())
    {
        // line 57
        echo "        <script src=\"/static/js/jquery/jquery.min.js\"></script>
        <script src=\"/static/js/popper/popper.js\"></script>
        <script src=\"/static/js/bootstrap/bootstrap.min.js\"></script>
        <script src=\"/static/js/bootstrap-select/bootstrap-select.js\"></script>
    ";
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function getDebugInfo()
    {
        return array (  99 => 57,  96 => 56,  90 => 47,  83 => 62,  81 => 56,  71 => 48,  69 => 47,  21 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html lang=\"en\">

<head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"/static/css/bootstrap/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"/static/css/mystyles.css\">
    <link rel=\"stylesheet\" href=\"/static/css/fontawesome/fontawesome-all.css\">
    <link rel=\"stylesheet\" href=\"/static/css/bootstrap-select/bootstrap-select.css\">
    <link rel=\"shortcut icon\" href=\"/static/assets/favicon.png\" type=\"image/png\">

    <title>Каталог спец. техники</title>
</head>

<body>

    <!-- Image and text -->
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light ml-auto\">
        <div class=\"container\">
            <a class=\"navbar-brand\" href=\"/\">
                <img src=\"/static/assets/logo.png\" width=\"30\" height=\"30\" class=\"d-inline-block align-top\" alt=\"\"> Каталог спец. техники
            </a>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\"
                aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse ml-3\" id=\"navbarNav\">
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item active\">
                        <a class=\"nav-link\" href=\"/\">Главная
                            <span class=\"sr-only\">(текущая)</span>
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/admin\">Администрирование</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class=\"container mt-3\">
        {% block content %} {% endblock %}
    </div>

    <footer>
        <nav class=\"footer bg-light text-center\">© 2014-20!8. Каталог спец. техники</nav>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {% block javascripts %}
        <script src=\"/static/js/jquery/jquery.min.js\"></script>
        <script src=\"/static/js/popper/popper.js\"></script>
        <script src=\"/static/js/bootstrap/bootstrap.min.js\"></script>
        <script src=\"/static/js/bootstrap-select/bootstrap-select.js\"></script>
    {% endblock %}
    
</body>

</html>", "base.twig", "D:\\git\\site\\PHP\\src\\views\\base.twig");
    }
}

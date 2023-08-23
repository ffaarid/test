<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fruit Classification</title>
    <meta name="description" content="Pest Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="/static/pestectionadmin/assets/css/normalize.css">
    <link rel="stylesheet" href="/static/pestectionadmin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/pestectionadmin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/static/pestectionadmin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/static/pestectionadmin/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="/static/pestectionadmin/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="/static/pestectionadmin/assets/scss/style.css">
    <link rel="stylesheet" href="/static/pestectionadmin/assets/scss/widgets.css">
    <link href="/static/pestectionadmin/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Fruit Clasification</a>
                <a class="navbar-brand hidden" href="./"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url_for('main') }}"> <i class="menu-icon fa fa-home"></i>Home </a>
                    </li>
                    <li>
                        <a href="{{ url_for('cnn') }}"> <i class="menu-icon fa fa-fort-awesome"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="{{ url_for('classification') }}"> <i class="menu-icon fa fa-image"></i>Image
                            Classification </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/static/pestectionadmin/images/admin.jpg"
                                alt="User Avatar">
                        </a>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
        {% block content %}

        {% endblock %}
    </div>
    <!--/.col-->


    <!--/.col-->


    <!--/.col-->


    <!--/.col-->


    <!-- Right Panel -->

    <script src="/static/pestectionadmin/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="/static/pestectionadmin/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="/static/pestectionadmin/assets/js/popper.min.js"></script>
    <script src="/static/pestectionadmin/assets/js/plugins.js"></script>
    <script src="/static/pestectionadmin/assets/js/main.js"></script>
    <script src="/static/pestectionadmin/assets/js/lib/chart-js/Chart.bundle.js"></script>


    <script src="/static/pestectionadmin/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="/static/pestectionadmin/assets/js/dashboard.js"></script>
    <script src="/static/pestectionadmin/assets/js/widgets.js"></script>
    <script src="/static/pestectionadmin/assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="/static/pestectionadmin/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="/static/pestectionadmin/assets/js/lib/vector-map/jquery.vmap.sampledata.js">
    </script>
    <script src="/static/pestectionadmin/assets/js/lib/vector-map/country/jquery.vmap.world.js">
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        (function ($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
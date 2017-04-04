<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Armoire</title>
        <!-- The normalizing css stylesheet -->
        <link rel="stylesheet" href="css/normalize.min.css">
        
        <!-- The main css stylesheet -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Modernizr script import -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        
        <!-- Google Polymer import -->
        <link href="bower_components/polymer/polymer.html" rel="import">
        
        <!-- Element Imports -->
        <link href="bower_components/paper-toolbar/paper-toolbar.html" rel="import">
        <link href="bower_components/paper-item/paper-item.html" rel="import">
        <link href="bower_components/paper-button/paper-button.html" rel="import">
        
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        
        <style>
        
            #toolbar {
               background-color: #005736; 
            }
            
            a {
                color: white;
            }
        
        </style>
        
    </head>
    <body>
        
        <paper-toolbar id="toolbar">

            <paper-item>Armoire - The flexible web portal solution</paper-item>
            <span class="flex"></span>

            @if (Auth::guest())
            <a href="{{ url('/login') }}" tabindex="-1">
                <paper-button onclick="">Login</paper-button>
            </a>
            <a href="{{ url('/register') }}" tabindex="-1">
                <paper-button onclick="">Register</paper-button>
            </a>
            @else
            <a href="{{ url('/home') }}" tabindex="-1">
                <paper-button onclick="">Home</paper-button>
            </a>
            @endif
            
        </paper-toolbar>
            
        <div class="content">
            <div>
            </div>
        </div>
        
    </body>
</html>

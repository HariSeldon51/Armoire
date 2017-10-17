<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Armoire - The elegant web portal</title>
        <!-- The normalizing css stylesheet -->
        <link rel="stylesheet" href="css/normalize.min.css">

        <!-- The main css stylesheet -->
        <link href="bower_components/paper-styles/default-theme.html" rel="import">
        <link href="elements/armoire-theme.html" rel="import">

        <!-- Modernizr script import -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <!-- Google Polymer import -->
        <link href="bower_components/polymer/polymer.html" rel="import">

         <!-- Element Imports -->
        <script src="bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>
        <link href="bower_components/iron-flex-layout/iron-flex-layout-classes.html" rel="import" >
        <link href="bower_components/paper-drawer-panel/paper-drawer-panel.html" rel="import">
        <link href="bower_components/paper-header-panel/paper-header-panel.html" rel="import">
        <link href="bower_components/paper-item/paper-item.html" rel="import">
        <link href="bower_components/paper-toolbar/paper-toolbar.html" rel="import">
        <link href="bower_components/paper-icon-button/paper-icon-button.html" rel="import">
        <link href="bower_components/paper-button/paper-button.html" rel="import">
        <link href="bower_components/iron-icons/iron-icons.html" rel="import">
        <link href="bower_components/iron-icons/device-icons.html" rel="import">
        <link href="bower_components/iron-icons/hardware-icons.html" rel="import">
        <link href="bower_components/iron-icons/social-icons.html" rel="import">
        <link href="bower_components/iron-icon/iron-icon.html" rel="import">
        <link href="bower_components/paper-menu/paper-menu.html" rel="import">
        <link href="bower_components/paper-menu/paper-submenu.html" rel="import">
        <link href="bower_components/paper-menu-button/paper-menu-button.html" rel="import">
        <link href="bower_components/paper-card/paper-card.html" rel="import">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito|Nova+Round" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

            function gotoPage(el, pg) {

                if (el.tagName.toLowerCase() == "paper-button") {

                    // Wait for ripple to finish.
                    el.addEventListener('transitionend', function(e) {
                        location.href = pg;
                    });

                } else if (el.tagName.toLowerCase() == "paper-item") {
                    location.href = pg;
                }
            }
        </script>

        <style is="custom-style" include="iron-flex iron-flex-alignment iron-flex-reverse iron-flex-factors iron-positioning armoire-theme"></style>

        <style is="custom-style">

            a {
                color: #2770a2;
            }

            a:visited {
                color: #a25a27;
            }

            .big {
                --iron-icon-height: 32px;
                --iron-icon-width: 32px;
                margin-right: 0;
            }

            .toolbar-tools.paper-toolbar > .title {
                margin-left: 0;

                font-family: 'Nova Round', 'Open Sans';
                text-transform: uppercase;
            }

            .dialog {
                --paper-card-header-color: #fff;
            }

            .logo {
                margin: 2em 1em 1em;
                justify-content: center;
            }

            .slogan {
                margin: 0 0 2em;
                flex-direction: column;
            }

            .logo-large {
                width: 5em;
                fill: #ffffff;
            }

            .logo-title {
                margin-left: 1em;
                align-self: center;

                font-family: 'Nova Round', 'Open Sans';
                text-transform: uppercase;
            }

            paper-card {
                --paper-card-header-text: {
                    font-family: 'Nunito', sans-serif;                    
                }
            }
            

            .cls-1 {
                fill: #26a69a;
            }

            .flex {
                display: flex;
            }

            .center {
                text-align: center;
            }
        </style>

    </head>

    <body fullbleed unresolved> <!-- Tells Polymer the body should take up the whole page and not be displayed until all items are resolved. -->

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @unless (Auth::guest())
        <paper-drawer-panel id="body">
            <paper-header-panel drawer mode="waterfall">
                <div class="paper-header layout horizontal end" id="nav-drawer">

                    <div class="flex layout horizontal self end">
                        <span class="label flex">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>

                        <paper-menu-button>
                            <paper-icon-button icon="arrow-drop-down" class="dropdown-trigger"></paper-icon-button>
                            <paper-menu class="dropdown-content">
                                <paper-item>Profile</paper-item>
                                <paper-item>Settings</paper-item>
                                <paper-item onclick="document.getElementById('logout-form').submit();">Logout</paper-item>
                            </paper-menu>
                        </paper-menu-button>
                    </div>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>

                <!-- Insert modules here -->
                @yield('modules')

            </paper-header-panel>

            <paper-header-panel class="flex main" main>

            @endunless

                <paper-toolbar class="primary-color">

                    @unless (Auth::guest())
                    <paper-icon-button icon="menu" paper-drawer-toggle></paper-icon-button>
                    @endunless

                    @if (Auth::guest())
                    <a href="/" class="no-link" tabindex="-1">
                    @endif
                        <iron-icon class="big" src="img/Armoire-Logo_Small.svg"></iron-icon>
                    @if (Auth::guest())
                    </a>
                    @endif
                    <paper-item class="title">Armoire</paper-item>

                    @unless (Auth::guest())
                    <paper-icon-button icon="search"></paper-icon-button>
                    <paper-icon-button icon="help-outline"></paper-icon-button>
                    @endunless

                </paper-toolbar>

                <div class="container

                @if (Auth::guest())
                    welcome
                @endif
                ">

                @yield('content')

                </div>

            @unless (Auth::guest())

            </paper-header-panel>

        </paper-drawer-panel>
        @endunless

        <!-- Scripts -->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script> -->

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>

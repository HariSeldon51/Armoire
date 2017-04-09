<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Armoire - The elegant web portal</title>
        <!-- The normalizing css stylesheet -->
        <link rel="stylesheet" href="css/normalize.min.css">
        
        <!-- The main css stylesheet -->
        <link href="bower_components/paper-styles/default-theme.html" rel="import">

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
        
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
            
            function gotoPage(el, pg) {
                // Wait for ripple to finish.
                el.addEventListener('transitionend', function(e) {
                    location.href = pg;
                });
            }
        </script>
        
        <style is="custom-style" include="iron-flex iron-flex-alignment iron-flex-reverse iron-flex-factors iron-positioning">
      
            /* CSS rules for your element */
            
            body {
                background-color: var(--paper-grey-100);
            }
            
            .container {
                width: 600px;
                margin: 1em auto 1em;
            }
            
            .panel {
                padding: 1em;
            }
            
            paper-header-panel.main {
                background-color: #FAFAFA;
            }
            
            .paper-submenu > paper-menu {
                margin-left: 1em;
            }
            
            paper-submenu < paper-menu.main-menu {
                margin-left: 0;
            }
            
            paper-item {
                cursor: pointer;
            }
            
            paper-item.iron-selected {
                color: #009688;
                font-weight: normal;
            }
            
            paper-menu > * {
                cursor: pointer;
            }
            
            iron-icon {
                margin-right: 1em;
            }
            
            paper-button {
                color: white;
                text-decoration: none;
                background-color: var(--primary-color);
            }
            
            paper-button.loud {
                background-color: var(--accent-color);
            }
            
            .label {
                padding: 1em;
            }

            #nav-drawer {
                background-image: url('img/navdrawerBG.png');
                color: #ffffff;
                
                height: 225px;
                box-sizing: border-box;
                
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

                    <paper-item onclick="gotoPage(this, '/')">Armoire</paper-item>
                    
                    @unless (Auth::guest())
                    <paper-icon-button icon="search"></paper-icon-button>
                    <paper-icon-button icon="help-outline"></paper-icon-button>
                    @endunless
                    
                </paper-toolbar>
                
                    <div class="container">

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

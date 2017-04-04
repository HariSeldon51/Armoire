<?php

// Make sure you have Composer's autoload file included
require_once '../vendor/autoload.php';

class ConnectBuilder {
    
    //configure the database connection using Pixie Query Builder (included in the autoload)
    static $config = array('driver'    => 'mysql', // Db driver
                    'host'      => 'localhost',
                    'database'  => 'customer assets',
                    'username'  => 'clientreview',
                    'password'  => 'idex!2015',
                    'charset'   => 'utf8', // Optional
                    'collation' => 'utf8_unicode_ci', // Optional
                    'prefix'    => '', // Table prefix, optional
    );
    
    public static function buildConnection($name) {    
        new \Pixie\Connection('mysql', ConnectBuilder::$config, $name);
        //return QB;
    }    
}
   
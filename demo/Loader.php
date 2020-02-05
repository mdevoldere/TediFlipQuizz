<?php
session_start();

require (__DIR__.'/Debug.php');

class Loader
{
    static $route = [];

    static $url = null;

    public static function autoload($classname) // ie $classname = 'Models\Db'
    {
        $classname = str_replace('\\', '/', $classname); // ie $classname = 'Models/Db'

        $path = (__DIR__.'/'.$classname.'.php');

        try {
            require_once $path;
        }
        catch(Exception $e) {
            exit($e->getMessage());
        }
    }

    public static function getApiRoute() {

    }

    public static function run()
    {
        spl_autoload_register('Loader::autoload');


    }
}


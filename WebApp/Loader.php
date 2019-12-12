<?php


class Loader
{
    public static function autoload($classname) // 'Models\Db' / 'Router'
    {
        $classname = str_replace('\\', '/', $classname); // Models/Db

        $path = __DIR__.'/'.$classname.'.php';

        try 
        {
            require_once $path;
        }
        catch(Exception $e) 
        {
            exit($e->getMessage());
        }
    }
}


spl_autoload_register('Loader::autoload');
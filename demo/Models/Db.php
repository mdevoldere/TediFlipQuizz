<?php

namespace Models;

class Db
{    
    private static $instance = null;

    private function __construct() {}


    public static function getDb()
    {
        if(Db::$instance === null) {
            try {
                $options = [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES => false
                ];
                
                Db::$instance = new \PDO(
                    'mysql:host=localhost;port=3306;dbname=flipquiz;charset=utf8',
                    'crm', 
                    'azer', 
                    $options
                );
            }
            catch(\PDOException $e) {
                exit('Error Connecting Database');
            }
        }

        return Db::$instance;
    }

    
}

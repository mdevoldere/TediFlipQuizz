<?php

namespace Models;

class Db
{
    protected static $instance = null;

    public static function getInstance()
    {
        if(self::$instance === null) {
            try {
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULAUTE_PREPARES => false
                ];
    
                self::$instance = new PDO('mysql:host=localhost;dbname=flipquizz;charset=utf8', 'root', '', $options);
            }
            catch(\PDOException $e) {
                exit('Error connecting database.');
            }
            
        }

        return self::$instance;
    }
}
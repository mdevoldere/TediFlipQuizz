<?php

class App 
{
    public static function run()
    {
        try {
            $router = new Router();
            $model = $router->getController();
            $model = mb_convert_case($model, MB_CASE_TITLE);
            $id = $router->getId();

            if(empty($model)) {
                exit('Welcome !');
            }

            $model = ('\\Models\\'.$model);
            $model = new $model();

            if(empty($id)) {
                $result = $model->getAll();
            }
            else {
                $result = $model->get($id);
            }
            
            exit(json_encode($result));            
        }
        catch(Exception $e) {
            exit($e->getMessage());
        }
    }
}
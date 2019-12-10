<?php

// http://flipquizz.crm/questions/1/update
// http://flipquizz.crm/index.php?url=questions/1
/*
/controller/id/action

array (
    0 => controleur
    1 => identifiant
    2 => action
)
*/

/*
get     = affichage de la liste des éléméments
get/id  = affichage d'un élément
post    = ajout d'un élément
put     = mise à jour d'un élément
delete  = suppression d'un élément
*/

class Router 
{
    protected $controller;

    protected $id;

    protected $action;


    public function __construct()
    {
        $url = !empty($_GET['url']) ? explode('/', $_GET['url']) : ['home', 0, 'get'];

        $this->controller = basename($url[0] ?? 'home');

        $this->id = intval($url[1] ?? 0);

        $this->action = basename($url[2] ?? 'get'); 
    }


}
<?php 
require_once '../Debug.php'; 
require_once '../Loader.php'; 
// /api.php?t=categories 

$table = $_GET['t'] ?? null;

if($table === null) { 
    exit('Welcome !');
}

$mapping = [
    'quizzes'       => 'Models\\Quizzes', 
    'categories'    => 'Models\\Categories', 
    'questions'     => 'Models\\Questions'
];

$table = basename($table); 

if(!array_key_exists($table, $mapping)) {
    exit('Muhuhuhhahahah !'); 
}

/*if(empty($mapping[$table])) {
    exit('Muhuhuhhahahah !');
}*/

$table = $mapping[$table];

$table = new $table();

//d($table);

// /api.php?t=categories&id=1

$id = $_GET['id'] ?? 0;

$id = intval($id);

if($id > 0) {
    $result = $table->get($id);
}
else {
    $result = $table->getAll();
}

$result = json_encode($result, JSON_PRETTY_PRINT);

//sleep(10);

exit($result);
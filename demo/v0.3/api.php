<?php
header('Content-Type: application/json');

try {
    $table = !empty($_GET['t']) ? basename($_GET['t']) : null;
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    
    $mapping = [
        'quiz' => [
            'name' => 'fp_quizzes',
            'pk' => 'quiz_id',
        ],
        'category' => [
            'name' => 'fp_categories',
            'pk' => 'category_id',
        ],
        'categoryquiz' => [
            'name' => 'fp_categories',
            'pk' => 'quiz_id',
        ],
        'question' => [
            'name' => 'fp_questions',
            'pk' => 'question_id',
        ],
        'questioncategory' => [
            'name' => 'fp_questions',
            'pk' => 'category_id',
        ],
    ];
    
    if(empty($mapping[$table])) {
        exit('Welcome');
    }

    $table = $mapping[$table];

    /*$db = new \PDO(
        'mysql:host=localhost;port=3306;dbname=flipquiz;charset=utf8',
        'root', 
        '', 
        [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false
        ]
    );*/

    $db = new \PDO('sqlite:data/flipquiz.sqlite', 'charset=utf8');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->exec('pragma synchronous = off;');

    $result = [];

    if($id < 1) {
        $result = $db->query("SELECT * FROM ".$table['name'].";")->fetchAll();
    }
    else {
        $stmt = $db->prepare("SELECT * FROM ".$table['name']." WHERE ".$table['pk']."=:id;");
        
        if($stmt->execute([':id' => $id])) {
            $result = $stmt->fetchAll();
        }

        $stmt->closeCursor();
    }

    exit(json_encode($result, JSON_PRETTY_PRINT));
    

}
catch(\Exception $e) {
    exit('Error: '.$e->getMessage());
}
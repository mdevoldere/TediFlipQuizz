<?php
require_once '../Debug.php';
require_once '../Loader.php';

//$router = new Router();
//d($router);

//$db = Models\Db::getDb();
//d($db);
/*
$quizzes = new Models\Quizzes();

$result = $quizzes->get(1);
d($result);

$result = $quizzes->getAll();

d($result);

$cats = new Models\Categories();

$result = $cats->getQuizCats(1);

d($result);

$questions = new Models\Questions();

$result = $questions->getCatQuestions(1);

d($result);
*/

$users = [
    0 => [
        'username' => 'Mike',
        'password' => 'kjlkjsjdfl',
        'email' => 'Mike@test.fr',
    ],
    1 => [
        'username' => 'Balkany',
        'password' => 'kjlkjsjdfl',
        'email' => 'Mister@test.fr',
    ],
    
];



$accounts = new Models\AccountManager();

$accounts->addUser('tib', 'monPassword', 'tib@jechercheunstage.fr');


exit;
d($mike);

$inexistant = $accounts->getUser("Julien");
d($inexistant);

$tropcourt = $accounts->getUser("Ju");
d($tropcourt);

$vide = $accounts->getUser("");
d($vide);


$num = $accounts->getUser(123);
d($num);
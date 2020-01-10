<?php
require_once '../Debug.php';
require_once '../Loader.php';


//$router = new Router();
//d($router);

//$db = Models\Db::getDb();
//d($db);

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
































//require dirname(__DIR__).'/Loader.php';
//App::run();
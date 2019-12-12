<?php
require_once '../Debug.php';
require_once '../Loader.php';


$router = new Router();
d($router);

$db = Models\Db::getDb();

d($db);

$result = Models\Quizzes::getQuizzes();

d($result);

$result = json_encode($result);

d($result);

$result = Models\Quizzes::getQuiz(2);

d($result);
































//require dirname(__DIR__).'/Loader.php';
//App::run();
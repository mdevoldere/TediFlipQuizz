<?php

session_start();
require_once dirname(__DIR__, 2).'/Loader.php';
require_once dirname(__DIR__, 2).'/Debug.php';

$return_url = 'index.php?page=quizzes';

$newQuiz = [
    'quiz_theme' => '',
    'quiz_textcolor' => '#111111',
    'quiz_backcolor' => '#FFFFFF',
];

if(empty($_POST['quiz_theme'])) {
    $_SESSION['error'] = 'Quiz Theme is mandatory';

    header('location: '.$return_url);
    exit;
}

$newQuiz['quiz_theme'] = basename($_POST['quiz_theme']);


$regex_color = '/#[0-9A-F]{6}/i';

if(preg_match($regex_color, $_POST['quiz_textcolor'])) {
    $newQuiz['quiz_textcolor'] = $_POST['quiz_textcolor'];
}

if(preg_match($regex_color, $_POST['quiz_backcolor'])) {
    $newQuiz['quiz_backcolor'] = $_POST['quiz_backcolor'];
}

if($newQuiz['quiz_textcolor'] == $newQuiz['quiz_backcolor']) {
    $_SESSION['error'] = 'Please Fix Quiz Colors !';
    header('location: '.$return_url);
    exit;
}

// d($newQuiz);

$quizzes = new Models\QuizManager;

if($quizzes->addQuiz($newQuiz)) {
    $_SESSION['success'] = 'Quiz added !';
}
else {
    $_SESSION['error'] = 'Error adding Quiz !';
}

header('location: '.$return_url);
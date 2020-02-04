<?php
session_start();
require_once dirname(__DIR__, 2).'/Loader.php';
require_once dirname(__DIR__, 2).'/Debug.php';


$return_url = 'index.php?page=users';


if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {

    $_SESSION['error'] = 'Le formulaire est incomplet !';

    header('location: '.$return_url);
    exit;
}

$username = basename($_POST['username']);
$password = $_POST['password'];
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

if($email === false) {

    $_SESSION['error'] = 'Le format email est invalide !';

    header('location: '.$return_url);
    exit;
}

$accounts = new Models\AccountManager();

if ($accounts->addUser($username, $password, $email)) {
    $_SESSION['success'] = 'Utilisateur ajouté !';
}
else {
    $_SESSION['error'] = 'Erreur lors de l\'ajout de l\'utilisateur !';
}





header('location: '.$return_url);

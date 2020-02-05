<?php
session_start();

if(!empty($_SESSION['user'])) {
    header('location: index.php');
    exit;
}

require_once dirname(__DIR__, 2).'/Loader.php';
require_once dirname(__DIR__, 2).'/Debug.php';

if(!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = basename($_POST['username']);
    $password = $_POST['password'];

    $accounts = new Models\AccountManager;

    if($accounts->login($username, $password)) {
        $_SESSION['user'] = $username;
        header('location: index.php');
        exit;
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Authentication (Sign in)</title>
        <link rel="stylesheet" href="../css/manage.css">
    </head>
    <body>
        <header>
            <h1>Authentication</h1>
        </header>
        <nav>

        </nav>
        <main>
            <form action="" method="post">
            <label for="username">User name</label>
            <input type="text" name="username" id="username" value="" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" required>

            <button type="submit">Sign in</button>
            </form>
        </main>
    </body>
</html>
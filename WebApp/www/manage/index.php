<?php
session_start();

if(empty($_SESSION['user'])) {
    header('location: login.php');
    exit;
}

require_once dirname(__DIR__, 2).'/Loader.php';
require_once dirname(__DIR__, 2).'/Debug.php';

$accounts = new Models\AccountManager;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FlipQuiz Admin</title>
        <link rel="stylesheet" href="../css/manage.css">
        <script src="../js/manage.js"></script>
    </head>

    <body>
        <header>
            <h1>Quiz Administration</h1>
            <div>
                <a class="btn" href="../">Start New Quiz</a>
            </div>
            <aside>Welcome <?=$_SESSION['user'] ?? 'Anonymous'; ?> (<a href="login.php?logout=1">logout</a>)</aside>
        </header>
        <nav>
            <ul class="menu">
                <li><a href="?">Dashboard</a></li>
                <li><a href="?page=users">Users</a></li>
                <li><a href="?page=quizzes">Quizzes</a></li>
                <li><a href="index.php?page=categories">Categories</a></li>
                <li><a href="index.php?page=questions">Questions</a></li>
            </ul>
        </nav>

        <main>
            <?php
                if(!empty($_SESSION['error'])) {
                    echo '<div class="flash">'.$_SESSION['error'].'</div>';
                    $_SESSION['error'] = null;
                    // unset($_SESSION['error']);
                }

                if(!empty($_SESSION['success'])) {
                    echo '<div class="flash">'.$_SESSION['success'].'</div>';
                    $_SESSION['success'] = null;
                }
            ?>
            <?php
                $page = !empty($_GET['page']) ? $_GET['page'] : 'home'; // ternaire
                // $page = $_GET['page'] ?? 'home'; // null Coalescing operator (equivalent du ternaire ci-dessus)

                $page = ($page === 'index') ? 'home' : $page; // si $page est égal à 'index', on remplace sa valeur par 'home'

                $page = basename($page); // supprime toute notion de chemin dans la valeur de $page

                // $page = ($page.'.php');
                $page .= '.php'; // on ajoute .php à la valeur de $page
                
                // echo $page;

                if(is_file($page)) { // vérification de l'existance du fichier
                    require $page;
                }
                else {
                    echo 'La page demandée n\'existe pas !';
                }
            ?>
        </main>
    </body>
</html>
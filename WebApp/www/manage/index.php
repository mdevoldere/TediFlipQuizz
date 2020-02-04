<?php
session_start();
require_once dirname(__DIR__, 2).'/Loader.php';
require_once dirname(__DIR__, 2).'/Debug.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FlipQuiz Admin</title>
        <link rel="stylesheet" href="../css/manage.css">
    </head>

    <body>
        <header>
            <h1>Quiz Administration</h1>
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
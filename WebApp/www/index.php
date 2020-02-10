<?php
session_start();

if(empty($_SESSION['user'])) {
    header('location: ./manage/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mon titre</title>
        <link rel="stylesheet" href="css/app.css">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="js/Db.js"></script>
        <script src="js/Question.js"></script>
        <script src="js/Category.js"></script>
        <script src="js/Quiz.js"></script>
        <script src="js/Team.js"></script>
        <script src="js/Game.js"></script>
        <script src="js/app.js"></script>
    </head>

    <body>
        <div id="vue">
            <header>
                <h1>{{ game.quiz.quiz_theme }}</h1>
            </header>
            <main>
                <div class="team-selection" v-if="!game.started">
                    <button v-on:click="deleteTeam()" v-if="game.teams.length > 0">-</button>
                    <button v-on:click="addTeam()" v-if="game.teams.length < 4">+</button>
                </div>
                
                <div class="team-container">
                    <article class="team" :data-id="team.id" v-for="team in game.teams">
                        {{ team.name }}
                    </article>
                </div>

                <div class="quiz-container" v-if="game.teams.length > 0 & !game.started">
                   <p v-for="quiz in quizzes">
                       <input type="radio" name="the_quiz" :id="quiz.quiz_id" :data-id="quiz.quiz_id" v-on:change="loadCategories">
                       <label :for="quiz.quiz_id">{{ quiz.quiz_theme }}</label>
                    </p>
                </div>

                <div class="category-container" v-if="game.quiz.categories.length > 0 & !game.started">
                    <p v-for="category in game.quiz.categories">
                        {{ category.category_name }}
                    </p>
                    <div>
                        <button>Start Quiz</button>
                    </div>
                </div>


                <hr>
                
            </main>
            <footer>
                <p>&copy; Copyright ARFP</p>
            </footer>
        </div>
    </body>

</html>
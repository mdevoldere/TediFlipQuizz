<?php
$quizzes = new Models\Quizzes;
$categories = new Models\Categories;
$questions = new Models\Questions;

?>
<h2>Welcome to your Dashboard</h2>
<p>This page shows you an overview of the quizzes, categories and questions</p>


<div>
    <?=$quizzes->count(); ?> Quizzes
</div> 

<div>
    <?=$categories->count(); ?> Categories
</div> 

<div>
    <?=$questions->count(); ?> Questions
</div> 

<div>
    <?php 
    $latest = $quizzes->getLatest(); 

    echo $latest['quiz_theme'];
    
    ?>
</div>
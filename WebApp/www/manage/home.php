<?php
$quizzes = new Models\Quizzes;
$categories = new Models\Categories;
$questions = new Models\Questions;

?>
<h2>Welcome to your Dashboard</h2>
<p>This page shows you an overview of the quizzes, categories and questions</p>


<section class="overview">
    <a href="?page=quizzes"><?=$quizzes->count(); ?> Quizzes</a>
    <a href="?page=categories"><?=$categories->count(); ?> Categories</a>
    <a href="?page=questions"><?=$questions->count(); ?> Questions</a>
</section>


<section class="latest">
    <h3>Latest Quiz Added</h3>
    <?php 
    $latest = $quizzes->getLatest(); 
    $latest_cats = $categories->get($latest['quiz_id']);
    
    ?>
    <h4><?=$latest['quiz_theme'];?></h4>

    <article class="overview">
        <?php
        foreach($latest_cats as $latest_cat) {
            echo '<div>';
            echo $latest_cat['category_name'];
            echo '</div>';
        }
        ?>
    </article>
</div>
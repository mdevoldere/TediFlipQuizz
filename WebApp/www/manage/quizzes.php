<h2>Quizzes Managment</h2>
<p>Here you can see and manage your quizzes and add new ones.</p>

<h3>Your Quizzes</h3>

<table>
    <tr>
        <th>Id</th>
        <th>Theme</th>
        <th>TextColor</th>
        <th>BackColor</th>
    </tr>
<?php
use Models\QuizManager;
$quizzes = new QuizManager();

foreach($quizzes->getAll() as $quiz) 
{
    echo '<tr>';

    echo '<td>'.$quiz['quiz_id'].'</td>';
    echo '<td>'.$quiz['quiz_theme'].'</td>';
    echo '<td>'.$quiz['quiz_textcolor'].'</td>';
    echo '<td>'.$quiz['quiz_backcolor'].'</td>';

    echo '</tr>';
}

?>
</table>

<h3>Add new Quiz</h3>

<form action="form_quiz_add_save.php" method="post">
    Quiz Theme <input type="text" name="quiz_theme" required><br>
    Text Color <input type="color" name="quiz_textcolor"><br>
    Back Color <input type="color" name="quiz_backcolor"><br>
    <button type="submit">Add Quiz</button>
</form>
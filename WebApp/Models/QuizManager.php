<?php
namespace Models;


class QuizManager extends Quizzes
{

    public function addQuiz(array $_newQuiz): bool
    {
        $sql = "INSERT INTO fp_quizzes (quiz_theme, quiz_textcolor, quiz_backcolor) 
                VALUES (:quiz_theme, :quiz_textcolor, :quiz_backcolor);";

        $stmt = $this->pdo->prepare($sql);

        if($stmt->execute($_newQuiz)) {
            return $stmt->rowCount() > 0;
        }

        return false;
    }

    public function removeQuiz()
    {

    }

    public function updateQuiz()
    {
        
    }

}
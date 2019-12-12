<?php

namespace Models;


class Quizzes 
{

    public static function getQuizzes()
    {
        $sql = "SELECT * FROM quizz;";

        $pdo = Db::getDb();

        $stmt = $pdo->query($sql);

        $result = $stmt->fetchAll();

        return $result;
    }

    public static function getQuiz($id)
    {
        $sql = "SELECT * FROM quizz WHERE quizz_id=:id;";
        
        $stmt = Db::getDb()->prepare($sql);

        $vars = [
            ':id' => $id
        ];
        
        $stmt->execute($vars);
        
        $result = $stmt->fetch();

        $stmt->closeCursor();

        return $result;
    }


}
<?php

namespace Models;

class Questions extends Model
{
    public function __construct() 
    {
        parent::__construct('fp_questions', 'question_id');
    }


    public function getCatQuestions($_cat_id) 
    {
        try {
            $sql = "SELECT * FROM ".$this->tableName." WHERE category_id=:cat_id";
            $stmt = $this->pdo->prepare($sql);
            $vars = [':cat_id' => $_cat_id];

            $result = [];

            if($stmt->execute($vars)) {
                $result = $stmt->fetchAll();
            }

            $stmt->closeCursor();

            return $result;
        }
        catch(\Exception $e) {
            exit($e->getMessage());
        }


    }
}
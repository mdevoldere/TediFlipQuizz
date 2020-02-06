<?php 
namespace Models;

class Quizzes extends Model
{
    
    public function __construct()
    {
        parent::__construct('fp_quizzes', 'quiz_id');
    }

    public function getLatest() 
    {
        return $this->pdo->query("SELECT * FROM ".$this->tableName." ORDER BY ".$this->primaryKey." DESC LIMIT 1;")->fetch();
    }
} 

<?php 
namespace Models;

class Quizzes extends Model
{
    
    public function __construct()
    {
        parent::__construct('fp_quizzes', 'quiz_id');
    }
} 

<?php 
namespace Models;

class Categories extends Model
{
    
    public function __construct() 
    {
        parent::__construct('fp_categories', 'quiz_id');
    }

}
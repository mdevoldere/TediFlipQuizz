<?php 
namespace Models;

class Categories extends Model
{
    
    public function __construct() 
    {
        parent::__construct('fp_categories', 'category_id');
    }

    public function getQuizCats(int $_quiz_id)
    {
        try {
            $sql = "SELECT * FROM ".$this->tableName." WHERE quiz_id=:quiz_id;";
            $stmt = $this->pdo->prepare($sql);
            $vars = [':quiz_id' => $_quiz_id,];
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
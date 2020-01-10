<?php

namespace Models;


class Quizzes extends Model
{

    public function getAll()
    {
        return $this->queryAll("SELECT * FROM fp_quizzes;");
    }

    public function get(int $id)
    {
        return $this->query("SELECT * FROM fp_quizzes WHERE quizz_id=:id;", [':id' => $id]);
    }


}
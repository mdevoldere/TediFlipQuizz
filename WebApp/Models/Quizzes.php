<?php

namespace Models;


class Quizzes extends Model
{

    public function getAll()
    {
        return $this->queryAll("SELECT * FROM quizz;");
    }

    public function get(int $id)
    {
        return $this->query("SELECT * FROM quizz WHERE quizz_id=:id;", [':id' => $id]);
    }


}
<?php

namespace Models;


class Table extends Model
{
    protected $name;

    protected $pk;

    public function __construct(string $_name, string $_primaryKey)
    {
        $this->name = $_name;
        $this->pk = $_primaryKey;
    }

    public function getAll()
    {
        return $this->queryAll("SELECT * FROM ".$this->name.";");
    }

    public function get(int $id)
    {
        return $this->query("SELECT * FROM ".$this->name." WHERE ".$this->pk."=:id;", [':id' => $id]);
    }


}
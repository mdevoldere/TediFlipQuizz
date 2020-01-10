<?php

namespace Models;


abstract class Model 
{
    /** @var PDO $db */
    protected $db;

    public function __construct()
    {
        $this->db = Db::getDb();
    }

    public function query(string $sql, array $values = [])
    {
        try {
            if(empty($values)) {
                return $this->db->query($sql)->fetch();
            }
            else {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($values);
                $result = $stmt->fetch();
                $stmt->closeCursor();
                return $result;
            }
        }
        catch(\PDOException $e) {
            exit('Query Error: '.$e->getMessage());
        }
    }

    public function queryAll(string $sql, array $values = [])
    {
        try {
            if(empty($values)) {
                return $this->db->query($sql)->fetchAll();
            }
            else {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($values);
                $result = $stmt->fetchAll();
                $stmt->closeCursor();
                return $result;
            }
        }
        catch(\PDOException $e) {
            exit('Query Error: '.$e->getMessage());
        }
    }

    public function exec(string $sql, array $values = [])
    {
        try {
            if(empty($values)) {
                return $this->db->exec($sql);
            }
            else {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($values);
                $result = $stmt->rowCount();
                $stmt->closeCursor();
                return $result;
            }
        }
        catch(\PDOException $e) {
            exit('Query Error: '.$e->getMessage());
        }
    }
}
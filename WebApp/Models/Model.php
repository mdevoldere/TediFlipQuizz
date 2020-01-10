<?php

namespace Models;

/** Classe Model : Représente une table
 * 
 */
abstract class Model 
{
    /** @var PDO $pdo Représente une connexion PDO vers une base de données */
    protected $pdo;

    /** @var string $tableName Le nom de la table */
    protected $tableName;

    /** @var string $primaryKey Le nom de la clé primaire de la table */
    protected $primaryKey;


    /** Constructeur de la classe 
     * @param string $_table Le nom de la table
     * @param string $_pk Le nom de la clé primaire
     */
    protected function __construct(string $_table, string $_pk) 
    {
        $this->tableName = $_table;

        $this->primaryKey = $_pk;

        $this->pdo = Db::getDb(); // Récupère la connexion PDO
    }

    /** Récupère toutes les lignes de la table courante
     * @return array $result le résultat de la requête
     */
    public function getAll() 
    {
        $sql = ("SELECT * FROM ".$this->tableName);

        /** @var $stmt PDOStatement */
        $stmt = $this->pdo->query($sql);

        $result = $stmt->fetchAll();

        return $result;
    }

    /** Récupère un élément de la table à partir de son identifiant 
     * @param int $_id l'identifiant à rechercher
     * @return array|false $result le résultat de la requête sous forme de tableau ou false si la requête échoue
     */
    public function get(int $_id)
    {
        $sql = "SELECT * FROM ".$this->tableName." WHERE ".$this->primaryKey."=:id;";

        $stmt = $this->pdo->prepare($sql);

        $vars = [
            ':id' => $_id,
        ];

        $result = false;

        if($stmt->execute($vars)) {
            $result = $stmt->fetch();
        }

        $stmt->closeCursor(); // ferme le curseur de la requête /!\ Obligatoire

        return $result;
    }
}
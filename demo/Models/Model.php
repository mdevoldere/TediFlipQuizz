<?php

namespace Models;

use IModel;

/** Classe Model : Représente une table
 * 
 */
abstract class Model implements IModel
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
    public function getAll(): array
    {
        /** @var $stmt PDOStatement */
        $stmt = $this->pdo->query("SELECT * FROM ".$this->tableName.";");

        return $stmt->fetchAll();
    }

    /** Récupère un élément de la table à partir de son identifiant 
     * @param int $_id l'identifiant à rechercher
     * @return array $result le résultat de la requête sous forme de tableau ou un tableau vide si la requête échoue
     */
    public function get($_id): array
    {
        $_id = \intval($_id);

        if($_id < 1) {
            return [];
        }

        $sql = "SELECT * FROM ".$this->tableName." WHERE ".$this->primaryKey."=:id;";

        $stmt = $this->pdo->prepare($sql);

        $result = [];

        if($stmt->execute([':id' => $_id,])) {
            $result = $stmt->fetchAll();
        }

        $stmt->closeCursor(); // ferme le curseur de la requête /!\ Obligatoire

        return $result;
    }
}
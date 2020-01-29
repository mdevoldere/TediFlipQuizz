<?php

namespace Models;

class AccountManager
{
    protected $filePath;

    protected $accounts = [];


    public function __construct()
    {
        $this->filePath = '../data/accounts.php';

        if(\is_file($this->filePath)) {
            $this->accounts = (require $this->filePath);
        }
    }

    /**
     * Vérifie si un utilisateur $_username existe. 
     * Si oui, une instance de Account contenant les données de l'utilisateur est renvoyée
     * Si non, null est renvoyé
     */
    public function getUser(string $_username) : Account
    {
        return null;
    }

    /**
     * Vérifie si un utilisateur $_username existe et contrôle la corrrespondance des mots de passe
     * Renvoie true en cas de succès et false en cas d'erreur
     */
    public function login($_username, $_password) : bool
    {

    }

    /**
     * Ajoute un nouvel utilisateur après avoir vérifié que $_username n'est pas déjà utilisé
     * Renvoie true si l'utilisateur a été ajouté
     * Renvoie false en cas d'erreur
     */
    public function addUser($_username, $_password, $_email) : bool
    {
        $newUser = [
            'username' => $_username,
            'password' => $_password,
            'email' => $_email,
        ];
    }

    /**
     * Vérifie si un utilisateur $_username existe et le supprime si tel est le cas
     * Renvoie true si un utilisateur a été supprimé
     * Renvoie false si l'utilisateur n'as pas été trouvé
     */
    public function removeUser($_username) : bool
    {

    }
}
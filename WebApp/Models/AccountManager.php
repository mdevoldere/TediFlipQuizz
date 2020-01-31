<?php
//declare(strict_types=1);

namespace Models;


class AccountManager
{
    protected $filePath;

    protected $accounts = [];


    public function __construct()
    {
        $this->filePath =  \dirname(__DIR__) .'/data/accounts.php';

        if (\is_file($this->filePath)) {
            $this->accounts = (require $this->filePath);
        }
    }

    /**
     * Contrôle la validité d'un nom d'utilisateur
     * @param string $_username Le nom d'utilisateur à tester
     * @return bool true si le nom est valide. False sinon.
     */
    public function validUsername(string $_username) : bool
    {
        if(empty($_username)) {
            return false;
        }

        if(\strlen($_username) < 3) {
            return false;
        }

        return true;

        // la ligne suivante est équivalente à l'ensemble du code précédent.
        // return !empty($_username) && \strlen($_username) > 2;
    }

    /**
     * Vérifie si un utilisateur $_username existe. 
     * Si oui, une instance de Account contenant les données de l'utilisateur est renvoyée
     * Si non, null est renvoyé
     */
    public function getUser(string $_username): ?Account
    {
        $_username = \basename($_username);

        if(!$this->validUsername($_username)) {
            return null;
        }

        foreach($this->accounts as $key => $user) {

            if ($user['username'] === $_username) {
                return new Account($user);
            }
        }

        return null;
    }

    /**
     * Ajoute un nouvel utilisateur après avoir vérifié que $_username n'est pas déjà utilisé
     * Renvoie true si l'utilisateur a été ajouté
     * Renvoie false en cas d'erreur
     */
    public function addUser($_username, $_password, $_email): bool
    {
        if(!$this->validUsername($_username)) {
            return null;
        }
        
        $newUser = [
            'username' => $_username,
            'password' => $_password,
            'email' => $_email,
        ];

        return true;
    }

    /**
     * Vérifie si un utilisateur $_username existe et contrôle la corrrespondance des mots de passe
     * Renvoie true en cas de succès et false en cas d'erreur
     */
    public function login($_username, $_password): bool
    {
        return true;
    }

    

    /**
     * Vérifie si un utilisateur $_username existe et le supprime si tel est le cas
     * Renvoie true si un utilisateur a été supprimé
     * Renvoie false si l'utilisateur n'as pas été trouvé
     */
    public function removeUser($_username): bool
    {
        return true;
    }
}

<?php

namespace Models;

class Accounts
{
    /** @var string $filePath Chemin vers le fichier des comptes utilisateurs */
    protected $filePath;

    /** @var array $accounts Comptes utilisateurs */
    protected $accounts = [];

    public function __construct()
    {
        $this->filePath =  \dirname(__DIR__) . '/data/accounts.php';

        if (\is_file($this->filePath)) {
            $this->accounts = (require $this->filePath);
        }
    }

    /**
     * Sauvegarde les comptes.
     */
    public function save()
    {
        $content = '<?php return ' . var_export($this->accounts, true) . ';';
        \file_put_contents($this->filePath, $content);
        \sleep(1);
    }

    /**
     * Retourne la collection d'utilisateurs.
     * @return array la collection d'utilisateurs.
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * Contrôle la validité d'un nom d'utilisateur.
     * @param string $_username Le nom d'utilisateur à tester.
     * @return bool true si le nom est valide. false sinon.
     */
    protected function isValidUsername(string $_username): bool
    {
        return (!empty($_username) && \strlen($_username) > 2);
    }

    /**
     * Contrôle la validité d'un mot de passe.
     * @param string $_password Le mot de passe à tester.
     * @return bool true si le mot de passe est valide. false sinon.
     */
    protected function isValidPassword(string $_password): bool
    {
        return (!empty($_password) && \strlen($_password) > 5);
    }


    protected function setPassword(string $_pass)
    {
        $this->password = \password_hash($_pass, PASSWORD_BCRYPT);
    }

    /**
     * Vérifie si un utilisateur $_username existe. 
     * Si oui, les données de l'utilisateur sont retournées.
     * Si non, null est retourné.
     * @param string $_username Le nom d'utilisateur à rechercher.
     * @return array les données de l'utilisateur ou un tableau vide si aucun utilisateur trouvé.
     */
    public function getUser(string $_username): array
    {
        $_username = \basename($_username);

        if (!$this->isValidUsername($_username)) {
            return null;
        }

        foreach ($this->accounts as $key => $user) {
            if ($user['username'] === $_username) {
                return $user;
            }
        }

        return [];
    }



    /**
     * Vérifie si un utilisateur $_username existe et contrôle la corrrespondance des mots de passe
     * Renvoie true en cas de succès et false en cas d'erreur
     * @param string $_username Le nom d'utilisateur
     * @param string $_password Le mot de passe
     * @return bool true si la connexion a réussi. false sinon
     */
    public function login(string $_username, string $_password): bool
    {
        if(!$this->isValidPassword($_password)) { // format du mot de passe incorrect
            return false;
        }

        $user = $this->getUser($_username);

        if (empty($user)) { // aucun utilisateur trouvé
            return false;
        }

        if (\password_verify($_password, $user['username'])) { // mot de passe incorrect
            return false;
        }

        return true;
    }

    
}

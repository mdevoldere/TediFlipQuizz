<?php
//declare(strict_types=1);

namespace Models;


class AccountManager
{
    protected $filePath;

    protected $filePathSafe;

    protected $accounts = [];


    public function __construct()
    {
        $this->filePath =  \dirname(__DIR__) . '/data/accounts.php';

        $this->filePathSafe =  \dirname(__DIR__) . '/data/accounts.safe.php';

        if (\is_file($this->filePath)) {
            $this->accounts = (require $this->filePath);
        }
    }

    public function save()
    {
        @\copy($this->filePath, $this->filePathSafe);

        $content = '<?php return ';
        $content .= \var_export($this->accounts, true);
        $content .= ';';

        \file_put_contents($this->filePath, $content);
        \sleep(1);
    }

    /**
     * Contrôle la validité d'un nom d'utilisateur
     * @param string $_username Le nom d'utilisateur à tester
     * @return bool true si le nom est valide. False sinon.
     */
    public function validUsername(string $_username): bool
    {
        if (empty($_username)) {
            return false;
        }

        if (\strlen($_username) < 3) {
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

        if (!$this->validUsername($_username)) {
            return null;
        }

        foreach ($this->accounts as $key => $user) {
            if ($user['username'] === $_username) {
                return new Account($user);
            }
        }

        return null;
    }

    /**
     * Retourne la collection d'utilisateurs (sans blague !)
     * @return array la collection d'utilisateurs
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * Ajoute un nouvel utilisateur après avoir vérifié que $_username n'est pas déjà utilisé
     * Renvoie true si l'utilisateur a été ajouté
     * Renvoie false en cas d'erreur
     */
    public function addUser($_username, $_password, $_email): bool
    {
        if (!$this->validUsername($_username)) {
            return false;
        }

        if ($this->getUser($_username) !== null) {
            return false;
        }

        $newUser = [
            'username' => $_username,
            'password' => \password_hash($_password, PASSWORD_BCRYPT),
            'email' => $_email,
        ];

        $this->accounts[] = $newUser;

        //\array_push($this->accounts, $newUser);

        $this->save();

        return true;
    }

    /**
     * Vérifie si un utilisateur $_username existe et contrôle la corrrespondance des mots de passe
     * Renvoie true en cas de succès et false en cas d'erreur
     * @param string $_username Le nom d'utilisateur
     * @param string $_password Le mot de passe
     * @return boolean true si la connexion a réussi. false sinon
     */
    public function login(string $_username, string $_password): bool
    {
        $user = $this->getUser($_username);
        
        if($user === null) {
            return false;
        }

        if(!$user->checkPassword($_password)) {
            return false;
        }

        return true;
    }


    /**
     * Vérifie si un utilisateur $_username existe et le supprime si tel est le cas
     * Renvoie true si un utilisateur a été supprimé
     * Renvoie false si l'utilisateur n'as pas été trouvé
     * @param string $_username Le nom de l'utilisateur à supprimer
     * @return bool true si la suppression a fonctionné, false sinon
     */
    public function removeUser(string $_username): bool
    {
        if(count($this->accounts) < 2) {
            return false;
        }

        foreach($this->accounts as $key => $user) {
            if($user['username'] === $_username) {
                unset($this->accounts[$key]);
                $this->save();
                return true;
            }
        }

        return false;
    }
}

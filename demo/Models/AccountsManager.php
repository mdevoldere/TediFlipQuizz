<?php

namespace Models;

class AccountsManager extends Accounts
{

    public function save()
    {
        $content = '<?php return ';
        $content .= var_export($this->accounts, true);
        $content .= ';';

        \file_put_contents($this->filePath, $content);
        \sleep(1);
    }

    /**
     * Ajoute un nouvel utilisateur après avoir vérifié que $_username n'est pas déjà utilisé
     * Retourne true si l'utilisateur a été ajouté
     * Retourne false en cas d'erreur
     */
    public function addUser($_username, $_password, $_email): bool
    {
        if (!$this->isValidUsername($_username)) {
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

        $this->accounts[$_username] = $newUser; // \array_push($this->accounts, $newUser);

        $this->save();

        return true;
    }

    /**
     * Supprime un utilisateur s'il existe
     * Retourne true si un utilisateur a été supprimé
     * Retourne false si l'utilisateur n'as pas été trouvé
     * @param string $_username Le nom de l'utilisateur à supprimer
     * @return bool true si la suppression a fonctionné, false sinon
     */
    public function removeUser(string $_username): bool
    {
        if(!$this->isValidUsername(($_username))) {
            return false;
        }

        if(\array_key_exists($_username, $this->accounts)) {
            unset($this->accounts[$_username]);
            $this->save();
            return true;
        }

        return false;
    }

    /**
     * Édite un utilisateur s'il existe
     * Retourne true si un utilisateur a été modifié
     * Retourne false si l'utilisateur n'existe pas ou n'a pas été modifié
     * @param array $_user L'utilisateur à modifier
     * @return bool true si la modification a fonctionné, false sinon
     */
    public function editUser(array $_user): bool
    {
        if (!$this->isValidUsername($_user['username']) || !$this->isValidPassword($_user['password'])) {
            return false;
        }

        if(!\array_key_exists($_user['username'], $this->accounts)) {
            return false;
        }

        unset($this->accounts[$_user['username']]);

        return $this->addUser($_user['username'], $_user['password'], $_user['email']);
    }
}

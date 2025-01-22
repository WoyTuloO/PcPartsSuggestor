<?php

namespace App\Repository;

use App\Models\User;
use PDO;
use Repository;

require_once 'Repository.php';

class UserRepository extends Repository {

    public function getUser(string $username) : ?User {
        $stmt = $this->pdo->prepare('SELECT * FROM public.users WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User($user['username'], $user['password'], $user['is_admin']);
    }

    public function addUser(string $username, string $password): bool
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('SELECT * FROM public.users WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $tmpUser = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($tmpUser) {
            return false;
        }

        $stmt = $this->pdo->prepare('INSERT INTO public.users (username, password, is_admin) VALUES (:username, :password, 0)');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }


    public function updateUser(string $username, string $password) : bool {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('UPDATE public.users SET password = :password WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    public function deleteUser(string $username) : bool {
        $stmt = $this->pdo->prepare('DELETE FROM public.users WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }



    public function makeAdmin(string $username) : bool {
        $stmt = $this->pdo->prepare('UPDATE public.users SET is_admin = 1 WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    public function makeUser(string $username) : bool {
        $stmt = $this->pdo->prepare('UPDATE public.users SET is_admin = 0 WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }

    public function isAdmin(string $username){
        session_start();
        $stmt = $this->pdo->prepare('SELECT is_admin FROM public.users WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $_SESSION['is_admin'] = $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllUsers(){
        $stmt = $this->pdo->prepare('SELECT * FROM users ORDER BY username ASC');
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];
        foreach ($users as $user) {
            $result[] = new User($user['username'], "", $user['is_admin']);
        }
        return $result;
    }
}
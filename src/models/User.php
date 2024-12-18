<?php
namespace App\Models;
use Database;
use PDO;

class User
{
    private $username;
    private $password;
    private $is_admin;

    public function __construct(string $username, string $password, int $is_admin) {
        $this->username = $username;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getIsAdmin()
    {
        return $this->is_admin;
    }

    public function getSetCount(): int
    {
        $db = new Database();
        $stmt = $db->getConnection()->prepare('select count_sets_by_user(:username)');
        $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }

}
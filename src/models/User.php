<?php


namespace models;

use models\Database;
use PDO;

class User extends Database
{
    public function create(string $firstname, string $lastname, string $nickname, string $email, string $password): bool
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        Database::query(
            "INSERT INTO Users (firstname, lastname, nickname, email, password) VALUES (?, ?, ?, ?, ?)",
            [$firstname ,$lastname ,$nickname, $email, $passwordHash]
        );

        return true;
    }

    public function getByUsername(string $userId): array|false
    {
        $stmt = Database::query(
            "SELECT * FROM Users WHERE nickname = ?",
            [$userId]
        );

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($userId, $firstname, $lastname, $nickname, $email)
    {
        Database::query(
            "UPDATE Users SET firstname = ?, lastname = ?, nickname = ?, email = ? WHERE ID = ?",
            [$firstname, $lastname, $nickname, $email, $userId]
        );
        
    }
}
<?php
declare(strict_types=1);

namespace Models;

use models\Database;
use PDO;

class User extends Database
{
    public function create(string $firstname, string $lastname, string $nickname, string $email, string $password): bool
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        Database::query(
            "INSERT INTO Users (firstname, lastname, nickname, email, password) VALUES (?, ?, ?)",
            [$firstname ,$lastname ,$nickname, $email, $passwordHash]
        );

        return true;
    }

    public function getByUsername(string $nickname): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM Users WHERE nickname = ?",
            [$nickname]
        );

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
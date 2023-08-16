<?php
declare(strict_types=1);

namespace Models;

use models\Database;
use PDO;

class User extends Database
{
    public function create(string $username, string $email, string $password): bool
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        Database::query(
            "INSERT INTO users (username, email, password) VALUES (?, ?, ?)",
            [$username, $email, $passwordHash]
        );

        return true;
    }

    public function getByUsername(string $username): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM users WHERE username = ?",
            [$username]
        );

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
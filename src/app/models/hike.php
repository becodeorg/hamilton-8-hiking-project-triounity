<?php
declare(strict_types=1);

namespace app\models;

use PDO;

class hike extends Database
{
    public function findAll(int $limit = 0): array
    {
        if ($limit === 0) {
            $sql = "SELECT * FROM hiking";
        } else {
            $sql = "SELECT * FROM hiking LIMIT " . $limit;
        }
        $stmt = $this->query($sql);
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Change to $hikes
    
        return $hikes; // Change to $hikes
    }
    

    public function find(string $ID): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM hiking WHERE ID = ?",
            [$ID]
        );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
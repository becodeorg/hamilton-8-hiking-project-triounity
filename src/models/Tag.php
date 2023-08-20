<?php


namespace models;

use PDO;

class Tag extends Database
{
    public function findAll(int $limit = 0): array
    {
        if ($limit === 0) {
            $sql = "SELECT * FROM tags";
        } else {
            $sql = "SELECT * FROM tags LIMIT " . $limit;
        }
        $stmt = $this->query($sql);
        $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $tags; 
    }
    

    public function find(string $ID): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM tags WHERE ID = ?",
            [$ID]
        );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
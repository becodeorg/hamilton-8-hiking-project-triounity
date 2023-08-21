<?php
declare(strict_types=1);

namespace app\models;

use PDO;

class tag extends Database
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

    public function findHikesByCategory(string $tagID): array|false
    {
        try {
            $sql = "SELECT h.* FROM hiking h
                    INNER JOIN manytomany m ON h.ID = m.hikeID
                    WHERE m.tagID = ?";
        
            $stmt = $this->query($sql, [$tagID]);
            $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $hikes;

        } catch (Exception $e) {
            throw new Exception("Erreur lors de la récupération des randonnées par catégorie : " . $e->getMessage());
        }
    }
}
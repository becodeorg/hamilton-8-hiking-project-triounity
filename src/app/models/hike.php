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
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $hikes;
    }
    

    public function find(string $ID): array|false
    {
        $stmt = $this->query(
            "SELECT * FROM hiking WHERE ID = ?",
            [$ID]
        );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findHikesByCategory(string $tagID)
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
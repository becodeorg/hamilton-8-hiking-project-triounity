<?php


namespace models;


use PDO;

class Hike extends Database
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

    public function create(array $data): bool
    {
        $stmt = $this->query(
            "INSERT INTO hiking (name, description, distance, duration) VALUES (?, ?, ?, ?)",
            [
                $data['name'],
                $data['description'],
                $data['distance'],
                $data['duration']
            ]
        );

        return $stmt !== false;
    }
    
    public function update(string $ID, array $data): bool
    {
        $stmt = $this->query(
            "UPDATE hiking SET name = ?, description = ?, distance = ?, duration = ? WHERE ID = ?",
            [
                $data['name'],
                $data['description'],
                $data['distance'],
                $data['duration'],
                $ID
            ]
        );

        return $stmt !== false;
    }

    public function delete(string $ID): bool
    {
        $stmt = $this->query(
            "DELETE FROM hiking WHERE ID = ?",
            [$ID]
        );

        return $stmt !== false;
    }
}
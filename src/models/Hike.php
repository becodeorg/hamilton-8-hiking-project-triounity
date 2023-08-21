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

    public function creationHike(array $param): array|bool
    {
        $sql = "INSERT INTO hiking (name, distance, duration, elevation_gain, description, created_at) VALUES (:name, :distance, :duration, :elevation_gain, :description, :created_at)";
        $result = Database::exec($sql, $param);
        if ($result) {
            $lastInsertId = Database::lastInsertId();
            return [
                "bool" => true,
                "ID" => $lastInsertId
            ];
        } else {
            return ["bool" => false];
        }
    }
    public function insertNewHike(array $param): array|bool
    {
        $sql = "INSERT INTO hiking (name, distance, duration, elevation_gain, description, created_at, image_url, creator) VALUES (:name, :distance, :duration, :elevation_gain, :description, :created_at, :image_url, :creator)";
        $result = Database::exec($sql, $param);
        if ($result) {
            $lastInsertId = Database::lastInsertId();
            return [
                "bool" => true,
                "ID" => $lastInsertId
            ];
        } else {
            return ["bool" => false];
        }
    }

    public function modificationHike(array $param): bool
    {
        $name = $param['name'];
        $distance = $param['distance'];
        $duration = $param['duration'];
        $elevation_gain = $param['elevation_gain'];
        $description = $param['description'];
        $ID = $param['ID'];
        $image_url = $param['image_url'];

        $sql = "UPDATE hiking SET name = ?, distance = ?, duration = ?, elevation_gain = ?, description = ? WHERE ID = ?";

        return Database::exec($sql, [$name, $distance, $duration, $elevation_gain, $description,$image_url, $ID]);
    }


    public function deleteHikeById(string|int $ID): bool
    {
        $sql = "DELETE FROM hiking WHERE ID = :ID";
        return Database::exec($sql, ["ID" => $ID]);
    }

    public function getHikeById($hid): array|bool
    {
        $sql = "SELECT hiking.*, Users.nickname as creator FROM hiking JOIN Users ON hiking.ID = Users.ID WHERE ID = :ID";
        $result = Database::query($sql, ["ID" => $ID]);
        return $result->fetchAll();
    }


}
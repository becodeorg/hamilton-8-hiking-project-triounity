<?php


namespace Models;

use PDO;


class Hikes extends Database
{

    public function AfficherTout()
    {

        $stmt = $this->prepare('SELECT * FROM hiking');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        include 'views/layout/header.view.php';
        include 'views/index.view.php';
        include 'views/layout/footer.view.php';
    }

   /*  public function find(string $hikingId)
    {
        $stmt = $this->query(
            "SELECT * FROM hiking WHERE ID = $hikingId "
        );
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function prepare(string $string)
    {
    } */

}


/*
        if ($limit === 0) {
            $sql = "SELECT * FROM hiking";
        } else {
            $sql = "SELECT * FROM hiking LIMIT ". $limit;
        }
        $stmt = $this->query($sql);
        //Pour extraire toutes les lignes résultantes sous forme d'un tableau associatif.
        //Cela signifie que chaque enregistrement de la table "hiking" est représenté sous la forme d'un tableau associatif.
        $hiking = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $hiking;*/
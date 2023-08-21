<?php

namespace models;

use PDO;
use PDOStatement;

class Database
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO(
            "mysql:host=" . getenv('DB_HOST') . ";dbname=" . getenv('DB_DATABASE'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')

        );
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function query(string $request,array $params = []):PDOStatement{

        $stmnt =  $this ->pdo->prepare($request);


        $stmnt->execute($params);
        return $stmnt;
    }
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }

}






//
//
//namespace Models;
//
//use PDO;
//use PDOStatement;
//
//class Database
//{
//    private PDO $pdo;
//
//    public function __construct() // le construct est le constructor de notre db, ils sont liés
//        //c une fct qui est générée dès qu'on va  initialiser notre objet db et ca va permettre d'init notre $PDO,
//        //de créer dans notre propriété PDO de notre classe une connexsion a notre db grace a pdo.
//    {
//        $this->pdo = new PDO(
//            'mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DATABASE'),
//            getenv('DB_USERNAME'),
//            getenv('DB_PASSWORD')
//        );
//
//        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    }
//// les fct query permettent de faire des requetes select qu'on va faire,
////faut mettre un sql de type string a l'int et un array $apram, param de la requete sql
//
///**
// * @param array $param tableau des param
// * @param string $sql  requête sql
// * @return PDOStatement
// */
//    public function query(string $sql, array $param = []): PDOStatement
//    {
//        // prepare la requête
//        $stmt = $this->pdo->prepare($sql);
//        $stmt->execute($param);
//        return $stmt;
//    }
//
//    public function lastInsertId()
//    {
//        return $this->pdo->lastInsertId();
//    }
//}
//
//// extend db et new db c la même chose

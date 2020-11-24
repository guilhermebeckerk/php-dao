<?php 

class Sql extends PDO {


    private $conn;

    //--------------------- Connection with Database -----------------------

    public function __construct(){

        try {

            $this->conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");

        } catch (PDOException $e) {

            echo "--ERROR-- --DATABASE--- " . $e->getMessage();
            exit();

        }

    }

    //--------------------- Set multiple parameters -----------------------

    private function setParams($statement, $parameters = array()){

        foreach($parameters as $key => $value){

            $this->setParam($statement, $key, $value);

        }

    }

    //--------------------- Bind parameters -----------------------

    private function setParam($statement, $key, $value){

        $statement->bindParam($key, $value);

    }

    //------------------- Simple Query ---------------------------

    public function query($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;

    }

    //--------------------- Select from database -----------------------
    
    public function select($rawQuery, $params = array()){

        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


}

?>
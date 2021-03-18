<?php

class User {

    private $iduser;
    private $deslogin;
    private $despass;
    private $dtcadastro;
    
    public function getIduser(){
        return $this->iduser;
    }

    public function setIduser($value){
        $this->iduser = $value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDeslogin($value){
        $this->deslogin = $value;
    }

    public function getDespass(){
        return $this->despass;
    }

    public function setDespass($value){
        $this->despass = $value;
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }

    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }

    //-------------------------------- Load User By ID --------------------------------------

    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users WHERE iduser = :id", array(
            ":id"=> $id
        ));

        if (count($results) > 0){

            $this->setData($results[0]);

        }

    }

    //--------------------------------- Select All Users From Database ---------------------------

    public static function listUsers(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_users ORDER BY deslogin");

    }

    //--------------------------------- Search User From Database ---------------------------

    public static function search($login){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_users WHERE deslogin Like :search ORDER BY deslogin", array(
            ":search"=>"%".$login."%"
        ));

    }

    //-------------------------------- Validate with Login and Password ----------------------------

    public function login($login, $password){


        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :login AND despass = :password", array(
            ":login"=> $login,
            ":password"=> $password
        ));

        if (count($results) > 0){

            $this->setData($results[0]);
            

        } else {

            throw new Exception("Login e/ou senha inválidos.");
            

        }

    }

    //-------------------------------- Fill Seters --------------------------------------

    public function setData($data){

        $this->setIduser($data["iduser"]);
        $this->setDeslogin($data["deslogin"]);
        $this->setDespass($data["despass"]);
        $this->setDtcadastro(new DateTime($data["dtcadastro"]));

    }

    //-------------------------------- Delete User on database --------------------------------------

    public function delete(){

        $sql = new $Sql();

        $sql->query("DELETE FROM tb_users WHERE iduser = :id", array(
            ':id' => $this->getIduser()
        ));
        
        $this->setIduser(0);
        $this->setDeslogin("");
        $this->setDespass("");
        $this->setDtcadastro(new DateTime());
        
    }

    //-------------------------------- Update User on database --------------------------------------

    public function update($login, $password){

        $this->setDeslogin($login);
        $this->setDespass($password);

        $sql = new Sql();

        $sql->query("UPDATE tb_users SET deslogin = :login, despass = :password WHERE iduser = :id", array(
            ':login' => $this->getDeslogin(),
            ':password' => $this->getDespass(),
            ':id' => $this->getIduser()
        ));

    }

    //-------------------------------- Insert User on database --------------------------------------

    public function insert(){

        $sql = new Sql();

        $stmt= $sql->query("INSERT INTO tb_users (deslogin, despass) VALUES (:login, :password)", array(
            ":login" => $this->getDeslogin(),
            ":password" => $this->getDespass()
        ));
        
    }

    //-------------------------------- Echo User On View --------------------------------------

    public function __toString(){

        return json_encode(array(
            "iduser"=>$this->getIduser(),
            "deslogin"=>$this->getDeslogin(),
            "despass"=>$this->getDespass(),
            "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
        ));

    }

}

?>
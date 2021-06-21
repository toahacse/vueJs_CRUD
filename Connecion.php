<?php

class Connecion{

    private $dbhost = "localhost";
    private $dbname = "vuetut";
    private $dbuser = "root";
    private $dbpass = "";
    public $db;

    public function __construct()
    {
        $this->connect_DB();
    }

    private function connect_DB(){
        try{
            $this->db = new  PDO("mysql:host={$this->dbhost};dbname={$this->dbname}",$this->dbuser,$this->dbpass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "connection error: ".$e->getMessage();
        }
    }





}

?>
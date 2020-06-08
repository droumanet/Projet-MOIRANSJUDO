<?php

class db{
    private $host;
    private $dbname; 
    private $user;
    private $password;
    private $charset;

    function __construct(){
    }

    public function connection(){
        $this->host= "localhost";
        $this->dbname= "test"; 
        $this->user= "Obituary"; 
        $this->password= "33445148";
        $this->charset= "utf8";

        // s'il y a un message d'erreur, dans la partie catch ça va prendre l'erreur et la montrer dans le site
        try {
            $cnct= "mysql:host=".$this->host."; dbname=".$this->dbname."; charset=".$this->charset;
            $pdo= new PDO($cnct, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "Erreur de connexion : ".$e->getMessage();
        }
    }
}

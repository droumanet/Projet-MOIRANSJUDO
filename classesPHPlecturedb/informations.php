<?php

class reader extends db {
    private $data; // string : 'elm'

    function __construct(){

    }
    public function getData($data){
        $stmt = $this->connection()->query("SELECT*FROM responsablelegal");
        while ($row = $stmt->fetch()){
            $result = $row[$data]; 
            return $result;
        }
    }
    public function getCount($id, $nom){ // int id, string ''
        $stmt = $this->connection()->prepare("SELECT * FROM responsablelegal WHERE id=? and nom=?");
        $stmt->execute([$id, $nom]);
        if ($stmt->rowCount()){ // compte les colonnes dans la requête
            while($row = $stmt->fetch()){
                return $row['codePostal'];
            }
        }else{
            
        }
    }







}
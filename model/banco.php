<?php

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli("localhost", "root" , "", "crud_veiculos");
    }

    public function setCarro($modelo,$ano){
        $stmt = $this->mysqli->prepare("INSERT INTO carro (`modelo`, `ano`) VALUES (?,?)");
        $stmt->bind_param("ss",$modelo,$ano);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getCarro(){
        $result = $this->mysqli->query("SELECT * FROM carro");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function deleteCarro($id){
        if($this->mysqli->query("DELETE FROM `carro` WHERE `modelo` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }
    public function pesquisaCarro($modelo){
        $result = $this->mysqli->query("SELECT * FROM carro WHERE modelo='$modelo'");
        return $result->fetch_array(MYSQLI_ASSOC);

    }
    public function updateCarro($modelo,$ano){
        $stmt = $this->mysqli->prepare("UPDATE `carro` SET `ano`=? WHERE `modelo` = ?");
        $stmt->bind_param("ss", $ano,$modelo);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }

    
}
?>

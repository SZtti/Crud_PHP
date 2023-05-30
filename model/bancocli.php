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

    public function setCliente($nome,$cpf){
        $stmt = $this->mysqli->prepare("INSERT INTO cliente (`nome`, `cpf`) VALUES (?,?)");
        $stmt->bind_param("ss",$nome,$cpf);
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function getCliente(){
        $result = $this->mysqli->query("SELECT * FROM cliente");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function deleteCliente($id){
        if($this->mysqli->query("DELETE FROM `cliente` WHERE `nome` = '".$id."';")== TRUE){
            return true;
        }else{
            return false;
        }

    }
    public function pesquisaCliente($nome){
        $result = $this->mysqli->query("SELECT * FROM cliente WHERE nome='$nome'");
        return $result->fetch_array(MYSQLI_ASSOC);

    }
    public function updateCliente($nome,$cpf){
        $stmt = $this->mysqli->prepare("UPDATE `cliente` SET `cpf`=? WHERE `nome` = ?");
        $stmt->bind_param("ss", $cpf,$nome);
        if($stmt->execute()==TRUE){
            return true;
        }else{
            return false;
        }
    }

    
}
?>

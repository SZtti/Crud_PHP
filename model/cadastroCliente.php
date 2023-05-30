<?php
require_once("bancocli.php");

class Cadastro extends Banco {

    private $nome;
    private $cpf;
    
    //Metodos Set
    public function setnome($string){
        $this->nome = $string;
    }
    public function setcpf($string){
        $this->cpf = $string;
    }
    
    //Metodos Get
    public function getnome(){
        return $this->nome;
    }
    public function getcpf(){
        return $this->cpf;
    }
    

    public function incluir(){
        return $this->setCliente($this->getnome(),$this->getcpf());
    }
}
?>

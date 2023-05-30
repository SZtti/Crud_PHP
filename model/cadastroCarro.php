<?php
require_once("banco.php");

class Cadastro extends Banco {

    private $modelo;
    private $ano;
    
    //Metodos Set
    public function setmodelo($string){
        $this->modelo = $string;
    }
    public function setano($string){
        $this->ano = $string;
    }
    
    //Metodos Get
    public function getmodelo(){
        return $this->modelo;
    }
    public function getano(){
        return $this->ano;
    }
    

    public function incluir(){
        return $this->setCarro($this->getmodelo(),$this->getano());
    }
}
?>

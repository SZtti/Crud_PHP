<?php
require_once("../model/banco.php");
class listarController{

    private $lista;

    public function __construct(){
        $this->lista = new Banco();
        $this->criarTabela();

    }

    private function criarTabela(){
        $row = $this->lista->getCarro();
        foreach ($row as $value){
            echo "<tr>";
            echo "<th>".$value['modelo'] ."</th>";
            echo "<td>".$value['ano'] ."</td>";
            echo "<td><a class='btn btn-warning' href='editar.php?id=".$value['modelo']."'>Editar</a><a class='btn btn-danger' href='../controller/ControllerDeletar.php?id=".$value['modelo']."'>Excluir</a></td>";
            echo "</tr>";
        }
    }
}


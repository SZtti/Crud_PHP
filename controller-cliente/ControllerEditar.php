<?php
require_once("../model/bancocli.php");

class editarController {

    private $editarcli;
    private $nome;
    private $cpf;

  

    public function __construct($id){
        $this->editarcli = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $row = $this->editarcli->pesquisaCliente($id);
        $this->nome     =$row['nome'];
        $this->cpf        =$row['cpf'];

    }
    public function editarFormulario($nome,$cpf){
        if($this->editarcli->updateCliente($nome,$cpf) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getnome(){
        return $this->nome;
    }
    public function getcpf(){
        return $this->cpf;
    }

}
$id = filter_input(INPUT_GET, 'idCliente');
$editarcli = new editarController($id);
if(isset($_POST['submit'])){
    $editarcli  ->editarFormulario($_POST['nome'],$_POST['cpf']);
}
?>

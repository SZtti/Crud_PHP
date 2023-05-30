<?php
require_once("../model/banco.php");

class editarController {

    private $editar;
    private $modelo;
    private $ano;
  

    public function __construct($id){
        $this->editar = new Banco();
        $this->criarFormulario($id);
    }
    private function criarFormulario($id){
        $row = $this->editar->pesquisaCarro($id);
        $this->modelo     =$row['modelo'];
        $this->ano        =$row['ano'];

    }
    public function editarFormulario($modelo,$ano){
        if($this->editar->updateCarro($modelo,$ano) == TRUE){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getAno(){
        return $this->ano;
    }

}
$id = filter_input(INPUT_GET, 'id');
$editar = new editarController($id);
if(isset($_POST['submit'])){
    $editar->editarFormulario($_POST['modelo'],$_POST['ano']);
}
?>

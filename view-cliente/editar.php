<!DOCTYPE HTML>
<html>
<?php include("head.php") ?>

<body>
    <?php include("menu.php") ?>
    <?php require_once("../controller-cliente/ControllerEditar.php");?>
    <div class="row">
        <form method="post" action="../controller-cliente/ControllerEditar.php" id="form" name="form" onsubmit="validar(document.form); return false;" class="col-10">
            <div class="form-group">
                <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $editarcli->getnome(); ?>" required>
                <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $editarcli->getcpf(); ?>" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="idCliente" value="<?php echo $editarcli->getnome();?>">
                <button type="submit" class="btn btn-success" id="editar" name="submit" value="editar">Editar</button>
            </div>
        </form>
    </div>
      <script language="javascript" type="text/javascript">
        

    </script>
</body>

</html>

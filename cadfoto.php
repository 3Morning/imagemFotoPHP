<?php
require_once 'fotocontoller.php';

ob_start();
?>
<div class="container">
        <form name="cadImovel" id="cadImovel" action="" method="post" enctype="multipart/form-data">
            <div class="card" style="top:40px">
                <div class="card-header">
                    <span class="card-title"><h2>Foto</h2></span>
                </div>
                <div class="card-body">
                </div>
                <?php if(isset($foto) && !empty($foto->getPath())){
                    ?> <?php }?>
                <div class="form-group form-row">
                    <label class="col-sm-2 col-form-label text-right">Foto:</label>
                    <input type="file" class="form-control col-sm-8" name="foto" id="foto"/>
                </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="id" id="id" value="<?php echo isset($imovel)?$imovel->getId():''; ?>" />
                    <input type="hidden" name="path" id="path" value="<?php echo isset($imovel)?$imovel->getPath():''; ?>" />
                    <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
                </div>
            </div>
        </form>
    </div>


<?php

//Verifica se o botão submit foi acionado
if(isset($_POST['btnSalvar'])){

    //Chama uma função PHP que permite informar a classe e o Método que será acionado
    if(isset($imovel)){
        call_user_func(array('fotocontoller','salvar'),$imovel->getFoto(),$imovel->getFotoTipo());
    }else{
        call_user_func(array('fotocontoller','salvar'));
    }

    header('Location: C:\xampp\htdocs\foto\listfoto.php');
}

ob_end_flush();

?>
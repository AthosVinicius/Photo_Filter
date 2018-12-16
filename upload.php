<?php
if(!isset($_FILES['arquivo'])){
    exit("erro de submissão!");
}
$uploaddir = 'imagens/';
$dataNome = date('dmyhmi');
$randNome = rand(1, 10000);
$uploadfile = $uploaddir . $dataNome . $randNome . $_FILES['arquivo']['name'];
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
$tipoImg = explode("/", $_FILES['arquivo']['type']);

if ($tipoImg[1] == "png" || $tipoImg[1] == "jpg" || $tipoImg[1] == "jpeg") {
    move_uploaded_file($arquivo_tmp, $uploadfile);
}

$selo = $_POST['selo'];

// Obtendo o tamanho original
?>

<table class="tb_block">
    <tr>
        <td>
            <div>
                <?php if ($_FILES['arquivo']['tmp_name'] != "" && ($tipoImg[1] == "png" || $tipoImg[1] == "jpg" || $tipoImg[1] == "jpeg")) { ?>
                    <img src="foto.php?img22=<?php echo $uploadfile; ?>&s=<?php echo $selo; ?>"/>
                    <?php
                } else { ?>
                    <div><img src="img/pretoebranco2.png"/></div>
                <?php } ?>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <form enctype="multipart/form-data" action="?gerada=1" method="POST">
                <input type="file" name="arquivo">
                <input type="hidden" name="verificador"/><br/><br/>
                Selecione o Selo:<br/>
                <input type="radio" name="selo" value="1"> Medalha
                <input type="radio" name="selo" value="2" checked="checked"> Prêmio
                <input type="radio" name="selo" value="3"> Nenhum -
                <input type="submit" class="btn_enviar" value="Enviar Foto" />
            </form>
        </td>
    </tr>
    <tr>
        <td><br/><br/>
            <div><?php include("lista.php"); ?></div>
        </td>
    </tr>
</table>

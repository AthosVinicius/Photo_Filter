<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>FOTO FILTRO</title>
        <link rel="icon" href="favico.ico" type="image/x-icon"/>

        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>

    <body>
        <div>
            <?php if (isset($_GET["gerada"]) && $_GET["gerada"] == 1) {
                include("upload.php");
            } else { ?>
                <table class="tb_block">
                    <tr>
                        <td>
                            <div>
                                <img src="img/pretoebranco2.png"/>
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
                                <input type="submit" class="btn_enviar" value="Enviar Foto"/>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <?php include("lista.php"); ?>
                            </div>
                        </td>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </body>
</html>
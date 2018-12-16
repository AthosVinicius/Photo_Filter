<?php
$pasta = 'imagens/';
$arquivos = glob("$pasta{*.jpg,*.png,*.PNG,*.gif,*.bmp}", GLOB_BRACE);

echo "<hr/>";
echo "Participantes [".count($arquivos)."]";
echo "<hr/>";

for ($i = (count($arquivos) - 1); $i > -1; $i--) {
    if ($i <= 20) {
        if(count($arquivos) > 20)
            $fotoSorteada = rand(1, count($arquivos) - 1);
        else
            $fotoSorteada = $i;
        ?>
        <a href="foto.php?img22=<?php echo $arquivos[$fotoSorteada]; ?>" title="<?php echo $i; ?>">
            <img src="foto.php?img22=<?php echo $arquivos[$fotoSorteada]; ?>" alt="" width="50" height="50"/>
        </a>
    <?php }
} ?>
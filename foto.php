<?php

if (isset($_GET['s']) && $_GET['s'] == 1) {
    $seloSkin = "img/pretoebranco.png";
} else if (isset($_GET['s']) && $_GET['s'] == 2) {
    $seloSkin = "img/pretoebranco1.png";
} else {
    $seloSkin = "img/pretoebranco2.png";
}

// Abre imagem 1
$percent = 0.5;
$filename = $_GET['img22'];
//$filetipe = $_GET['t'];
list($width, $height) = getimagesize($filename);
$newwidth = $width * $percent;
$newheight = $height * $percent;

// Load
$thumb = imagecreatetruecolor(381, 381);

$sizeImg = getimagesize($filename);

switch ($sizeImg['mime']) {
    case "image/gif":
        break;
    case "image/jpeg":
        $source = imagecreatefromjpeg($filename);
        break;
    case "image/png":
        $source = imagecreatefrompng($filename);
        break;
    case "image/bmp":
        break;
}

imageAlphaBlending($source, true);
imageSaveAlpha($source, true);
imagecopyresized($thumb, $source, 0, 0, 0, 0, 381, 381, $width, $height);
imagefilter($thumb, IMG_FILTER_GRAYSCALE);

// Abre imagem 2
$img2 = imageCreateFromPng($seloSkin);
// Mantem definições de transparencia
imageAlphaBlending($img2, true);
imageSaveAlpha($img2, true);

imagecopy($thumb, $img2, 0, 0, 0, 0, imagesx($img2), imagesy($img2));

// Exibe imagem 1
header('Content-type: image/png');
imagepng($thumb);

// Destroi imagens
imageDestroy($thumb);
imageDestroy($img2);
?>

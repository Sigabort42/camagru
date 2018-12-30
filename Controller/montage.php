<?php

// var_dump($_POST);

if (isset($_POST["photo"]) && isset($_POST["ok"]) && $_POST["ok"] == "1")
{
    $p = explode(',', $_POST['photo']);

    $res = base64_decode($p[1]);

    $photo = imagecreatefromstring($res);
    $i = 0;
    while ($i < 2)
    {
        // $lo_photo - $lo_img
        $img = imagecreatefrompng("../".$_POST["montage".$i]);
        $la_img = imagesx($img);
        $lo_img = imagesy($img);
        $la_photo = imagesx($photo);
        $lo_photo = imagesy($photo);
        //echo "[$la_photo, $lo_photo:". intval($_POST['left']). ":$la_img, $lo_img]". intval($_POST['top'])."]]";
        imagecopy($photo, $img, $la_photo - $la_img, $lo_photo - $lo_img, 0, 0, $la_img, $lo_img);
        $i++;
    }
    $a = rand();
    imagepng($photo, "../img/rendu/lol".$a.".png");
    imagedestroy($photo);
    imagedestroy($img);
    header("Location: /camagru/Modeles/add_photo.php?chemin=/camagru/img/rendu/lol".$a.".png");
}
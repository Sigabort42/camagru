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
        echo "[$la_photo, $lo_photo:". intval($_POST['left']). ":$la_img, $lo_img]". intval($_POST['top'])."]]";
        imagecopy($photo, $img, 640 - intval($_POST["left"]), 480 - intval($_POST["top"]), 0, 0, $la_img, $lo_img);
        $i++;
    }

    imagepng($photo, "../img/rendu/lol.png");
    imagedestroy($photo);
    // var_dump($img);
    imagedestroy($img);
}
<?php

namespace src\services;

trait PhotoUploadTrait{

    public function PhotoUpload($avatar, $tipo, $extension)
    {
        $avatarName = md5(time().rand(0,999)).$extension;

        //Movendo o arquivo para a pasta de avatar já com o novo nome;
        move_uploaded_file($_FILES['avatar']['tmp_name'], 'media/avatars/'.$avatarName);
        //Processo de ajustar o tamanho da imagem do usuário;
        list($width_orig, $height_orig) = getimagesize('/media/avatars/'.$avatarName);
        $ratio = $width_orig/$height_orig;

        $width = 500;
        $height = 500;

        if($width/$height > $ratio) {
            $width = $height*$ratio;
        } else {
            $height = $width/$ratio;
        }

        $img = imagecreatetruecolor($width, $height);
        if($tipo == 'image/jpeg') {
            $origi = imagecreatefromjpeg('/media/avatars/'.$avatarName.'jpg');
        } elseif($tipo == 'image/png') {
            $origi = imagecreatefrompng('/media/avatars/'.$avatarName.'png');
        }

        imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        imagejpeg($img, '/media/avatars/'.$avatarName, 80);

        return $avatarName;
    }


} 
<?php

namespace src\services;

trait FlashMessageTrait {

    public function flashMessage(string $tipo, string $mensagem):void 
    {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;
    }
}
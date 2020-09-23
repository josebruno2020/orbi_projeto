<?php

namespace src\controllers;

use core\Controller;
use src\helpers\RadarHelpers;
use src\helpers\UserHelpers;
use src\services\FlashMessageTrait;

class RadarController extends Controller{
    use FlashMessageTrait;
    private $loggedUser;
    
    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function radar()
    {
        
        $this->render('radar/radar-config', [
            'loggedUser' => $this->loggedUser,
            
        ]);
    }

    public function radarAction(){
        //Recebendo os dados do radar;
        $radar = $_FILES['radar'];
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $name_server = md5(time().rand(0,999)).'.pdf';

        if($radar['type'] != 'application/pdf'){
            $this->flashMessage(
                'danger',
                'Arquivo deve estar em PDF!'
            );
            $this->redirect('/system-config/radar');
        }
        move_uploaded_file($radar['tmp_name'], 'media/radar/'.$name_server);
        
        $last_radar = RadarHelpers::getLast();
        $id = $last_radar->id;
        unlink('media/radar/'.$last_radar->name_server);
        RadarHelpers::deleteRadar($id);
        
        RadarHelpers::insert($name, $name_server, $date);
        $this->flashMessage(
            'success',
            'Arquivo Adicionado com sucesso!'
        );
        $this->redirect('/system-config/radar');
    }

}
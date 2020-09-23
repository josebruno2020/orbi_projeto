<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\PostHelpers;
use \src\helpers\HistoricHelpers;
use \src\helpers\RadarHelpers;
use \src\helpers\EmailHelpers;
use src\services\EmailTrait;
use src\services\FlashMessageTrait;

class HomeController extends Controller {
    use EmailTrait;
    use FlashMessageTrait;

    public function index() {
        HistoricHelpers::entry();

        $this->render('home/home');
    }

    public function postAction() {
        //Recebendo os dados do usuário;
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel');
        $body = filter_input(INPUT_POST, 'body');

        if($name && $email && $tel && $body) {
            
            PostHelpers::sendPost($name, $email, $tel, $body);

            $this->postEmail($email, $body);

            $this->flashMessage(
                'success',
                'Mensagem Enviada com sucesso! Em breve responderemos!'
            );
        } else {
            $this->flashMessage(
                'danger',
                'Digite todos os campos abaixo para enviar sua Mensagem!'
            );
            $this->redirect('/');
        }

    }

    public function radar() {
        $radar = RadarHelpers::getLast();
        
        $this->render('home/radar', [
            'radar' => $radar,
        ]);
    }
    //Função para receber os novos inscritos no radar;
    public function radarAction(){
        //Recebendo os dados;
        $email = filter_input(INPUT_POST, 'email');

        if(isset($email)){
            EmailHelpers::newEmail($email);
            
            $this->radarEmail($email);
            
            $this->flashMessage(
                'success',
                'Solicitação enviada com sucesso!'
            );
            $this->redirect('/radar');

        }
    }

    public function company() {
        $this->render('home/company');
    }

    public function companyAction() {
        //Recebendo os dados do usuário;
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel');
        $body = filter_input(INPUT_POST, 'body');

        if($name && $email && $tel && $body) {
            
            PostHelpers::sendPost($name, $email, $tel, $body);
            $this->postEmail($email, $body);
            
            $this->flashMessage(
                'success',
                'Mensagem Enviada com sucesso! Em breve responderemos!'
            );
        } else {
            $this->flashMessage(
                'danger',
                'Digite todos os campos abaixo para enviar sua Mensagem!'
            );
            $this->redirect('/empresa');
        }

        $this->redirect('/empresa');
    }

    public function city() {
        $this->render('home/city');
    }

    

}
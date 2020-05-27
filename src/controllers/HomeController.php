<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\PostHelpers;
use \src\helpers\HistoricHelpers;

class HomeController extends Controller {

    public function index() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        HistoricHelpers::entry();

        $this->render('home', [
            'flash' => $flash
        ]);
    }

    public function postAction() {
        //Recebendo os dados do usuário;
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel');
        $body = filter_input(INPUT_POST, 'body');

        if($name && $email && $tel && $body) {
            
            PostHelpers::sendPost($name, $email, $tel, $body);
            
            $_SESSION['flash'] = 'Mensagem Enviada com sucesso! Em breve responderemos!';
            

        } else {

            $_SESSION['flash'] = 'Digite todos os campos abaixo para enviar sua Mensagem!';

            $this->redirect('/');
        }

        $this->redirect('/');
    }

    public function radar() {
        $this->render('radar');
    }

    public function company() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('company', [
            'flash' => $flash
        ]);
    }

    public function companyAction() {
        //Recebendo os dados do usuário;
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel');
        $body = filter_input(INPUT_POST, 'body');

        if($name && $email && $tel && $body) {
            
            PostHelpers::sendPost($name, $email, $tel, $body);
            
            $_SESSION['flash'] = 'Mensagem Enviada com sucesso! Em breve responderemos!';
            

        } else {

            $_SESSION['flash'] = 'Digite todos os campos abaixo para enviar sua Mensagem!';

            $this->redirect('/empresa');
        }

        $this->redirect('/empresa');
    }

    public function city() {
        $this->render('city');
    }

    

}
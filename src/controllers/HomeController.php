<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\PostHelpers;
use \src\helpers\HistoricHelpers;
use \src\helpers\RadarHelpers;
use \src\helpers\EmailHelpers;

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
            //E-mail enviado para o admin com a mensagem
            $to = 'josebrunocampanholi@gmail.com';
            $subject = 'Fale conosco!';
            $message = $body;
            $headers = 'From: '.$email.'\r\n'.
                        'Reply-To: '.$email.'\r\n'.
                        'X-Mailer: PHP/'.phpversion();
            
            mail($to, $subject, $message, $headers);

            $_SESSION['flash'] = 'Mensagem Enviada com sucesso! Em breve responderemos!';
        } else {

            $_SESSION['flash'] = 'Digite todos os campos abaixo para enviar sua Mensagem!';

            $this->redirect('/');
        }

        $this->redirect('/');
    }

    public function radar() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $radar = RadarHelpers::getLast();
        
        $this->render('radar', [
            'radar' => $radar,
            'flash' => $flash
        ]);
    }
    //Função para receber os novos inscritos no radar;
    public function radarAction(){
        //Recebendo os dados;
        $email = filter_input(INPUT_POST, 'email');

        if(isset($email)){
            EmailHelpers::newEmail($email);
            //E-mail enviado para o radar com o e-mail de quem quer fazer a inscrição
            $to = 'radar@orbibrasil.com.br';
            $subject = 'Nova solicitação para o Radar';
            $message = 'Nova solicitação para o Radar!'.'\r\n';
            $headers = 'From: '.$email.'\r\n'.
                        'Reply-To: '.$email.'\r\n'.
                        'X-Mailer: PHP/'.phpversion();
            
            mail($to, $subject, $message, $headers);

            $_SESSION['flash'] = 'Solicitação enviada com sucesso!';
            $this->redirect('/radar');
            } else{
            $_SESSION['flash'] = 'Preencha seu e-mail';
            $this->redirect('/radar');
        }
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
            //E-mail enviado para o admin com a mensagem
            $to = 'josebrunocampanholi@gmail.com';
            $subject = 'Nova Mensagem na Orbi';
            $message = 'Mensagem enviada.'.'\r\n'.
                        $body;
            $headers = 'From: '.$email.'\r\n'.
                        'Reply-To: '.$email.'\r\n'.
                        'X-Mailer: PHP/'.phpversion();
            mail($to, $subject, $message, $headers);
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
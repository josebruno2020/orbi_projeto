<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;
use \src\helpers\HistoricHelpers;


class LoginController extends Controller {

    public function index() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('signin', [
            'flash' => $flash
        ]);
    }

    public function signinAction() {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        //Caso existir os dois campos, armazenamos na variável do token a verificação do Login;
        if($email && $password) {

            $token = UserHelpers::verifyLogin($email, $password);
            //Se o token existir, armazenamos na sessão;
            if($token) {
                //Função auxiliar para registrar o horário que o usuário logou no sistema através do e-mail;
                HistoricHelpers::entryHistory($email);

                $_SESSION['token'] = $token;
                $this->redirect('/my');
            } else {

                $_SESSION['flash'] = 'E-mail e/ou Senha não conferem ';
                $this->redirect('/login');
            }

            

        } else {
            $_SESSION['flash'] = 'Digite os campos de email e/ou senha novamente.';
            $this->redirect('/login');
        }
    }

    

    
    

}
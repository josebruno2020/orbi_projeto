<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;
use \src\helpers\HistoricHelpers;
define("BASE_URL", "http://localhost/orbi_projeto/public/");
//define("BASE_URL", "https://www.orbibrasil.com.br/public/");

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
    public function password() {

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('password', [
            'flash' => $flash
        ]);
    }
    //Ação de rercuperar a senha
    public function passwordAction() {
        //Recebendo os dados do usuário;
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email2 = filter_input(INPUT_POST, 'email2', FILTER_VALIDATE_EMAIL);

        if($email == $email2) {
            if(UserHelpers::emailExistis($email) == true) {

                $data = UserHelpers::getPassword($email);
                
                $link = BASE_URL.'nova-senha/'.$data->token;
                
                
                $subject = 'Esqueci Minha Senha';
                $message = 'Requerimento para a recuperação de senha.'.'\r\n'.
                            'Por favor, acesse o link para redefinir a sua senha: '.$link;
                $headers = 'From: orbibrasil@orbibrasil.com.br';
                
                mail($email, $subject, $message, $headers);
                $_SESSION['flash'] = 'Foi enviado um E-mail informando o link para redefinir uma nova senha!';
                $this->redirect('/login');
                
            } else {

                $_SESSION['flash'] = 'O E-mail informado não está cadastrado!';
                $this->redirect('/esqueci-senha');
            }

        } else {
            $_SESSION['flash'] = 'Os E-mails informados devem ser iguais!';
            $this->redirect('/esqueci-senha');

        }
    }

    public function newPassword($token) {

        if(UserHelpers::tokenExistis($token) == true) {

            $flash = '';
            if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
            }

            $user = UserHelpers::getByToken($token);

            $this->render('newPassword', [
                'flash' => $flash,
                'user' => $user,
                'token' => $token
            ]);

        } else {

            $_SESSION['flash'] = 'Token inválido!';
            $this->redirect('/esqueci-senha');
        }
        
    }

    public function newPasswordAction($token) {
        $pass = filter_input(INPUT_POST, 'password');
        $pass2 = filter_input(INPUT_POST, 'password2');
        
        if($pass == $pass2) {
            
            $user = UserHelpers::getByToken($token['token']);
            UserHelpers::updatePassword($user->id, $pass);
            $_SESSION['flash'] = 'Senha redefinida com sucesso!';
            $this->redirect('/login');
            
            
        } else {

            $_SESSION['flash'] = 'As duas senhas devem ser iguais!';
            $this->redirect('/nova-senha/'.$token['token']);
        }
    }
}
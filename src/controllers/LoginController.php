<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;
use \src\helpers\HistoricHelpers;
use src\services\FlashMessageTrait;

define("BASE_URL", "http://localhost/orbi_projeto/public/");
//define("BASE_URL", "https://www.orbibrasil.com.br/public/");

class LoginController extends Controller {
    use FlashMessageTrait;

    public function index() {
        
        $this->render('login/signin');
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

                $this->flashMessage(
                    'danger', 
                    'E-mail e/ou Senha não conferem'
                );
                //$_SESSION['flash'] = 'E-mail e/ou Senha não conferem ';
                $this->redirect('/login');
            }

        } else {

            $this->flashMessage(
                'danger', 
                'Digite os campos de email e/ou senha novamente.'
                );

            $this->redirect('/login');
        }
    }
    public function password() 
    {
        $this->render('login/password');
    }

    public function passwordAction() 
    {
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

                $this->flashMessage(
                    'success',
                    'Foi enviado um E-mail informando o link para redefinir uma nova senha!'
                );

                $this->redirect('/login');
                
            } else {
                $this->flashMessage(
                    'danger',
                    'O e-mail informado não está cadastrado!'
                );

                $this->redirect('/esqueci-senha');
            }

        } else {

            $this->flashMessage(
                'danger',
                'Os e-mails informados devem ser iguais!'
            );
            
            $this->redirect('/esqueci-senha');

        }
    }

    public function newPassword($token) {

        if(UserHelpers::tokenExistis($token) == true) {

            $user = UserHelpers::getByToken($token);

            $this->render('login/new-password', [
                'user' => $user,
                'token' => $token
            ]);

        } else {

            $this->flashMessage(
                'danger',
                'Token inválido!'
            );
            $this->redirect('/esqueci-senha');
        }
        
    }

    public function newPasswordAction($token) {
        $pass = filter_input(INPUT_POST, 'password');
        $pass2 = filter_input(INPUT_POST, 'password2');
        
        if($pass == $pass2) {
            
            $user = UserHelpers::getByToken($token['token']);
            UserHelpers::updatePassword($user->id, $pass);
            $this->flashMessage(
                'success',
                'Senha redefinida com sucesso!'
            );

            $this->redirect('/login');
            
            
        } else {

            $this->flashMessage(
                'danger',
                'As duas senhas devem ser iguais!'
            );
            
            $this->redirect('/nova-senha/'.$token['token']);
        }
    }
}
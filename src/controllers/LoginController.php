<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;


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

                $_SESSION['token'] = $token;
                $this->redirect('/my');
            } else {

                $_SESSION['flash'] = 'E-mail e/ou Senha não conferem ';
            }

            

        } else {
            $_SESSION['flash'] = 'Digite os campos de email e/ou senha novamente.';
            $this->redirect('/login');
        }
    }

    public function signup() {
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('signup', [
            'flash' => $flash
        ]);
    }

    public function signupAction() {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password1 = filter_input(INPUT_POST, 'password1');
        $password2 = filter_input(INPUT_POST, 'password2');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');

        //Verificando se as duas senhas foram corretas;
        if($password1 != $password2) {
            $_SESSOIN['flash'] = 'Confirmação de Senha incorreta!';
            $this->redirect('/cadastro');
        }

        if(UserHelpers::emailExistis($email) == false) {

            if($name && $email && $password1 && $city && $state) {
                $token = UserHelpers::addUser($name, $email, $password1, $city, $state);
                //Após adicionar o usuário, ele é armazenado na sessão, com o seu token;
                $_SESSION['token'] = $token;
                $this->redirect('/my');

            } else {

                $_SESSION['flash'] = 'Preencha todos os campos!';
                $this->redirect('/cadastro');
            }

            
        } else {

            $_SESSION['flash'] = 'E-mail já cadastrado!';
            $this->redirect('/cadastro');
        }
    }

    
    

}
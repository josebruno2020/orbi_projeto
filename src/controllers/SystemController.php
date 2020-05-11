<?php
namespace src\controllers;

use \core\Controller;

class SystemController extends Controller {

    private $loggedUser;

    //Colocamos essa verificação no construtor, pois esta parte do sistema a pessoa só poderá entrar se estiver logada; 
    // Caso contrário, será redirecionada para a página de Login;
    public function __contruct() {
        $this->loggedUser = UserHelpers::checkLogin();
        //Chamdno o método UserHelpers, com seu método estático onde vai verificar se o usuário fez o Login;
        //Ele vai armazenar na variável $loggedUser;
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }


    public function index() {
        $this->render('inicialPage');
    }

}
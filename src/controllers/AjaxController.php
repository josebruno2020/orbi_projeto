<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\HistoricHelpers;
use \src\helpers\UserHelpers;

class AjaxController extends Controller {
    private $loggedUser;

    //Colocamos essa verificação no construtor, pois esta parte do sistema a pessoa só poderá entrar se estiver logada; 
    // Caso contrário, será redirecionada para a página de Login;
    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();
        //Chamdno a classe UserHelpers, com seu método estático onde vai verificar se o usuário fez o Login;
        //Ele vai armazenar na variável $loggedUser;
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }

        
    }

    public function index() {
        
    }
    public function filtro(){
        $filtro = filter_input(INPUT_GET, 'filter');

        $hist = HistoricHelpers::getByFilter($filtro);
        $this->render('ajax-filtro', [
            
            'hist' => $hist,
            'loggedUser' => $this->loggedUser
        ]);

    }

}
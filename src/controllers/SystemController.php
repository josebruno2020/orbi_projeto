<?php
namespace src\controllers;

use \core\Controller;

use \src\helpers\UserHelpers;
use \src\helpers\HistoricHelpers;
use \src\helpers\RadarHelpers;
use src\services\FlashMessageTrait;

class SystemController extends Controller {
    
    use FlashMessageTrait;

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();

        if($this->loggedUser === false) {
            $this->redirect('/login');
        }

    }

    public function index() {

        $this->render('system/inicial-page', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    

    public function adminConfig() {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $this->render('system/system-config', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function historic() {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group != 'admin') {
            $this->redirect('/my');
        }
        $hist = HistoricHelpers::getByFilter($filter = '');
        
        $order = filter_input(INPUT_GET, 'order');
        
        
        HistoricHelpers::getAll($order);
        $this->render('system/historic', [
            'loggedUser' => $this->loggedUser,
            'hist' => $hist,
            'order' => $order
        ]);
    }

    

    public function dellHistoric($id) {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        HistoricHelpers::dellHistoric($id);
        $this->redirect('/system-config/historic');
    }

    public function hviController() {
        $this->render('hvi', [
            'loggedUser' => $this->loggedUser
        ]);
    }
    
    public function logout() {
        HistoricHelpers::exitHistory($this->loggedUser->email);
        $_SESSION['token'] = '';
        $this->redirect('/');   
    }

}
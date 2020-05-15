<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;
use \src\helpers\ContractHelpers;

class HomeController extends Controller {

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
        
        $order = filter_input(INPUT_GET, 'order');

        $contracts = ContractHelpers::getAll($order);

        $this->render('contracts',[
            'loggedUser' => $this->loggedUser,
            'contracts' => $contracts,
            'order' => $order
        ]);
    }

    public function contractsId($id) {

        $order = filter_input(INPUT_GET, 'order');
        $data = ContractHelpers::getAllContracts($order);
        $contracts = ContractHelpers::getAll($order = '');
        $this->render('contractsId', [
            'loggedUser' => $this->loggedUser,
            'order' => $order,
            'data' => $data,
            'contracts' => $contracts
        ]);
    }

    public function delContract($id) {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        ContractHelpers::delContract($id);
        $this->redirect('/contratos');
    }

    public function addContract() {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $order = filter_input(INPUT_GET, 'order');

        $user = UserHelpers::getAll($order);

        $this->render('addContract', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'flash' => $flash
        ]);

    }

    public function addContractAction() {
        //Recebendo os dados;
        $contract = $_FILES['contract'];
        $name = filter_input(INPUT_POST, 'name');
        $idUser = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');
        $link = 'media/contracts/';
        $new_name = md5($contract['name']).'.pdf';
        $permitido = 'application/pdf';

        

        if($contract['type'] != $permitido) {
            $_SESSION['flash'] = 'O arquivo deve ser em formato PDF!!';
            $this->redirect('/system-config/adicionar-contrato');
        }
        echo $date;

        //Se receber todos os dados, será salvo o arquivo na pasta do servidor e adicionado no banco de dados;
        if($name && $idUser && $date && $link && $new_name) {
            move_uploaded_file($_FILES['contract']['tmp_name'], $link.$new_name);
            ContractHelpers::addContract($name, $idUser, $date, $new_name);
            $_SESSION['flash'] = 'Documento salvo com sucesso!';
            $this->redirect('/system-config/adicionar-contrato');
        }
        
    }

}
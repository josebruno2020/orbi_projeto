<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;
use \src\helpers\ContractHelpers;

class ContractController extends Controller {

    private $loggedUser;
    private $cont;

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
        $hvi = ContractHelpers::getAllHvi($order);
        $nfs = ContractHelpers::getAllNf($order);
        
        $this->render('contractsId', [
            'loggedUser' => $this->loggedUser,
            'order' => $order,
            'data' => $data,
            'hvi' => $hvi,
            'nfs' => $nfs,
            'id' => $id
        ]);
    }

    //Função pública para deletar pastas de contrato;
    public function delFolder($id) {
        $folder = ContractHelpers::nameById($id);

        rmdir('media/contracts/'.$folder->name);
        ContractHelpers::delFolder($id);
        $this->redirect('/contratos');
    }

    public function delContract($id) {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }
        $file_name = ContractHelpers::getById($id);
        $folder_name = ContractHelpers::nameById($file_name->id_contract);

        unlink('media/contracts/'.$folder_name->name.'/'.$file_name->name);

        ContractHelpers::delContract($id);
        
    }

    public function addContract() {
        //Proteção contra clientes;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $user = UserHelpers::getAll($order = '');

        $this->render('addContract', [
            'flash' => $flash,
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);
    }

    public function addContractAction() {
        //Recebendo os dados do contrato;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $idUser = filter_input(INPUT_POST, 'id');

        $user = UserHelpers::getUser($idUser);

        
        if($name && $date && $idUser) {
            //Se recebe todos os dados, ele vai criar uma pasta com o nome do contrato, logo em seguida salvar no banco de dados;
            mkdir('media/contracts/'.$name, 0777);

            ContractHelpers::addContract($name, $date, $idUser, $user->email);
            $_SESSION['flash'] = 'Pasta de contrato adicionada com sucesso! Agora adicione documentos para ela!';
            $this->redirect('/system-config/adicionar-contrato');

        } else {

            $_SESSION['flash'] = 'Insira todos os dados!';
            $this->redirect('/system-config/adicionar-contrato');
        }
    }

    public function addContractFile() {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $cont = ContractHelpers::getAll($order = '');

        $this->render('addContractFile', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
            'flash' => $flash
        ]);

    }

    public function addContractFileAction() {
        //Recebendo os dados;
        $contract = $_FILES['contract'];
        $name = filter_input(INPUT_POST, 'name');
        $id_contract = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');

        //Selecionando o nome da a pasta(contrato) que tenha o mesmo valor que o id_contrato para guardar nela;
        $folder_name = ContractHelpers::nameById($id_contract);

        $link = 'media/contracts/'.$folder_name->name.'/';
        $new_name = md5($contract['name']).'.pdf';
        $permitido = 'application/pdf';

        if($contract['type'] != $permitido) {
            $_SESSION['flash'] = 'O arquivo deve ser em formato PDF!!';
            $this->redirect('/system-config/adicionar-documento');
        }
        

        //Se receber todos os dados, será salvo o arquivo na pasta do servidor e adicionado no banco de dados;
        if($name && $id_contract && $date && $link && $new_name) {
            move_uploaded_file($_FILES['contract']['tmp_name'], $link.$new_name);
            ContractHelpers::addContractFile($name, $id_contract, $date, $new_name, $link);
            $_SESSION['flash'] = 'Documento salvo com sucesso!';
            $this->redirect('/system-config/adicionar-documento');

        } else {

            $_SESSION['flash'] = 'Preencha todos os campos!';
            $this->redirect('/system-config/adicionar-documento');
        }
        
    }

    public function addHviFile() {
        //Proteção contra o acesso de clientes;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $cont = ContractHelpers::getAll($order = '');

        $this->render('addHvi', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
            'flash' => $flash
        ]);
    }

    public function addHviFileAction() {
        //Recebendo os dados do formulário;
        $hvi = $_FILES['hvi'];
        $name = filter_input(INPUT_POST, 'name');
        $id_contract = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');

        //Selecionando o nome da a pasta(contrato) que tenha o mesmo valor que o id_contrato para guardar nela;
        $folder_name = ContractHelpers::nameById($id_contract);

        $link = 'media/contracts/'.$folder_name->name.'/';
        $new_name = md5($hvi['name']).'.pdf';
        $permitido = 'application/pdf';

        if($hvi['type'] != $permitido) {
            $_SESSION['flash'] = 'O arquivo deve ser em formato PDF!!';
            $this->redirect('/system-config/adicionar-hvi');
        }

        //Se receber todos os dados, será salvo o arquivo na pasta do servidor e adicionado no banco de dados;
        if($name && $id_contract && $date && $link && $new_name) {
            move_uploaded_file($_FILES['hvi']['tmp_name'], $link.$new_name);
            ContractHelpers::addHviFile($name, $id_contract, $date, $new_name, $link);
            $_SESSION['flash'] = 'HVI salvo com sucesso!';
            $this->redirect('/system-config/adicionar-hvi');

        } else {

            $_SESSION['flash'] = 'Preencha todos os campos!';
            $this->redirect('/system-config/adicionar-hvi');
        }
    }

    public function addNf() {
        //Proteção contra o acesso de clientes;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $cont = ContractHelpers::getAll($order = '');

        $this->render('addNf', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
            'flash' => $flash
        ]);
    }

    public function addNfAction() {
        //Recebendo os dados;
        $nf = $_FILES['nf'];
        $name = filter_input(INPUT_POST, 'name');
        $id_contract = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');

        //Selecionando o nome da a pasta(contrato) que tenha o mesmo valor que o id_contrato para guardar nela;
        $folder_name = ContractHelpers::nameById($id_contract);

        $link = 'media/contracts/'.$folder_name->name.'/';
        $new_name = md5($nf['name'].time()).'.pdf';
        $permitido = 'application/pdf';

        if($nf['type'] != $permitido) {
            $_SESSION['flash'] = 'O arquivo deve ser em formato PDF!!';
            $this->redirect('/system-config/adicionar-nf');
        }

        //Se receber todos os dados, será salvo o arquivo na pasta do servidor e adicionado no banco de dados;
        if($name && $id_contract && $date && $link && $new_name) {
            move_uploaded_file($_FILES['nf']['tmp_name'], $link.$new_name);
            ContractHelpers::addNfFile($name, $id_contract, $date, $new_name, $link);
            $_SESSION['flash'] = 'NF salva com sucesso!';
            $this->redirect('/system-config/adicionar-nf');

        } else {

            $_SESSION['flash'] = 'Preencha todos os campos!';
            $this->redirect('/system-config/adicionar-nf');
        }
    }

}
<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;
use \src\helpers\ContractHelpers;
use \src\helpers\TenderHelpers;

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

    public function index($search = '') {
        
        $order = filter_input(INPUT_GET, 'order');

        $contracts = ContractHelpers::getAll($order);

        $tenders = TenderHelpers::getAll($order);
        $new = new UserHelpers();
        $this->render('contracts',[
            'loggedUser' => $this->loggedUser,
            'contracts' => $contracts,
            'tenders' => $tenders,
            'order' => $order,
            'new' => $new
        ]);
    }

    public function contractsId($id) {
        $order = filter_input(INPUT_GET, 'order');

        $file = ContractHelpers::getOne($id);

        $data = ContractHelpers::getAllContracts($order);
        $hvi = ContractHelpers::getAllHvi($order);
        $nfs = ContractHelpers::getAllNf($order);

        if(ContractHelpers::idExistis($id) == false) {
            $this->redirect('/contratos');
        }
        
        $this->render('contractsId', [
            'loggedUser' => $this->loggedUser,
            'file' => $file,
            'order' => $order,
            'data' => $data,
            'hvi' => $hvi,
            'nfs' => $nfs,
            'id' => $id
            
        ]);
    }

    public function tenderId($id) {
        $order = filter_input(INPUT_GET, 'order');
        $file = TenderHelpers::tenderById($id);
        $hvi = ContractHelpers::getAllHvi($order);

        $this->render('tenderId', [
            'loggedUser' => $this->loggedUser,
            'id' => $id,
            'order' => $order,
            'hvi' => $hvi,
            'file' => $file

        ]);
    }

    //Função pública para deletar pastas de contrato;
    public function delFolder($id) {
        $folder = ContractHelpers::nameById($id);

        rmdir('media/contracts/'.$folder->name);
        ContractHelpers::delFolder($id);
        $this->redirect('/contratos');
    }

    public function delTender($id) {
        $folder = TenderHelpers::nameById($id);

        rmdir('media/tenders/'.$folder->name);
        TenderHelpers::delFolder($id);
        $this->redirect('/contratos');
    }

    public function delContract($id) {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }
        //Função para deletar documento de contrato;
        $file_name = ContractHelpers::getById($id);
        $folder_name = ContractHelpers::nameById($file_name->id_contract);

        unlink('media/contracts/'.$folder_name->name.'/'.$file_name->name_server);

        ContractHelpers::delContract($id);
        $this->redirect('/contratos');
        
    }

    public function delHvi($id) {
        //Deletar o HVI que está na Pasta dos Contratos!!
        $file_name = ContractHelpers::hviById($id);
        $folder_name = ContractHelpers::nameById($file_name->id_contract);
        unlink('media/contracts/'.$folder_name->name.'/'.$file_name->name_server);

        ContractHelpers::delHvi($id);
        $this->redirect('/contratos');
    }

    public function delHviTender($id) {
        //Função para deletar HVI que está na pasta de Tenders;
        $file_name = ContractHelpers::hviById($id);
        $folder_name = TenderHelpers::tenderById($file_name->id_tender);
        unlink('media/tenders/'.$folder_name->name.'/'.$file_name->name);
        ContractHelpers::delHvi($id);
        $this->redirect('/contratos');
    }

    public function delNf($id) {
        //Função para deletar NF
        $file_name = ContractHelpers::nfById($id);
        $folder_name = ContractHelpers::nameById($file_name->id_contract);

        unlink('media/contracts/'.$folder_name->name.'/'.$file_name->name_server);

        ContractHelpers::delNf($id);
        $this->redirect('/contratos');
        
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

    public function contractsEdit($id) {
        $cont = ContractHelpers::getOne($id);
        $user = UserHelpers::getAll($order = '');

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        
        $this->render('editContract', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
            'user' => $user,
            'flash' => $flash
        ]);

    }
    //Página que fará as alterações nos dados do contrato;
    public function contractsEditAction($id){
        //Recebendo os dados do contrato
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $idUser = filter_input(INPUT_POST, 'id');

        $user = UserHelpers::getUser($idUser);
        $cont = ContractHelpers::getOne($id);

        if($name && $date && $idUser) {
            rename('media/contracts/'.$cont->name, 'media/contracts/'.$name);
            ContractHelpers::editFolder($id, $name, $date, $idUser, $user->email);
            $this->redirect('/contratos');
        } else {
            $_SESSION['flash'] = 'Preencha todos os campos!';
            $this->redirect('/contratos/'.$id['id'].'/editar');
        }
    }

    public function addTender() {
        //Proteção contra o acesso de clientes;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $user = UserHelpers::getAll($order = '');

        $this->render('addTender', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'flahs' => $flash
        ]);
    }

    
    public function addTenderAction() {
        //Recebendo os dados do contrato;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $idUser = filter_input(INPUT_POST, 'id');

        $user = UserHelpers::getUser($idUser);

        
        if($name && $date && $idUser) {
            //Se recebe todos os dados, ele vai criar uma pasta com o nome do contrato, logo em seguida salvar no banco de dados;
            mkdir('media/tenders/'.$name, 0777);

            TenderHelpers::addTender($name, $date, $idUser, $user->email);
            $_SESSION['flash'] = 'Pasta de contrato adicionada com sucesso! Agora adicione documentos para ela!';
            $this->redirect('/system-config/adicionar-contrato');

        } else {

            $_SESSION['flash'] = 'Insira todos os dados!';
            $this->redirect('/system-config/adicionar-contrato');
        }
    }

    public function tenderEdit($id) {

        $tender = TenderHelpers::tenderById($id);
        $user = UserHelpers::getAll($order = '');

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('editTender', [
            'loggedUser' => $this->loggedUser,
            'tender' => $tender,
            'user' => $user,
            'flash' => $flash
        ]);
    }

    public function tenderEditAction($id) {
        //Recebendo os novos dados da proposta;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $idUser = filter_input(INPUT_POST, 'id');

        $user = UserHelpers::getUser($idUser);
        $tender = TenderHelpers::tenderById($id);

        if($name && $date && $idUser) {
            rename('media/tenders/'.$tender->name, 'media/tenders/'.$name);
            TenderHelpers::editTender($id, $name, $date, $idUser, $user->email);
            $this->redirect('/contratos');
        } else {
            $_SESSION['flash'] = 'Preencha todos os campos!';
            $this->redirect('/propostas/'.$id['id'].'/editar');
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

    public function documentEdit($id) {

        $doc = ContractHelpers::getById($id);
        $file = ContractHelpers::getOne($doc->id_contract);
        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('editDocument', [
            'loggedUser' => $this->loggedUser,
            'doc' => $doc,
            'flash' => $flash,
            'file' => $file
        ]);
    }
    
    public function documentEditAction($id) {
        //Recebendo os novos dados do usuário;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');

        if($name && $date) {

            ContractHelpers::documentEdit($id, $name, $date);
            $_SESSION['flash'] = 'Alterações salvas no Documento';
            $this->redirect('/contratos/'.$id['id'].'/edit-document');

        } else {

            $_SESSION['flash'] = 'Preencha todos os campos!';
            $this->redirect('/contratos/'.$id['id'].'/edit-document');
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
        $tender = TenderHelpers::getAll($order = '');

        $this->render('addHvi', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
            'tender' => $tender,
            'flash' => $flash
        ]);
    }

    public function addHviFileAction() {
        //Recebendo os dados do formulário;
        $hvi = $_FILES['hvi'];
        $name = filter_input(INPUT_POST, 'name');
        $id_contract = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');
        $id_tender = filter_input(INPUT_POST, 'id_tender');

        
        if($id_contract) {
            //Selecionando o nome da a pasta que tenha o mesmo valor que o id_contrato para guardar nela;
            $folder_name = ContractHelpers::nameById($id_contract);

            $link = 'media/contracts/'.$folder_name->name.'/';
        } else {

            $folder_name = TenderHelpers::nameById($id_tender);
            $link = 'media/tenders/'.$folder_name->name.'/';
        }
        
        $new_name = md5($hvi['name'].time()).'.pdf';
        $permitido = 'application/pdf';

        if($hvi['type'] != $permitido) {
            $_SESSION['flash'] = 'O arquivo deve ser em formato PDF!!';
            $this->redirect('/system-config/adicionar-hvi');
        }

        //Se receber todos os dados, será salvo o arquivo na pasta do servidor e adicionado no banco de dados;
        if($id_tender || $id_contract) {
            move_uploaded_file($_FILES['hvi']['tmp_name'], $link.$new_name);
            if($id_tender) {
                $id_contract = '0';
            } else {
                $id_tender = '0';
            }
            
            ContractHelpers::addHviFile($name, $id_contract, $id_tender, $date, $new_name, $link);
            $_SESSION['flash'] = 'HVI salvo com sucesso!';
            $this->redirect('/system-config/adicionar-hvi');

        } else {

            $_SESSION['flash'] = 'Preencha todos os campos!';
            $this->redirect('/system-config/adicionar-hvi');
        }
    }


    public function hviEdit($id) {

        $hvi = ContractHelpers::hviById($id);
        $file = ContractHelpers::getOne($hvi->id_contract);
        $tender = TenderHelpers::tenderById($hvi->id_tender);

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        
        $this->render('editHvi', [
            'loggedUser' => $this->loggedUser,
            'hvi' => $hvi,
            'flash' => $flash,
            'file' => $file,
            'tender' => $tender
        ]);
    }

    public function hviEditAction($id) {
        //Recebendo os dados novos do HVI;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST,'date');

        if($name && $date) {

            ContractHelpers::hviedit($id, $name, $date);
            $_SESSION['flash'] = 'Alterações salvas no HVI!';
            $this->redirect('/contratos/'.$id['id'].'/edit-hvi');

        } else {

            $_SESSION['flash'] = 'Preencha todos os dados!';
            $this->redirect('/contratos/'.$id['id'].'/edit-hvi');
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

    public function nfEdit($id) {
        $nf = ContractHelpers::nfById($id);
        $file = ContractHelpers::getOne($nf->id_contract);

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('editNf', [
            'loggedUser' => $this->loggedUser,
            'nf' => $nf,
            'flash' => $flash,
            'file' => $file
        ]);
    }

    public function nfEditAction($id) {
        //Recebendo os dados novos do HVI;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST,'date');

        if($name && $date) {

            ContractHelpers::nfEdit($id, $name, $date);
            $_SESSION['flash'] = 'Alterações salvas na NF!';
            $this->redirect('/contratos/'.$id['id'].'/edit-nf');

        } else {

            $_SESSION['flash'] = 'Preencha todos os dados!';
            $this->redirect('/contratos/'.$id['id'].'/edit-nf');
        }
    }
    
}

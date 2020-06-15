<?php
namespace src\controllers;

use \core\Controller;

use \src\helpers\UserHelpers;
use \src\helpers\HistoricHelpers;

class SystemController extends Controller {

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
        

        $this->render('inicialPage', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function config() {
        $user = UserHelpers::getUser($this->loggedUser->id);

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('config', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'flash' => $flash
        ]);

    }

    public function configAction() {
        //Recebendo os dados do usuário;
        $name = filter_input(INPUT_POST, 'name');
        $tel = filter_input(INPUT_POST, 'tel');
        $password1 = filter_input(INPUT_POST, 'password1');
        $password2 = filter_input(INPUT_POST, 'password2');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $group = filter_input(INPUT_POST, 'group');

        
        $avatar = $_FILES['avatar'];
        //Extensões permitidas para avatar;
        $tipo = $avatar['type'];
        //Extensão do arquivo;
        $extension = strtolower(substr($_FILES['avatar']['name'], -4));
        

        //Verificando se as duas senhas foram corretas;
        if($password1 != $password2) {
            $_SESSOIN['flash'] = 'Confirmação de Senha incorreta!';
            $this->redirect('/config');
        }

        UserHelpers::updateUser($this->loggedUser->id, $name, $tel, $password1, $city, $state, $group);


        

        //Procedimento para mudar a foto do avatar;
        if(isset($avatar)) {

           
            if(in_array($tipo, array('image/jpeg', 'image/png'))) {

                $avatarName = md5(time().rand(0,999)).$extension;

                //Movendo o arquivo para a pasta de avatar já com o novo nome;
                move_uploaded_file($_FILES['avatar']['tmp_name'], 'media/avatars/'.$avatarName);
                //Processo de ajustar o tamanho da imagem do usuário;
                list($width_orig, $height_orig) = getimagesize('/media/avatars/'.$avatarName);
                $ratio = $width_orig/$height_orig;

                $width = 500;
                $height = 500;

                if($width/$height > $ratio) {
                    $width = $height*$ratio;
                } else {
                    $height = $width/$ratio;
                }

                $img = imagecreatetruecolor($width, $height);
                if($tipo == 'image/jpeg') {
                    $origi = imagecreatefromjpeg('/media/avatars/'.$avatarName.'jpg');
                } elseif($tipo == 'image/png') {
                    $origi = imagecreatefrompng('/media/avatars/'.$avatarName.'png');
                }

                imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                imagejpeg($img, '/media/avatars/'.$avatarName, 80);
                
                UserHelpers::updateAvatar($this->loggedUser->id, $avatarName);

            } else {

                $_SESSION['flash'] = 'Apenas permitido arquivos em "png" ou "jpg"!';
                $this->redirect('/config');
            }
        }

        $_SESSION['flash'] = 'Alterações salvas com sucesso!';
        $this->redirect('/config');

        
    }

    public function adminConfig() {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $this->render('system-config', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    //Página de cadastro(apenas disponível para o admin);
    public function signup() {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('signup', [
            'flash' => $flash,
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function signupAction() {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password1 = filter_input(INPUT_POST, 'password1');
        $password2 = filter_input(INPUT_POST, 'password2');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $group = filter_input(INPUT_POST, 'group');

        //Verificando se as duas senhas foram corretas;
        if($password1 != $password2) {
            $_SESSOIN['flash'] = 'Confirmação de Senha incorreta!';
            $this->redirect('/cadastro');
        }

        if(UserHelpers::emailExistis($email) == false) {

            if($name && $email && $password1 && $city && $state && $group) {
                UserHelpers::addUser( $name, $email, $password1, $city, $state, $group);
                //Após adicionar o usuário, ele é armazenado na sessão, com o seu token;
                $this->redirect('/system-config/user-list');

            } else {

                $_SESSION['flash'] = 'Preencha todos os campos!';
                $this->redirect('/system-config/cadastrar');
            }

            
        } else {

            $_SESSION['flash'] = 'E-mail já cadastrado!';
            $this->redirect('/system-config/cadastrar');
        }
    }

    public function userList() {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }
        //Recebendo os dados para ordenar;
        $order = filter_input(INPUT_GET, 'order');
        

        $userList = UserHelpers::getAll($order);

        $this->render('userList', [
            'loggedUser' => $this->loggedUser,
            'userList' => $userList,
            'order' => $order
            ]);
    }

    public function userConfig($id) {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $user = UserHelpers::getUser($id);

        $this->render('userConfig', [
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);
    }

    public function userConfigAction($id) {
        //Pegando as informações do usuário;
        //O id já veio pela url;
        $name = filter_input(INPUT_POST, 'name');
        $tel = filter_input(INPUT_POST, 'tel');
        $password1 = filter_input(INPUT_POST, 'password1');
        $password2 = filter_input(INPUT_POST, 'password2');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $avatar = filter_input(INPUT_POST, 'avatar');
        $group = filter_input(INPUT_POST, 'group');

        //Verificando se as duas senhas foram corretas;
        if($password1 != $password2) {
            $_SESSOIN['flash'] = 'Confirmação de Senha incorreta!';
            $this->redirect('/config');
        }

        
        UserHelpers::updateUser($id, $name, $tel, $password1, $city, $state, $group);
        
        $this->redirect('/system-config/user-list');
    }

    public function dellUser($id) {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $delUser = UserHelpers::delUser($id);
        $this->redirect('/system-config/user-list');
    }

    public function historic() {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group != 'admin') {
            $this->redirect('/my');
        }
        $filter = filter_input(INPUT_GET, 'filter');
        $hist = HistoricHelpers::getByFilter($filter);
        
        $order = filter_input(INPUT_GET, 'order');
        
        
        HistoricHelpers::getAll($order);
        $this->render('historic', [
            'loggedUser' => $this->loggedUser,
            'hist' => $hist,
            'order' => $order,
            'filter' => $filter
            
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
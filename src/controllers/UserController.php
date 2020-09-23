<?php

namespace src\controllers;

use core\Controller;
use src\helpers\ContractHelpers;
use src\helpers\TenderHelpers;
use src\helpers\UserHelpers;
use src\services\DeleteFolderTrait;
use src\services\DeleteTenderTrait;
use src\services\FlashMessageTrait;
use src\services\PhotoUploadTrait;

class UserController extends Controller{

    use FlashMessageTrait;
    use PhotoUploadTrait;
    use DeleteFolderTrait;
    use DeleteTenderTrait;

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();

        if($this->loggedUser === false) {
            $this->redirect('/login');
        }

    }

    public function config() {
        $user = UserHelpers::getUser($this->loggedUser->id);

        $this->render('user/meus-dados', [
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);

    }

    public function configAction() {
        //Recebendo os dados do usuário;
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
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
            $this->flashMessage(
                'danger',
                'Confirmação de Senha incorreta!'
            );

            $this->redirect('/meus-dados');
        }

        UserHelpers::updateUser($this->loggedUser->id, $name, $email, $tel, $password1, $city, $state, $group);

        //Procedimento para mudar a foto do avatar;
        if($_FILES['avatar']['error'] != 4) {
           
            if(in_array($tipo, array('image/jpeg', 'image/png'))) {

                $avatarName = $this->PhotoUpload($avatar, $tipo, $extension);
                
                UserHelpers::updateAvatar($this->loggedUser->id, $avatarName);
                $this->flashMessage(
                    'success',
                    'Imagem salva com sucesso!'
                );
                $this->redirect('/meus-dados');
            } else {

                $this->flashMessage(
                    'danger',
                    'Apenas permitido arquivos em "png" ou "jpg"!'
                );
                $this->redirect('/meus-dados');
            }
        }
        

        $this->flashMessage(
            'success',
            'Alterações salvas com sucesso!'
        );
        $this->redirect('/meus-dados');
        
        
    }
    
    public function signup() {
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }
        
        $this->render('user/signup', [
            'loggedUser' => $this->loggedUser
        ]);
    }

    public function signupAction() {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password1 = filter_input(INPUT_POST, 'password1');
        $password2 = filter_input(INPUT_POST, 'password2');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $group = filter_input(INPUT_POST, 'group');
        
        //Verificando se as duas senhas foram corretas;
        if($password1 != $password2) {

            $this->flashMessage(
                'danger',
                'Confirmação de Senha incorreta!'
            );
            $this->redirect('/cadastrar-novo-usuario');
        }

        if(!UserHelpers::emailExistis($email)) {

            if($name && $email && $password1 && $city && $state && $group) {

                UserHelpers::addUser($name, $email, $password1, $city, $state, $group);
                
                $this->flashMessage(
                    'success',
                    'Usuário cadastrado com sucesso!'
                );
                $this->redirect('/cadastrar-novo-usuario');

            } else {
                $this->flashMessage(
                    'danger',
                    'Preencha todos os campos!'
                );
                $this->redirect('/cadastrar-novo-usuario');
            }
            
        } else {

            $this->flashMessage(
                'danger',
                'E-mail já cadastrado!'
            );
            $this->redirect('/cadastrar-novo-usuario');
        }
    }

    public function userList() {
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }
        //Recebendo os dados para ordenar;
        $order = filter_input(INPUT_GET, 'order');

        $userList = UserHelpers::getAll($order);

        $this->render('user/user-list', [
            'loggedUser' => $this->loggedUser,
            'userList' => $userList,
            'order' => $order
            ]);
    }

    public function userConfig($id) {
        //Verificação se o id existe;
        if(UserHelpers::idExistis($id) == false){

            $this->redirect('/listar-usuarios');

        }
        if($this->loggedUser->group == 'client' || $this->loggedUser->group == 'client2') {
            $this->redirect('/my');
        }

        $user = UserHelpers::getUser($id);

        $this->render('user/user-config', [
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);
    }

    public function userConfigAction($id) {
        //Pegando as informações do usuário;
        //O id já veio pela url;
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
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

        
        UserHelpers::updateUser($id, $name, $email, $tel, $password1, $city, $state, $group);

        $this->flashMessage(
            'success',
            'Alterações salvas com sucesso!'
        );
        $this->redirect('/listar-usuarios');
    }


    public function dellUser($id) {
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }
        
        $user = UserHelpers::getUser($id);
        $folder = ContractHelpers::getByIdUser($user->id, $order=null);

        for($i=0;$i<count($folder);$i++){
            $this->deleteFolder($folder[$i]['id']);
        }

        $tender = TenderHelpers::getByIdUser($user->id);

        for($i=0;$i<count($tender);$i++){
            $this->deleteTender($tender[$i]['id']);
        }

        unlink('media/avatars/'.$user->avatar);
        UserHelpers::delUser($user->id);
        $this->flashMessage(
            'success',
            'Usuário excluído com sucesso!'
        );
        $this->redirect('/listar-usuarios');
    }

}
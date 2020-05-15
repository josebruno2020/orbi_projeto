<?php
namespace src\helpers;

use \core\Controller;
use \src\models\User;
use \src\models\Time;

class UserHelpers {

    //Metódo estático para verificar com o token se o usuário está logado;
    public static function checkLogin() {
        if(!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            if(count($data) > 0) {

                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->name = $data['name'];
                $loggedUser->email = $data['email'];
                $loggedUser->city = $data['city'];
                $loggedUser->state = $data['state'];
                $loggedUser->avatar = $data['avatar'];
                $loggedUser->group = $data['group'];

                return $loggedUser;
            }
        }
        return false;
    }

    public static function verifyLogin($email, $password) {
        //Verificamos se existe no banco de dados com o email enviado;
        $user = User::select()->where('email', $email)->one();
        //Se encontramos, atualizamos o token e retornamos;
        if($user) {
            if(password_verify($password, $user['password'])) {
                $token = md5(time().rand(0,9999).time());
                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                ->execute();

                return $token;
            }
        }
        return false;
    }

    public static function emailExistis($email) {
        $user = User::select()->where('email', $email)->one();

        return $user ? true : false;
    }

    public static function addUser($name, $email, $password1, $city, $state, $group) {
        $hash = password_hash($password1, PASSWORD_DEFAULT);
        $token =  md5(time().rand(0,9999).time());
        //Inserindo um novo usuário no Banco de Dados;

        User::insert([
            'name' => $name,
            'email' => $email,
            'password' => $hash,
            'city' => $city,
            'state' => $state,
            'group' => $group
        ])
        ->execute();

        
    }

    public static function getUser($id) {
        //Procurando o usuário de acordo com o seu id;
        $data = User::select()->where('id', $id)->one();

        if(count($data) > 0) {
            $user = new User();
            $user->id = $data['id'];
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->tel = $data['tel'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->group = $data['group'];
            $user->avatar = $data['avatar'];

            return $user;

        } else {

            return false;
        }
    }
    
    public static function updateUser($id, $name, $tel, $password1, $city, $state, $group) {
        $hash = password_hash($password1, PASSWORD_DEFAULT);
        
        User::update()
            ->set('name', $name)
            ->set('tel', $tel)
            ->set('city', $city)
            ->set('state', $state)
            ->where('id', $id)
        ->execute();

        if(!empty($password1)) {

            User::update()
                ->set('password', $hash)
                ->where('id', $id)
            ->execute();
        }

        if(!empty($group)) {
            User::update()
                ->set('group', $group)
                ->where('id', $id)
            ->execute();

        }
    }

    public static function updateUserId($id, $name, $tel, $password1, $city, $state) {
        $hash = password_hash($password1, PASSWORD_DEFAULT);

        User::update()
            ->set('name', $name)
            ->set('tel', $tel)
            ->set('city', $city)
            ->set('state', $state)
            ->where('id', $id)
        ->execute();

        if(!empty($password1)) {

            User::update()
                ->set('password', $hash)
                ->where('id', $id)
            ->execute();
        }
    }

    public static function updateAvatar($id, $avatarName) {

        User::update()
            ->set('avatar', $avatarName)
            ->where('id', $id)
        ->execute();
    }

    //Função auxiliar para selecionar todos os usuários do Banco de Dados, e colocando a ordem respectiva;
    public static function getAll($order) {

        if($order) {
            $data = User::select()->orderBy($order, 'asc')->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } else {
            $data = User::select()->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }

        }
    }

    public static function delUser($id) {
        User::delete()->where('id', $id)->execute();
    }
}      
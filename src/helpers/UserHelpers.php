<?php
namespace src\helpers;

use \core\Controller;
use \src\models\User;

class UserHelpers {

    //Metódo estático para verificar com o token se o usuário está logado;
    public static function checkLogin() {
        if(!empty($token)) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();

            if(count($data) > 0) {

                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->name = $data['name'];
                $loggedUser->email = $data['email'];
                $loggedUser->city = $data['city'];
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

    public static function addUser($name, $email, $password1, $city, $state) {
        $hash = password_hash($password1, PASSWORD_DEFAULT);
        $token =  md5(time().rand(0,9999).time());
        //Inserindo um novo usuário no Banco de Dados;

        User::insert([
            'name' => $name,
            'email' => $email,
            'password' => $hash,
            'city' => $city,
            'state' => $state,
            'token' => $token
        ])
        ->execute();

        return $token;
    }
}      
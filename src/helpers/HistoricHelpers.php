<?php
namespace src\helpers;

use \core\Controller;
use \src\models\Time;
use \src\models\View;

class HistoricHelpers {

    //Função auxiliar para registrar o horário que o usuário logou no sistema;
    public static function entryHistory($email) {
        $ip = $_SERVER['REMOTE_ADDR'];
        
        Time::insert([
            'email_user' => $email,
            'type' => 'Entrada',
            'date' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'ip' => $ip
        ])
        ->execute();
    }

    //Função para registrar a hora de saida do usuário do sistema;
    public static function exitHistory($email) {
        $ip = $_SERVER['REMOTE_ADDR'];

        Time::insert([
            'email_user' => $email,
            'type' => 'Saida',
            'date' => date('Y-m-d H:i:s'),
            'time' => date('H:i:s'),
            'ip' => $ip
        ])
        ->execute();
    }

    public static function entry() {
        $ip = $_SERVER['REMOTE_ADDR'];


        View::insert([
            'ip' => $ip,
            'date' => date('Y-m-d'),
            'time' => date('H:i', time())
        ])
        ->execute();
    }

    //Função para selecionar todos os campos do Banco de Dados;
    public static function getAll($order) {
        

        if($order) {
            $data = Time::select()
                ->orderBy($order, 'desc')
            ->get();

            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        }else {
            $data = Time::select()->get();

            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }

        }


    }

    public static function getByFilter($filter) {
        $data = Time::select()->where('email_user', 'like', '%'.$filter.'%')->get();

        if(count($data) > 0) {
            return $data;

        } else {
            return false;
        }
    }

    public static function dellHistoric($id) {
        Time::delete()->where('id', $id)->execute();
    }
    
}


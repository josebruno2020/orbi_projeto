<?php
namespace src\helpers;

use \core\Controller;
use \src\models\ContractFile;
use \src\models\Contract;

class ContractHelpers {

    public static function getAll($order) {
        if($order == 'name') {
            $data = Contract::select()->orderBy($order, 'asc')->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } if ($order == 'date') {
            $data = Contract::select()->orderBy($order, 'desc')->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } else {
            $data = Contract::select()->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        }
    }

    public static function addContract($name, $idUser, $date, $new_name) {
        $link = 'http://localhost/orbi_projeto/public/media/contracts/'.$new_name;

        ContractFile::insert([
            'name' => $name,
            'id_user' => $idUser,
            'date' => $date,
            'name_server' => $new_name,
            'link' => $link
        ])
        ->execute();
    }

    public static function delContract($id) {
        ContractFile::delete()->where('id', $id)->execute();
    }

    public static function getAllContracts($order) {
        
        if($order) {
            $data = ContractFile::select()->orderBy($order, 'asc')->get();

            if(count($data) > 0) {
                return $data;

            } else {
                return false;
            }

        } else {

            $data = ContractFile::select()->get();
            if(count($data) >0) {
                return $data;
            } else {
                return false;
            }
        }
        

       
    }
    
}
<?php
namespace src\helpers;

use \core\Controller;
use \src\models\ContractFile;
use \src\models\Contract;
use \src\models\HviFile;
use \src\models\NfFile;

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

    public static function nameById($id) {
        $data = Contract::select()->where('id', $id)->one();

        $folder = new Contract();
        $folder->name = $data['name'];

        return $folder;

    }

    //Função auxiliar para adicionar um contrato no banco de dados;
    public static function addContract($name, $date, $idUser, $email) {
        
        Contract::insert([
            'name' => $name,
            'id_user' => $idUser,
            'date' => $date,
            'email_user' => $email
        ])
        ->execute();
    }

    public static function addContractFile($name, $id_contract, $date, $new_name, $link) {
        $link = 'http://localhost/orbi_projeto/public/'.$link.$new_name;

        ContractFile::insert([
            'name' => $name,
            'id_contract' => $id_contract,
            'name_server' => $new_name,
            'date' => $date,
            'link' => $link
        ])
        ->execute();
    }

    public static function getById($id) {
        $data = ContractFile::select()->where('id', $id)->one();

        $file_name = new ContractFile();
        $file_name->name = $data['name_server'];
        $file_name->id_contract = $data['id_contract'];

        return $file_name;
    }

    public static function delContract($id) {
        ContractFile::delete()->where('id', $id)->execute();
    }

    public static function delFolder($id) {
        Contract::delete()->where('id', $id)->execute();
    }

    public static function addHviFile($name, $id_contract, $date, $new_name, $link) {
        $link = 'http://localhost/orbi_projeto/public/'.$link.$new_name;

        HviFile::insert([
            'name' => $name,
            'id_contract' => $id_contract,
            'name_server' => $new_name,
            'link' => $link,
            'date' => $date
        ])
        ->execute();
    }

    public static function addNfFile($name, $id_contract, $date, $new_name, $link) {
        $link = 'http://localhost/orbi_projeto/public/'.$link.$new_name;

        NfFile::insert([
            'name' => $name,
            'id_contract' => $id_contract,
            'name_server' => $new_name,
            'link' => $link,
            'date' => $date
        ])
        ->execute();
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

    public static function getAllHvi($order){

        if($order) {
            $data = HviFile::select()->orderBy($order, 'asc')->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } else {
            $data = HviFile::select()->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        }
    }
    public static function getAllNf($order){
        if($order) {
            $data = NfFile::select()->orderBy($order, 'asc')->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } else {
            $data = NfFile::select()->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        }
    }
    
}
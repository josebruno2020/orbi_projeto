<?php
namespace src\helpers;

use \core\Controller;
use \src\models\ContractFile;
use \src\models\Contract;
use \src\models\HviFile;
use \src\models\NfFile;
use \src\models\Tender;

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

    public function editFolder($id, $name, $date, $idUser, $email) {
        Contract::update()
            ->set('name', $name)
            ->set('id_user', $idUser)
            ->set('date', $date)
            ->set('email_user', $email)
            ->where('id', $id)
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

    public static function documentEdit($id, $name, $date) {

        ContractFile::update()
            ->set('name', $name)
            ->set('date', $date)
            ->where('id', $id)
        ->execute();
    }
    //Função que retorna todas as informações da tabela dos contratos;
    public static function getOne($id) {

        if($id != '0') {

            $data = Contract::select()->where('id', $id)->one();

            $file = new Contract();
            $file->id = $data['id'];
            $file->name = $data['name'];
            $file->id_user = $data['id_user'];
            $file->email_user = $data['email_user'];
            $file->date = $data['date'];

            return $file;

        } else {
            return false;
        }
        
    
        
        
        
    }
    //Função que retorna o nome do contrato de acordo com o id recebido (retorna como objeto);
    public static function getById($id) {
        $data = ContractFile::select()->where('id', $id)->one();

        $file = new ContractFile();
        $file->id = $data['id'];
        $file->name_server = $data['name_server'];
        $file->id_contract = $data['id_contract'];
        $file->name = $data['name'];
        $file->date = $data['date'];

        return $file;
    }
    //Função que retorna o nome da NF de acordo com o id recebido (retorna como objeto);
    public static function nfById($id) {
        $data = NfFile::select()->where('id', $id)->one();

        $file = new NfFile();
        $file->id = $data['id'];
        $file->name = $data['name'];
        $file->name_server = $data['name_server'];
        $file->id_contract = $data['id_contract'];
        $file->date = $data['date'];

        return $file;
    }

    public static function hviById($id) {
        $data = HviFile::select()->where('id', $id)->one();

        $file = new HviFile();
        $file->id = $data['id'];
        $file->name = $data['name'];
        $file->name_server = $data['name_server'];
        $file->id_contract = $data['id_contract'];
        $file->id_tender = $data['id_tender'];
        $file->date = $data['date'];

        return $file;
    }

    public static function delContract($id) {
        ContractFile::delete()->where('id', $id)->execute();
    }

    public static function delHvi($id) {
        HviFile::delete()->where('id', $id)->execute();
    }

    public static function delNf($id) {
        NfFile::delete()->where('id', $id)->execute();
    }

    public static function delFolder($id) {
        Contract::delete()->where('id', $id)->execute();
    }

    public static function addHviFile($name, $id_contract, $id_tender, $date, $new_name, $link) {
        $link = 'http://localhost/orbi_projeto/public/'.$link.$new_name;

        HviFile::insert([
            'name' => $name,
            'name_server' => $new_name,
            'link' => $link,
            'id_contract' => $id_contract,
            'id_tender' => $id_tender,
            'date' => $date
        ])
        ->execute();
    }

    public static function hviedit($id, $name, $date) {

        HviFile::update()
            ->set('name', $name)
            ->set('date', $date)
            ->where('id', $id)
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

    public static function nfEdit($id, $name, $date) {

        NfFile::update()
            ->set('name', $name)
            ->set('date', $date)
            ->where('id', $id)
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
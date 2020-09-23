<?php
namespace src\helpers;

use \core\Controller;
use \src\models\ContractFile;
use \src\models\Contract;
use \src\models\HviFile;
use \src\models\NfFile;


class ContractHelpers {

    public static function getAll($order) {
        if(isset($order) && !is_null($order)) {
            $data = Contract::select()->orderBy($order, 'asc')->get();
            if(count($data) > 0) {
                return $data;
            } 
        
        } else {
            $data = Contract::select()->get();
            if(count($data) > 0) {
                return $data;
            }
        }
    }
    public static function getTotalPagina($p, $por_pagina) 
    {
        $offset = ($p - 1) * $por_pagina;
        $data = Contract::select()
            ->orderBy('id', 'asc')
            ->limit($por_pagina)
            ->offset($offset)
            ->get();

        if(count($data) > 0){
            return $data;
        }
    }

    public static function nameById($id)
    {
        $data = Contract::select()->where('id', $id)->one();

        $folder = new Contract();
        $folder->name = $data['name'];

        return $folder;

    }

    public function getOneByIdUser($id)
    {
        $data = Contract::select()
            ->where('id_user', $id)
            ->one();
        
        if(count($data) > 0){
            $cont = new Contract();
            $cont->id = $data['id'];
            $cont->name = $data['name'];
        }
        return $cont;
    }

    public function getByIdUser($id, $order)
    {
        if(isset($order) && !is_null($order)){
            $data = Contract::select()
            ->where('id_user', $id)
            ->orderBy($order, 'asc')
            ->get();
            
        if(count($data) > 0) {
            return $data;
        }
        }
        
        $data = Contract::select()
            ->where('id_user', $id)
            ->get();
            
        if(count($data) > 0) {
            return $data;
        }
    }

    public function getByFilter($filtro)
    {
        $data = Contract::select()
            ->where('name', 'like', '%'.$filtro.'%')
            ->get();
        
        if(count($data) > 0){
            return $data;
        }
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

        ContractFile::insert([
            'name' => $name,
            'id_contract' => $id_contract,
            'name_server' => $new_name,
            'date' => $date,
            'link' => ''
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

    //Função usada na página de Contratos com id, para verificar se o id mandado no Get está correto;
    public static function idExistis($id) {
        $data = Contract::select()->where('id', $id)->one();

        return $data ? true : false;
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

    

    public static function delContract($id) {
        ContractFile::delete()->where('id', $id)->execute();
    }

    


    public static function delFolder($id) {
        Contract::delete()->where('id', $id)->execute();
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

    public function getAllIdFolder($id)
    {
        $data = ContractFile::select()
            ->where('id_contract', $id)
            ->get();

        if(count($data) > 0){
            return $data;
        }
    }
    
    
    
}
<?php
namespace src\helpers;

use \core\Controller;
use \src\models\Tender;

class TenderHelpers {

    public static function getAll($order) {

        if($order) {
            $data = Tender::select()->orderBy($order, 'asc')->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } else {

            $data = Tender::select()->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        }
    }

    public static function idExistis($id) {
        $data = Tender::select()->where('id', $id)->one();

        return $data ? true : false;
    }

    //Função pública que retorna o nome do 'tender' em forma de objeto;
    public static function nameById($id) {
        $data = Tender::select()->where('id', $id)->one();

        $tender = new Tender();
        $tender->name = $data['name'];

        return $tender;
    }
    public static function tenderById($id) {

        if($id != '0') {
            $data = Tender::select()->where('id', $id)->one();

            $folder = new Tender();
            $folder->id = $data['id'];
            $folder->name = $data['name'];
            $folder->id_user = $data['id_user'];
            $folder->email_user = $data['email_user'];
            $folder->date = $data['date'];

            return $folder;
        } else {
            return false;
        }
        

    }
    
    public static function addTender($name, $date, $idUser, $email) {
        Tender::insert([
            'name' => $name,
            'id_user' => $idUser,
            'email_user' => $email,
            'date' => $date,
            'status' => '1'
        ])
        ->execute();
    }

    public function editTender($id, $name, $date, $idUser, $email) {

        Tender::update()
            ->set('name', $name)
            ->set('id_user', $idUser)
            ->set('email_user', $email)
            ->set('date', $date)
            ->where('id', $id)
        ->execute();
    }

    public static function delFolder($id) {

        Tender::delete()->where('id', $id)->execute();
    }
    
}
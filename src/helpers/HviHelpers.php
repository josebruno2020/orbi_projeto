<?php

namespace src\helpers;

use src\models\HviFile;

class HviHelpers {

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

    public function getAllIdFolder($id)
    {
        $data = HviFile::select()
            ->where('id_contract', $id)
            ->get();

        if(count($data) > 0){
            return $data;
        }
    }

    public function getAllIdTender($id)
    {
        $data = HviFile::select()
            ->where('id_tender', $id)
            ->get();

        if(count($data) > 0){
            return $data;
        }
    }

    public static function addHviFile($name, $id_contract, $id_tender, $date, $new_name, $link) {
        
        HviFile::insert([
            'name' => $name,
            'name_server' => $new_name,
            'link' => '',
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

    public static function delHvi($id) {
        HviFile::delete()->where('id', $id)->execute();
    }

}
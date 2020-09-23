<?php

namespace src\helpers;

use src\models\NfFile;

;

class NfHelpers {

    
    /**
     * Undocumented function
     *
     * @param int $id
     * @return NfFile
     */
    public static function nfById(int $id) 
    {
        $data = NfFile::select()->where('id', $id)->one();

        $file = new NfFile();
        $file->id = $data['id'];
        $file->name = $data['name'];
        $file->name_server = $data['name_server'];
        $file->id_contract = $data['id_contract'];
        $file->date = $data['date'];

        return $file;
    }

    public static function getAllNf($order)
    {
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

    public function getAllIdFolder($id)
    {
        $data = NfFile::select()
            ->where('id_contract', $id)
            ->get();

        if(count($data) > 0){
            return $data;
        }
    }

    public static function addNfFile($name, $id_contract, $date, $new_name) 
    {
        
        NfFile::insert([
            'name' => $name,
            'id_contract' => $id_contract,
            'name_server' => $new_name,
            'link' => '',
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


    public static function delNf($id) :void
    {
        NfFile::delete()->where('id', $id)->execute();
    }

}
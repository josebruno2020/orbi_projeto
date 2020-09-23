<?php

namespace src\helpers;

use src\models\PlanilhaFile;

;

class PlanilhaHelpers {

    //Função que retorna o nome da NF de acordo com o id recebido (retorna como objeto);
    /**
     * Undocumented function
     *
     * @param int $id
     * @return PlanilhaFile
     */
    public static function planilhaById(int $id) 
    {
        $data = PlanilhaFile::select()->where('id', $id)->one();

        $file = new PlanilhaFile();
        $file->id = $data['id'];
        $file->name = $data['name'];
        $file->name_server = $data['name_server'];
        $file->id_contract = $data['id_contract'];
        $file->date = $data['date'];

        return $file;
    }

    public static function getAllPlanilha($order)
    {
        if($order) {
            $data = PlanilhaFile::select()->orderBy($order, 'asc')->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } else {
            $data = PlanilhaFile::select()->get();
            if(count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        }
    }

    public function getAllIdFolder($id)
    {
        $data = PlanilhaFile::select()
            ->where('id_contract', $id)
            ->get();

        if(count($data) > 0){
            return $data;
        }
    }

    public static function addPlanilhaFile($name, $id_contract, $date, $new_name) 
    {
        
        PlanilhaFile::insert([
            'name' => $name,
            'id_contract' => $id_contract,
            'name_server' => $new_name,
            'link' => '',
            'date' => $date
        ])
        ->execute();
    }

    public static function nfEdit($id, $name, $date) {

        PlanilhaFile::update()
            ->set('name', $name)
            ->set('date', $date)
            ->where('id', $id)
        ->execute();
    }


    public static function delPlanilha($id) :void
    {
        PlanilhaFile::delete()->where('id', $id)->execute();
    }

}
<?php
namespace src\helpers;

use \core\Controller;
use \src\models\RadarFile;

class RadarHelpers {

    public static function insert($name, $name_server, $date){
        RadarFile::insert([
            'name' => $name,
            'name_server' => $name_server,
            'date' => $date
        ])
        ->execute();
    }

    public static function getLast(){
        $data = RadarFile::select()->orderBy('id', 'desc')->one();

        if(count($data) > 0){
            $radar = new RadarFile();
            $radar->id = $data['id'];
            $radar->name = $data['name'];
            $radar->name_server = $data['name_server'];
            $radar->date = $data['date'];

            return $radar;
        } else{
            return false;
        }
    }
    
}
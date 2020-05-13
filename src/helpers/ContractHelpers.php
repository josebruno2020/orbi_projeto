<?php
namespace src\helpers;

use \core\Controller;
use \src\models\Contract;

class ContractHelpers {

    public static function getAll($order) {
        if($order) {
            $data = Contract::select()->orderBy($order, 'asc')->get();
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
    
}
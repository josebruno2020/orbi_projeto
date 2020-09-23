<?php

namespace src\services;

use src\helpers\ContractHelpers;
use src\helpers\TenderHelpers;

trait DeleteTenderTrait {

    public function deleteTender($id)
    {
        $folder = TenderHelpers::nameById($id);
        if(is_dir('media/tenders/'.$folder->name)){
            $pasta = dir('media/tenders/'.$folder->name);
            while($file = $pasta->read()){
                if(($file != '.') &&($file != '..') ){
                    unlink('media/tenders/'.$folder->name.'/'.$file);
                }
            }
            rmdir('media/tenders/'.$folder->name);
            TenderHelpers::delFolder($id);
        }
    }

}
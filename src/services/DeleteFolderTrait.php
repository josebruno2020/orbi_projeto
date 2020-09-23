<?php

namespace src\services;

use src\helpers\ContractHelpers;

trait DeleteFolderTrait {

    public function deleteFolder($id)
    {
        $folder = ContractHelpers::nameById($id);
        if(is_dir('media/contracts/'.$folder->name)){
            $pasta = dir('media/contracts/'.$folder->name);
            while($file = $pasta->read()){
                if(($file != '.') &&($file != '..') ){
                    unlink('media/contracts/'.$folder->name.'/'.$file);
                }
            }
            rmdir('media/contracts/'.$folder->name);
            ContractHelpers::delFolder($id);
        }
    }

}
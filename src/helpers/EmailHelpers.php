<?php
namespace src\helpers;

use \core\Controller;
use \src\models\Email;

class EmailHelpers {

    public static function newEmail($email){
        Email::insert([
            'email' => $email,
            'date' => date('Y-m-d',time())
        ])
        ->execute();
    }
}
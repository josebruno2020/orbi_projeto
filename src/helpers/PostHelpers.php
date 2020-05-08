<?php
namespace src\helpers;

use \core\Controller;
use \src\models\Post;

class PostHelpers {

    public static function sendPost($name, $email, $tel, $body) {
        
        $body = trim($body);

        if(!empty($body)) {

            Post::insert([
                'name' => $name,
                'email' => $email,
                'tel' => $tel,
                'body' => $body,
                'created_at' => date('Y-m-d H:i:s')
            ])
            ->execute();

        }
        

    }

}
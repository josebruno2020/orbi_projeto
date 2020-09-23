<?php 

namespace src\services;

trait EmailTrait {

    public function postEmail($email, $body)
    {
        $to = 'orbibrasil@orbibrasil.com.br';
        $subject = 'Fale conosco!';
        $message = $body;
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        mail($to, $subject, $message, $headers);
    }

    public function radarEmail($email)
    {
        $to = 'radar@orbibrasil.com.br';
        $subject = 'Nova solicitação para o Radar';
        $message = "Nova solicitação para o Radar!\r\n";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        
        mail($to, $subject, $message, $headers);
    }

    public function planilha_email($from, $to, $name_contract,$name)
    {
        $subject = "ORBI BRASIL || Planilha do Contrato $name_contract";

        $body = "Bom dia!\r\n";
        $body .= "Prezados,\r\n";
        $body .= "Segue anexa planilha atualizada, referente ao contrato acima mencionado.\r\n";
        $body .= "Atenciosamente,\r\n";
        $body .= $name;
        
        $headers = "From: $from\r\n";
        $headers .= "Reply-To: $from\r\n";
        
        mail($to, $subject, $body, $headers);
    }

}
<?php

namespace App\Classe;

use Mailjet\Client;
use Mailjet\Resources;

class Mail{
    private $api_key = '0be214e04fe583dc780a594338b5a69f';
    private $api_key_secret = '8c45ffdb569e5aaaba85ea0d8a6e280e';


    public function send($to_email, $to_name, $subject, $content){
        $mj = new Client($this->api_key, $this->api_key_secret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "marie.verraest@gmail.com",
                        'Name' => "La Boutique de Marie"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 2672414,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}
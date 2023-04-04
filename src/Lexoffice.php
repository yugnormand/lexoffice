<?php

namespace Todocoding\Lexoffice;

use Exception;
use Illuminate\Support\Facades\Storage;
use JsonException;

class Lexoffice{
  public function CreateCustomer($customer){
    $apiKey = config('lexoffice.consumer_key');
    $authorization = "Authorization: Bearer $apiKey";

    $data = [
        "version"=>0,
        "roles" =>[
            "customer"=>[]
        ],
        "person" =>[
            "salutation" => $customer['salutation'],
            "firstName" => $customer['firstName'],
            "lastName" => $customer['lastName'],
            "emailAddress"=> $customer['email'],
            "phoneNumber" => $customer['mobile'],

        ],
        "adresses"=>[
            "billing" => [
                [
                    "supplement" => "Rechnungsadressenzusatz",
                    "street" => "Hauptstr. 5",
                    "zip" => "12345",
                    "city" => "Musterort",
                    "countryCode" => "DE"
                ]
            ]
        ]

    ];

    $data_string = json_encode($data);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.lexoffice.io/v1/contacts");
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json', $authorization)
    );

    $result = curl_exec($ch);
    $resultArray = json_decode($result);

    if (isset($resultArray) && $resultArray != null && !isset($resultArray->error)) {
        return $resultArray;
    } else {
        if (isset($resultArray->error)) {

            return $resultArray;
        } else {
            return null;
        }
    }
  }
  public function UpdateCustomer($customer){
    $apiKey = config('lexoffice.consumer_key');
    $authorization = "Authorization: Bearer $apiKey";

    $data = [
        "id"=>$customer['id'],
        "version"=>1,
        "roles" =>[
            "customer"=>[]
        ],
        "person" =>[
            "salutation" => $customer['salutation'],
            "firstName" => $customer['firstName'],
            "lastName" => $customer['lastName'],
            "emailAddress"=> $customer['email'],
            "phoneNumber" => $customer['mobile'],

        ],
        "adresses"=>[
            "billing" => [
                [
                    "supplement" => "Rechnungsadressenzusatz",
                    "street" => "Hauptstr. 5",
                    "zip" => "12345",
                    "city" => "Musterort",
                    "countryCode" => "DE"
                ]
            ]
        ]

    ];

    $data_string = json_encode($data);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.lexoffice.io/v1/contacts/".$customer['id']);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json', $authorization)
    );

    $result = curl_exec($ch);
    $resultArray = json_decode($result);

    if (isset($resultArray) && $resultArray != null && !isset($resultArray->error)) {
        return $resultArray;
    } else {
        if (isset($resultArray->error)) {

            return $resultArray;
        } else {
            return null;
        }
    }
  }
}

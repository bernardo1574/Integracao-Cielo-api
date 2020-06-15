<?php
/*
 * // Integração usando a sdk
require 'vendor/autoload.php';

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\CieloEcommerce;
function getConsulta($id_pagamento){
    try {

        // CRIA O OBJETO MERCHANT COM AS CREDENCIAS DE ACESSO
        $merchant = new Merchant('a6492248-4d60-4380-af8a-ea12733444fc', 'CWJUASQGNQBUKEFIBQKUIMSGISCGNABKWDBYFIBT');


        // REALIZA A CONSULTA
        $objCielo = (new CieloEcommerce($merchant, Environment::sandbox()))->getSale($id_pagamento);

        // RETORNA O RESULTADO DA CONSULTA
        return json_encode ($objCielo->getPayment());

// DEFINE O ERRO PARA SER EXIBIDO
    } catch(Exception $e){

        $objErro = $e->getCieloError();
        $erro = "(".$objErro->getCode().") " . $objErro->getMessage();

        return array('error'=>$erro);

    }
}
*/
// Integração usando o curl
function getConsulta($id_pagamento){
    $curl = curl_init ();

    curl_setopt_array (
        $curl , array ( CURLOPT_URL => "https://apiquerysandbox.cieloecommerce.cielo.com.br//1/sales/".$id_pagamento ,
        CURLOPT_RETURNTRANSFER => true ,
        CURLOPT_ENCODING => "" ,
        CURLOPT_MAXREDIRS => 10 ,
        CURLOPT_TIMEOUT => 0 ,
        CURLOPT_FOLLOWLOCATION => true ,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1 ,
        CURLOPT_CUSTOMREQUEST => "GET" ,
        CURLOPT_HTTPHEADER => array ( "MerchantId: a6492248-4d60-4380-af8a-ea12733444fc" ,
            "Content-Type: text/json" ,
            "MerchantKey: CWJUASQGNQBUKEFIBQKUIMSGISCGNABKWDBYFIBT" ) , ) );

    $response = curl_exec ( $curl );

    curl_close ( $curl );
    return $response;

}
<?php
/*
 * integração com o SDK
 *
require 'vendor/autoload.php';

use Cielo\API30\Merchant;

use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Request\CieloRequestException;



// ...
// Configure o ambiente
$environment = $environment = Environment::sandbox();

// Configure seu merchant
$merchant = new Merchant('a6492248-4d60-4380-af8a-ea12733444fc', 'CWJUASQGNQBUKEFIBQKUIMSGISCGNABKWDBYFIBT');

// Crie uma instância de Sale informando o ID do pedido na loja
$sale = new Sale('123');

// Crie uma instância de Customer informando o nome do cliente
$customer = $sale->customer($_POST['nome']);


// Crie uma instância de Payment informando o valor do pagamento
$payment = $sale->payment((int) ($_POST['total']));
$payment->setCapture(1);


// Crie uma instância de Credit Card utilizando os dados de teste
// esses dados estão disponíveis no manual de integração
$payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
        ->creditCard($_POST['cc-cvv'], $_POST['cc-flag'])
        ->setExpirationDate($_POST['cc-expiration'])
        ->setCardNumber(str_replace(" ", '', $_POST['cc-number']))
        ->setHolder($nome);

// Crie o pagamento na Cielo
try {
    // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
    $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

    // Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
    // dados retornados pela Cielo
    $paymentId = $sale->getPayment()->getPaymentId();


    if($sale->getPayment()->getStatus() == 2){
        insert_compra_cielo($paymentId,$_POST['nome]);
        Header("Location: index.php?cod=0");
	}else{
		Header('Location: index.php?cod=1&message=Erro: '.$sale->getPayment()->getReturnMessage());
	}

    // Com o ID do pagamento, podemos fazer sua captura, se ela não tiver sido capturada ainda
    //$sale = (new CieloEcommerce($merchant, $environment))->captureSale($paymentId, 15700, 0);

    // E também podemos fazer seu cancelamento, se for o caso
    //$sale = (new CieloEcommerce($merchant, $environment))->cancelSale($paymentId, 15700);
} catch (CieloRequestException $e) {
    // Em caso de erros de integração, podemos tratar o erro aqui.
    // os códigos de erro estão todos disponíveis no manual de integração.
    //print_r($e->getCieloError());
	//$erro = $e->getCieloError()->getMessage() . "-" . $e->getCieloError()->getCode();
	//echo $erro; die();
	//echo $e->getCieloError()->code . $e->getCieloError()->message;
	Header("Location: index.php?cod=2&message=Erro: " . $e->getCieloError()->getMessage());
}
*/
// Integração usando o curl

$body = '{  
   "MerchantOrderId":"'.rand(0,99999999).'",
    "Customer":{  
      "Name":"'.$_POST['nome'].'",
      "Identity":"'.preg_replace('/[^0-9]/', '', $_POST['cpf']).'",
      "IdentityType":"CPF",
      "Email":"'.$_POST['email'].'",
      "Birthdate":"'.date('Y-m-d', strtotime($_POST['nascimento'])).'",
      "Address":{  
         "Street":"'.$_POST['rua'].'",
         "Number":"'.$_POST['numero'].'",
         "Complement":"'.$_POST['complemento'].'",
         "ZipCode":"'.preg_replace('/[^0-9]/', '', $_POST['cep']).'",
         "City":"'.$_POST['cidade'].'",
         "State":"'.$_POST['uf'].'",
         "Country":"BRA"
      }
   },
   "Payment":{  
     "Type":"CreditCard",
     "Amount":'.(int)$_POST['total'].',
     "Currency":"BRL",
     "Country":"BRA",
     "ServiceTaxAmount":0,
     "Installments":1,
     "Interest":"ByMerchant",
     "Capture":false,
     "Authenticate":false,    
     "Recurrent": false,
     "SoftDescriptor":"",
     "CreditCard":{  
         "CardNumber":"'.str_replace(" ", '', $_POST['cc-number']).'",
         "Holder":"'.$_POST['nome'].'",
         "ExpirationDate":"'.$_POST['cc-expiration'].'",
         "SecurityCode":"'.$_POST['cc-cvv'].'",
         "SaveCard":"false",
         "Brand":"'.$_POST['cc-flag'].'"
     }
   }
}';
$curl = curl_init ();

curl_setopt_array (
    $curl , array ( CURLOPT_URL => "https://apisandbox.cieloecommerce.cielo.com.br/1/sales" ,
    CURLOPT_RETURNTRANSFER => true ,
    CURLOPT_ENCODING => "" ,
    CURLOPT_MAXREDIRS => 10 ,
    CURLOPT_TIMEOUT => 0 ,
    CURLOPT_FOLLOWLOCATION => true ,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1 ,
    CURLOPT_CUSTOMREQUEST => "POST" ,
    CURLOPT_POSTFIELDS=> $body,
    CURLOPT_HTTPHEADER => array ( "Content-Type: application/json" ,
        "MerchantId: a6492248-4d60-4380-af8a-ea12733444fc" ,
        "MerchantKey: CWJUASQGNQBUKEFIBQKUIMSGISCGNABKWDBYFIBT" ) , ) );

$response = curl_exec ( $curl );

curl_close ( $curl );
$resposta = json_decode($response,true);
pre ($resposta);
if (isset($resposta[0]['Code'])){
    Header("Location: index.php?cod=2&message=Erro: " .$resposta[0]['Message']);
} else {
    if ($resposta['Payment']['Status'] == "1"){
        insert_compra_cielo($resposta['Payment']['PaymentId'],$_POST['nome']);
        Header("Location: index.php?cod=0");
    } else {
        Header('Location: index.php?cod=1&message=Erro: '.$resposta['Payment']['ReturnMessage']);
    }
}


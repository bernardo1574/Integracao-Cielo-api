<?php
	
	include 'functions/consulta_pagamento.php';

	$json = json_decode(getConsulta($_POST['id_pagamento']),true);
	if (isset($json['Customer']['Address']['Complement'])){
	    $complemento = $json['Customer']['Address']['Complement'];
    } else {
	    $complemento = "Não tem";
    }
?>
<style type="text/css">
	.layout{
		display: grid;
		grid-template-columns: repeat(2, 1fr);
	}
</style>
<div class="container">
	<div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="lib/img/carrinho.svg" alt="" width="72" height="72">
        <h2>Pagamento Online</h2>
        <div class="text-left">
            <a class="btn btn-primary" href="index.php">
                <i class="fa fa-backward" aria-hidden="true"></i>
                voltar tela inicial
            </a>
        </div>
        <hr>
    </div>
	<div class="card">
		<div class="card-header">
			<h4 class="text-center">Detalhes da Compra</h4>
		</div>
		<div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Numero de identificação do Pedido:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['MerchantOrderId']?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nome:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Customer']['Name']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Cpf:</label>
                    <input type="text" class="form-control cpf" readonly value="<?=$json['Customer']['Identity']?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Customer']['Email']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Data de Nascimento:</label>
                    <input type="text" class="form-control" readonly value="<?=date('d/m/Y',strtotime($json['Customer']['Birthdate']))?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>TID:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Payment']['Tid']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Número da autorização:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Payment']['ProofOfSale']?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Código de Autorização:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Payment']['AuthorizationCode']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Valor:</label>
                    <input type="text" class="form-control" readonly value="R$ <?=convertString($json['Payment']['Amount'],',',2)?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Código de Autorização:</label>
                    <input type="text" class="form-control" readonly value="<?=date( 'd/m/Y H:i:s', strtotime($json['Payment']['ReceivedDate']))?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nome no cartão:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Payment']['CreditCard']['Holder']?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Final do cartão:</label>
                    <input type="text" class="form-control" readonly value="<?=substr ($json['Payment']['CreditCard']['CardNumber'],-4)?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Bandeira:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Payment']['CreditCard']['Brand']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Cep:</label>
                    <input type="text" class="form-control" readonly value="<?=convertString($json['Customer']['Address']['ZipCode'],'-',3)?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Estado:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Customer']['Address']['State']?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Cidade:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Customer']['Address']['City']?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Rua:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Customer']['Address']['Street']?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label>Complemento:</label>
                    <input type="text" class="form-control" readonly value="<?=$complemento?>">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Número:</label>
                    <input type="text" class="form-control" readonly value="<?=$json['Customer']['Address']['Number']?>">
                </div>
            </div>
		</div>
	</div>
</div>
<?php
function convertString($str, $c,$numero){
    $pos = strlen ($str) - $numero;
    return substr($str, 0, $pos) . $c . substr($str, $pos);
}
?>

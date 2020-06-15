<?php
include "lib/config/db_config.php";

function insert_compra_cielo($id_pagamento,$nome){
	global $pdo;
	$data = [
	    'id_pagamento' => $id_pagamento,
	    'nome' => $nome,
	];
	$sql = "INSERT INTO compra_cielo VALUES (NULL,:nome,:id_pagamento)";

	$stmt = $pdo->prepare($sql);
	$stmt->bindValue (':nome',$nome,PDO::PARAM_STR);
	$stmt->bindValue (':id_pagamento',$id_pagamento,PDO::PARAM_STR);
	$stmt->execute ();
}
function select_compra_cielo(){
	global $pdo;
	$arrayDados = array();

	$sql = "SELECT id,id_pagamento,nome FROM compra_cielo order by id DESC";
	$stmt = $pdo->query($sql);
	if ($stmt->rowCount () > 0){
		$arrayDados = $stmt->fetchAll();
	}
	return $arrayDados;
	
}
function pre($value){
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}
?>

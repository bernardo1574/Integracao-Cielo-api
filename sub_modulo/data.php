<?php
$valor_opcional = array ('email','complemento');
$erro = "";
foreach ( $_POST as $chave => $valor ) {
    echo $chave."<br>";
    // Verifica se tem algum valor em branco
    if ( empty ( $valor ) && !in_array ($chave,$valor_opcional)) {
        $erro = 'Por gentileza, preencha todos os campos!';
    }
}
if (empty($erro)){
    include 'functions/efetuar-pagamento.php';
} else {
    header("Location: index.php?cod=1&message=".$erro);
}
?>
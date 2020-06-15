<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'api_cielo';
try {
    $opt = array(PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO("mysql:host=". $db_host .";dbname=". $db_name .";charset=utf8", $db_user, $db_pass);
} catch (PDOException $e) {
    die(retornaMensagemPDO("Erro de conexão do banco de dados.<br>Entre em contato com o administrador, enviando a seguinte mensagem de erro: <br><br>". $e->getMessage() ));
}
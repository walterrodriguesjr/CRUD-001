<?php 


/* AS VARIÁVEIS DE CONEXÃO COM BANCO INSERIDAS EM VARIAVEIS */
$db_name = 'crud001';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';


/* CONECTANDO COM O BANDO DE DADOS USANDO AS VARIÁVEIS COM AS INFO. DO BANCO */
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_password);

?>
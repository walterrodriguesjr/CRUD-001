<?php

/* LINKANDO COM A PÁGINA ONDE FAZ A CONFIG COM BANCO */
require './config.php';

/* CRIA AS VARÁVEIS $ID, $NOME, $EMAIL E A ELES ATRIBUI OS DADOS QUE CHEGAM DO FORMULARIO APOS ATUALIZADO E CLICADO */
$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

/* CASO A CONDIDIONAL SEJA TRUE, CRIA A VARIAVEL $sql QUE RECEBE A VARIAVEL $pdo QUE VEM DO REQUIRE config.php, EM SEGUIDA EXECUTA O METODO prepare() e realiza a ação de UPDATE no banco */
if ($id && $nome && $email) {
    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id = :id");
    /* dados do banco recebem dados da variável */
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    /* se tudo ocorreu bem, executa a ação */
    $sql->execute();

    header("Location:index.php");
    exit;
} else {
    header("Location:index.php");
    exit;
}

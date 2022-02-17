<?php
/* LINKANDO COM A PÁGINA ONDE FAZ A CONFIG COM BANCO */
require './config.php';

/* cria a variável $id que recebe o método filter_input que, como parametro recebe o metodo INPUT_GET q traz o que foi captado pelo input, e o segundo parametro informa que é o id */
$id = filter_input(INPUT_GET, 'id');

/* a condicional executa se o $id for diferente de vazio, em seguida é criada uma variavel $sql, que recebe a varialvel $pdo que vem por require, a executa o metodo prepare() que executa o comando no SQL */
if ($id) {
    $sql = $pdo->prepare("DELETE FROM usuario WHERE id = :id");
    /* dados do banco recebem dados da variável */
    $sql->bindValue(':id', $id);
    /* se tudo ocorreu bem, executa a ação */
    $sql->execute();

    header("Location: index.php");
}

<?php
/* LINKANDO COM A PÁGINA ONDE FAZ A CONFIG COM BANCO */
require_once './config.php';
?>

<!-- FRONT-END DA TELA ONDE EXIBE OS USUÁRIOS CADASTRADOS -->
<h1>Listagem de Usuários</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
</table>

<a href="./cadastrar.php">Cadastrar Usuários</a>
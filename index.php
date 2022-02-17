<?php
/* LINKANDO COM A PÁGINA ONDE FAZ A CONFIG COM BANCO */
require_once './config.php';

/* variável $lista recebe um array vazio */
$lista = [];

/* variável $sql recebe a variável $pdo que da acesso a ações no banco*/
$sql = $pdo->query("SELECT * FROM usuario");

/* condicional que, se a quantidade de itens selecionados no banco, for maior que zero, a variavel $lista recebe a variavel sql a qual usa o metodo fetchAll para listar os itens em array */
if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(pdo::FETCH_ASSOC);
}
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

    <?php

    /* para cada item da variavel $lista sera cada registro será jogado na variavel $usuario*/
    foreach ($lista as $usuario) : ?>

        <tr>
            <td><?= $usuario['id']; ?></td>
            <td><?= $usuario['nome']; ?></td>
            <td><?= $usuario['email']; ?></td>
            <td>
                <a href="editar.php?id-=<?= $usuario['id']; ?>">Editar</a>
                <a href="excluir.php?od=<?= $usuario['id']; ?>">Excluir</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<a href="./cadastrar.php">Cadastrar Usuários</a>
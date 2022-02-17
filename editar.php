<?php

/* LINKANDO COM A PÁGINA ONDE FAZ A CONFIG COM BANCO */
require './config.php';

/* variavel $usuario recebe um array vazio */
$usuario = [];
/* cria a variável $id que recebe o método filter_input que, como parametro recebe o metodo INPUT_GET q traz o que foi captado pelo input, e o segundo parametro informa que é o id */
$id = filter_input(INPUT_GET, 'id');

/* condicional que, caso $id seja true, cria uma variavel $sql que, recebe a variavel $pdo que vem de config.php e usa o método prepare() para fazer uma ação no banco*/
if ($id) {
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
    /* dados do banco recebem dados da variável */
    $sql->bindValue(':id', $id);
    /* se tudo ocorreu bem, executa a ação */
    $sql->execute();
    /* se no banco for encontrado pelo menos 1 valor ou mais, ele executa: */
    if ($sql->rowCount() > 0) {
        /* variavel $usuario recebe a variavel $sql, acessando o metodo fetch */
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location:index.php");
}

?>

<h1>Editar Usuário</h1>
<form method="POST" action="editar_action.php">

<label for="">Nome:</label>
<input type="text" name="nome" value="<?=$usuario['nome'];?>">
<label for="">E-mail:</label>
<input type="email" name="email" value="<?=$usuario['email'];?>">

</form>
<?php

/* LINKANDO COM A PÁGINA ONDE FAZ A CONFIG COM BANCO */
require_once './config.php';

/* VARIAVEIS RECEBEM, ATRAVÉS DA FUNÇÃO filter_input, USANDO PRIMEIRO O MÉTODO INPUT_POST PARA CAPTAR, EM SEGUIDA INFORMANDO DE ONDE SERÁ CAPTADO*/
$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); /* método de validação */

/* condicional que, caso a validação ocorra, realiza as ações da condicional */
if($nome && $email){ 

     /* A VARIAVEL $sql RECEBE OS DADOS DA VARIÁVEL $pdo acessando o método prepare() que permite dar comandos de SQl, no caso, está selecionando dados que vem do formulário de cadastro, na tabela do index.php */
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    /* dados do banco recebem dados da variável */
    $sql->bindValue(':email', $email);
    /* se tudo ocorreu bem, executa a ação */
    $sql->execute();
    /* se, no banco, não ouver já cadastrada os dados inseridos no input, insere no banco realizando as ações abaixo */
    /* se no banco for encontrado pelo menos 1 valor ou mais, ele executa */
    if($sql->rowCount() === 0){


        /* A VARIAVEL $sql RECEBE OS DADOS DA VARIÁVEL $pdo acessando o método prepare() que permite dar comandos de SQl, no caso, está inserindo dados que vem do formulário de cadastro, na tabela do index.php */
        $sql = $pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:nome, :email)");
        
        /* dados do banco recebem dados da variável */
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        
        /* executa de fato os comando sql, após eles estarem montados */
        $sql->execute();
        
        /* se a execução foi bem sucedida, manda retornar para a index.php */
        header("Location: index.php");
        exit;

    }else{
        /* se a execução NÃO foi bem sucedida, manda retornar para a cadastrar.php */
        header("Location: cadastrar.php");
    }

}else{

    /* se a execução NÃO foi bem sucedida, manda retornar para a cadastrar.php */
    header("Location: cadastrar.php");
    exit;
}


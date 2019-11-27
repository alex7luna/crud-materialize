<?php
// Sessão
session_start();
// Conexão
//Vai verificar se existe um indice "btn-cadastrar" na super global POST
//Se existe na variavel POST o inice btn_cadastar, se existir alguem clicou no botao cadastar
require_once 'db_connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-cadastrar'])):
	$nome = clear($_POST['nome']);
	$sobrenome = clear($_POST['sobrenome']);
	$email = clear($_POST['email']);
	$idade = clear($_POST['idade']);
// feito isso precisanmos inserir esses nomes no banco de dados
	$sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";
// vamos inserir na tabela clientes esses nomes.

// vamos verificar se conseguimos fazer a query
//caso consiga inserir o registro no banco retorne pra index.php
	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		//caso  não consiga inserir o registro no banco retorne pra index.php
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
	endif;
endif;
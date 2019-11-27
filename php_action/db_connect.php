<?php
 // Conexão com Bnaco de Dados
$servename = "localhost";
$username  = "root";
$password  = "";
$db_name   ="crud";

//Criei uma variável connect para abrir a conexão e uma função chamada mysqli_connect
// estou usando a função mysqli porque ele tem suporte a programção procedural e o PDO é orientado a objetos

// passando os paramentros para fazer a conexão
$connect = mysqli_connect($servename, $username, $password, $db_name);
// Para Corrigir palavras com acentuação no banco usaremos o mysqli_set_charset passando o 1º parementro conncet e o segundo a codificação e e faz a mesma mudança la no Banco de Dados.
mysqli_set_charset($connect, "utf8");
if(mysqli_connect_error()):
	echo "Erro na conexão: ".mysqli_connect_error();
endif;
?>
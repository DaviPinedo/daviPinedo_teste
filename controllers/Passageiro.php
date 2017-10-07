<?php
	require_once '../conexao/conexao.php';
	session_start(); 

	$_SESSION['pagina'] = "Passageiro";

	$nome = $_POST['nomePass'];
	$nasc = $_POST['nascPass'];
	$cpf = $_POST['cpfPass'];
	$sexo = $_POST['genPass'];

	$sql = "INSERT INTO tb_passageiros (nome, data_nascimento, cpf, sexo) VALUES ";
	$sql .= "('$nome', '$nasc', '$cpf', '$sexo')";

	$conn = ConectaDB();

	if(mysqli_query($conn, $sql)){
		echo "<script> alert('Passageiro cadastrado com sucesso!'); window.location.href = '/projetocorridas';</script>";
	}
	else{
		echo "<script> alert('Erro ao cadastrar o passageiro!'); window.location.href = '/projetocorridas';</script>";
	}
	mysqli_close($conn);
<?php
	require_once '../conexao/conexao.php';
	session_start(); 

	$_SESSION['pagina'] = "Motorista";

	$nome = $_POST['nomeMotorista'];
	$nasc = $_POST['nascMotorista'];
	$cpf = $_POST['cpfMotorista'];
	$carro = $_POST['carro'];
	$sexo = $_POST['genMotorista'];
	$ativo = $_POST['actv'];

	$sql = "INSERT INTO tb_motoristas (nome, data_nascimento, cpf, modelo_carro, sexo, ativo) VALUES ";
	$sql .= "('$nome', '$nasc', '$cpf', '$carro', '$sexo', $ativo)";

	$conn = ConectaDB();

	if(mysqli_query($conn, $sql)){
		echo "<script> alert('Motorista cadastrado com sucesso!'); window.location.href = '/projetocorridas';</script>";
	}
	else{
		echo "<script> alert('Erro ao cadastrar o motorista!');</script>";
	}
	mysqli_close($conn);

	$codigo = $_POST['codigo'];
	$destaque = $_POST['destaque'];
	$chama = $_POST['chamaFunc'];

	if($chama){
		mudaAtivo($codigo, $destaque);
	}

	function mudaAtivo($codigo, $destaque) {
		$sql = "UPDATE tb_motoristas SET ativo = ".$destaque." WHERE id_motorista = ".$codigo;
		$conn = ConectaDB();

		mysqli_query($conn, $sql);

		mysqli_close($conn);
	}
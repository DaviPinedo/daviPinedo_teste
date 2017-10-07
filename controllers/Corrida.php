<?php
	require_once '../conexao/conexao.php';
	session_start(); 

	$_SESSION['pagina'] = "Corrida";

	$motorista = $_POST['motoristaCorrida'];
	$pass = $_POST['passCorrida'];
	$valor = $_POST['valorCorrida'];

	$sql = "INSERT INTO tb_corridas (motorista, passageiro, valor_corrida) VALUES ";
	$sql .= "('$motorista', '$pass', '$valor')";

	$sqlValid = "SELECT ativo FROM tb_motoristas WHERE nome = '$motorista'";

	$conn = ConectaDB();

	$result = mysqli_query($conn, $sqlValid);
	if (mysqli_num_rows($result) > 0) {
	    while($linha = mysqli_fetch_assoc($result)) {
	        if($linha['ativo']){
	        	if(mysqli_query($conn, $sql)){
					echo "<script> alert('Corrida cadastrada com sucesso!'); window.location.href = '/projetocorridas';</script>";
				}
				else{
					echo "<script> alert('Erro ao cadastrar a corrida!'); window.location.href = '/projetocorridas';</script>";
				}
	        }
	        else{
	        	echo "<script> alert('O motorista $motorista está inativo!'); window.location.href = '/projetocorridas';</script>";
	        }
	    }
	} else {
	    echo "<script> alert('Motorista $motorista não encontrado!');</script>";
	}
	
	mysqli_close($conn);
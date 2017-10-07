<?php require_once '/conexao/conexao.php' ?> 
<?php require_once '/controllers/buscas.php' ?>
<?php session_start(); ?> 

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Sistema de Corridas</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css">
	</head>
	<body>
	<?php if(isset($_SESSION['pagina']) && $_SESSION['pagina'] == "Corrida"){ ?>
		<style type="text/css">
			.nulo{
				display: none;
			}
			.cadastra[data-tipo=corrida]{
				display: block;
			}
		</style>
	<?php }elseif(isset($_SESSION['pagina']) && $_SESSION['pagina'] == "Motorista"){ ?>
		<style type="text/css">
			.nulo{
				display: none;
			}
			.cadastra[data-tipo=motorista]{
				display: block;
			}
		</style>
	<?php }elseif(isset($_SESSION['pagina']) && $_SESSION['pagina'] == "Passageiro"){ ?>
		<style type="text/css">
			.nulo{
				display: none;
			}
			.cadastra[data-tipo=passageiro]{
				display: block;
			}
		</style>
	<?php  } 
		if (isset($_SESSION['pagina'])) {
			unset($_SESSION['pagina']);
		}		
	 ?>
		<div class="title">
			<h1>Sistema de Corridas</h1>
		</div>

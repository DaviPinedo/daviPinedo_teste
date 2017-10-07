	<?php include('header.php') ?>
	<?php include('menu.php') ?>

	<?php  
		$resCorridas = retornaCorridas();
		$resMotoristas = retornaMotoristas();
		$resPassageiros = retornaPassageiros();
	?>
	
	<div class="fundo">

		<div class="nulo"></div>

		<div class="conteudo cadastra" data-tipo="motorista">
			<h2>Cadastro de Motorista</h2>
			<form id="form-motorista" action="controllers/Motorista.php" method="post">
				<div>
					<label>Nome:
						<input type="text" name="nomeMotorista">
						<p></p>
					</label>
				</div>
				<div>
					<label>Data de Nascimento:
						<input type="text" class="date" name="nascMotorista">
						<p></p>
					</label>
				</div>
				<div>
					<label>CPF:
						<input type="text" class="register" name="cpfMotorista">
						<p></p>
					</label>
				</div>
				<div>
					<label>Modelo do carro:
						<input type="text" name="carro">
						<p></p>
					</label>
				</div>
				<div class="radiotype">
					<span>Sexo:</span>
						<label><input type="radio" value="Masculino" name="genMotorista">Masculino</label>
						<label><input type="radio" value="Feminino" name="genMotorista">Feminino</label>
				</div>
				<p></p>
				<div class="radiotype">
					<span>Status:</span>
						<label><input type="radio" value="1" name="actv">Ativo</label>
						<label><input type="radio" value="0" name="actv">Inativo</label>
				</div>
				<p></p>

				<input type="submit" value="Cadastrar">
			</form>
		</div>

		<div class="conteudo cadastra" data-tipo="corrida">
			<h2>Cadastro de Corrida</h2>
			<form id="form-corrida" action="controllers/Corrida.php" method="post">
				<div>
					<label>Nome do Motorista:
						<input type="text" name="motoristaCorrida">
						<p></p>
					</label>
				</div>
				<div>
					<label>Nome do Passageiro:
						<input type="text" name="passCorrida">
						<p></p>
					</label>
				</div>
				<div>
					<label>Valor da Corrida:
						<input type="text" placeholder="R$" class="price" name="valorCorrida">
						<p></p>
					</label>
				</div>

				<input type="submit" value="Cadastrar">
			</form>
		</div>

		<div class="conteudo cadastra" data-tipo="passageiro">
			<h2>Cadastro de Passageiro</h2>
			<form id="form-passageiro" action="controllers/Passageiro.php" method="post">
				<div>
					<label>Nome:
						<input type="text" name="nomePass">
						<p></p>
					</label>
				</div>
				<div>
					<label>Data de Nascimento:
						<input type="text" class="date" name="nascPass">
						<p></p>
					</label>
				</div>
				<div>
					<label>CPF:
						<input type="text" class="register" name="cpfPass">
						<p></p>
					</label>
				</div>
				<div class="radiotype">
					<span>Sexo:</span>
					<label><input type="radio" value="Masculino" name="genPass">Masculino</label>
					<label><input type="radio" value="Feminino" name="genPass">Feminino</label>
				</div>
				<p></p>

				<input type="submit" value="Cadastrar">
			</form>
		</div>

		<div class="conteudo pesquisa" data-tipo="corrida">
			<h2>Busca por Corrida</h2>
			<div class="limitp">
				<form><i class="fa fa-search" aria-hidden="true"></i> Pesquisa por Motorista
					<input id="pesqCorrida" type="text" name="">
				</form>
				<table>
					<tr>
						<th>Motorista</th>
						<th>Passageiro</th>
						<th>Valor da Corrida</th>
					</tr>
					<?php foreach ($resCorridas as $k) { ?>
						<tr>
							<td><?php echo $k['motorista'] ?></td>
							<td><?php echo $k['passageiro'] ?></td>
							<td><?php echo $k['valor'] ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>

		<div class="conteudo pesquisa" data-tipo="passageiro">
			<h2>Busca por Passageiro</h2>
			<div class="limitp">
				<form><i class="fa fa-search" aria-hidden="true"></i> Pesquisa por CPF 
					<input id="pesqPass" type="text" name="">
				</form>
				<table>
					<tr>
						<th>Nome</th>
						<th>Data de Nascimento</th>
						<th>CPF</th>
						<th>Sexo</th>
					</tr>
					<?php foreach ($resPassageiros as $k) { ?>
						<tr>
							<td><?php echo $k['nome']; ?></td>
							<td><?php echo $k['data']; ?></td>
							<td><?php echo $k['cpf']; ?></td>
							<td><?php echo $k['sexo']; ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>

		<div class="conteudo pesquisa" data-tipo="motorista">
			<h2>Busca por Motorista</h2>
			<div class="limitp">
				<form><i class="fa fa-search" aria-hidden="true"></i> Pesquisa por CPF
					<input id="pesqMoto" type="text" name="">
				</form>
				<table>
					<tr>
						<th>Nome</th>
						<th>Data de Nascimento</th>
						<th>CPF</th>
						<th>Modelo do Carro</th>
						<th>Sexo</th>
						<th>Ativo</th>
					</tr>
					<?php foreach ($resMotoristas as $k) { ?>
						<tr>
							<td><?php echo $k['nome']; ?></td>
							<td><?php echo $k['data']; ?></td>
							<td><?php echo $k['cpf']; ?></td>
							<td><?php echo $k['modelo']; ?></td>
							<td><?php echo $k['sexo']; ?></td>
							<td <?php echo $k['ativo'] == 1 ? 'class="ativo"' : '' ?> id="<?php echo $k['id']; ?>"><?php echo $k['ativo'] == 1 ? 'Sim' : 'Não'; ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	</body>
</html>
<?php
	function retornaCorridas() {
		$result = array();
		$willReturn = array();
		$i = 0;
		$sql = "SELECT * FROM tb_corridas";

		$conn = ConectaDB();

		$select = mysqli_query($conn, $sql);
		if (mysqli_num_rows($select) > 0) {
			while($linha = mysqli_fetch_assoc($select)) {
				$result['passageiro'] = $linha['passageiro'];
				$result['valor'] = $linha['valor_corrida'];
				$result['motorista'] = $linha['motorista'];
				$willReturn[$i] = $result;
				$i++;
			}
			
		}

		return $willReturn;
	}

	function retornaMotoristas() {
		$result = array();
		$willReturn = array();
		$i = 0;
		$sql = "SELECT * FROM tb_motoristas";

		$conn = ConectaDB();

		$select = mysqli_query($conn, $sql);
		if (mysqli_num_rows($select) > $i) {
			while($linha = mysqli_fetch_assoc($select)) {
				$result['nome'] = $linha['nome'];
				$result['data'] = $linha['data_nascimento'];
				$result['cpf'] = $linha['cpf'];
				$result['modelo'] = $linha['modelo_carro'];
				$result['sexo'] = $linha['sexo'];
				$result['ativo'] = $linha['ativo'];
				$result['id'] = $linha['id_motorista'];
				$willReturn[$i] = $result;
				$i++;
			}
		}

		return $willReturn;
	}

	function retornaPassageiros() {
		$result = array();
		$willReturn = array();
		$i = 0;
		$sql = "SELECT * FROM tb_passageiros";

		$conn = ConectaDB();

		$select = mysqli_query($conn, $sql);
		if (mysqli_num_rows($select) > $i) {
			while($linha = mysqli_fetch_assoc($select)) {
				$result['nome'] = $linha['nome'];
				$result['data'] = $linha['data_nascimento'];
				$result['cpf'] = $linha['cpf'];
				$result['sexo'] = $linha['sexo'];
				$willReturn[$i] = $result;
				$i++;
			}
		}

		return $willReturn;
	}
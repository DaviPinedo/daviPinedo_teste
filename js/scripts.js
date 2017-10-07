$(function(){

	$('.item').click(function(){
		$(this).find('.submenu').slideToggle();
	});

	$('.subitem').click(function(e){
		if($(this).hasClass('cad')){
			var compara = $(this).closest('.item').attr('id');
			$('.cadastra').each(function(){
				if($(this).data('tipo') == compara){
					$('.nulo').css('display', 'none');
					$('.conteudo').css('display', 'none');
					$('.cadastra[data-tipo="'+compara+'"]').css('display', 'block');
					e.stopPropagation();
				}
			});
		}
		if($(this).hasClass('pesq')){
			var compara = $(this).closest('.item').attr('id');
			$('.pesquisa').each(function(){
				if($(this).data('tipo') == compara){
					$('.nulo').css('display', 'none');
					$('.conteudo').css('display', 'none');
					$('.pesquisa[data-tipo="'+compara+'"]').css('display', 'block');
					e.stopPropagation();
				}
			});
		}
	});

	$('.pesquisa td').click(function(){
		var codigo = $(this).attr('id');
		var destaque;

		if($(this).hasClass('ativo')){
			$(this).html("Não");
			$(this).removeClass('ativo');
			destaque = 0;
		}
		else{
			$(this).html("Sim");
			$(this).addClass('ativo');
			destaque = 1;
		}

		$.post( "controllers/Motorista.php",{ codigo: codigo, destaque: destaque, chamaFunc: true });
	});

	$('#form-passageiro').submit(function(){
		var valid = true;

		if($('input[name="nomePass"]').val() == ''){
			$('input[name="nomePass"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="nomePass"]').next().html('');
		}

		if($('input[name="nascPass"]').val() == ''){
			$('input[name="nascPass"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="nascPass"]').next().html('');
		}

		if($('input[name="cpfPass"]').val() == ''){
			$('input[name="cpfPass"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="cpfPass"]').next().html('');
		}

		if(!$('input[name="genPass"]').is(':checked')){
			$('input[name="genPass"]').closest('.radiotype').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="genPass"]').closest('.radiotype').next().html('');
		}

		return valid;
	});

	$('#form-motorista').submit(function(){
		var valid = true;

		if($('input[name="nomeMotorista"]').val() == ''){
			$('input[name="nomeMotorista"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="nomeMotorista"]').next().html('');
		}

		if($('input[name="nascMotorista"]').val() == ''){
			$('input[name="nascMotorista"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="nascMotorista"]').next().html('');
		}

		if($('input[name="cpfMotorista"]').val() == ''){
			$('input[name="cpfMotorista"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="cpfMotorista"]').next().html('');
		}

		if($('input[name="carro"]').val() == ''){
			$('input[name="carro"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="carro"]').next().html('');
		}

		if(!$('input[name="genMotorista"]').is(':checked')){
			$('input[name="genMotorista"]').closest('.radiotype').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="genMotorista"]').closest('.radiotype').next().html('');
		}

		if(!$('input[name="actv"]').is(':checked')){
			$('input[name="actv"]').closest('.radiotype').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="actv"]').closest('.radiotype').next().html('');
		}

		return valid;
	});

	$('#form-corrida').submit(function(){
		var valid = true;

		if($('input[name="motoristaCorrida"]').val() == ''){
			$('input[name="motoristaCorrida"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="motoristaCorrida"]').next().html('');
		}

		if($('input[name="passCorrida"]').val() == ''){
			$('input[name="passCorrida"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="passCorrida"]').next().html('');
		}

		if($('input[name="valorCorrida"]').val() == ''){
			$('input[name="valorCorrida"]').next().html('*Campo obrigatório');
			valid = false;
		}
		else{
			$('input[name="valorCorrida"]').next().html('');
		}

		return valid;
	});

	$('.date').mask('00/00/0000');
	$('.register').mask('000.000.000-00');
	$('.price').mask('###.##0,00', {reverse: true});

	$('#pesqCorrida').keyup(function(){
		$('.pesquisa[data-tipo="corrida"] td:nth-of-type(1)').each(function(){
			var numL = $('#pesqCorrida').val().length;
			var value = $(this).html();
			var vl = value.substring(0, numL);
			
			if(vl != $('#pesqCorrida').val()){
				$(this).parent().css('display', 'none');
			}
			if(vl == $('#pesqCorrida').val()){
				$(this).parent().css('display', 'table-row');
			}
		});
	});

	$('#pesqPass').keyup(function(){
		$('.pesquisa[data-tipo="passageiro"] td:nth-of-type(3)').each(function(){
			var numL = $('#pesqPass').val().length;
			var value = $(this).html();
			var vl = value.substring(0, numL);
			
			if(vl != $('#pesqPass').val()){
				$(this).parent().css('display', 'none');
			}
			if(vl == $('#pesqPass').val()){
				$(this).parent().css('display', 'table-row');
			}
		});
	});

	$('#pesqMoto').keyup(function(){
		$('.pesquisa[data-tipo="motorista"] td:nth-of-type(3)').each(function(){
			var numL = $('#pesqMoto').val().length;
			var value = $(this).html();
			var vl = value.substring(0, numL);
			
			if(vl != $('#pesqMoto').val()){
				$(this).parent().css('display', 'none');
			}
			if(vl == $('#pesqMoto').val()){
				$(this).parent().css('display', 'table-row');
			}
		});
	});

});


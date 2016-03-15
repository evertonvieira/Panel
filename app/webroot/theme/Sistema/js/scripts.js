<<<<<<< Updated upstream
$(document).ready(function(){
	jQuery('#datetimepicker, #contrato').datetimepicker({
		lang:'pt',
		timepicker:false,
		format:'d/m/Y',
		mask: true
	});

	jQuery('#ano').datetimepicker({
		lang:'pt',
		timepicker:false,
		format:'Y',
	});

	$("#datetimepicker, #contrato").on("change", function () {
		var id = $(this).attr("id");
		var val = $("label[for='" + id + "']").text();
		$("#msg").text(val + " changed");
	});
	jQuery('#datajogo').datetimepicker({
		lang:'pt',
		mask:true,
	});

	$("#telefone").mask("(99) 99999-9999");
	$("#identidade").mask("99.999.999-9");
	$("#cep").mask("99999-999");

	$("#cep").change(function(){
		var cep_code = $(this).val();
		if( cep_code.length <= 0 ) return;
		$.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
		function(result){
			if( result.status!=1 ){
				alert(result.message || "Houve um erro desconhecido");
				return;
			}
			$("input#cep").val( result.code );
			$("input#estado").val( result.state );
			$("input#cidade").val( result.city );
			$("input#bairro").val( result.district );
			$("input#logradouro").val( result.address );
		});
	});
	$(":file").filestyle({
		buttonText: "Selecionar Imagem"
	});
});

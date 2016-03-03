$(document).ready(function(){
	jQuery('#datetimepicker').datetimepicker({
		lang:'pt',
		timepicker:false,
		timepicker:false,
		format:'d/m/Y',
		mask: true
	});
	$("#datetimepicker").on("change", function () {
		var id = $(this).attr("id");
		var val = $("label[for='" + id + "']").text();
		$("#msg").text(val + " changed");
	});

});

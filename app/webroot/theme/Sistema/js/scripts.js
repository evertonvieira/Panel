$(document).ready(function() {
	$("a").click(function(event){
		event.preventDefault();
		linkLocation = this.href;
		$("#page-wrapper").fadeOut(1000, redirectPage);
	});
	function redirectPage() {
		window.location = linkLocation;
	}
});
$(document).ready(function() {
	$("a").click(function(event){
		event.preventDefault();
		linkLocation = $(this).attr("href");
		console.log(linkLocation);
		if ( linkLocation != "#"){
			$(".loading").css({"display":"block"});
			$(".box-primary").fadeOut(2500, redirectPage);
		}
	});
	function redirectPage() {
		window.location = linkLocation;
	}
});
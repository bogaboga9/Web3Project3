$(document).ready(function(){
	$("input[name=bandList]").focusout(function () {
		alert($(this).val());
	});
});
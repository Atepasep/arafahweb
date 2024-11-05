$(document).ready(function () {
	var param = $("#pesanerror").val();
	if (param == 1) {
		var teks = $("#msg").val();
		pesan(teks, 'error');
	}
})

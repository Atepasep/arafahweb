$(document).ready(function () {
	// pesan('XXXX')
	var param = $("#pesanerror").val();
	if (param == '1') {
		var teks = $("#msg").val();
		// alert(teks);
		pesan(teks, 'error');
	}
})

$(document).ready(function () {
	var table = $("#tabelnya").DataTable({
		fixedColumns: true,
		processing: true,
		serverSide: true,
		order: [],
		ajax: {
			url: base_url + "barang/get_data_barang",
			type: "POST",
			data: function (d) {
				d.filter_kategori = $("#filter").val();
				d.filter_inv = $("#filterinv").val();
				d.filter_act = $("#filteract").val();
				console.log("Filter kategori:", d.filter_kategori);
				console.log("Filter INV:", d.filter_inv);
				console.log("Filter aktif:", d.filter_act);
				console.log(d);
			},
		},
		columnDefs: [{
			targets: [0],
			orderable: false,
		}, {
			targets: [4],
			class: "text-right text-blue",
		}, {
			targets: [5],
			class: "text-right text-blue",
		}, {
			targets: [6],
			class: "text-right text-blue",
		}, {
			targets: [7],
			class: "text-center",
		}, ],
		pageLength: 50,
		scrollY: 600,
		// scrollX: true,
		// searching: false,
		// paging: false,
		// info: false,
		scrollCollapse: true,
		// "language": {
		// 	processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> '
		// },
		dom: '<"pull-left"l><"pull-right"f>t<"bottom-left"p><"bottom-right"i>',
	})
});

$(document).ready(function () {
	modalBoxLg();
	modalFull();
	modalScroll();
	$(".datatable").DataTable({
		responsive: true,
		pageLength: 50,
		// paging: false,
		// dom: '<"pull-left"l><"pull-right"f>t<"bottom-left"i><"bottom-right"p>',
		dom: '<"pull-left"l><"pull-right"f>t<"bottom-left"i><"bottom-right"p>',
	});
	$(".fixcolumn").DataTable({
		fixedColumns: {
			start: 2,
			end: 1
		},
		// fixedColumns: true,
		paging: false,
		scrollCollapse: true,
		scrollX: true,
		scrollY: 300,
		dom: '<"pull-left"l><"pull-right"f>t<"bottom-left"i><"bottom-right"p>',
	});
	$("#modal-delete").on("show.bs.modal", function (e) {
		var string = document.getElementById("modal-delete").innerHTML;
		var link = $(e.relatedTarget);
		var title = link.data("message");
		var modal = $(this);
		modal.find(".message").text(title);
		$(this).find(".btn-ok").attr("href", $(e.relatedTarget).data("href"));
	});
	$(".tglpilih").datepicker({
		autoclose: true,
		format: "dd-mm-yyyy",
	});
});

function modalBoxLg() {
	$("#modal-large").on("show.bs.modal", function (e) {
		var link = $(e.relatedTarget);
		var title = link.data("title");
		var modal = $(this);
		modal.find(".modal-title").text(title);
		$(this).find(".fetched-data").load(link.attr("href"));
	});
	return false;
}

function modalFull() {
	$("#modal-full-width").on("show.bs.modal", function (e) {
		var link = $(e.relatedTarget);
		var title = link.data("title");
		var modal = $(this);
		modal.find(".modal-title").text(title);
		$(this).find(".fetched-data").load(link.attr("href"));
	});
	return false;
}

function modalScroll() {
	$("#modal-scrollable").on("show.bs.modal", function (e) {
		var link = $(e.relatedTarget);
		var title = link.data("title");
		var modal = $(this);
		modal.find(".modal-title").text(title);
		$(this).find(".fetched-data").load(link.attr("href"));
	});
	return false;
}

$("#file_browser").click(function (e) {
	e.preventDefault();
	alert('WOW');
	$("#file").click();
});
$("#file_path").click(function () {
	$("#file_browser").click();
});
$("#file").change(function () {
	$("#file_path").val($(this).val());
});
var loadFile = function (event) {
	var output = document.getElementById("gbimage");
	var isifile = event.target.files[0];
	$("#okesubmit").addClass("disabled");
	if (!isifile) {
		output.src = "assets/images/addgambar.png";
	} else {
		output.src = URL.createObjectURL(isifile);
		output.onload = function () {
			URL.revokeObjectURL(output.src); // free memory
		};
		$("#okesubmit").removeClass("disabled");
	}
};

function pesan(pesan, jenis) {
	if (jenis == "info") {
		var head = "Information";
		var bek = "#17A2B8";
		var teksColor = "white";
	} else {
		if (jenis == "success") {
			var head = "Success";
			var bek = "#1cc88a";
			var teksColor = "black";
		} else {
			var head = "error";
			var bek = "#ff6f69";
			var teksColor = "white";
		}
	}
	$.toast({
		heading: head.toUpperCase(),
		text: pesan,
		showHideTransition: "fade", //slide, fade, plain
		icon: jenis,
		hideAfter: 5000,
		position: "bottom-right",
		bgColor: bek,
		textColor: teksColor,
		loader: false,
	});
}

$(document).ready(function () {
	modalBoxLg();

	$("#modal-delete").on("show.bs.modal", function (e) {
		var string = document.getElementById("modal-delete").innerHTML;
		var link = $(e.relatedTarget);
		var title = link.data("message");
		var modal = $(this);
		modal.find(".message").text(title);
		$(this).find(".btn-ok").attr("href", $(e.relatedTarget).data("href"));
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

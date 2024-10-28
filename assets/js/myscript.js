$(document).ready(function () {
	modalBoxLg();
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

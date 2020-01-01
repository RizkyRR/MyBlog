$(document).ready(function() {
	setInterval(function() {
		commentAjaxFn();
	}, 1000); //request every x seconds
});
var baseurl = "<?php echo base_url(); ?>";

function commentAjaxFn() {
	// to show all comment comming
	$.ajax({
		url: baseurl + "comment/comment_notif_data",
		type: "ajax",
		cache: true,
		dataType: "JSON",
		success: function(data) {
			var html = "";
			var i;
			for (i = 0; i < data.length; i++) {
				html +=
					'<a class="dropdown-item d-flex align-items-center" href="comment">' +
					"<div>" +
					'<div class="text-truncate">' +
					data[i].content +
					"</div>" +
					'<div class="small text-gray-500">' +
					data[i].username +
					"</div>" +
					"</div>" +
					"</a>";
			}
			$("#show_all_comment").html(html);
		}
	});

	// to get count comment comming or not yet ready
	$.ajax({
		url: baseurl + "comment/comment_count_data",
		type: "ajax",
		cache: true,
		dataType: "JSON",
		success: function(data) {
			$(".badge-counter-comment").html(data);
		}
	});
}

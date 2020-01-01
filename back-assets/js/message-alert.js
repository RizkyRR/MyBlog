$(document).ready(function() {
	setInterval(function() {
		messageAjaxFn();
	}, 1000); //request every x seconds
});
var baseurl = "<?php echo base_url(); ?>";

// to show all message comming
function messageAjaxFn() {
	$.ajax({
		url: baseurl + "message/message_notif_data",
		type: "ajax",
		cache: false,
		dataType: "JSON",
		success: function(data) {
			var html = "";
			var i;
			for (i = 0; i < data.length; i++) {
				html +=
					'<a class="dropdown-item d-flex align-items-center" href="message">' +
					"<div>" +
					'<div class="text-truncate">' +
					data[i].message_content +
					"</div>" +
					'<div class="small text-gray-500">' +
					data[i].name +
					"</div>" +
					"</div>" +
					"</a>";
			}
			$("#show_all_message").html(html);
		}
	});

	// to get count message comming or not yet ready
	$.ajax({
		url: baseurl + "message/message_count_data",
		type: "ajax",
		cache: false,
		dataType: "JSON",
		success: function(data) {
			$(".badge-counter-message").html(data);
		}
	});
}

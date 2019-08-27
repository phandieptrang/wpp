
	$(document).ready(function () {
		$("#chuyen_nganh").click(function () {
			$.ajax({
			async:false,
			type: "get",
			url: "http://localhost/project23/public/giao_vu/chuyen_nganh/view_all",
			success: function (response) {
				$("p").html(response);
			}
		});
		})

	})
	
	$("#").click(function () {
			$.ajax({
			type: "get",
			url: "viewContent.html",
			success: function (response) {
				$("section").html(response);
			}
			});
		
	})

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

$(document).ready(function () {
	var $page = $("#page");

	$page.on("change", function() {
		var selected_value = $page.val();

		if (selected_value == "query") {
			var $selected_item = $("#" + selected_value);
			$selected_item.toggleClass("hide");
			$table = $("#table");

			$.ajax({
			    url: '../query.php',
			    data: "query=select&tablename=__tables", 
			    dataType: 'json',
			    success: function(json) {
			        $.each(json, function(index, value) {
			            $table.append('<option value="'+ value + '">' + value + '</option>');
			        });

			    }
			});
		}

		var $submit = $("#query .go");
		$submit.on("click", function () {
			var get_data = $("#data").val();
			var tablename = $("#table").val();
			var query = $("#query_name").val().split(":");

			// get_data = "\n"  + get_data;
			// get_data = "tablename=" + tablename + get_data;
			// get_data = "\n"  + get_data;
			// get_data = "query=" + query[0]  + get_data;
			// get_data = get_data.trim().replaceAll("\n", "&");
			get_data = get_data.trim().split("\n")
			data_object = {};
			data_object['query'] = query[0];
			data_object['tablename'] = tablename;
			$.each(get_data, function(index, value) {
				value = value.split("=");
				data_object[value[0].trim()] = value[1].trim();
			});
			console.log(data_object);

			$.ajax({
				url: "../query.php",
				data: data_object,
				dataType: "text/plain",
				method: query[1],
				success: function (json) {
					console.log(json);
					$("#result").html(JSON.stringify(json, null, 4));
				},
			});

		});
	});
});
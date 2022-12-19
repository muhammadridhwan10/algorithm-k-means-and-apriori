$(document).ready( function () {
	$('#table_ticket').DataTable({
		"aButtons": [
		{
			"sExtends": "xls",
			"sFileName": "Action List.xls",
			"sButtonText": "Download All To Excel"
		}],
		"searching": true,
		"ordering": true,
		"info": false,
		"responsive": false,
		"autoWidth": false,
		"pageLength": 10,
		"iDisplayLength": 50,
		"ajax": {
		"url": "data.php",
		"type": "POST"
		},
		"aLengthMenu": 
		[[10, 25, 50, 100, -1],
		[10, 25, 50, 100, "All"]],
		"columns": [
		{ "data": "transaction_date" },
		{ "data": "produk" },
		],
	});
});

$.notifyDefaults({
	type: 'success',
	delay: 2000
});

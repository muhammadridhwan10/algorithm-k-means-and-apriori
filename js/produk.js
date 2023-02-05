$(document).ready( function () {
	$('#table_ticket').DataTable({
		"aButtons": [
		{
			"sExtends": "xlsx",
			"sFileName": "Action List.xlsx",
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
		{ "data": "id_barang" },
		{ "data": "nmb" },
		{ "data": "jenis_barang" },
		{ "data": "stok" },
		{ "data": "mar" },
		{ "data": "apr" },
		{ "data": "mei" },
		{ "data": "minat"}
		],
	});
});

$.notifyDefaults({
	type: 'success',
	delay: 2000
});

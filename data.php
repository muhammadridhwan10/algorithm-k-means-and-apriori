<?php
	//This api file contains json that put data from the mysql table
	include "pages/fungsi/config.php";
	$query = mysqli_query($link, "SELECT * FROM tbl_data");
	$data = array();
	while($r = mysqli_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i=0;
	$datax = array('data' => $data);
	echo json_encode($datax);
?>

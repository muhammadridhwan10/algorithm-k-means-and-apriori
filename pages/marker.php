<?php
include '../koneksi.php';
$result=$mysqli->query("SELECT * FROM tbl_penjahit ORDER BY id_penjahit ASC");
$output='<?xml version="1.0" encoding="UTF-8"?>';
if($result->num_rows >0){
	$no=1;
	$output.='<markers>';
	while ($row=$result->fetch_object()) {
		$output.='<marker id="'.$no.'" name="'.$row->nama.'" phone="'.$row->telepon.'" email="'.$row->email.'" alamat="'.$row->alamat.'" lat="'.$row->latitude.'" lng="'.$row->longitude.'"/>';
		$no++;
	}
	$output.='</markers>';
	$result->free_result();
}
header("Content-Type:text/xml");
echo $output;
?>
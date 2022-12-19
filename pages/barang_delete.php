<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$mysqli->query("DELETE FROM tbl_data WHERE id='$id'");
	if($mysqli->affected_rows>0){
		echo "
		<script>
			alert('Barang berhasil dihapus!');
			document.location.href='?page=barang';
		</script>";
	}else{
		echo "
		<script>
		alert('Barang gagal dihapus!');
		</script>";
	}
}
?>

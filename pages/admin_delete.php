<?php
if(isset($_GET['id_admin'])){
	$id_admin=$_GET['id_admin'];
	$mysqli->query("DELETE FROM tbl_admin WHERE id_admin='$id_admin'");
	if($mysqli->affected_rows>0){
		echo "
		<script>
			alert('Admin berhasil dihapus!');
			document.location.href='?page=admin';
		</script>";
	}else{
		echo "
		<script>
		alert('Admin gagal dihapus!');
		</script>";
	}
}
?>

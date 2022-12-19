<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nama 		= htmlspecialchars($_POST['nama']);
	$telepon 	= htmlspecialchars($_POST['telepon']);
	$email 		= htmlspecialchars($_POST['email']);
	$username 	= htmlspecialchars($_POST['username']);
	$password 	= htmlspecialchars($_POST['password']);
	$mysqli->query("INSERT INTO tbl_admin(nama,telepon,email,username,password) VALUES('$nama','$telepon','$email','$username','$password')");
	if($mysqli->affected_rows>0){
	  echo"
	  <script>
		alert('Admin berhasil ditambahkan!');
		document.location.href = '?page=admin';
	  </script>";
	}else{
		echo"
		<script>
		alert('Admin gagal ditambahkan!');
		</script>";
	}
}
?>
<section class="content-header">
  <h1>
	Tambah Admin
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Admin</a></li>
	<li class="active">Add</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="?page=admin">
		<span class="glyphicon fa fa-mail-reply"></span> <b>Kembali</b>
	</a> 
  <div class="box-tools pull-right">
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
  </div>
</div>
<div class="box-body">
  <div class="row">
	<div class="col-md-12">
	  <form id="frm" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="box-body">
			<div class="form-group">
				<label class="control-label col-sm-2" for="nama">Nama</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="telepon">Telepon</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="username">Username</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Password</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Simpan
				  </button>
				  <button type="reset" class="btn btn-md btn-danger">
					<i class="ace-icon fa fa-ban"></i> Reset
				  </button>
				</div>
			</div>
		</div>
	  </form>
	</div>
  </div>
</div>
</div>
</section>
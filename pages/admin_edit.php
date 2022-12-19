<?php
$id_admin=$_GET["id_admin"];
$result=$mysqli->query("SELECT * FROM tbl_admin WHERE id_admin='$id_admin'");
$row=$result->fetch_object();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id_admin	= htmlspecialchars($_POST['id_admin']);
	$nama 		= htmlspecialchars($_POST['nama']);
	$telepon 	= htmlspecialchars($_POST['telepon']);
	$email 		= htmlspecialchars($_POST['email']);
	$username 	= htmlspecialchars($_POST['username']);
	$password 	= htmlspecialchars($_POST['password']);
	if($password!=''){
		$mysqli->query("UPDATE tbl_admin SET nama='$nama',telepon='$telepon',email='$email' WHERE id_admin='$id_admin'");
	}else{
		$mysqli->query("UPDATE tbl_admin SET nama='$nama',telepon='$telepon',email='$email',password='$password' WHERE id_admin='$id_admin'");
	}
	echo "<script>alert('admin berhasil diupdate!');document.location.href = '?page=admin';</script>";
}
 ?>
<section class="content-header">
  <h1>
	Edit Admin
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Admin</a></li>
	<li class="active">Edit</a></li>
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
				  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row->nama;?>" placeholder="Nama" required>
				  <input type="hidden" id="id_admin" name="id_admin" value="<?php echo $row->id_admin; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="telepon">Telepon</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $row->telepon;?>"  placeholder="Telepon" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" id="email" name="email" value="<?php echo $row->email;?>" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="username">Username</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $row->username;?>" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="password">Ganti Password ?</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="password" name="password" placeholder="Password">
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" id="btn-save" class="btn btn-md btn-primary">
				  <i class="ace-icon fa fa-save"></i> Update
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
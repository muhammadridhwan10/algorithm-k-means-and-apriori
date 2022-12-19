<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nama_barang	= htmlspecialchars($_POST['nmb']);
	$total_stok 	= htmlspecialchars($_POST['stok']);
	$januari 		= htmlspecialchars($_POST['jan']);
	$februari 		= htmlspecialchars($_POST['feb']);
	$maret 			= htmlspecialchars($_POST['mar']);
	
	$mysqli->query("INSERT INTO tbl_data(nmb,stok,jan,feb,mar) VALUES('$nama_barang','$total_stok','$januari','$februari','$maret')");
	if($mysqli->affected_rows>0){
		echo"<script>alert('Barang berhasil ditambahkan!');document.location.href = '?page=barang';</script>";
	}else{
		echo"<script>alert('Barang gagal ditambahkan!');</script>";
	}
		
	
}
?>
<section class="content-header">
  <h1>
	Tambah Barang
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Barang</a></li>
	<li class="active">Add</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="?page=barang">
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
				<label class="control-label col-sm-2" for="nmb">Nama Barang</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nmb" name="nmb" placeholder="Nama Barang" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="stok">Total Stok</label>
				<div class="col-sm-8">
				  <textarea type="number" class="form-control" rows="5" id="stok" name="stok" placeholder="Total Stok" required></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="jan">Januari</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="jan" name="jan" placeholder="Total Barang Terjual.." required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="feb">Februari</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="feb" name="feb" placeholder="Total Barang Terjual.." required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="mar">Maret</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="mar" name="mar" placeholder="Total Barang Terjual.." required>
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
<?php
$id_barang =$_GET["id_barang"];
$result		=$mysqli->query("SELECT * FROM tbl_data WHERE id_barang='$id_barang'");
$row		=$result->fetch_object();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id_barang      = htmlspecialchars($_POST['id_barang']);
    $nmb    		= htmlspecialchars($_POST['nmb']);
	$stok 		    = htmlspecialchars($_POST['stok']);
	$jan 	        = htmlspecialchars($_POST['jan']);
	$feb 	    	= htmlspecialchars($_POST['feb']);
	$mar 		    = htmlspecialchars($_POST['mar']);

	$mysqli->query("UPDATE tbl_data SET id_barang='$id_barang', nmb='$nmb', stok='$stok', jan='$jan', feb='$feb', mar='$mar' WHERE id_barang ='$id_barang'");
	echo"<script>alert('Barang berhasil diupdate!');document.location.href = '?page=barang';</script>";
	
}
 ?>
<section class="content-header">
  <h1>
	Edit Barang
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Barang</a></li>
	<li class="active">Edit</a></li>
  </ol>
</section>
<section class="content">
<div class="box box-primary">
<div class="box-header with-border">
	<a href="?page=model">
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
				  <input type="text" class="form-control" id="nmb" name="nmb"  value="<?php echo $row->nmb;?>" placeholder="Nama Barang..." required>
				  <input type="hidden" id="id_barang" name="id_barang" value="<?php echo $row->id_barang; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="stok">Stok Barang</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $row->stok;?>" placeholder="Stok Barang" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="jan">Januari</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="jan" name="jan" value="<?php echo $row->jan;?>" placeholder="Total Penjualan Bulan Januari..." required>
				</div>
			</div>
            <div class="form-group">
				<label class="control-label col-sm-2" for="feb">Februari</label>
				<div class="col-sm-8">
				  <textarea type="number" class="form-control" rows="5" id="feb" name="feb" placeholder="Total Penjualan Bulan Februari" required><?php echo $row->feb;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="mar">Maret</label>
				<div class="col-sm-8">
				  <textarea type="number" class="form-control" rows="5" id="mar" name="mar" placeholder="Total Penjualan Bulan Maret" required><?php echo $row->mar;?></textarea>
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
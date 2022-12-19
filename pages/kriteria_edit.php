<?php
$id_hasil=$_GET["id_hasil"];
$result		=$mysqli->query("SELECT * FROM tbl_hasil WHERE id_hasil='$id_hasil'");
$row		=$result->fetch_object();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$c1				= htmlspecialchars($_POST['c1']);
	$c2 			= htmlspecialchars($_POST['c2']);
	$c1y 			= htmlspecialchars($_POST['c1y']);
	$c2y 			= htmlspecialchars($_POST['c2y']);

	$mysqli->query("UPDATE tbl_hasil SET c1='$c1',c2='$c2',c1y='$c1y',c2y='$c2y' WHERE id_hasil='$id_hasil'");
	echo"<script>alert('Kriteria berhasil diupdate!');document.location.href = '?page=kriteria';</script>";
	
}
 ?>
<section class="content-header">
  <h1>
	Edit Kriteria
  </h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Kriteria</a></li>
	<li class="active">Edit</a></li>
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
				<label class="control-label col-sm-2" for="c1">C1x</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="c1" name="c1"  value="<?php echo $row->c1;?>" placeholder="C1x..." required>
				  <input type="hidden" id="id_hasil" name="id_hasil" value="<?php echo $row->id_hasil; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="c2">C2x</label>
				<div class="col-sm-8">
				  <textarea type="number" class="form-control" rows="5" id="c2" name="c2" placeholder="C2x..." required><?php echo $row->c2;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="c1y">C1y</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="c1y" name="c1y" value="<?php echo $row->c1y;?>" placeholder="C1y..." required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="c2y">C2y</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="c2y" name="c2y" value="<?php echo $row->c2y;?>" placeholder="c2Y..." required>
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
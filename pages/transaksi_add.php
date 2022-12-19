<section class="content-header">
<h1>
	Import Transaksi
</h1>
<ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Transaksi</a></li>
	<li class="active">Add</a></li>
</ol>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<a href="?page=transaksi">
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
					<form method="post" enctype="multipart/form-data" action="upload_aksi.php">
								<div class="form-group">
									<div class="input-group">
										<label>Import data from excel</label>
										<input name="file_data_transaksi" type="file" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<input name="submit" type="submit" value="Upload Data" class="btn btn-success">
								</div>
								<div class="form-group">
									<button name="delete" type="submit"  class="btn btn-danger" >
										<i class="fa fa-trash-o"></i> Delete All Data Transaction
									</button>
								</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
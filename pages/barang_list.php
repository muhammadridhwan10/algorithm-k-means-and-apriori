<section class="content-header">
  <h1>
	Data Barang
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Barang</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	<a href="?page=barang&action=tambah">
		<button type="button" class="btn btn-primary btn-sm flat">
			<span class="glyphicon glyphicon-plus"></span> Tambah
		</button>
	</a>
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Barang</h3>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">No</th>
				<th>Nama Barang</th>
				<th>Total Stok Barang</th>
				<th>Januari</th>
				<th>Februari</th>
				<th>Maret</th>
				<th>Total</th>
				<th width="12%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result =$mysqli->query("SELECT a.* FROM tbl_data a");
			  if($result->num_rows>0){
			  $no=1;
				while($row=$result->fetch_assoc())
				{?>
				<tr>
					<?php $sub=$row['jan']+$row['feb']+$row['mar']; ?>
					
					<td><?php echo $no;?></td>
					<td><?php echo $row["nmb"]; ?></td>
					<td><?php echo $row["stok"]; ?></td>
					<td><?php echo $row["jan"]; ?></td>
					<td><?php echo $row["feb"]; ?></td>
					<td><?php echo $row["mar"]; ?></td>
					<td><?php echo $sub; ?></td>
					<td class="text-center">
						<div class="btn-group">
							<a href="?page=barang&action=edit&id_barang=<?=$row["id_barang"];?>">
								<button type="button" class="glyphicon glyphicon-pencil btn btn-sm btn-warning" title="Edit Barang"></button>
							</a>
							<a href="?page=barang&action=hapus&id_barang=<?=$row["id_barang"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');">
								<button  type="button" class="glyphicon glyphicon-trash btn btn-sm btn-danger" title="Hapus Barang"></button>
							</a>
						</div>
					</td>
				</tr>
				<?php $no++; ?>
				<?php } ?>
			  <?php } ?>
			</tbody>
				   
			<tfoot>
			</tfoot>
		  </table>

		</div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div><!-- /.col -->
  </div><!-- /.row -->
</section>
<script type="text/javascript">
  $(function () {
	$("#example1").dataTable();
  });
</script>
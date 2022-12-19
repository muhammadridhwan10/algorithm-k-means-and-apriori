<section class="content-header">
  <h1>
	Data Admin
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Admin</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	<a href="?page=admin&action=tambah">
		<button type="button" class="btn btn-primary btn-sm flat">
			<span class="glyphicon glyphicon-plus"></span> Tambah
		</button>
	</a>
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Admin</h3>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">No</th>
				<th>Nama</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Username</th>
				<th width="10%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result =$mysqli->query("SELECT a.* FROM tbl_admin a ORDER BY a.id_admin ASC");
			  if($result->num_rows>0){
			  $no=1;
			  while($row=$result->fetch_assoc()){?>
			  <tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["telepon"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["username"]; ?></td>
				<td class="text-center">
					<div class="btn-group">
						<a href="?page=admin&action=edit&id_admin=<?=$row["id_admin"];?>">
							<button type="button" class="glyphicon glyphicon-pencil btn btn-sm btn-warning" title="Edit Admin"></button>
						</a>
						<a href="?page=admin&action=hapus&id_admin=<?=$row["id_admin"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');">
							<button  type="button" class="glyphicon glyphicon-trash btn btn-sm btn-danger" title="Hapus Admin"></button>
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
<section class="content-header">
  <h1>
	Data Kriteria
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Kriteria</a></li>
	<li class="active">List</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Kriteria</h3>
		  <div class="box-tools pull-right">
			<a class="btn btn-primary btn-md" href="pages/proses.php">
				<span class="glyphicon fa fa-refresh"></span> <b>Proses</b>
			</a>
		  </div>
		</div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th width="5%">No</th>
				<th>C1x</th>
				<th>C2x</th>
				<th>C1y</th>
				<th>C2y</th>
				<th width="10%" class="text-center">Action</th>
			  </tr>
			</thead>
			<tbody>
			  <?php
			  $result =$mysqli->query("SELECT a.* FROM tbl_hasil a WHERE id_hasil = 1");
			  if($result->num_rows>0){
			  $no=1;
			  while($row=$result->fetch_assoc()){?>
			  <tr>
				<td><?php echo $no;?></td>
				<td><?php echo $row["c1"]; ?></td>
				<td><?php echo $row["c2"]; ?></td>
				<td><?php echo $row["c1y"]; ?></td>
				<td><?php echo $row["c2y"]; ?></td>
				<td class="text-center">
					<div class="btn-group">
						<a href="?page=kriteria&action=edit&id_hasil=<?=$row["id_hasil"];?>">
							<button type="button" class="glyphicon glyphicon-pencil btn btn-sm btn-warning" title="Edit Kriteria"></button>
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
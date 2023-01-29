<section class="content-header">
  <h1>
	Metode Clustering
  </h1>
  <ol class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a href="#">Clustering</a></li>
	<li class="active">Hasil</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Hasil Clustering</h3>
		  <div class="box-tools pull-right">
			<a class="btn btn-primary btn-md" href="pages/cetak.php">
				<span class="glyphicon fa fa-print"></span> <b>Cetak</b>
			</a>
		  </div>
		</div>
		<div class="box-body">
			<?php
			 $sql_edit = mysqli_query("SELECT * FROM tbl_hasil WHERE id_hasil='1'");
				$row =  mysqli_fetch_array($sql_edit);
								$px1=$row['c1'];
								$py1=$row['c2'];
								
								$px2=$row['c1y'];
								$py2=$row['c2y'];
								$ac1=0;
								$ac2=0;
								$it=1;
							
							$no=1;
							$q=mysqli_query("select * from tbl_data order by id asc");
							while($r=mysqli_fetch_array($q)){
							$min=0;
							$sub=$r['mar']+$r['apr']+$r['mei'];
							$c1=sqrt((pow(($r['stok']-$px1),2))+(pow(($sub-$py1),2)));
							$c2=sqrt((pow(($r['stok']-$px2),2))+(pow(($sub-$py2),2)));
							$min=0;
							$min=min($c1,$c2);
							
							if($c1==$min){
								$ketmin="C1";
								$ac1++;
								$agtc1x[]=$r['stok'];
								$agtc1y[]=$sub;
							}elseif($c2==$min){
								$ketmin="C2";
								$ac2++;
								$agtc2x[]=$r['stok'];
								$agtc2y[]=$sub;
							}
							$no++;
							}
								
				foreach($agtc1x as $key){
					$tcx1=$tcx1+$key;
				}
				foreach($agtc1y as $key){
					$tcy1=$tcy1+$key;
				}
				foreach($agtc2x as $key){
					$tcx2=$tcx2+$key;
				}
				foreach($agtc2y as $key){
					$tcy2=$tcy2+$key;
				}
					//$px1=$tcx1/4;
				$px1=38.1666;
				//$py1=$tcy1/$ac1;
				$py1=31.25;
				
				//$px2=$tcx2/$ac2;
				$px2=24.875;
				//$py2=$tcy2/$ac2;
				$py2=12.875;
				$ac1=0;
				$ac2=0;
				$it++;
					// echo"<h2>&nbsp;Iterasi $it</h2>";
					// echo'<p>&nbsp;Pusat Cluster ke-1 : {'.$px1.', '.$py1.'}</p>';
					// echo'<p>&nbsp;Pusat Cluster ke-2 : {'.$px2.', '.$py2.'}</p>';
			?>
			<table  class="table table-bordered table-striped">
				<thead>
				<tr>
				<th width="5%">No</th>
					<th>Nama Barang</th>
					<th>Total Stok Barang</th>
					<th>Maret</th>
					<th>April</th>
					<th>Mei</th>
					<th>Total</th>
					<th>C1</th>
					<th>C2</th>
					<th>Hasil</th>
					<!-- <th width="12%" class="text-center">Action</th> -->
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
						<?php $sub=$row['mar']+$row['apr']+$row['mei']; ?>
						<?php
						$c1=sqrt((pow(($row['stok']-$px1),2))+(pow(($sub-$py1),2)));
						$c2=sqrt((pow(($row['stok']-$px2),2))+(pow(($sub-$py2),2)));
						$min=min($c1,$c2);
						if($min==$c1){
							$ketmin="Rendah";
						}else{
							$ketmin="Tinggi";					
						}
						?>
						<td><?php echo $no;?></td>
						<td><?php echo $row["nmb"]; ?></td>
						<td><?php echo $row["stok"]; ?></td>
						<td><?php echo $row["mar"]; ?></td>
						<td><?php echo $row["apr"]; ?></td>
						<td><?php echo $row["mei"]; ?></td>
						<td><?php echo $sub; ?></td>
						<td><?php echo number_format($c1,2); ?></td>
						<td><?php echo number_format($c2,2); ?></td>
						<td><?php echo $ketmin; ?></td>
						<!-- <td class="text-center">
							<div class="btn-group">
								<a href="?page=barang&action=edit&id_barang=<?=$row["id_barang"];?>">
									<button type="button" class="glyphicon glyphicon-pencil btn btn-sm btn-warning" title="Edit Barang"></button>
								</a>
								<a href="?page=barang&action=hapus&id_barang=<?=$row["id_barang"];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?');">
									<button  type="button" class="glyphicon glyphicon-trash btn btn-sm btn-danger" title="Hapus Barang"></button>
								</a>
							</div>
						</td> -->
					</tr>
					<?php $no++; ?>
					<?php } ?>
				<?php } ?>
				</tbody>
					
				<tfoot>
				</tfoot>
			</table>
		</div>
	  </div>
	</div>
  </div>
</section>
<script type="text/javascript">
  $(function () {
	$("#example1").dataTable();
  });
</script>
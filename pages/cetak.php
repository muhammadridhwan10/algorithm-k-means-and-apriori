<body onLoad="print()">
<div class="span12">
    <div class="widget widget-nopad">
<?php
include_once "../database.php";
error_reporting(0);
?>

<div class="widget-header"> 
	<i class="icon-list-alt"></i>
    <h2 align="center">PT Rifky Abadi</h2>
    <p align="center">Laporan Hasil Clustering</p>
    <hr/>
</div>

<div class="widget-content">
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
							$sub=$r['jan']+$r['feb']+$r['mar'];
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
				
				<div class="widget big-stats-container">
				
				<div class="shortcuts">
				<table border=1 cellpadding=0 cellspacing=0 width="100%" class="table table-striped table-bordered table-hover">
				<thead>
                    <tr>
						<th rowspan=2>No</th>
                        <th rowspan=2>Nama Barang</th>
                        <th rowspan=2>Total Stok Barang</th>
                        <th colspan=3><center>Penjualan</center></th>
                        <th rowspan=2>Total</th>
                        <th rowspan=2>C1</th>
                        <th rowspan=2>C2</th>
                        <th rowspan=2>Hasil</th>
                    </tr>
					<tr>
						<th>Januari</th>
						<th>Februari</th>
						<th>Maret</th>
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
						<?php
						$c1=sqrt((pow(($row['stok']-$px1),2))+(pow(($sub-$py1),2)));
						$c2=sqrt((pow(($row['stok']-$px2),2))+(pow(($sub-$py2),2)));
						$min=min($c1,$c2);
						if($min==$c1){
							$ketmin="Laris";
						}else{
							$ketmin="Tidak Laris";					
						}
						?>
						<td><?php echo $no;?></td>
						<td><?php echo $row["nmb"]; ?></td>
						<td><?php echo $row["stok"]; ?></td>
						<td><?php echo $row["jan"]; ?></td>
						<td><?php echo $row["feb"]; ?></td>
						<td><?php echo $row["mar"]; ?></td>
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
				</table>
				</div>
            </div>
            </div>		
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
		<tr>
			<br><br><br>
			<td width="63%" bgcolor="#FFFFFF">
				<p align="center"><br/>
			</td>
			<td width="37%" bgcolor="#FFFFFF"><div align="center"> <?php $tgl = date('d M Y');
			echo " $tgl";?><br/>
			Pemilik
			<br/><br/>
			<br/><br/>
			(...............................)
			<br/>
			</div>
			</td>
		</tr>
		</table> 
</body>
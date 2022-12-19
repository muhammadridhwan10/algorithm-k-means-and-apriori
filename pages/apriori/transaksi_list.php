<?php
    ob_start();
    $bpath = "";
    include "pages/apriori/config.php";
?>

<section class="content-header">
	<h1>
		Data Transaksi
	</h1>
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Transaksi</a></li>
		<li class="active">List</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<br>
			<form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="input-group">
                        <label>Import data from excel</label>
                        <input name="fileproduk" type="file" class="form-control">
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
                <?php
                    //If user click import button
                    if(isset($_POST["submit"])){
                        //print_r($_FILES["fileexcel"]);
                        //If file is exist
                        if($_FILES["fileproduk"]["name"] != ""){
                            //Get all columns from the mysql table
                            $query_column = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'iseng' AND TABLE_NAME = 'tbl_transaksi' AND COLUMN_NAME NOT IN('ID')";
                            $result_column = mysqli_query($link,$query_column); 

                            //This var will be used in import process 
                            $column_stmt = "";
                            while ($row_CL = mysqli_fetch_array($result_column)){
                                $column_stmt .= "`".$row_CL["COLUMN_NAME"]."`,";
                            }
                            $column_stmt = substr($column_stmt,0,'-1');
                            $table_name = "tbl_transaksi";
                            
                            //Define Upload Directory
                            $uploaddir = 'uploads/';
                            $uploadfile = $uploaddir . basename($_FILES["fileproduk"]["name"]);
                            if (move_uploaded_file($_FILES["fileproduk"]["tmp_name"], $uploadfile)){
                                echo "<p class='text-center'><strong>";
                                echo "File imported successfully! Table Above Are Data What You Have Been Imported";
                                echo "</strong></p>";
                            }
                            $certainfile = $uploadfile;
                            include("lib/excelreadertrans.php");
                        }else{
                            echo "<script>alert('File Is Empty')</script>";
                        }
                    }
                ?>
		<div class="box">
			<div class="box-header">
			<h3 class="box-title">Data Transaksi</h3>
			</div>
			<div class="box-body">
                <table id="table_ticket" class="table table-bordered table-striped">
                    <thead>
                        <tr class="tableheader">
                            <?php 
                                    //Get all columns from the mysql table
                                $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'iseng' AND TABLE_NAME = 'tbl_transaksi' AND COLUMN_NAME NOT IN('ID')";
                                $doquery = mysqli_query($link,$query);   
                                while($row = mysqli_fetch_array($doquery)){ 
                                    echo "<th>".$row["COLUMN_NAME"]."</th>";
                                }          
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
</section>
<!-- <script type="text/javascript">
$(function () {
	$("#table_ticket").dataTable();
});
</script> -->
<script src="<?php echo $bpath ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="<?php echo $bpath ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $bpath ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $bpath ?>plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="js/produk.js"></script>
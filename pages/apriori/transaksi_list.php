<?php
    ob_start();
    $bpath = "";
    include "pages/apriori/config.php";
?>

<section class="content-header">
	<h1>
		Prediksi Dengan Algoritma Naive Bayes
	</h1>
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li class="active">Proses Naive Bayes</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <form method="POST" class="mt-3">

        <div class="form-group">
        <label for="nama">Nama Barang :</label>
        <input name="nama" id="nama" class="form-control selBox" required="required" placeholder="Masukkan nama barang"></input>
        </div>

        <div class="form-group">
        <label for="jenis_barang">Jenis Barang :</label>
        <select name="jenis_barang" id="jenis_barang" class="form-control selBox" required="required">
            <option value="" disabled selected>-- pilih jenis barang--</option>
            <option value="Peralatan Dapur">Peralatan Dapur</option>
            <option value="Peralatan Kebersihan">Peralatan Kebersihan</option>
            <option value="Peralatan Makan">Peralatan Makan</option>
        </select>
        </div>

        <div class="form-group">
        <label for="minat">Minat :</label>
        <select name="minat" id="minat" class="form-control selBox" required="required">
                    <option value="" disabled selected>-- pilih minat--</option>
                    <option value="Tinggi">Tinggi</option>
                    <option value="Rendah">Rendah</option>
                </select>
        </div>

        <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary mt-3" id="dor" onclick="return simulasi()"/>
        </div>

        </form>
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
    <div class="col-12 mt-5 mb-5">
        <div id="hasilSIM" style="margin-bottom:30px;">

        </div>
    </div>
    </div>
</section>
<!-- <script type="text/javascript">
$(function () {
	$("#table_ticket").dataTable();
});
</script> -->
<!-- validasi -->
<script>
$(document).ready(function(){
    $('.toggle').click(function(){
    $('ul').toggleClass('active');
    });
});
</script>

<script>
function simulasi()
{
    var nama = $("#nama").val();
    var jenis_barang = $("#jenis_barang").val();
    var minat = $("#minat").val();

    //validasi
    var na = document.getElementById("nama");
    var jb = document.getElementById("jenis_barang");
    var mi = document.getElementById("minat");

    if(na.selectedIndex == 0){
    alert("Nama Barang Tidak Boleh Kosong");
    return false;
    }

    if(jb.selectedIndex == 0){
    alert("Jenis Barang Tidak Boleh Kosong");
    return false;
    }

    if(mi.selectedIndex == 0){
    alert("Minat Tidak Boleh Kosong");
    return false;
    }

    //batas validasi

    $.ajax({
        url :'pages/naivebayes/simulasi.php',
        type : 'POST',
        dataType : 'html',
        data : {nama : nama , jenis_barang : jenis_barang , minat : minat,},
        success : function(data){
        document.getElementById("hasilSIM").innerHTML = data;
        },
    });

    return false;

}
</script>

<script>
$(document).ready(function(){
$('#dor').click(function(){
    $('html, body').animate({
        scrollTop: $("#hasilSIM").offset().top
    }, 500);
});
});
</script>
<script src="<?php echo $bpath ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="<?php echo $bpath ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $bpath ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $bpath ?>plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="js/produk.js"></script>
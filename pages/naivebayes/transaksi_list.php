<?php
//session_start();
ob_start();
$bpath = "";
include "pages/apriori/config.php";

include "pages/naivebayes/fungsi.php";
include "pages/naivebayes/fungsi_proses.php";
?>
<section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Uji Akurasi</h4>
                </div>
            </div>
            <?php
            //object database class
            $db_object = new database();

            $pesan_error = $pesan_success = "";
            if (isset($_GET['pesan_error'])) {
                $pesan_error = $_GET['pesan_error'];
            }
            if (isset($_GET['pesan_success'])) {
                $pesan_success = $_GET['pesan_success'];
            }

            if (isset($_POST['delete'])) {
                $sql = "TRUNCATE tbl_data";
                $db_object->db_query($sql);
                ?>
                <script> location.replace("?menu=uji_akurasi&pesan_success=Data uji berhasil dihapus");</script>
                <?php
            }
            
            $sql = "SELECT * FROM tbl_data";
            $query = $db_object->db_query($sql);
            $jumlah = $db_object->db_num_rows($query);
            ?>

            <div class="row">
                <div class="col-md-12">
                    <!--UPLOAD EXCEL FORM-->
                    <form method="post" enctype="multipart/form-data" action="">
                        
                        <div class="form-group">
                            <button name="uji_akurasi" type="submit"  class="btn btn-default" onclick="">
                                <i class="fa fa-check"></i> Uji Akurasi
                            </button>
                        </div>
                    </form>

                    <?php
                    if (!empty($pesan_error)) {
                        display_error($pesan_error);
                    }
                    if (!empty($pesan_success)) {
                        display_success($pesan_success);
                    }


                    echo "Jumlah data: " . $jumlah . "<br>";
                    if ($jumlah == 0) {
                        echo "Data kosong...";
                    } 
                    else {
                        ?>
                        <strong>DATA UJI:</strong>
                        <table class='table table-bordered table-striped  table-hover'>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Total Stok Barang</th>
                                <th>Maret</th>
                                <th>April</th>
                                <th>Mei</th>
                                <th>Minat</th>
                            </tr>
                            <?php
                            $no = 1;
                            while ($row = $db_object->db_fetch_array($query)) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row['nmb'] . "</td>";
                                echo "<td>" . $row['jenis_barang'] . "</td>";
                                echo "<td>" . $row['stok'] . "</td>";
                                echo "<td>" . $row['mar'] . "</td>";
                                echo "<td>" . $row['apr'] . "</td>";
                                echo "<td>" . $row['mei'] . "</td>";
                                echo "<td>" . $row['minat'] . "</td>";
                                echo "</tr>";
                                $no++;
                            }
                            ?>
                        </table>
                        <?php
                    }
                    
                    if(isset($_POST['uji_akurasi']))
                    {
                        //proses menghitung naive bayes
                        //loop data uji nya
                        $sql_hit = "SELECT * FROM tbl_data ";
                        $res = $db_object->db_query($sql_hit);
                        $aa=1;
                        while($row = $db_object->db_fetch_array($res)){
                            echo "<center>";
                            echo "<b>Data Uji ke-".$aa."</b>";
                            echo "<br>"
                            . "<strong>"."Nama Barang: "."</strong>".$row['nmb']." - "
                                    . "<strong>"."Jenis Barang: "."</strong>".$row['jenis_barang']." - "
                                    . "<strong>"."Stok: "."</strong>".$row['stok']." - "
                                    . "<strong>"."Maret: "."</strong>".$row['mar']." - "
                                    . "<strong>"."April: "."</strong>".$row['apr']." - "
                                    . "<strong>"."Mei: "."</strong>".$row['mei']." - "
                                    . "<strong>"."Minat: "."</strong>".$row['minat']
                                    ;
                                    $jumlah_data = jumlah_data_latih($db_object);//jumlah data latih
                                    $jumlah_tinggi = jumlah_data_latih($db_object, " WHERE minat='Tinggi'");//jumlah sanguin
                                    $jumlah_rendah = jumlah_data_latih($db_object, " WHERE minat='Rendah'");//jumlah koleris
                                
                                    $p_tinggi = $jumlah_tinggi/$jumlah_data;
                                    $p_rendah = $jumlah_rendah/$jumlah_data;
                                
                                    //jumlah atribut jenis kelamin
                                    $jumlah_jenis_barang_dapur_tinggi = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN DAPUR' AND minat='Tinggi'");
                                        $jumlah_jenis_barang_makanan_tinggi = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN MAKANAN' AND minat='Tinggi'");
                                        $jumlah_jenis_barang_kebersihan_tinggi = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN KEBERSIHAN' AND minat='Tinggi'");
                                
                                        $jumlah_jenis_barang_dapur_rendah = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN DAPUR' AND minat='Rendah'");
                                        $jumlah_jenis_barang_makanan_rendah = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN MAKANAN' AND minat='Rendah'");
                                        $jumlah_jenis_barang_kebersihan_rendah = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN KEBERSIHAN' AND minat='Rendah'");
                                        
                                    //probabilitas atribut jenis_kelamin
                                    $p_jenis_barang_dapur_tinggi = $jumlah_jenis_barang_dapur_tinggi/$jumlah_tinggi;
                                    $p_jenis_barang_makanan_tinggi = $jumlah_jenis_barang_makanan_tinggi/$jumlah_tinggi;
                                        $p_jenis_barang_kebersihan_tinggi = $jumlah_jenis_barang_kebersihan_tinggi/$jumlah_tinggi;
                                        
                                    $p_jenis_barang_dapur_rendah = $jumlah_jenis_barang_dapur_rendah/$jumlah_rendah;
                                    $p_jenis_barang_makanan_rendah = $jumlah_jenis_barang_makanan_rendah/$jumlah_rendah;
                                        $p_jenis_barang_kebersihan_rendah = $jumlah_jenis_barang_kebersihan_rendah/$jumlah_rendah;
                                        
                                    //display table probabilitas jenis_kelamin
                                        if($show_perhitungan){
                                            // echo "<table class='table table-bordered table-striped  table-hover' style='width:40%'>";
                                            // 	echo "<tr>";
                                            // 		echo "<td><b><u>Jenis Barang:</u></b></td>";
                                            // 		echo "<td>Tinggi</td>";
                                            // 		echo "<td>Rendah</td>";
                                            // 	echo "</tr>";
                                            // 	echo "<tr>";
                                            // 		echo "<td>PERALATAN DAPUR</td>";
                                            // 		echo "<td>".number_format($p_jenis_barang_dapur_tinggi, dec())."</td>";
                                            // 		echo "<td>".number_format($p_jenis_barang_dapur_rendah, dec())."</td>";
                                            // 	echo "</tr>";
                                            // 	echo "<tr>";
                                            // 					echo "<td>PERALATAN MAKANAN</td>";
                                            // 					echo "<td>".number_format($p_jenis_barang_makanan_tinggi, dec())."</td>";
                                            // 					echo "<td>".number_format($p_jenis_barang_makanan_rendah, dec())."</td>";
                                            // 	echo "</tr>";
                                            // 			echo "<tr>";
                                            // 		echo "<td>PERALATAN KEBERSIHAN</td>";
                                            // 		echo "<td>".number_format($p_jenis_barang_kebersihan_tinggi, dec())."</td>";
                                            // 		echo "<td>".number_format($p_jenis_barang_kebersihan_rendah, dec())."</td>";
                                            // 	echo "</tr>";
                                            // echo "</table>";
                                
                                            // echo "<br>";
                                        }
                                        //jawaban_a
                                        //x jawaban_a sanguin
                                    $jumlah_total_stok_tinggi = get_jumlah_sum_atribut($db_object, "stok", "Tinggi");
                                    $x_total_stok_tinggi = $jumlah_total_stok_tinggi/$jumlah_tinggi;
                                    //x jawaban_a  koleris
                                    $jumlah_total_stok_rendah = get_jumlah_sum_atribut($db_object, "stok", "Rendah");
                                    $x_total_stok_rendah = $jumlah_total_stok_rendah/$jumlah_rendah;
                                
                                        if($show_perhitungan){
                                    //     echo "<br>";
                                    //     echo "<strong><u>Atribut Stok:<br></u></strong>";
                                    // echo "X Stok Tinggi=".number_format($x_total_stok_tinggi, dec())."<br>";
                                    // echo "X Stok Rendah=".number_format($x_total_stok_rendah, dec())."<br>";
                                    // echo "<br>";
                                        }
                                
                                    $s2_total_stok_tinggi = get_s2_populasi($db_object, 'stok', 'Tinggi', $x_total_stok_tinggi, $jumlah_tinggi);
                                    $s2_total_stok_rendah = get_s2_populasi($db_object, 'stok', 'Rendah', $x_total_stok_rendah, $jumlah_rendah);
                                
                                        if($show_perhitungan){
                                    // echo "S2 Stok Tinggi=".number_format($s2_total_stok_tinggi, dec())."<br>";
                                    // echo "S2 Stok Rendah=".number_format($s2_total_stok_rendah, dec())."<br>";
                                    // echo "<br>";
                                        }
                                
                                    //S jawaban_a Sanguin
                                    $s_total_stok_tinggi = sqrt($s2_total_stok_tinggi);
                                    //S jawaban_a Koleris
                                    $s_total_stok_rendah = sqrt($s2_total_stok_rendah);
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "S Stok Tinggi = ".number_format($s_total_stok_tinggi, dec())."<br>";
                                    // echo "S Stok Rendah = ".number_format($s_total_stok_rendah, dec())."<br>";
                                    }
                                
                                    //s2 ^2 jawaban_a sanguin
                                    $s2_pangkat2_stok_tinggi = pow($s_total_stok_tinggi, 2);
                                    //s2 ^2 jawaban_a koleris
                                    $s2_pangkat2_stok_rendah = pow($s_total_stok_rendah, 2);
                                
                                    
                                        
                                        //=========================================================================================================
                                        //x jawaban_a sanguin
                                    $jumlah_total_mar_tinggi = get_jumlah_sum_atribut($db_object, "mar", "Tinggi");
                                    $x_total_mar_tinggi = $jumlah_total_mar_tinggi/$jumlah_tinggi;
                                    //x jawaban_a  koleris
                                    $jumlah_total_mar_rendah = get_jumlah_sum_atribut($db_object, "mar", "Rendah");
                                    $x_total_apr_rendah = $jumlah_total_mar_rendah/$jumlah_rendah;
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "<br>";
                                    // echo "<strong><u>Atribut Maret:<br></u></strong>";
                                    // echo "X Maret Tinggi=".number_format($x_total_mar_tinggi, dec())."<br>";
                                    // echo "X Maret Rendah=".number_format($x_total_apr_rendah, dec())."<br>";
                                    // echo "<br>";
                                        }
                                
                                    $s2_total_mar_tinggi = get_s2_populasi($db_object, 'mar', 'Tinggi', $x_total_mar_tinggi, $jumlah_tinggi);
                                    $s2_total_mar_rendah = get_s2_populasi($db_object, 'mar', 'Rendah', $x_total_apr_rendah, $jumlah_rendah);
                                
                                        if($show_perhitungan)
                                    {
                                    // echo "S2 Maret Tinggi=".number_format($s2_total_mar_tinggi, dec())."<br>";
                                    // echo "S2 Maret Rendah=".number_format($s2_total_mar_rendah, dec())."<br>";
                                    // echo "<br>";
                                    }
                                
                                    //S jawaban_a Sanguin
                                    $s_total_mar_tinggi = sqrt($s2_total_mar_tinggi);
                                    //S jawaban_a Koleris
                                    $s_total_mar_rendah = sqrt($s2_total_mar_rendah);
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "S Maret Tinggi =".number_format($s_total_mar_tinggi, dec())."<br>";
                                    // echo "S Maret Rendah =".number_format($s_total_mar_rendah, dec())."<br>";
                                    }
                                
                                    //s2 ^2 jawaban_a sanguin
                                    $s2_pangkat2_mar_tinggi = pow($s2_total_mar_tinggi, 2);
                                    //s2 ^2 jawaban_a koleris
                                    $s2_pangkat2_mar_rendah = pow($s2_total_mar_rendah, 2);
                                
                                        //x jawaban_a sanguin
                                    $jumlah_total_apr_tinggi = get_jumlah_sum_atribut($db_object, "apr", "Tinggi");
                                    $x_total_apr_tinggi = $jumlah_total_apr_tinggi/$jumlah_tinggi;
                                    //x jawaban_a  koleris
                                    $jumlah_total_apr_rendah = get_jumlah_sum_atribut($db_object, "apr", "Rendah");
                                    $x_total_apr_rendah = $jumlah_total_apr_rendah/$jumlah_rendah;
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "<br>";
                                    // echo "<strong><u>Atribut April:<br></u></strong>";
                                    // echo "X April Tinggi=".number_format($x_total_apr_tinggi, dec())."<br>";
                                    // echo "X April Rendah=".number_format($x_total_apr_rendah, dec())."<br>";
                                    // echo "<br>";
                                    }
                                
                                    $s2_total_apr_tinggi = get_s2_populasi($db_object, 'apr', 'Tinggi', $x_total_apr_tinggi, $jumlah_tinggi);
                                    $s2_total_apr_rendah = get_s2_populasi($db_object, 'apr', 'Rendah', $x_total_apr_rendah, $jumlah_rendah);
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "S2 April Tinggi=".number_format($s2_total_apr_tinggi, dec())."<br>";
                                    // echo "S2 April Rendah=".number_format($s2_total_apr_rendah, dec())."<br>";
                                    // echo "<br>";
                                    }
                                
                                    //S jawaban_a Sanguin
                                    $s_total_apr_tinggi = sqrt($s2_total_apr_tinggi);
                                    //S jawaban_a Koleris
                                    $s_total_apr_rendah = sqrt($s2_total_apr_rendah);
                                
                                        if($show_perhitungan){
                                    // echo "S April Tinggi =".number_format($s_total_apr_tinggi, dec())."<br>";
                                    // echo "S April Rendah =".number_format($s_total_apr_rendah, dec())."<br>";
                                        }
                                        //s2 ^2 jawaban_a sanguin
                                        $s2_pangkat2_apr_tinggi = pow($s2_total_apr_tinggi, 2);
                                        //s2 ^2 jawaban_a koleris
                                        $s2_pangkat2_apr_rendah = pow($s2_total_apr_rendah, 2);
                                
                                        $jumlah_total_mei_tinggi = get_jumlah_sum_atribut($db_object, "mei", "Tinggi");
                                        $x_total_mei_tinggi = $jumlah_total_mei_tinggi/$jumlah_tinggi;
                                        //x jawaban_a  koleris
                                        $jumlah_total_mei_rendah = get_jumlah_sum_atribut($db_object, "mei", "Rendah");
                                        $x_total_mei_rendah = $jumlah_total_apr_rendah/$jumlah_rendah;
                                    
                                        if($show_perhitungan)
                                        {
                                        // echo "<br>";
                                        // echo "<strong><u>Atribut Mei:<br></u></strong>";
                                        // echo "X Mei Tinggi=".number_format($x_total_mei_tinggi, dec())."<br>";
                                        // echo "X Mei Rendah=".number_format($x_total_mei_rendah, dec())."<br>";
                                        // echo "<br>";
                                        }
                                    
                                        $s2_total_mei_tinggi = get_s2_populasi($db_object, 'mei', 'Tinggi', $x_total_mei_tinggi, $jumlah_tinggi);
                                        $s2_total_mei_rendah = get_s2_populasi($db_object, 'mei', 'Rendah', $x_total_mei_rendah, $jumlah_rendah);
                                    
                                        if($show_perhitungan)
                                        {
                                        // echo "S2 Mei Tinggi=".number_format($s2_total_mei_tinggi, dec())."<br>";
                                        // echo "S2 Mei Rendah=".number_format($s2_total_mei_rendah, dec())."<br>";
                                        // echo "<br>";
                                        }
                                    
                                        //S jawaban_a Sanguin
                                        $s_total_mei_tinggi = sqrt($s2_total_mei_tinggi);
                                        //S jawaban_a Koleris
                                        $s_total_mei_rendah = sqrt($s2_total_mei_rendah);
                                    
                                            if($show_perhitungan){
                                        // echo "S Mei Tinggi =".number_format($s_total_mei_tinggi, dec())."<br>";
                                        // echo "S Mei Rendah =".number_format($s_total_mei_rendah, dec())."<br>";
                                            }
                                            //s2 ^2 jawaban_a sanguin
                                            $s2_pangkat2_mei_tinggi = pow($s2_total_mei_tinggi, 2);
                                            //s2 ^2 jawaban_a koleris
                                            $s2_pangkat2_mei_rendah = pow($s2_total_mei_rendah, 2);
                                
                                
                                
                                
                                
                                
                                    
                                        //======================================================================
                                        //#HITUNG PROBABILITAS DENGAN DATA UJI
                                        if($show_perhitungan){
                                            // echo "<strong><h3>Probabilitas<br></h3></strong>";
                                            }
                                    $dua_phi = (2*3.14);
                                        
                                    $depan_stok_tinggi = sqrt($dua_phi*$s2_total_stok_tinggi);
                                    $belakang_stok_tinggi = exp( ((pow($row['stok']-$x_total_stok_tinggi,2)) / (2*$s2_pangkat2_stok_tinggi)));
                                    $prob_stok_tinggi = 1/($depan_stok_tinggi * $belakang_stok_tinggi);
                                        //koleris
                                    $depan_stok_rendah = sqrt($dua_phi*$s2_total_stok_rendah);
                                    $belakang_stok_rendah = exp( ((pow($row['stok']-$x_total_stok_rendah,2)) / (2*$s2_pangkat2_stok_rendah)));
                                    $prob_stok_rendah = 1/($depan_stok_rendah * $belakang_stok_rendah);
                                
                                        //display
                                        if($show_perhitungan){
                                        // echo "<br>";
                                        // echo "P(stok|Tinggi)=".number_format($prob_stok_tinggi, dec())."<br>";
                                        // echo "P(stok|Rendah)=".number_format($prob_stok_rendah, dec())."<br>";
                                        }
                                
                                    //======================================================================
                                        //#jawaban_b
                                    $depan_mar_tinggi = sqrt($dua_phi*$s2_total_mar_tinggi);
                                    $belakang_mar_tinggi = exp( ((pow($row['mar']-$x_total_mar_tinggi,2)) / (2*$s2_pangkat2_mar_tinggi)));
                                    $prob_mar_tinggi = 1/($depan_mar_tinggi * $belakang_mar_tinggi);
                                        //koleris
                                    $depan_mar_rendah = sqrt($dua_phi*$s2_total_mar_rendah);
                                    $belakang_mar_rendah = exp( ((pow($row['mar']-$x_total_mar_rendah,2)) / (2*$s2_pangkat2_mar_rendah)));
                                    $prob_mar_rendah = 1/($depan_mar_rendah * $belakang_mar_rendah);
                                
                                        //display
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "P(mar|Tinggi)=".number_format($prob_mar_tinggi, dec())."<br>";
                                    // echo "P(mar|Rendah)=".number_format($prob_mar_rendah, dec())."<br>";
                                        }
                                        //======================================================================
                                        //#jawaban_c
                                    $depan_apr_tinggi = sqrt($dua_phi*$s2_total_apr_tinggi);
                                    $belakang_apr_tinggi = exp( ((pow($row['apr']-$x_total_apr_tinggi,2)) / (2*$s2_pangkat2_apr_tinggi)));
                                    $prob_apr_tinggi = 1/($depan_apr_tinggi * $belakang_apr_tinggi);
                                        //koleris
                                    $depan_apr_rendah = sqrt($dua_phi*$s2_total_apr_rendah);
                                    $belakang_apr_rendah = exp( ((pow($row['apr']-$x_total_apr_rendah,2)) / (2*$s2_pangkat2_apr_rendah)));
                                    $prob_apr_rendah = 1/($depan_apr_rendah * $belakang_apr_rendah);
                                
                                        //display
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "P(apr|Tinggi)=".number_format($prob_apr_tinggi, dec())."<br>";
                                    // echo "P(apr|Rendah)=".number_format($prob_apr_rendah, dec())."<br>";
                                        }
                                        //======================================================================
                                    $depan_mei_tinggi = sqrt($dua_phi*$s2_total_mei_tinggi);
                                    $belakang_mei_tinggi = exp( ((pow($row['mei']-$x_total_mei_tinggi,2)) / (2*$s2_pangkat2_mei_tinggi)));
                                    $prob_mei_tinggi = 1/($depan_mei_tinggi * $belakang_mei_tinggi);
                                        //koleris
                                    $depan_mei_rendah = sqrt($dua_phi*$s2_total_mei_rendah);
                                    $belakang_mei_rendah = exp( ((pow($row['mei']-$x_total_mei_rendah,2)) / (2*$s2_pangkat2_mei_rendah)));
                                    $prob_mei_rendah = 1/($depan_mei_rendah * $belakang_mei_rendah);
                                
                                        //display
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "P(mei|Tinggi)=".number_format($prob_mei_tinggi, dec())."<br>";
                                    // echo "P(mei|Rendah)=".number_format($prob_mei_rendah, dec())."<br>";
                                        }
                                        //===============================
                                    $nilai_tinggi = $p_tinggi * $prob_stok_tinggi * $prob_mar_tinggi *
                                                    $prob_apr_tinggi * $prob_mei_tinggi;
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "Nilai Tinggi = ".number_format($p_tinggi, dec())
                                    // 						." x ".number_format($prob_stok_tinggi, dec())
                                    //                         ." x ".number_format($prob_mar_tinggi, dec())
                                    //                         ." x ".number_format($prob_apr_tinggi, dec())
                                    //                         ." x ".number_format($prob_mei_tinggi, dec())
                                    //                         ." = ".number_format($nilai_tinggi, 20);
                                        }
                                        //===============================
                                        $nilai_rendah = $p_rendah * $prob_stok_rendah * $prob_mar_rendah * $prob_apr_rendah *
                                                    $prob_mei_rendah;
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "Nilai Rendah = ".number_format($p_rendah, dec())
                                    // 						." x ".number_format($prob_stok_rendah, dec())
                                    //                         ." x ".number_format($prob_mar_rendah, dec())
                                    //                         ." x ".number_format($prob_apr_rendah, dec())
                                    //                         ." x ".number_format($prob_mei_rendah, dec())
                                    //                         ." = ".number_format($nilai_rendah, 20);
                                        }
                                    $hasil_prediksi = '';
                                    
                                    if($nilai_tinggi>=$nilai_rendah){
                                        $hasil_prediksi = 'Tinggi';
                                    }
                                    elseif($nilai_rendah>=$nilai_tinggi){
                                        $hasil_prediksi = 'Rendah';
                                    }
                                
                                    echo "<strong>";
                                    echo "<h2>";
                                    echo "Hasil prediksi = ".$hasil_prediksi;
                                    echo "</h2>";
                                    echo "</strong>";
                                    echo "<br>";
                            $aa++;
                            //echo "<br><br>";
                        }
                        
                        //perhitungan akurasi
                        $que = $db_object->db_query("SELECT * FROM tbl_data");
                        $jumlah_uji=$db_object->db_num_rows($que);
                        //$TP=0; $FN=0; $TN=0; $FP=0; $kosong=0;
                        $TA = $FB = $FC = $FD = 
                        $FE = $TF = $FG = $FH = 
                        $FI = $FJ = $TK = $FL = 
                        $FM = $FN = $FO = $TP = 0;
                        ?>
                        <strong>Hasil:</strong>
                        <table class='table table-bordered table-striped  table-hover'>
                            <tr>
                            <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Total Stok Barang</th>
                                <th>Maret</th>
                                <th>April</th>
                                <th>Mei</th>
                                <th>Minat</th>
                                <th>Minat Hasil</th>
                            </tr>
                        <?php
                        $no = 1;
                        while($row=$db_object->db_fetch_array($que))
                        {
                            $jumlah_data = jumlah_data_latih($db_object);//jumlah data latih
                                    $jumlah_tinggi = jumlah_data_latih($db_object, " WHERE minat='Tinggi'");//jumlah sanguin
                                    $jumlah_rendah = jumlah_data_latih($db_object, " WHERE minat='Rendah'");//jumlah koleris
                                
                                    $p_tinggi = $jumlah_tinggi/$jumlah_data;
                                    $p_rendah = $jumlah_rendah/$jumlah_data;
                                
                                    //jumlah atribut jenis kelamin
                                    $jumlah_jenis_barang_dapur_tinggi = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN DAPUR' AND minat='Tinggi'");
                                        $jumlah_jenis_barang_makanan_tinggi = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN MAKANAN' AND minat='Tinggi'");
                                        $jumlah_jenis_barang_kebersihan_tinggi = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN KEBERSIHAN' AND minat='Tinggi'");
                                
                                        $jumlah_jenis_barang_dapur_rendah = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN DAPUR' AND minat='Rendah'");
                                        $jumlah_jenis_barang_makanan_rendah = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN MAKANAN' AND minat='Rendah'");
                                        $jumlah_jenis_barang_kebersihan_rendah = jumlah_data_latih($db_object, " WHERE jenis_barang='PERALATAN KEBERSIHAN' AND minat='Rendah'");
                                        
                                    //probabilitas atribut jenis_kelamin
                                    $p_jenis_barang_dapur_tinggi = $jumlah_jenis_barang_dapur_tinggi/$jumlah_tinggi;
                                    $p_jenis_barang_makanan_tinggi = $jumlah_jenis_barang_makanan_tinggi/$jumlah_tinggi;
                                        $p_jenis_barang_kebersihan_tinggi = $jumlah_jenis_barang_kebersihan_tinggi/$jumlah_tinggi;
                                        
                                    $p_jenis_barang_dapur_rendah = $jumlah_jenis_barang_dapur_rendah/$jumlah_rendah;
                                    $p_jenis_barang_makanan_rendah = $jumlah_jenis_barang_makanan_rendah/$jumlah_rendah;
                                        $p_jenis_barang_kebersihan_rendah = $jumlah_jenis_barang_kebersihan_rendah/$jumlah_rendah;
                                        
                                    //display table probabilitas jenis_kelamin
                                        if($show_perhitungan){
                                            // echo "<table class='table table-bordered table-striped  table-hover' style='width:40%'>";
                                            // 	echo "<tr>";
                                            // 		echo "<td><b><u>Jenis Barang:</u></b></td>";
                                            // 		echo "<td>Tinggi</td>";
                                            // 		echo "<td>Rendah</td>";
                                            // 	echo "</tr>";
                                            // 	echo "<tr>";
                                            // 		echo "<td>PERALATAN DAPUR</td>";
                                            // 		echo "<td>".number_format($p_jenis_barang_dapur_tinggi, dec())."</td>";
                                            // 		echo "<td>".number_format($p_jenis_barang_dapur_rendah, dec())."</td>";
                                            // 	echo "</tr>";
                                            // 	echo "<tr>";
                                            // 					echo "<td>PERALATAN MAKANAN</td>";
                                            // 					echo "<td>".number_format($p_jenis_barang_makanan_tinggi, dec())."</td>";
                                            // 					echo "<td>".number_format($p_jenis_barang_makanan_rendah, dec())."</td>";
                                            // 	echo "</tr>";
                                            // 			echo "<tr>";
                                            // 		echo "<td>PERALATAN KEBERSIHAN</td>";
                                            // 		echo "<td>".number_format($p_jenis_barang_kebersihan_tinggi, dec())."</td>";
                                            // 		echo "<td>".number_format($p_jenis_barang_kebersihan_rendah, dec())."</td>";
                                            // 	echo "</tr>";
                                            // echo "</table>";
                                
                                            // echo "<br>";
                                        }
                                        //jawaban_a
                                        //x jawaban_a sanguin
                                    $jumlah_total_stok_tinggi = get_jumlah_sum_atribut($db_object, "stok", "Tinggi");
                                    $x_total_stok_tinggi = $jumlah_total_stok_tinggi/$jumlah_tinggi;
                                    //x jawaban_a  koleris
                                    $jumlah_total_stok_rendah = get_jumlah_sum_atribut($db_object, "stok", "Rendah");
                                    $x_total_stok_rendah = $jumlah_total_stok_rendah/$jumlah_rendah;
                                
                                        if($show_perhitungan){
                                    //     echo "<br>";
                                    //     echo "<strong><u>Atribut Stok:<br></u></strong>";
                                    // echo "X Stok Tinggi=".number_format($x_total_stok_tinggi, dec())."<br>";
                                    // echo "X Stok Rendah=".number_format($x_total_stok_rendah, dec())."<br>";
                                    // echo "<br>";
                                        }
                                
                                    $s2_total_stok_tinggi = get_s2_populasi($db_object, 'stok', 'Tinggi', $x_total_stok_tinggi, $jumlah_tinggi);
                                    $s2_total_stok_rendah = get_s2_populasi($db_object, 'stok', 'Rendah', $x_total_stok_rendah, $jumlah_rendah);
                                
                                        if($show_perhitungan){
                                    // echo "S2 Stok Tinggi=".number_format($s2_total_stok_tinggi, dec())."<br>";
                                    // echo "S2 Stok Rendah=".number_format($s2_total_stok_rendah, dec())."<br>";
                                    // echo "<br>";
                                        }
                                
                                    //S jawaban_a Sanguin
                                    $s_total_stok_tinggi = sqrt($s2_total_stok_tinggi);
                                    //S jawaban_a Koleris
                                    $s_total_stok_rendah = sqrt($s2_total_stok_rendah);
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "S Stok Tinggi = ".number_format($s_total_stok_tinggi, dec())."<br>";
                                    // echo "S Stok Rendah = ".number_format($s_total_stok_rendah, dec())."<br>";
                                    }
                                
                                    //s2 ^2 jawaban_a sanguin
                                    $s2_pangkat2_stok_tinggi = pow($s_total_stok_tinggi, 2);
                                    //s2 ^2 jawaban_a koleris
                                    $s2_pangkat2_stok_rendah = pow($s_total_stok_rendah, 2);
                                
                                    
                                        
                                        //=========================================================================================================
                                        //x jawaban_a sanguin
                                    $jumlah_total_mar_tinggi = get_jumlah_sum_atribut($db_object, "mar", "Tinggi");
                                    $x_total_mar_tinggi = $jumlah_total_mar_tinggi/$jumlah_tinggi;
                                    //x jawaban_a  koleris
                                    $jumlah_total_mar_rendah = get_jumlah_sum_atribut($db_object, "mar", "Rendah");
                                    $x_total_apr_rendah = $jumlah_total_mar_rendah/$jumlah_rendah;
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "<br>";
                                    // echo "<strong><u>Atribut Maret:<br></u></strong>";
                                    // echo "X Maret Tinggi=".number_format($x_total_mar_tinggi, dec())."<br>";
                                    // echo "X Maret Rendah=".number_format($x_total_apr_rendah, dec())."<br>";
                                    // echo "<br>";
                                        }
                                
                                    $s2_total_mar_tinggi = get_s2_populasi($db_object, 'mar', 'Tinggi', $x_total_mar_tinggi, $jumlah_tinggi);
                                    $s2_total_mar_rendah = get_s2_populasi($db_object, 'mar', 'Rendah', $x_total_apr_rendah, $jumlah_rendah);
                                
                                        if($show_perhitungan)
                                    {
                                    // echo "S2 Maret Tinggi=".number_format($s2_total_mar_tinggi, dec())."<br>";
                                    // echo "S2 Maret Rendah=".number_format($s2_total_mar_rendah, dec())."<br>";
                                    // echo "<br>";
                                    }
                                
                                    //S jawaban_a Sanguin
                                    $s_total_mar_tinggi = sqrt($s2_total_mar_tinggi);
                                    //S jawaban_a Koleris
                                    $s_total_mar_rendah = sqrt($s2_total_mar_rendah);
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "S Maret Tinggi =".number_format($s_total_mar_tinggi, dec())."<br>";
                                    // echo "S Maret Rendah =".number_format($s_total_mar_rendah, dec())."<br>";
                                    }
                                
                                    //s2 ^2 jawaban_a sanguin
                                    $s2_pangkat2_mar_tinggi = pow($s2_total_mar_tinggi, 2);
                                    //s2 ^2 jawaban_a koleris
                                    $s2_pangkat2_mar_rendah = pow($s2_total_mar_rendah, 2);
                                
                                        //x jawaban_a sanguin
                                    $jumlah_total_apr_tinggi = get_jumlah_sum_atribut($db_object, "apr", "Tinggi");
                                    $x_total_apr_tinggi = $jumlah_total_apr_tinggi/$jumlah_tinggi;
                                    //x jawaban_a  koleris
                                    $jumlah_total_apr_rendah = get_jumlah_sum_atribut($db_object, "apr", "Rendah");
                                    $x_total_apr_rendah = $jumlah_total_apr_rendah/$jumlah_rendah;
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "<br>";
                                    // echo "<strong><u>Atribut April:<br></u></strong>";
                                    // echo "X April Tinggi=".number_format($x_total_apr_tinggi, dec())."<br>";
                                    // echo "X April Rendah=".number_format($x_total_apr_rendah, dec())."<br>";
                                    // echo "<br>";
                                    }
                                
                                    $s2_total_apr_tinggi = get_s2_populasi($db_object, 'apr', 'Tinggi', $x_total_apr_tinggi, $jumlah_tinggi);
                                    $s2_total_apr_rendah = get_s2_populasi($db_object, 'apr', 'Rendah', $x_total_apr_rendah, $jumlah_rendah);
                                
                                    if($show_perhitungan)
                                    {
                                    // echo "S2 April Tinggi=".number_format($s2_total_apr_tinggi, dec())."<br>";
                                    // echo "S2 April Rendah=".number_format($s2_total_apr_rendah, dec())."<br>";
                                    // echo "<br>";
                                    }
                                
                                    //S jawaban_a Sanguin
                                    $s_total_apr_tinggi = sqrt($s2_total_apr_tinggi);
                                    //S jawaban_a Koleris
                                    $s_total_apr_rendah = sqrt($s2_total_apr_rendah);
                                
                                        if($show_perhitungan){
                                    // echo "S April Tinggi =".number_format($s_total_apr_tinggi, dec())."<br>";
                                    // echo "S April Rendah =".number_format($s_total_apr_rendah, dec())."<br>";
                                        }
                                        //s2 ^2 jawaban_a sanguin
                                        $s2_pangkat2_apr_tinggi = pow($s2_total_apr_tinggi, 2);
                                        //s2 ^2 jawaban_a koleris
                                        $s2_pangkat2_apr_rendah = pow($s2_total_apr_rendah, 2);
                                
                                        $jumlah_total_mei_tinggi = get_jumlah_sum_atribut($db_object, "mei", "Tinggi");
                                        $x_total_mei_tinggi = $jumlah_total_mei_tinggi/$jumlah_tinggi;
                                        //x jawaban_a  koleris
                                        $jumlah_total_mei_rendah = get_jumlah_sum_atribut($db_object, "mei", "Rendah");
                                        $x_total_mei_rendah = $jumlah_total_apr_rendah/$jumlah_rendah;
                                    
                                        if($show_perhitungan)
                                        {
                                        // echo "<br>";
                                        // echo "<strong><u>Atribut Mei:<br></u></strong>";
                                        // echo "X Mei Tinggi=".number_format($x_total_mei_tinggi, dec())."<br>";
                                        // echo "X Mei Rendah=".number_format($x_total_mei_rendah, dec())."<br>";
                                        // echo "<br>";
                                        }
                                    
                                        $s2_total_mei_tinggi = get_s2_populasi($db_object, 'mei', 'Tinggi', $x_total_mei_tinggi, $jumlah_tinggi);
                                        $s2_total_mei_rendah = get_s2_populasi($db_object, 'mei', 'Rendah', $x_total_mei_rendah, $jumlah_rendah);
                                    
                                        if($show_perhitungan)
                                        {
                                        // echo "S2 Mei Tinggi=".number_format($s2_total_mei_tinggi, dec())."<br>";
                                        // echo "S2 Mei Rendah=".number_format($s2_total_mei_rendah, dec())."<br>";
                                        // echo "<br>";
                                        }
                                    
                                        //S jawaban_a Sanguin
                                        $s_total_mei_tinggi = sqrt($s2_total_mei_tinggi);
                                        //S jawaban_a Koleris
                                        $s_total_mei_rendah = sqrt($s2_total_mei_rendah);
                                    
                                            if($show_perhitungan){
                                        // echo "S Mei Tinggi =".number_format($s_total_mei_tinggi, dec())."<br>";
                                        // echo "S Mei Rendah =".number_format($s_total_mei_rendah, dec())."<br>";
                                            }
                                            //s2 ^2 jawaban_a sanguin
                                            $s2_pangkat2_mei_tinggi = pow($s2_total_mei_tinggi, 2);
                                            //s2 ^2 jawaban_a koleris
                                            $s2_pangkat2_mei_rendah = pow($s2_total_mei_rendah, 2);
                                
                                
                                
                                
                                
                                
                                    
                                        //======================================================================
                                        //#HITUNG PROBABILITAS DENGAN DATA UJI
                                        if($show_perhitungan){
                                            // echo "<strong><h3>Probabilitas<br></h3></strong>";
                                            }
                                    $dua_phi = (2*3.14);
                                        
                                    $depan_stok_tinggi = sqrt($dua_phi*$s2_total_stok_tinggi);
                                    $belakang_stok_tinggi = exp( ((pow($row['stok']-$x_total_stok_tinggi,2)) / (2*$s2_pangkat2_stok_tinggi)));
                                    $prob_stok_tinggi = 1/($depan_stok_tinggi * $belakang_stok_tinggi);
                                        //koleris
                                    $depan_stok_rendah = sqrt($dua_phi*$s2_total_stok_rendah);
                                    $belakang_stok_rendah = exp( ((pow($row['stok']-$x_total_stok_rendah,2)) / (2*$s2_pangkat2_stok_rendah)));
                                    $prob_stok_rendah = 1/($depan_stok_rendah * $belakang_stok_rendah);
                                
                                        //display
                                        if($show_perhitungan){
                                        // echo "<br>";
                                        // echo "P(stok|Tinggi)=".number_format($prob_stok_tinggi, dec())."<br>";
                                        // echo "P(stok|Rendah)=".number_format($prob_stok_rendah, dec())."<br>";
                                        }
                                
                                    //======================================================================
                                        //#jawaban_b
                                    $depan_mar_tinggi = sqrt($dua_phi*$s2_total_mar_tinggi);
                                    $belakang_mar_tinggi = exp( ((pow($row['mar']-$x_total_mar_tinggi,2)) / (2*$s2_pangkat2_mar_tinggi)));
                                    $prob_mar_tinggi = 1/($depan_mar_tinggi * $belakang_mar_tinggi);
                                        //koleris
                                    $depan_mar_rendah = sqrt($dua_phi*$s2_total_mar_rendah);
                                    $belakang_mar_rendah = exp( ((pow($row['mar']-$x_total_mar_rendah,2)) / (2*$s2_pangkat2_mar_rendah)));
                                    $prob_mar_rendah = 1/($depan_mar_rendah * $belakang_mar_rendah);
                                
                                        //display
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "P(mar|Tinggi)=".number_format($prob_mar_tinggi, dec())."<br>";
                                    // echo "P(mar|Rendah)=".number_format($prob_mar_rendah, dec())."<br>";
                                        }
                                        //======================================================================
                                        //#jawaban_c
                                    $depan_apr_tinggi = sqrt($dua_phi*$s2_total_apr_tinggi);
                                    $belakang_apr_tinggi = exp( ((pow($row['apr']-$x_total_apr_tinggi,2)) / (2*$s2_pangkat2_apr_tinggi)));
                                    $prob_apr_tinggi = 1/($depan_apr_tinggi * $belakang_apr_tinggi);
                                        //koleris
                                    $depan_apr_rendah = sqrt($dua_phi*$s2_total_apr_rendah);
                                    $belakang_apr_rendah = exp( ((pow($row['apr']-$x_total_apr_rendah,2)) / (2*$s2_pangkat2_apr_rendah)));
                                    $prob_apr_rendah = 1/($depan_apr_rendah * $belakang_apr_rendah);
                                
                                        //display
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "P(apr|Tinggi)=".number_format($prob_apr_tinggi, dec())."<br>";
                                    // echo "P(apr|Rendah)=".number_format($prob_apr_rendah, dec())."<br>";
                                        }
                                        //======================================================================
                                    $depan_mei_tinggi = sqrt($dua_phi*$s2_total_mei_tinggi);
                                    $belakang_mei_tinggi = exp( ((pow($row['mei']-$x_total_mei_tinggi,2)) / (2*$s2_pangkat2_mei_tinggi)));
                                    $prob_mei_tinggi = 1/($depan_mei_tinggi * $belakang_mei_tinggi);
                                        //koleris
                                    $depan_mei_rendah = sqrt($dua_phi*$s2_total_mei_rendah);
                                    $belakang_mei_rendah = exp( ((pow($row['mei']-$x_total_mei_rendah,2)) / (2*$s2_pangkat2_mei_rendah)));
                                    $prob_mei_rendah = 1/($depan_mei_rendah * $belakang_mei_rendah);
                                
                                        //display
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "P(mei|Tinggi)=".number_format($prob_mei_tinggi, dec())."<br>";
                                    // echo "P(mei|Rendah)=".number_format($prob_mei_rendah, dec())."<br>";
                                        }
                                        //===============================
                                    $nilai_tinggi = $p_tinggi * $prob_stok_tinggi * $prob_mar_tinggi *
                                                    $prob_apr_tinggi * $prob_mei_tinggi;
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "Nilai Tinggi = ".number_format($p_tinggi, dec())
                                    // 						." x ".number_format($prob_stok_tinggi, dec())
                                    //                         ." x ".number_format($prob_mar_tinggi, dec())
                                    //                         ." x ".number_format($prob_apr_tinggi, dec())
                                    //                         ." x ".number_format($prob_mei_tinggi, dec())
                                    //                         ." = ".number_format($nilai_tinggi, 20);
                                        }
                                        //===============================
                                        $nilai_rendah = $p_rendah * $prob_stok_rendah * $prob_mar_rendah * $prob_apr_rendah *
                                                    $prob_mei_rendah;
                                        if($show_perhitungan){
                                    // echo "<br>";
                                    // echo "Nilai Rendah = ".number_format($p_rendah, dec())
                                    // 						." x ".number_format($prob_stok_rendah, dec())
                                    //                         ." x ".number_format($prob_mar_rendah, dec())
                                    //                         ." x ".number_format($prob_apr_rendah, dec())
                                    //                         ." x ".number_format($prob_mei_rendah, dec())
                                    //                         ." = ".number_format($nilai_rendah, 20);
                                        }
                                    $hasil_prediksi = '';
                                    
                                    if($nilai_tinggi>=$nilai_rendah){
                                        $hasil_prediksi = 'Tinggi';
                                    }
                                    elseif($nilai_rendah>=$nilai_tinggi){
                                        $hasil_prediksi = 'Rendah';
                                    }

                                $asli = $row['minat'];
                                $prediksi= $hasil_prediksi;
                                if($row['minat']== $hasil_prediksi){
                        $ketepatan="Benar";
                                }else{
                                    $ketepatan="Salah";
                                }
                                
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row['nmb'] . "</td>";
                                echo "<td>" . $row['jenis_barang'] . "</td>";
                                echo "<td>" . $row['stok'] . "</td>";
                                echo "<td>" . $row['mar'] . "</td>";
                                echo "<td>" . $row['apr'] . "</td>";
                                echo "<td>" . $row['mei'] . "</td>";
                                echo "<td>" . $row['minat'] . "</td>";
                                echo "<td>" . $hasil_prediksi . "</td>";
                                echo "<td>" . $ketepatan . "</td>";
                                echo "</tr>";
                                $no++;
                                
                                if($asli=='Tinggi' & $prediksi=='Tinggi'){
                                        $TA++;
                                }
                                else if($asli=='Tinggi' & $prediksi=='Rendah'){
                                        $FB++;
                                }
                                else if($asli=='Rendah' & $prediksi=='Rendah'){
                                        $FC++;
                                }
                                else if($asli=='Rendah' & $prediksi=='Tinggi'){
                                        $FD++;
                                }
                                else if($prediksi==''){
                                        $kosong++;
                                }
                        }
                        ?>
                        </table>
                        <?php
                        $tepat=($TA+$FC);
                        $tidak_tepat=($FB+$FD+$kosong);
                        $akurasi=($tepat/$jumlah_uji)*100;
                        $laju_error=($tidak_tepat/$jumlah_uji)*100;
    //                        $sensitivitas=($TP/($TP+$FN))*100;
    //                        $spesifisitas=($TN/($FP+$TN))*100;

                        $akurasi = round($akurasi,2);	
                        $laju_error = round($laju_error,2);
                        $sensitivitas = round($sensitivitas,2);	
                        $spesifisitas = round($spesifisitas,2);	


                        echo "<br><br>";
                        echo "<center><h4>";
                        echo "Jumlah prediksi: $jumlah_uji<br>";
                        echo "Jumlah tepat: $tepat<br>";
                        echo "Jumlah tidak tepat: $tidak_tepat<br>";
                        if($kosong!=0){ echo "Jumlah data yang prediksinya kosong: $kosong<br></h4>"; }
                        echo "<h2>AKURASI = $akurasi %<br>";
                        echo "LAJU ERROR = $laju_error %<br></h2>";
                        /*
                        echo "<h4>TP: $TP | TN: $TN | FP: $FP | FN: $FN<br></h4>";
                        echo "<table>";
                            echo "<tr>";
                                echo "<td>Sensitivitas</td> <td>=</td> <td>(TP / (TP + FN) ) x 100</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>&nbsp;</td> <td>=</td> <td>($TP / ($TP + $FN) ) x 100</td>";
                            echo "</tr>";
                            $TP_plus_FN = $TP+$FN;
                            echo "<tr>";
                                echo "<td>&nbsp;</td> <td>=</td> <td>($TP / ($TP_plus_FN) ) x 100</td>";
                            echo "</tr>";
                            $last = $TP/($TP+$FN);
                            echo "<tr>";
                                echo "<td>&nbsp;</td> <td>=</td> <td>($last) x 100</td>";
                            echo "</tr>";
                        echo "</table>";
                        echo "<h2>SENSITIVITAS = $sensitivitas %<br></h2>";
                //        $spesifisitas=($TN/($FP+$TN))*100;
                        echo "<table>";
                            echo "<tr>";
                                echo "<td>Spesifisitas</td> <td>=</td> <td>(TN / (FP + TN) ) x 100</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td>&nbsp;</td> <td>=</td> <td>($TN / ($FP + $TN) ) x 100</td>";
                            echo "</tr>";
                            $FP_plus_TN = $FP+$TN;
                            echo "<tr>";
                                echo "<td>&nbsp;</td> <td>=</td> <td>($TN / ($FP_plus_TN) ) x 100</td>";
                            echo "</tr>";
                            $last1 = $TN/($FP+$TN);
                            echo "<tr>";
                                echo "<td>&nbsp;</td> <td>=</td> <td>($last1) x 100</td>";
                            echo "</tr>";
                        echo "</table>";
                        echo "<h2>SPESIFISITAS = $spesifisitas %<br>";
                        echo "</h2>";
                        echo "</center>";
                        * 
                        */
                    }
                    ?>
                </div>
            </div>
        </div>
</section>
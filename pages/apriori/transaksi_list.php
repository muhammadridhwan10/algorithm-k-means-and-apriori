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
                $sql = "TRUNCATE data_uji";
                $db_object->db_query($sql);
                ?>
                <script> location.replace("?menu=uji_akurasi&pesan_success=Data uji berhasil dihapus");</script>
                <?php
            }
            
            $sql = "SELECT * FROM data_uji";
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
                        $sql_hit = "SELECT * FROM data_uji ";
                        $res = $db_object->db_query($sql_hit);
                        $aa=1;
                        while($row = $db_object->db_fetch_array($res)){
                            // echo "<center>";
                            // echo "<b>Data Uji ke-".$aa."</b>";
                            // echo "<br>"
                            // . "<strong>"."Nama Barang: "."</strong>".$row['nmb']." - "
                            //         . "<strong>"."Jenis Barang: "."</strong>".$row['jenis_barang']." - "
                            //         . "<strong>"."Stok: "."</strong>".$row['stok']." - "
                            //         . "<strong>"."Maret: "."</strong>".$row['mar']." - "
                            //         . "<strong>"."April: "."</strong>".$row['apr']." - "
                            //         . "<strong>"."Mei: "."</strong>".$row['mei']." - "
                            //         . "<strong>"."Minat: "."</strong>".$row['minat']
                            //         ;
                            ProsesNaiveBayes($db_object, $row['id'], $row['mar'], $row['apr'], $row['mei']);
                            $aa++;
                            //echo "<br><br>";
                        }
                        
                        //perhitungan akurasi
                        $que = $db_object->db_query("SELECT * FROM data_uji");
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
                        while($row=$db_object->db_fetch_array($que)){
                                $asli=$row['minat'];
                                $prediksi=$row['minat_hasil'];
                                if($row['minat']==$row['minat_hasil']){
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
                                echo "<td>" . $row['minat_hasil'] . "</td>";
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


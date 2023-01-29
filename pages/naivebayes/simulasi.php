<?php
require_once 'autoload.php';

$obj = new Bayes();

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = $_POST['nama'];
$a2 = $_POST['jenis_barang'];
$a3 = $_POST['minat'];

//TRUE
$jenis_barang = $obj->probTinggi($a2,1);
$minat = $obj->probBeratB($a3,1);

//FALSE
$jenis_barang2 = $obj->probTinggi($a2,0);
$minat2 = $obj->probBeratB($a3,0);

//result
$paT = $obj->hasilTrue($jumTrue,$jumData,$jenis_barang,$minat);
$paF = $obj->hasilFalse($jumTrue,$jumData,$jenis_barang2,$minat2);

if($a2 == "pd"){
  $a2 = "Peralatan Dapur";
}else if($a2 == "pkr"){
  $a2 = "Peralatan Kebersihan Rumah";
}else if($a2 == "pm"){
  $a2 = "Peralatan Makan";
}

echo "
<div class='jumbotron jumbotron-fluid' id='hslPrekdiksinya'>
  <div class='container'>
    <h1 class='display-4 tebal'>Hasil Prediksi Persediaan Barang</h1>
    <p class='lead'>Berikut ini adalah hasil prediksi persediaan barang menggunakan metode naive bayes.</p>
  </div>
</div>
";

echo "
<div class='card' style='width: 25rem;'>
  <div class='card-header' style='background-color:#336699;color:#fff'>
    <b>Informasi Nama Barang</b>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>Nama Barang : &nbsp;&nbsp;<b>$a1</b></li>
    <li class='list-group-item'>Jenis Barang : &nbsp;&nbsp;<b>$a2</b></li>
    <li class='list-group-item'>Minat : &nbsp;&nbsp;<b>$a3</b></li>
  </ul>
</div><br>
<hr>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#336699;color:#fff'>
    <th>Jumlah True</th>
    <th>Jumlah False</th>
    <th>Jumlah Total Data</th>
  </tr>
  <tr>
    <td>$jumTrue</td>
    <td>$jumFalse</td>
    <td>$jumData</td>
  </tr>
</table>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#336699;color:#fff'>
    <th></th>
    <th>True</th>
    <th>False</th>
  </tr>
  <tr>
    <td>pA</td>
    <td>$jumTrue / $jumData</td>
    <td>$jumFalse / $jumData</td>
  </tr>
  <tr>
    <td>Jenis Barang</td>
    <td>$jenis_barang / $jumTrue</td>
    <td>$jenis_barang2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Minat</td>
    <td>$minat / $jumTrue</td>
    <td>$minat2 / $jumFalse</td>
  </tr>
</table>
";

echo "<br>
  <table class='table table-bordered' style='font-size:18px;text-align:center;'>
    <tr style='background-color:#336699;color:#fff'>
      <th>PREDIKSI Persediaan Banyak</th>
      <th>PREDIKSI Persediaan Sedikit</th>
    </tr>
    <tr>
      <td>$paT</td>
      <td>$paF</td>
    </tr>
  </table>
";

$result = $obj->perbandingan($paT,$paF);

if($paT > $paF){
  echo "<br>
  <h3 class='tebal'>PREDIKSI <span class='badge badge-success' style='padding:10px'><b>PERSEDIAAN BANYAK</b></span> LEBIH BESAR DARI PADA PERSEDIAAN SEDIKIT</h3><br>";
  echo "<h4><br>PREDIKSI PERSEDIAAN BANYAK sebesar : <b>".round($result[1],2)." %</b> <br>PREDIKSI PERSEDIAAN SEDIKIT sebesar : <b>".round($result[2],2)." % </b></h4>";
}else if($paF > $paT){
  echo "<br>
  <h3 class='tebal'>PREDIKSI <span class='badge badge-danger' style='padding:10px'><b>PERSEDIAAN SEDIKIT</b></span> LEBIH BESAR DARI PADA PREDIKSI PERSEDIAAN BANYAK</h3><br>";
  echo "<h4><br>PREDIKSI PERSEDIAAN SEDIKIT sebesar : <b>".round($result[1],2)." %</b> <br>PREDIKSI PERSEDIAAN BANYAK sebesar : <b>".round($result[2],2)." % </b></h4>";
}


if($result[0] == "PERSEDIAAN BANYAK"){
  echo "
  <div class='alert alert-success mt-5' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Selamat! berdasarkan hasil perhitungan Naive Bayes, barang tersebut termasuk <b>PERSEDIAAN BANYAK!</b> karena banyak diminati</p>
    <hr>
    <p class='mb-0'>- Have a nice day -</p>
  </div>";
}else{
  echo"
  <div class='alert alert-danger mt-5' role='aler'>
  <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
  <p>Maaf, berdasarkan hasil perhitungan Naive Bayes, barang tersebut termasuk <b>PERSEDIAAN SEDIKIT!</b> karena kurang diminati</p>
  <hr>
  <p class='mb-0'>- Don't give up ! -</p>
  </div>";
}


?>

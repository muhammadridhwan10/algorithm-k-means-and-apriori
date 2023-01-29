<?php
class Bayes
{
  private $pegawai = "data.json";
  // private $jumTrue = 0;
  // private $jumFalse = 0;
  // private $jumData = 0;

  function __construct()
  {

  }

  /*================================================================
  FUNCTION SUM TRUE DAN FALSE
  =================================================================*/
  function sumTrue()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['status'] == 1){
        $t += 1;
      }
    }

    return $t;
  }

  function sumFalse()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach($hasil as $hasil)
    {
      if($hasil['status'] == 0){
        $t += 1;
      }
    }
    return $t;
  }

  function sumData()
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);
    return count($hasil);
  }

  //=================================================================

  /*================================================================
  FUNCTION PROBABILITAS
  =================================================================*/
  function probUmur($umur,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['umur'] == $umur && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['umur'] == $umur && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }

  function probTinggi($jenis_barang,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['jenis_barang'] == $jenis_barang && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['jenis_barang'] == $jenis_barang && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }

  function probBeratB($minat,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['minat'] == $minat && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['minat'] == $minat && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }

  function probPendidikan($pendidikan,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['pendidikan'] == $pendidikan && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['pendidikan'] == $pendidikan && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }

  function probKesehatan($kesehatan,$status)
  {
    $data = file_get_contents($this->pegawai);
    $hasil = json_decode($data,true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if($hasil['kesehatan'] == $kesehatan && $hasil['status'] == $status){
        $t += 1;
      }else if($hasil['kesehatan'] == $kesehatan && $hasil['status'] == $status){
        $t +=1;
      }
    }
    return $t;
  }
  //=================================================================

  /*=================================================================
  MARI BERHITUNG
  keterangan parameter :
  $sT   : jumlah data yang bernilai true ( sumTrue )
  $sF   : jumlah data yang bernilai false ( sumFalse )
  $sD   : jumlah data pada data latih ( sumData )
  $pU   : jumlah probabilitas umur ( probUmur )
  $pT   : jumlah probabilitas tinggi ( probTinggi )
  $pBB  : jumlah probabilitas berat badan ( probBB )
  $pK   : jumlah probabilitas kesehatan ( probKesehatan )
  $pP   : jumlah probabilitas pendidikan (probPendidikan )
  ==================================================================*/

  function hasilTrue($sT = 0 , $sD = 0 , $pJb = 0 ,$pM = 0)
  {
    $paTrue = $sT / $sD;
    $p1 = $pJb / $sT;
    $p2 = $pM / $sT;
    $hsl = $paTrue * $p1 * $p2;
    return $hsl;
  }

  function hasilFalse($sF = 0 , $sD = 0 , $pJb = 0 ,$pM = 0)
  {
    $paFalse = $sF / $sD;
    $p1 = $pJb / $sF;
    $p2 = $pM / $sF;
    $hsl = $paFalse * $p1 * $p2;
    return $hsl;
  }

  function perbandingan($pATrue,$pAFalse)
  {
    if($pATrue > $pAFalse){
      $stt = "PERSEDIAAN BANYAK";
      $hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
      $diterima = 100 - $hitung;
    }elseif($pAFalse > $pATrue)
    {
      $stt = "PERSEDIAAN SEDIKIT";
      $hitung = ($pAFalse / ($pAFalse + $pATrue)) * 100;
      $diterima = 100 - $hitung;
    }

    $hsl = array($stt,$hitung,$diterima);
    return $hsl;
  }
  //=================================================================
}

?>

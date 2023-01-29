<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="img/nbc.png" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- font awsome -->
  <link rel="stylesheet" href="css/fontawesome.css" />
  <link rel="stylesheet" href="css/brands.css" />
  <link rel="stylesheet" href="css/solid.css" />

  <link rel="stylesheet" href="css/gaya.css">

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">

  <title>Prediksi Naive Bayes V.1</title>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
            <img src="img/nbc.png" alt="" width=50 height=50>
          </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Prediksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_simulasi.php">Data</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="about.php">Informasi<span class="sr-only">(current)</span> </a>
          </li>
        </ul>
      </div>
    </div>
</nav>

    <div class="container" style='margin-top:90px'>
      <div class="row">
        <div class="col-12 mt-5">
          <h2 class="tebal">Informasi Sistem</h2><br>
            <p class="desc">
              <h3># METODE & ALGORITMA</h3>
Algoritma Naive Bayes merupakan sebuah metoda klasifikasi menggunakan metode probabilitas dan statistik yg dikemukakan oleh ilmuwan Inggris Thomas Bayes.<br/><br/>Algoritma Naive Bayes memprediksi peluang di masa depan berdasarkan pengalaman di masa sebelumnya sehingga dikenal sebagai Teorema Bayes. Ciri utama dr Naïve Bayes Classifier ini adalah asumsi yg sangat kuat (naïf) akan independensi dari masing-masing kondisi / kejadian.<br/><br/>

<h3># STUDI KASUS</h3>
Dalam rangka menyelesaikan mata kuliah kecerdasan buatan ini saya mengangkat sebuah kasus dan studi kasus yang saya gunakan disini adalah untuk memprediksi seberapa besar peluang diterimanya calon pegawai PT.KAI berdasarkan data - data sebelumnya yang mana data tersebut berasal dari pegawai yang sudah diterima dan pegawai yang ditolak, sehingga data tersebut dijadikan acuan untuk menjadi data latih untuk metode naive bayes ini.<br/><br/>

<h3># TOOLS</h3>
1. Bootstrap 4.0<br/>
2. Font-awesome<br/>
3. Data latih dalam bentuk json<br/>
4. Jquery<br/><br/>

<h3># FITUR</h3>
- [x] Memprediksi probabilitas diterima / ditolaknya<br/>
- [x] No Reload Prediction<br/>
- [x] Clean Design<br/><br/>
            </p><br>
        </div><!-- end col -->
      </div><!-- end row -->

    </div><!-- end container -->

<!-- Footer -->
<footer class="page-footer font-small abu1 mt-5">

  <!-- Footer Elements -->
  <div class="container">

    <!-- Grid row-->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-12 py-5">

        <div class="text-center">
          Dibuat dengan <i class="fa fa-heart" style="color:#dc3545"></i> di Padang
        </div>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row-->

  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 abu2">©<?php echo date('Y'); ?> <a href="http://www.mycoding.net">Naïve Bayes Classifier</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="js/jquery.js"></script>

<!-- validasi -->
<script>
  $(document).ready(function(){
    $('.toggle').click(function(){
      $('ul').toggleClass('active');
    });
  });
</script>
</body>
</html>

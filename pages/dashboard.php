<section class="content-header">
<h1>
	Dashboard
	<small>Fitur</small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Dashboard</li>
</ol>
</section>
<section class="content"> 
	<div class="row">
	<div class="col-sm-5">
	<div class="login-box" style="margin-left:150px">
		<div class="login-box-body" style="background: #3c8dbc">
			<div class="login-logo" style="color:white;">
			K-Means
			</div>
			<div style="margin-left:20%;margin-right:20%;margin-bottom:20px;">
				<img src="asset/core/img/growths.png" class="img-responsive">
			</div>
			<p style="color:white;">
				Fitur ini bertujuan untuk menentukan persediaan barang dan mengelompokkan barang dari stok tersebut, yang minat apakah tinggi atau rendah, sehingga penjual bisa mengetahui barang yang minat nya tinggi dan minat nya rendah.
			</p>
			<a href="?page=barang">
			<button style="background:white; color:#3c8dbc;" class="btn btn-block btn-flat">Ke menu K-Means</button>
			</a>
		</div>
	</div>
	</div>
 
	<div class="col-sm-5">
		<div class="card text-center">
		<div class="login-box" style="margin-left:150px">
		<div class="login-box-body" style="background: #3c8dbc">
			<div class="login-logo" style="color:white;">
			Naive Bayes
			</div>
			<div style="margin-left:20%;margin-right:20%;margin-bottom:20px;">
				<img src="asset/core/img/growthss.png" class="img-responsive">
			</div>
			<p style="color:white;">
				Fitur ini membantu penjual dalam memprediksi stok barang untuk menentukan stok barang yang perlu diperbanyak atau dikurangi dari hasil tinggi atau rendah nya minat pembeli agar efektif dalam meminimalisir penumpukan barang dan kerugian.
			</p>
			<a href="?page=transaksi">
			<button style="background:white; color:#3c8dbc;" class="btn btn-block btn-flat">Ke fitur Naive Bayes</button>
			</a>
		</div>
	</div>
	</div>
</div>
</section>
<!-- <script>
	$(document).ready(function() {
	  setInterval(function() {
		window.location.reload(true);
	  }, 100000);
	});
	var baseUrl	='pages/marker.php'
	var myIcon	='asset/core/img/marker.png'
	
	function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
	  center: new google.maps.LatLng(-6.208554,106.8864773),
	  zoom: 11
	});
	
	var infoWindow = new google.maps.InfoWindow;
	  downloadUrl(baseUrl, function(data) {
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName('marker');
		Array.prototype.forEach.call(markers, function(markerElem) {
		  var id = markerElem.getAttribute('id');
		  var name = markerElem.getAttribute('name');
		  var alamat = markerElem.getAttribute('alamat');
		  var phone = markerElem.getAttribute('phone');
		  var email = markerElem.getAttribute('email');
		  var point = new google.maps.LatLng(
			  parseFloat(markerElem.getAttribute('lat')),
			  parseFloat(markerElem.getAttribute('lng')));

		  var infowincontent = document.createElement('div');
		  var strong = document.createElement('strong');
		  strong.textContent = name+' - '+phone+' - '+email
		  infowincontent.appendChild(strong);
		  infowincontent.appendChild(document.createElement('br'));

		  var text = document.createElement('text');
		  text.textContent = alamat
		  infowincontent.appendChild(text);
		  var marker = new google.maps.Marker({
			map: map,
			position: point,
			icon:myIcon
		  });
		  marker.addListener('click', function() {
			infoWindow.setContent(infowincontent);
			infoWindow.open(map, marker);
		  });
		});
	  });
	}

  function downloadUrl(url, callback) {
	var request = window.ActiveXObject ?
		new ActiveXObject('Microsoft.XMLHTTP') :
		new XMLHttpRequest;

	request.onreadystatechange = function() {
	  if (request.readyState == 4) {
		request.onreadystatechange = doNothing;
		callback(request, request.status);
	  }
	};
	request.open('GET', url, true);
	request.send(null);
  }
  
  function doNothing() {  
  }
</script> -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcrJ0zhWWdaXaIPOy55Tn5Idq-Ih-K2GI&callback=initMap"></script>
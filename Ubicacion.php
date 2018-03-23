<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<title> Google Maps En tiempo real </title>
	<link rel="stylesheet" type="text/css" href="estilos1.css">
  <link rel="stylesheet" type="text/php" href="listar.php">

  <meta charset="utf-8">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fim-168</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link href="asset/css/style.css" rel="stylesheet">
    <!-- end: Css -->

    <link rel="shortcut icon" href="Imagenes/LogoSat.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body onload="initMap()" id="mimin" class="dashboard">





  <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.html" class="navbar-brand"> 
                 <b>CubeSAT 168</b>
                </a>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li class="active ripple">
                      <a href="index.html"><span class="fa-home fa"></span> Inicio </a>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span> CubeSAT
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="TempVSTiem.html"> Temperatura vs Tiempo</a></li>
                        <li><a href="TempVSAlt.html"> Temperatura vs Altitud</a></li>
                        <li><a href="PreVSTiem.html">Presión vs Tiempo </a></li>
                        <li><a href="PreVSAlt.html">Presión vs Altitud</a></li>
                        <li><a href="HumVSTiem.html"> Humedad vs Tiempo</a></li>
                        <li><a href="HumVSAlt.html"> Humedad vs Altitud </a></li>
                        <li><a href="FuerzaVsTiempo.html"> Fuerza vs Tiempo </a></li>
                        <li><a href="FuerzaVsAltitud.html"> Fuerza vs Altitud </a></li>
                        <li><a href="CalAireVsTiempo.html"> Calidad del Aire vs Tiempo</a></li>
                        <li><a href="CalAireVsAlt.html"> Calidad del Aire vs Altitud </a></li>
                        <li><a href="Ubicacion.php"> Ubicación en Tiempo Real </a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-table"></span> Base de Datos <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="RegistrosHistoricos.html">Registros Históricos</a></li>
                        <li><a href="Estadisticas.html">Estadísticas</a></li>
                      </ul>
                    </li>
            </div>
            <div id="content">
              <div class="panel">
                <div class="panel-body">
                    <div class="col-md-6 col-sm-12">
                      <h3 class="animated fadeInLeft">Google Maps En tiempo real</h3>
                      <p class="animated fadeInDown"><span class="fa  fa-bar-chart-o"></span> Google Maps en Tiempo Real</p>
                    </div>
                </div>
              </div>
          <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                </div>
            </div>
          </div>




<div id="map"></div>

<?php 

include ("conexion.php");

	$query = "SELECT Latitud, Longitud FROM `gps`;";
	$resultado = mysqli_query($conn,$query);
   
?>




<?php
              $i=1;
              while ($data = mysqli_fetch_assoc($resultado)) {
            ?>

	
    <script type="text/javascript">
    	

function initMap() {
        var uluru = {lat: 21.8963, lng: -102.323};

        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru,
          styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },
            {
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },
            {
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },
            {
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },
            {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },
            {
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },
            {
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },
            {
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },
            {
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }
          ]
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          icon:/*"https://image.flaticon.com/icons/png/128/495/495499.png"*/"https://cdn2.iconfinder.com/data/icons/iconslandgps/PNG/128x128/Pinpoints/Flag1RightGreen.png"
          
        });
/*
		//Agregamos información al dar click al marker
        var infoWindow = new google.maps.infoWindow({
        	content: '<h2>Satélite</h2>'
        });

        marker.addListener('click', function(){
        		infoWindow.open(map,marker);
        });
*/

		/*$( document ).ready(function() {
			$("#llamada").on("click",function (){


				$.ajax( "listar.php" )
				.done(function(response) {
					var data=$.parseJSON(response);
											}

												alert(data.name[0]);
			

			});

		});*/


    //include ("listar.php");
		
	addMarker({lat: <?php echo $data['Latitud']; ?> , lng: <?php echo $data['Longitud']; ?> });
		//21.8955289, -102.3251335
        //Creamos la funcion para markers
        function addMarker (coords)
        {
        	var marker = new google.maps.Marker({
          position: coords,
          map: map
        });
    	}

      	

}
    	
    </script>

<?php
                $i++;
              }
              	
             
            ?>




<?php
              $i=1;
              while ($data = mysqli_fetch_assoc($resultado)) {
            ?>

            <script type="text/javascript">
            	addMarker({lat: <?php echo $data['Latitud']; ?> , lng: <?php echo $data['Longitud']; ?> });
            </script>


<?php
                $i++;
              }
            
             mysqli_close($conn);
            ?>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4opZGtqrprLu4Vk7GvsaKWsfLJfs20DY&callback=initMap">
    </script>




</body>
</html>


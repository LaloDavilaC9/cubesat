<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<script>
		setInterval( function(){

		$('#listado').load('conexion.php');

		},1000)

</script>

<center><div id="listado">
	
	<?php 

		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "cubesat");
		$result = mysqli_query($link, "SELECT G.Altitud, E.Presion, H.HoraEvent FROM gps G, extra E, hra_evento H WHERE G.ID_Event = E.ID_Event and E.ID_Event = H.ID_Event ORDER BY G.ID_Event, E.ID_Event, H.ID_Event DESC LIMIT 1");
		mysqli_data_seek ($result, 0);
		$extraido = mysqli_fetch_array($result);

		echo "- Altitud en base a GPS: ".$extraido['Altitud']." Metros<br/>";
		echo "- Presion: ".$extraido['Presion']." hPa<br/>";
		echo "- Hora de llegada: ".$extraido['HoraEvent']."<br/>";

		$diff = time() - strtotime($extraido['HoraEvent']);



		$masa = 236;
		$gravedad = 9.8;
		$acel = 5;


		//Procesos formula uno velocidad
         $resta = $extraido['Altitud']-$extraido['Presion'];
         $Velocidad = $resta / $diff;
         //Procesos formula dos velocidad
         $multi = $masa*$acel;
         $Velocidad_2 = $multi/$gravedad;

        echo "- Velocidad ascenso/ decenso por formula uno (en base a presión): ".$Velocidad. " m/s</br>";
        echo "- Velocidad ascenso/ decenso por formula dos: ".$Velocidad_2. " m/s</br>";



		mysqli_free_result($result);
		mysqli_close($link);
	 ?>



</div>
	

</center>


	
</body>
</html>
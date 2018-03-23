<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<h1 align="center">Altitud</h1>
    <table id="myTable" class=table>
        <?php
      $servername ="localhost";
      $username = "root";
      $password = "";
      $dbname = "cubesat";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
         die("Fallo la conexion:(".$conn -> mysqli_connect_errno().")".$conn -> mysqli_connect_errno());       
        }

        $consulta = "SELECT AVG(Altitud) AS AltitudPromedio FROM gps WHERE Altitud !=0 and (id_event>=1 and id_event<=150)";
        $resConsulta = $conn->query($consulta);


        ?>

        <thead>
        <tr>
            <td>Promedio</td>
            <td>Moda</td>
            <td>Altitud Maxima (m)</td>
            <td>Altitud Minima (m)</td>
        </tr>
        </thead>

        <?php 

        while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            # code...


            echo'<td>'
                .$registros['AltitudPromedio'].'</td>';
        }

        $consulta = "SELECT Altitud FROM gps WHERE Altitud !=0  and (id_event>=1 and id_event<=175) GROUP BY Altitud ORDER BY COUNT(*) DESC LIMIT 1";
        $resConsulta = $conn->query($consulta);


        ?>

        <?php 

        while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            # code...


            echo'<td>'
                .$registros['Altitud'].'</td>';
        }

        $consulta = "SELECT MAX(Altitud) AS AltitudMaxima FROM gps WHERE Altitud!=0 and (altitud>=5200 and altitud<=5300)";
        $resConsulta = $conn->query($consulta);


        ?>

        <?php 

        while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            # code...


            echo'<td>'
                .$registros['AltitudMaxima'].'</td>';
        }

        $consulta = "SELECT MIN(Altitud) AS AltitudMinima FROM gps WHERE Altitud!=0 and (altitud>=1700 and altitud<=1800)";
        $resConsulta = $conn->query($consulta);
        ?>
        <?php 
        while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            # code...
            echo'<td>'
                .$registros['AltitudMinima'].'</td>';
        }
         ?>
        
        
        
    </body>
</html>
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
<h1 align="center">Presion</h1>
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

        ?>

        <thead>
        <tr>
            <td>Promedio</td>
            <td>Moda</td>
            <td>Presión Máxima (hPa)</td>
            <td>Presión Mínima (hPa)</td>
        </tr>
        </thead>


        <?php 

        $consulta = "SELECT AVG(Presion) AS Promedio FROM extra WHERE Presion !=0 and (presion>=1 and presion<=166)";
        $resConsulta = $conn->query($consulta);
        ?>
        <?php 
        while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            # code...
            echo'<td>'
                .$registros['Promedio'].'</td>';
        }

        $consulta = "SELECT Presion FROM extra WHERE Presion !=0 and (presion>=1 and presion<=166) GROUP BY Presion ORDER BY COUNT(*) DESC LIMIT 1";
        $resConsulta = $conn->query($consulta);


        ?>

        <?php 

        while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            # code...


            echo'<td>'
                .$registros['Presion'].'</td>';
        }

        $consulta = "SELECT MAX(Presion) AS Maxima FROM extra WHERE Presion!=0";
        $resConsulta = $conn->query($consulta);


        ?>

        <?php 

        while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            # code...


            echo'<td>'
                .$registros['Maxima'].'</td>';
        }

        $consulta = "SELECT MIN(Presion) AS Minima FROM extra WHERE Presion!=0";
        $resConsulta = $conn->query($consulta);


        ?>

        <?php 

        while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            # code...


            echo'<td>'
                .$registros['Minima'].'</td>';
        }



         ?>
        
        
        
    </body>
</html>
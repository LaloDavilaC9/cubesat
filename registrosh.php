<html>
    <head>
       <meta charset="utf-8" />
        <title>REGISTROS HISTÓRICOS</title>
    </head>
    <body>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<select id="myselect2" name="myselect2">
	<option value="0">ID</option>
	<option value="1">t1</option>
	<option value="2">t2</option>
  <option value="3">H</option>
  <option value="4">P</option>



</select>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar" > 
    <table id="myTable" class=table>
         <thead>
            <tr>
                <td>Id</td>
                <td>Temperatura Interna (°C)</td>
                <td>Humedad (%)</td>
                <td>Presion (hPa)</td>
                <td>Calidad del aire (ppm)</td>
                <td>Infrarrojo</td>
                <td>Cantidad de luz</td>
                <td>Cantidad de voltaje</td>
            </tr>
        </thead>
        <tbody>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "cubesat");
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }
          
          $consulta = "SELECT * FROM extra";

          $resConsulta = $conn->query($consulta);

           while ($registros = $resConsulta->fetch_array(MYSQLI_BOTH)) {
            ?>
                <tr>
                    <td><?php echo $registros['ID_Event']?></td>
                    <td><?php echo $registros['Temp_1']?></td>           
                    <td><?php echo $registros['Humedad']?></td>
                    <td><?php echo $registros['Presion']?></td>
                    <td><?php echo $registros['Calidad_Aire']?></td>       
                    <td><?php echo $registros['Infrarrojo']?></td>   
                    <td><?php echo $registros['Canti_Luz']?></td> 
                    <td><?php echo $registros['Canti_Volta']?></td>      
                </tr>

            <?php
            }
            ?>
            </tbody>
            </table>
            <script>
function myFunction() {
  var input, filter, table, tr, td, i, selectz;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  selectz=document.getElementById("myselect2").options[document.getElementById("myselect2").selectedIndex].value;

    for (i = 0; i < tr.length; i++) {
    
      td = tr[i].getElementsByTagName("td")[selectz];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
  }
  }
  
</script>
<!--
 <?php
            $connect = mysql_connect("192.168.0.100", "Lalo", "12345678", "cubesat");
            if (!$connect) {
                die(mysql_error());
            
            }
            mysql_select_db("basedatossatelite");
            $results = mysql_query("SELECT Max(*) FROM extra");
            while($row = mysql_fetch_array($results)) {
            ?>
                <tr>
                 <td><?php echo $registros['ID_Event']?></td>
                    <td><?php echo $registros['Temp_1']?></td>           
                    <td><?php echo $registros['Humedad']?></td>
                    <td><?php echo $registros['Presion']?></td>
                    <td><?php echo $registros['Calidad_Aire']?></td>       
                    <td><?php echo $registros['Infrarrojo']?></td>   
                    <td><?php echo $registros['Canti_Luz']?></td> 
                    <td><?php echo $registros['Canti_Vol']?></td>            
                </tr>

            <?php
            }
            ?>
          -->

    </body>
</html>
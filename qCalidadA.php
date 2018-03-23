<?php 
                    require('conexion.php');
                    $Json=Array();
                    $i=0;
					$sql = "SELECT G.Altitud,E.Temp_1,E.Temp_2,E.Humedad,E.Presion, E.Calidad_Aire FROM gps G INNER JOIN extra E ON E.ID_Event=G.ID_Event order by Altitud desc limit 0,150";
                    $result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
                            $Json['grafica'][0]['name'] = 'Calidad del aire (ppm)';
                            $Json['grafica'][0]['data'] = array();
                            $Json['label'] = array();
                            $i = 0;
    						while($row = mysqli_fetch_assoc($result)) {
                                array_push($Json['grafica'][0]['data'], $row["Calidad_Aire"]);
                                array_push($Json['label'], $row["Altitud"]);
  							  }
						}
                        echo json_encode($Json);
                        mysqli_close($conn);

 ?>
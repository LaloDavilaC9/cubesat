<?php 
                    require('conexion.php');
                    $Json=Array();
                    $i=0;
					$sql = "SELECT H.HoraEvent,E.Temp_1,E.Temp_2,E.Humedad,E.Presion FROM hra_evento H INNER JOIN extra E ON E.ID_Event=H.ID_Event order by horaevent desc limit 0,19;";
                    $result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
                            $Json['grafica'][0]['name'] = 'Temperatura interna (°C)';
                    
                            $Json['grafica'][0]['data'] = array();
                           
                            $Json['label'] = array();
                            $i = 0;
    						while($row = mysqli_fetch_assoc($result)) {
                                array_push($Json['grafica'][0]['data'], $row["Temp_1"]);
                                
                                array_push($Json['label'], $row["HoraEvent"]);
  							  }
						}
                        echo json_encode($Json);
                        mysqli_close($conn);



 ?>
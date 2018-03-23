<?php 
                    require('conexion.php');
                    $Json=Array();
                    $i=0;
					$sql = "SELECT H.HoraEvent, V.Joules FROM hra_evento H INNER JOIN Variable_proce V ON V.ID_Event=H.ID_Event order by horaevent desc limit 0,20;";
                    $result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
                            $Json['grafica'][0]['name'] = 'Fuerza (J)';
                            $Json['grafica'][0]['data'] = array();
                            $Json['label'] = array();
                            $i = 0;
    						while($row = mysqli_fetch_assoc($result)) {
                                array_push($Json['grafica'][0]['data'], $row["Joules"]);
                                array_push($Json['label'], $row["HoraEvent"]);
  							  }
						}
                        echo json_encode($Json);
                        mysqli_close($conn);

 ?>
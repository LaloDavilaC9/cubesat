<?php 
                    require('conexion.php');
                    $Json=Array();
                    $i=0;
					$sql = "SELECT G.Altitud, V.Joules FROM gps G INNER JOIN Variable_proce V ON V.ID_Event=G.ID_Event order by altitud desc limit 0,150;";
                    $result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
                            $Json['grafica'][0]['name'] = 'Fuerza (J)';
                            $Json['grafica'][0]['data'] = array();
                            $Json['label'] = array();
                            $i = 0;
    						while($row = mysqli_fetch_assoc($result)) {
                                array_push($Json['grafica'][0]['data'], $row["Joules"]);
                                array_push($Json['label'], $row["Altitud"]);
  							  }
						}
                        echo json_encode($Json);
                        mysqli_close($conn);

 ?>
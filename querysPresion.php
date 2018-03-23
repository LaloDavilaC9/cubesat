<?php 
                    require('conexion.php');
                    $Json=Array();
                    $i=0;
					$sql = "CALL consultarExtra()";
                    $result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
                            $Json['grafica'][0]['name'] = 'Presión (hPa)';
                            $Json['grafica'][0]['data'] = array();
                            $Json['label'] = array();
    						while($row = mysqli_fetch_assoc($result)) {
                                array_push($Json['grafica'][0]['data'], $row["Presion"]);
                                array_push($Json['label'], $row["HoraEvent"]);
  							  }
						}
                        echo json_encode($Json);
                        mysqli_close($conn);

 ?>
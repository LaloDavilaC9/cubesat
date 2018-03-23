<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "satelitedatos";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Temp_1, presion FROM extra;";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Temperatura1" . $row["Temp_1"]. " Presion " . $row["presion"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
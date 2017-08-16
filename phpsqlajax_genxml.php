<?php
require("phpsqlajax_dbinfo.php");

$query = "SELECT * FROM markers WHERE 1";
$result = mysqli_query($connect, $query);
$data = array();
while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($connect);
?>
<?php
require("phpsqlajax_dbinfo.php");

$del = $_POST['id'];
$query = "DELETE FROM markers WHERE id=$del;";
$result = mysqli_query($connect, $query);

mysqli_close($connect)
?>
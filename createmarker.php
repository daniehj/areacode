<?php
require("phpsqlajax_dbinfo.php");

$name = $_POST['name'];
$address = $_POST['address'];
$info = $_POST['info'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];
$del = $_POST['id'];


if ($_POST['name']==""){
    $query = "DELETE FROM markers WHERE 'id'=$del;";
}

if ($_POST['id']!= ""){
    $id = $_POST['id'];

    $query = "UPDATE markers SET name='$name', address='$address', info='$info', lat='$lat', lng='$lng', type='$type' WHERE id=$id;";

}else{
    $query = "INSERT INTO `markers` (`name`, `address`, `info`, `lat`, `lng`, `type`) VALUES ('$name','$address', '$info', '$lat', '$lng', '$type');";
    }

$result = mysqli_query($connect, $query);

header("location: welcome.php");

mysqli_close($connect)
?>
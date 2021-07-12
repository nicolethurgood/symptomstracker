<?php
include "config.php";

if ($_SESSION['Location'] == "Los Angeles") {
    date_default_timezone_set('America/Los_Angeles');
}else if ($_SESSION['Location'] == "Florence, Italy") {
    date_default_timezone_set('Europe/Berlin');
}else{
    date_default_timezone_set('America/New_York');
}

$EntryID = $_SESSION['StudentID'];
$EntryDate = date("m/d/Y");

$sql_query = "select count(*) as cntRecd from Symptoms where StudentID='".$EntryID."' and Date='".$EntryDate."'";
$result = mysqli_query($con,$sql_query);
$row = mysqli_fetch_array($result);
$count = $row['cntRecd'];
if($count > 0){

    header("Location: response.php");
}

?>
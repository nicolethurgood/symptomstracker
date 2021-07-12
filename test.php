<?php
session_start();
$host = "new.nyfa.edu"; /* Host name */
$user = "trackingsymptoms"; /* User */
$password = "Wh7VEorkt*Pp"; /* Password */
$dbname = "SymptomsTracking"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// REST tracker count
$sql = "UPDATE TrackerCounts SET Count = 0 WHERE ID = 1 OR ID = 2";
$result = $con->query($sql);

?>
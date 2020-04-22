<?php

$host = "localhsot"; /* Host name */
$user = "root"; /* User */
$password = "1234"; /* Password */
$dbname = "database"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

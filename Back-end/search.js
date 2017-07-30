<?php
function getArray($result){
  $arr = array();
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        array_push($arr, $row);
      }
  }
  return $arr;
}
function isvaltrue($var){
  return (isset($_POST[$var])); //&& $_POST[$var] != 0);
}
$servername = "handson-mysql";
$username = "guestinterns";
$password = "interns2017";
$dbname = "intern2017_group1";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$sql ="SELECT * FROM Cars AS treq,Seller AS tcar WHERE treq.sid = tcar.sid AND  tcar.company LIKE '" . $_POST["company"] . "%'";
$result = $conn->query($sql);
$arr = getArray($result);
echo json_encode($arr);
$conn->close();
?>
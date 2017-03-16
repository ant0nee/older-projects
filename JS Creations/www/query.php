<?php
$con=mysqli_connect("localhost","root","","My_Database_0001");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM users01");

while($row = mysqli_fetch_array($result))
 {
  echo $row['username'] . " <> " . $row['password']. " <> " . $row['email'] . " <> " . $row['website'];
  echo "<br>";
  }


mysqli_close($con);
?>
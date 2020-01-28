<?php
$con=mysqli_connect("localhost","root","","rest_food");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//  echo "Connection success";
// mysqli_close($con);
 ?> 
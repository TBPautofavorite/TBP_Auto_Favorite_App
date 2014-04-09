<?php

//NEED TO FIX THIS:
$con=mysqli_connect("server","username","password","tokens");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_close($con);

?>
<?php
 include "db.php";

 $kode= explode("|,", $_POST['kode']);
 $driver_location=$_POST['driver_location'];
 $driverid=$_POST['driverid'];
 $q=mysqli_query($con,"UPDATE `delivery` SET `driver_location`='$driver_location' WHERE kode IN (".$kode[1].")");

 
 ?>
<?php
 include "db.php";
 if(isset($_GET['kode']))
 {
 $kode= explode("|,", $_GET['kode']);
 $q=mysqli_query($con,"UPDATE delivery SET driver_delivery_status='2', driver_location='', `status`='driver drop item to warehouse' WHERE `status`='driver' AND kode IN (".$kode[1].")");
 if($q)
 echo "success";
 else
 echo "error";
 }
 ?>
<?php
 include "db.php";
 if(isset($_GET['kode']))
 {
 $kode= explode("|,", $_GET['kode']);
 $q=mysqli_query($con,"UPDATE delivery SET driver_delivery_status='0', driver_location='' WHERE kode IN (".$kode[1].")");
 if($q)
 echo "success";
 else
 echo "error";
 }
 ?>
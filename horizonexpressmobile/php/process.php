<?php
 include "db.php";
 if(isset($_GET['kode']))
 {
// $kode=$_GET['kode'];
 $kode= explode("|,", $_GET['kode']);
 $query="UPDATE delivery SET driver_delivery_status='1' WHERE kode IN (".$kode[1].")";
 $q=mysqli_query($con,$query);
 
  if($q)
   echo "success";
   else
   echo "error";
 }
 ?>
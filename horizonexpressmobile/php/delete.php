<?php
 include "db.php";
 if(isset($_GET['id']))
 {
 $id=$_GET['id'];
 $q=mysqli_query($con,"UPDATE delivery SET driver_delivery_status='0' WHERE kode='$id'");
 if($q)
 echo "success";
 else
 echo "error";
 }
 ?>
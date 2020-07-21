<?php
include "db.php";
$driverid=$_GET['driverid'];
$kode= explode("|,", $_GET['kode']);
$data=array();
$q=mysqli_query($con,"
  SELECT 
  `kode`,`name_pengirim`,`address_pengirim`,`telephone_pengirim`,
  (SELECT `name` FROM `warehouse` WHERE `id`=`wr_pengirim_id`) AS wr_pengirim,
  `name_penerima`,`address_penerima`,`telephone_penerima`,
  (SELECT `name` FROM `warehouse` WHERE `id`=`wr_penerima_id`) AS wr_penerima, MONTH(create_at) AS bulan,
  YEAR(create_at) AS tahun
  FROM `delivery` 
  WHERE kode IN (".$kode[1].") AND `driver`= '".$driverid."' AND `status`='driver' 
  ");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>
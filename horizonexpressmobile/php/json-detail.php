<?php
include "db.php";
$kode=$_GET['kode'];
$data=array();
$q=mysqli_query($con,"
 SELECT `name`,SUM(qty) AS qty_sub_total,unit,category
FROM `delivery_detail` 
WHERE kode='".$kode."' AND qty>0 
GROUP BY `name` ORDER BY `category`,`kode`
  ");
while ($row=mysqli_fetch_object($q)){
 $data[]=$row;
}
echo json_encode($data);
?>
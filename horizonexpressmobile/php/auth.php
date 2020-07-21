<?php
include "db.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    //$username = 'hamsa';
    //$password = '12345';
    $kode="0|";
    
if(isset($_POST['login']))
{

    $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `driver` WHERE `username` ='$username' AND `password` =MD5('$password');"));
    
     
    if($login !=0 ){

        $data_driver = mysqli_query($con,"SELECT id FROM `driver` WHERE `username` ='$username' AND `password` =MD5('$password');");
        $row = mysqli_fetch_assoc($data_driver);
        $driverid =$row['id']; 
        $query_delivery="SELECT kode,MONTH(create_at) AS bulan ,YEAR(create_at) AS tahun FROM `delivery` WHERE driver=".$driverid." AND driver_delivery_status='1';";
        $tracking=mysqli_num_rows(mysqli_query($con,$query_delivery));

        if ($tracking==0){
          echo "success"."*".$driverid;
        }
        else{
          $data_delivery=mysqli_query($con,$query_delivery);
          while($delivery=mysqli_fetch_assoc($data_delivery)){
            $kode.=",".$delivery['kode'];
           }
          echo "tracking"."*".$driverid."*".$kode;
        }
      }
        
   else{
      echo "error";
   }       

}
/*
    $login = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `driver` WHERE `username` ='$username' AND `password` =MD5('$password');"));
    $data_driver = mysqli_query($con,"SELECT id FROM `driver` WHERE `username` ='$username' AND `password` =MD5('$password');");
    $row = mysqli_fetch_assoc($data_driver);
    $driverid =$row['id']; 

    if($login != 0)
       // echo "success".","."$driverid";
      echo "success";
    else
        echo "error";
*/

?>
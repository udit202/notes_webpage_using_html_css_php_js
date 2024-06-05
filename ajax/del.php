<?php
require 'conn.php';
$del_id= $_POST['student'];
$sql = "DELETE FROM `data` WHERE `data`.`id` = '{$del_id}'";
if(mysqli_query($conn,$sql)){
    echo 1;
}
else{
    echo 0;
}
?>
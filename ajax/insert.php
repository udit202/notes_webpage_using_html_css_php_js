<?php
require 'conn.php';
$fname= $_POST['first_name'];
$lname= $_POST['last_name'];
$sql= "INSERT INTO `data` ( `first`, `last`) VALUES ('{$fname}' , '{$lname}')";
$result= mysqli_query($conn,$sql);
if($result){
    echo  1;
}
else{
    echo 0;
}
?>
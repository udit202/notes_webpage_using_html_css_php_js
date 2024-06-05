<?php
require 'conn.php';
$id = $_POST['user_id'];
$fname = $_POST['fname_edited'];
$lname = $_POST['lname_edited'];
$sql= "UPDATE `data` SET `first`= '{$fname}',`last`='{$lname}' WHERE  `data`.`id` = '{$id}'";
if(mysqli_query($conn,$sql)){
    echo 1;
}
else{
    echo 0;
}

?>
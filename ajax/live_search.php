<?php
require 'conn.php';
$search = $_POST['search'];
$sql = "SELECT *FROM  data WHERE `first` LIKE '%{$search}%'|| `last` LIKE '%{$search}%'";
$result= mysqli_query($conn,$sql) or die('sql not working');
if(mysqli_num_rows($result)>0){
    $output = "<table class=data_table style='width: 100%;'>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last name</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>";
    
    while (($row = mysqli_fetch_assoc($result))) {
        $output.= "<tr >
        <td>{$row['id']} </td>
        <td>{$row['first']}</td>
        <td>{$row['last']}</td>
        <td><button class='edit_btn btn btn-outline-dark' data-eid='{$row["id"]}'  >Edit</button></td>
        <td><button class='del_btn btn btn-outline-danger' data-id='{$row["id"]}' style='margin:5px' >Delete</button></td>
        
    </tr>";
    }
    $output.="</table>";
    echo $output;
}
else{
    echo '<h1> Zero Record Found';
    }
?>
<?php
require 'conn.php';
$limit_data = 5;
$page = "";
if(isset($_POST['page_no'])){
    $page = $_POST['page_no'];
}
else{
    $page = 1;
}
$offset=($page-1)* $limit_data;
$sql = "SELECT *FROM  data LIMIT {$offset},{$limit_data} ";
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
    </tr>"
    ;
    }
   
    $output.="</table>";
    $output.="<div class='pagination' style='width:100%; text-align:center; margin-left:30px'>";
    $sql_total="SELECT *FROM  data";
    $records = mysqli_query($conn,$sql_total) or die("Query Not Working");
    $total_records= mysqli_num_rows($records);
    $total_pages = ceil($total_records/$limit_data);
    for($i=1;$i<=$total_pages;$i++){
        if($i==$page){
            $class_name="activate";
        }
        else{
            $class_name="";
        }
        $output.="<a  id='{$i}' class='{$class_name}' >{$i}</a>";
    }
    
    $output.="</div>";
    echo $output;
}
else{
    echo '<h1> No Record Found';
    }
?>
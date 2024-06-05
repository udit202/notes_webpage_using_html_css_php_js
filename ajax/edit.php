<?php
require 'conn.php';
$edit= $_POST['student'];
$sql = $sql =" SELECT *FROM data WHERE id= '$edit'" ;
$result = mysqli_query($conn,$sql);
if($result){
        if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $output = " <div class='edit_modal'>
        <div>
        
        <i class='bi bi-x close_btn'  id='close_btn' style='margin-top:0px'></i>
        
        </div>
        <h2>
            Edit Modal
        </h2>
        <hr>
        <div class='my-2'>
        <input type='text' id='user_id' value='{$row['id']}' hIdden>
        </div>
        <div>
        
        <label for='fname_input'>First name </label>
        <input type='text' id='fname_input' value='{$row['first']}'>
        </div>
        <br>
        <div>
        <label for='lname_input'>Last name </label>
        <input type='text' id='lname_input'  value='{$row['last']}' >
        </div>
        <div>
        <button type='submit' class='btn btn-outline-danger Edit_btn' id='Edit_btn'>Edit</button>
        </div>
    </div>";
    echo $output;

    }
    
}

?>
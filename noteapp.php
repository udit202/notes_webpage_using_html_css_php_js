<?php
$deleted = false;
$conn = mysqli_connect("localhost","root", "","crud");
// $sql ="INSERT INTO `notes3` ( `title`, `description`, `time`) VALUES ( 'udit', '3rd', current_timestamp())";
if(isset($_GET['deleted'])){
    $sno =$_GET['deleted'];
    $sql= "DELETE FROM `notes3` WHERE `notes3`.`id` = '$sno'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Delete succesfully</strong> Note Deleted Successfully 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $title = $_POST['titleedit'];
        $description = $_POST['descriptionedit'];
        $sql = "UPDATE `notes3` SET `title` = '$title', `description` = '$description' WHERE `notes3`.`id` = '$id'";
        $add =  mysqli_query($conn,$sql);  
        if($add){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update succesfully</strong> Your Note is Updated Successfully 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    else{
        $title= $_POST['title'];
        $description =$_POST['description'];
        $sql ="INSERT INTO `notes3` (`title`, `description`, `time`) VALUES ('$title', '$description', current_timestamp())";
        $result = mysqli_query($conn,$sql); 
        if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Added succesfully</strong> Your  Note is Added Successfully 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- navigation -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">Note APP</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">contact US</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <!-- UPDATE Modal-->
    <div class="modals">

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Note</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="mb-3 ">
                                <label for="id" class="form-label">Id </label>
                                <input type="text" class="title form-control" id="id" aria-describedby="emailHelp"
                                    name="id" Required hidden>
                                <label for="titleedit" class="form-label">title </label>
                                <input type="text" class="title form-control" id="titleedit"
                                    aria-describedby="emailHelp" name="titleedit" Required>
                                <div class="mb-3">
                                    <label for="descriptionedit" class="form-label">Description</label>
                                    <textarea class="description form-control" placeholder="Leave a description here"
                                        id="descriptionedit" name="descriptionedit" Required></textarea>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Add not modals -->
    <div class="container add my-4">
        <h1>Add Note</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">title </label>
                <input type="text" class="title form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="title" Required>
                <div class="mb-3">
                    <label for="area" class="form-label">Description</label>
                    <textarea class="description form-control" placeholder="Leave a description here" id="area"
                        name="description" Required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- table containt -->
    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th hidden>id</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $sql = "SELECT * FROM `notes3`";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            $no = 1;
            if($num>0){
              while ($row=mysqli_fetch_assoc($result)){
                echo '<tr>
                <th scope="row">'.$no.'</th>
                <td>'.$row['title'].'</td>
                <td>'.$row['description'].'</td>
                <td>  <button type="button" class="edit btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                  data-bs-whatever="@mdo">Edit</button>  <button type="button" class="deleted btn btn-primary" >Deleted</button> </td>
                  <td hidden>'.$row['id'].'</td>
              </tr>';
              $no = $no+1;
              }
              
            }
            ?>

            </tbody>
        </table>

    </div>
    <!-- self script -->
    <script src="index.js"></script>
    <!-- external scripts jquery, bootstap and Datatables  -->
    <div class="links">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#myTable').DataTable();
            }
            );
        </script>
    </div>

</body>

</html>
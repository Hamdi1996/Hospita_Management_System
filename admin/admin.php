<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    
    include("../includes/header.php");
    include("../includes/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php 
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center text-info my-4">All Admin</h5>
                                <?php
                                
                                $ad = $_SESSION['admin'];
                                $query = "SELECT * FROM adminn WHERE username !='$ad'";
                                $res = mysqli_query($connect,$query);
                                $output = '<table class="table table-responsive  table-bordered">
                                <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th style="width: 10%;">Action</th> </tr>';
                                if(mysqli_num_rows($res)<1)
                                {
                                    $output .= " <tr><td  colspan='3' class='text-center'>No New Admin</td> </tr>";

                                }

                                while ($row = mysqli_fetch_array($res))
                                {
                                    $id = $row ['id'];
                                    $username = $row ['username'];

                                    $output .= " <tr>
                                    <td>".$id."</td>
                                    <td>".$username."</td>
                                    <td>
                                       <a href='admin.php?id=$id'> <button id='$id' class='btn btn-danger' >Remove</button></a>
                                    </td>";
                                }

                                $output .='</tr>


                                </table>';


                                echo $output;


                               if(isset($_GET['id']))
                                {
                                    $id = $_GET['id'];

                                    $sql = "DELETE FROM adminn WHERE id = '$id'";
                                    mysqli_query($connect,$sql);
                                }
                                
                                ?>



                            </div>
                            <div class="col-md-6">
                                <?php
                                if(isset($_POST['add']))
                                {
                                    $uname = $_POST['uname'];
                                    $pass = $_POST['pass'];
                                    $image = $_FILES['img']['name'];

                                    $error = array();
                                    if(empty($uname)){
                                        $error['u'] = "Enter Admin Username";
                                    }
                                    elseif(empty($pass))
                                    {
                                        $error['u'] = "Enter Admin Password";
                                    }
                                    elseif (empty($image))
                                    {
                                        $error ['u'] = "Add Admin Profile";
                                    }

                                    if(count($error) ==0)
                                    {
                                        $sql = "INSERT INTO adminn(username,passwordd,profilee) VALUES ('$uname','$pass','$image')";
                                        $res = mysqli_query($connect,$sql);

                                        if($res)
                                        {
                                            move_uploaded_file($_FILES['img']['tmp_name'],"img/$image");
                                        }
                                
                                    }
                                }
                                    
                                    if(isset($error['u']))
                                    {
                                        $er = $error['u'];
                                        $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                                    }
                                    else
                                    {
                                        $show ="";
                                    }
                              
                                
                                ?>
                                <h5 class="text-center text-info my-4">Add Admin</h5>
                                <form method="POST" enctype="multipart/form-data">
                                    <div>
                                        <?php echo $show;?>
                                    </div>
                                    <div class="form-group">
                                        <label>Username </label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label>Password </label>
                                        <input type="password" name="pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Add Admin Profile </label>
                                        <input type="file" name="img" class="form-control">
                                    </div><br>
                                    <input type="submit" name="add" value="Add New Admin" class="btn btn-success">

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
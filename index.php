<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>HMS | Home</title>
</head>

<body>
    <?php 

include("includes/header.php");

?>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mx-4 shadow pic">
                    <img class="image" src="img/info.png" height="165px">
                    <h5 class="text-center my-5">Click on the button for more info.</h5>

                    <a href="#">
                        <button class="btn btn-success my-5">More info</button>
                    </a>
                </div>

                <div class="col-md-3 mx-4 shadow pic">
                    <img class="image" src="img/paitent.jfif" alt="">
                    <h5 class="text-center my-5">Create Account so that we can take good care of you.</h5>

                    <a href="paccount.php">
                        <button class="btn btn-success my-5">Create Account!!</button>
                    </a>
                </div>
                <div class="col-md-3 mx-4 shadow pic">
                    <img class="image" src="img/doctor.jfif" alt="">
                    <h5 class="text-center my-5">We are employing for doctors</h5>

                    <a href="apply.php">
                        <button class="btn btn-success my-5">Apply Now!!</button>
                    </a>
                </div>
            </div>
        </div>

    </div>


</body>

</html>
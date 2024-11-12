<?php

include "connect.php";



$id = $_GET['updateid'];

$sql  = "select * from `crudapp`.`userdata` where id=$id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$username = $row['username'];
$email = $row['email'];
$password = $row['password'];


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE `crudapp`.`userdata` SET `username` = '$username', `email` = '$email', `password` = '$password' WHERE `userdata`.`id` = $id ;
";

    $result = mysqli_query($connect, $sql);

    if ($result) {
        // echo 'upated successfully';
        header('location: display.php');
    } else {
        die(mysqli_connect_error($connect));
    }

    mysqli_close($connect);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-CRUD-APP</title>
    <!-- ============== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="header text-center text-white p-2" style="background-color: black; border-top: 8px solid orange;">
        <h2><b><u>CRUD-APP-PHP</u></b></h2>
    </div>


    <div class="container">

        <div class="form mt-5">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="enter username" pattern="[A-Za-z]{3}" required value=<?php echo $username;?> >
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="enter email" required value=<?php echo $email;?>>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="enter password" required value=<?php echo $password;?>>
                </div>
                <button class="btn btn-warning" type="submit" name="submit">Update</button>
            </form>
        </div>

    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>
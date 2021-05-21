<?php

session_start();
include_once('function.php');

$userdata = new DB_con();

if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];

    $result = $userdata->signin($uname, $password);
    $num = mysqli_fetch_array($result);

    if ($num > 0) {
        $_SESSION['id'] = $num['id'];
        $_SESSION['fname'] = $num['fullname'];

        echo "<script>alert ('login Success');</script>";
        echo "<script>window.location.href='welcome.php'</script>";
    } else {
        echo "<script>alert ('login error');</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style-side.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class='mt-5'>Login page</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <span id='usernameavailable'></span>
            </div>
            <div class="mb-3">
                <button type="submit" name="login" class='btn btn-success'>login</button>
            </div>
            <div class="mb-2">
                <a href="index.php" class="btn btn-primary">register</a>
            </div>
        </form>
    </div>




    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>
<?php
include_once('function.php');

$userdata = new DB_con();

if (isset($_POST['submit'])) {
    $fname = $_POST['fullname'];
    $uname = $_POST['username'];
    $uemail = $_POST['email'];
    $password = md5($_POST['password']) ;

    $sql = $userdata->registration($fname, $uname, $uemail, $password);

    if ($sql) {
        echo "<script>alert ('registor Success');</script>";
        echo "<script>window.location.href='signin.php'</script>";
    } else {
        echo "<script>alert ('Something wrong');</script>";
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
    <title>register</title>
    <link rel="stylesheet" href="../css/style-side.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class='mt-5'>register page</h1>
        <hr>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full name</label>
                <input type="text" class="form-control" name="fullname" id="fullname" require >
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" name="username" id="username" require onblur="checkusername(this.value)">
                <span id='usernameavailable'></span>
            </div>
            <div class="mb-3 ">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" name="email" id="email" require>
            </div>
            <div class='mb-3'>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" require>
            </div>
            <div class='mb-3'>
                <button type="submit" name="submit" id='submit' class="btn btn-primary">Submit</button>
            </div>
            <div class='mb-3'>
                <a href="signin.php" class="btn btn-primary">sign in</a>
            </div>
        </form>
    </div>



    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script>
        function checkusername(val) {
            $.ajax({
                type: 'POST',
                url: 'checkuser_available.php',
                data: 'username=' + val,
                success: function(data) {
                    $('#usernameavailable').html(data);
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>
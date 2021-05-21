<?php 
    include_once('function.php');

    $usernamecheck =new DB_con();

    // getting post value
    $uname =$_POST['username'];

    $sql = $usernamecheck->usernameavilable($uname);

    $num =mysqli_num_rows($sql);

    if ($num > 0){
        echo "<span style='color: red;'>Username already</span>";
        echo "<script>$('#submit').prop('disabled' , true)</script>";
    } else {
        echo "<span style='color: green;'>Username avilable</span>";
        echo "<script>$('#submit').prop('disabled' , false)</script>";
    }

?>
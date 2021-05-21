<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'register_oop');

class DB_con
{
    function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;

        if (mysqli_connect_errno()) {
            echo "Failed" . mysqli_connect_error();
        } 
    }

    public function registration($fname , $uname , $uemail , $password){
        $reg = mysqli_query($this->dbcon , "INSERT INTO tbluser(fullname , username , useremail , password) values('$fname' , '$uname' , '$uemail' , '$password')");
        return $reg;
    }

    public function usernameavilable($uname) {
        $checkuser = mysqli_query($this->dbcon , "SELECT username FROM tbluser WHERE username = '$uname'" );
        return $checkuser;
    }

    public function signin($uname , $password) {
        $signingquery = mysqli_query($this->dbcon , "SELECT id , fullname FROM tbluser WHERE username='$uname' AND password = '$password'");
        return $signingquery;
    }

}

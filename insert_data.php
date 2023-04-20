<?php
require_once 'vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;


require 'utils.php';



if (isset($_POST['submit'])) {
    session_start();

    $env = parse_ini_file('.env');
    $con = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){
        mysqli_ssl_set($con,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);

    }
    mysqli_real_connect($con, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $college = $_POST['college'];


    $query = "SELECT * FROM `tryst_info` WHERE cmobile = '$mobile' or c_mailId = '$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // set message to registration.html
   
        $_SESSION['message'] = 'Mobile number or Email already registered';
        mysqli_close($con);

        header('location: /Register.php');
        exit();

    } else {
            //code...
            

            $query = "INSERT INTO `tryst_info` (cname, c_mailId , cmobile, ccollege) VALUES ('$uname', '$email', '$mobile', '$college')";
            sendMail($uname, $email, $mobile);

            mysqli_query($con, $query);
            $_SESSION['message'] = "Tickets has been sent to your mail ID";
            mysqli_close($con);
            header('location: /');
            exit();

    }

}



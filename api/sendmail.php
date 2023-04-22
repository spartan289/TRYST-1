<?php
    require '../utils.php';
    if(!isset($_GET['data'])){
        // send response with 404 status code
        response(404,"Invalid Verification Link",NULL);
    }
    $data = $_GET['data'];
    // decrypt data
    $data = decryptData($data);
    // fetch data from array
    $name = $data[0];
    $email = $data[1];
    $mobile = $data[2];
    $cname = urldecode($_GET['cname']);
    $dob = urldecode($_GET['dob']);
    // connect to database
    $env = parse_ini_file('../.env');
    $conn = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){

        mysqli_ssl_set($conn,NULL,NULL, "../".$env["MYSQL_ATTR_SSL_CA"], NULL, NULL);
    }
    mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

    $query = "UPDATE `tryst_info` SET tickverif=True WHERE c_mailId = '$email'" ;
    sendMail($name,$email,$mobile,$dob,$cname);

    mysqli_query($conn, $query) ;
    mysqli_close($conn);
    function response($status,$status_message,$data)
    {
        // start seesion
        session_start();
        // set session message
        $_SESSION['message'] = $status_message;

        header('location: ../index.php') ;
        exit();
    }
    exit();
    
?>
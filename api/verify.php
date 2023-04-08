<?php
    // fetch data from url
    header("Content-Type: application/json");
    if(!isset($_GET['data']) or empty($_GET['data'])){
        // send response with 400 status code
        response(400,"Invalid Request",NULL);
        exit();
    }
    $data = $_GET['data'];
    // decrypt data
    $data = decryptData($data);
    // fetch data from array
    $name = $data[0];
    $email = $data[1];
    $mobile = $data[2];
    // connect to database
    $env = parse_ini_file('.env');
    $con = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){
        mysqli_ssl_set($con,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);

    }
    mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);
    // check if data is already present
    $query = "SELECT * FROM `tryst_info` WHERE (cmobile = '$mobile' or c_mailId = '$email')" ;
    $result = mysqli_query($conn, $query) ;
    if(mysqli_num_rows($result) > 0) {
        //check if c_attended is True
        $query = "SELECT * FROM `tryst_info` WHERE (cmobile = '$mobile' or c_mailId = '$email') and is_verified=True" ;
        $result = mysqli_query($conn, $query) ;
        if(mysqli_num_rows($result) > 0) {
            // send response with 200 status code
            response(201,"Already Verified",NULL);
        }
        else{
            $query = "UPDATE `tryst_info` SET is_verified=True WHERE (cmobile = '$mobile' or c_mailId = '$email') and is_verified=False" ;
            $result = mysqli_query($conn, $query) ;
            // send response with 200 status code
    
            response(200,"Verified",NULL);
    
        }
        
        mysqli_close($conn);


        
    }
    else{
        // send response with 404 status code
        response(404,"Invalid Verification Link",NULL);

    }
    function response($status,$status_message,$data)
    {
        // start seesion
        session_start();
        // set response code
        http_response_code($status);
        // set session message
        $_SESSION['message'] = $status_message ;
        header('location: ../ind.php') ;
        exit();
    }
    function decryptData($data){
        // code to decrypt data
        $data = base64_decode($data);
        //separate data
        $data = explode(",/|",$data);

        return $data;
    }
    // close connection
?>
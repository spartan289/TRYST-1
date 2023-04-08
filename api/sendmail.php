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

    // connect to database
    $con = mysqli_init();
    if(getenv("MYSQL_ATTR_SSL_CA") != NULL){
        mysqli_ssl_set($con,NULL,NULL,getenv("MYSQL_ATTR_SSL_CA"), NULL, NULL);

    }
    mysqli_real_connect($conn, getenv("AZURE_MYSQL_HOST"), getenv("AZURE_MYSQL_USERNAME"), getenv("AZURE_MYSQL_PASSWORD"), getenv("AZURE_MYSQL_DBNAME"), 3306, MYSQLI_CLIENT_SSL);

    $query = "UPDATE `tryst_info` SET tickverif=True WHERE c_mailId = '$email'" ;
    sendMail($name,$email,$mobile);
    mysqli_query($conn, $query) ;
    mysqli_close($conn);

    exit();
    
?>
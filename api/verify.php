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
    $conn = mysqli_connect('localhost','root','','tryst') or die('Connection Failed');
    // check if data is already present
    $query = "SELECT * FROM `tryst_info` WHERE (cmobile = '$mobile' or c_mailId = '$email')" ;
    $result = mysqli_query($conn, $query) ;
    if(mysqli_num_rows($result) > 0) {
        //check if c_attended is True
        $query = "SELECT * FROM `tryst_info` WHERE (cmobile = '$mobile' or c_mailId = '$email') and c_attended=True" ;
        $result = mysqli_query($conn, $query) ;
        if(mysqli_num_rows($result) > 0) {
            // send response with 200 status code
            response(201,"Already Verified",NULL);
            exit();
        }
        else{
            $query = "UPDATE `tryst_info` SET c_attended=True WHERE (cmobile = '$mobile' or c_mailId = '$email') and c_attended=False" ;
            $result = mysqli_query($conn, $query) ;
            // send response with 200 status code
    
            response(200,"Verified",NULL);
    
        }
        
        // update data

        
    }
    else{
        // send response with 404 status code
        response(404,"Invalid QR",NULL);

    }
    function response($status,$status_message,$data)
    {
        header("HTTP/1.1 ".$status);
    
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['data']=$data;
    
        $json_response = json_encode($response);
        echo $json_response;
    }
    function decryptData($data){
        // code to decrypt data
        $data = base64_decode($data);
        //separate data
        $data = explode(',',$data);

        return $data;
    }
    // close connection
    mysqli_close($conn);
?>
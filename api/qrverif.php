<?php
// create an api to send respon
// 
//
//
//
//

// start mysql connection
header("Content-Type:application/json");

require '../utils.php';
$env = parse_ini_file('../.env');
$conn = mysqli_init();
if($env["MYSQL_ATTR_SSL_CA"] != NULL){

    mysqli_ssl_set($conn,NULL,NULL, "../".$env["MYSQL_ATTR_SSL_CA"], NULL, NULL);
}

mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

if(!empty($_GET['data'])){
    $data = $_GET['data'];
    // decrypt data
    $data = decryptData($data);
    // fetch data from array
    $name = $data[0];
    $email = $data[1];
    $mobile = $data[2];

    // connect to database
    $query = "SELECT * FROM `tryst_info` WHERE (cmobile = '$mobile' or c_mailId = '$email')" ;
    $result = mysqli_query($conn, $query) ;
    if(mysqli_num_rows($result) > 0) {
        //check if c_aettendd is True

        $query = "SELECT * FROM `tryst_info` WHERE (cmobile = '$mobile' or c_mailId = '$email') and c_attended=True" ;
        $result = mysqli_query($conn, $query) ;
        if(mysqli_num_rows($result) > 0) {
            // send response with 200 status code

            response(201,"Already Verified",NULL);
        }
        else{
            $query = "UPDATE `tryst_info` SET c_attended=True WHERE (cmobile = '$mobile' or c_mailId = '$email')";
            $result = mysqli_query($conn, $query) ;
            // send response with 200 status code
            response(200,"Verified",NULL);
    
        }
        

        mysqli_close($conn);
        exit();
    }
    else{
        response(404,"Invalid Verification Link",NULL);
    }

}
else{
    response(404,"Invalid Verification Link",NULL);
}
function response($status,$status_message,$data)
{
    header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;

    exit();
}

?>
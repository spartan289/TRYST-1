<?php
// php get request set tickverif to true
if(isset($_GET['data'])){
    // send response with 404 status code
    $env = parse_ini_file('../.env');
$conn = mysqli_init();
$email = $_GET['data'];
echo $email;
if($env["MYSQL_ATTR_SSL_CA"] != NULL){
    mysqli_ssl_set($conn,NULL,NULL, "../".$env["MYSQL_ATTR_SSL_CA"], NULL, NULL);
}
mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

$query = "UPDATE `tryst_info` SET tickverif=1 WHERE c_mailId = '$email' and is_verified=1;" ;
$result = mysqli_query($conn, $query) ;
mysqli_close($conn);
echo "Submit";
}
else{
    echo "Not Submit";

}

?>
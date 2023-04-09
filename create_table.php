<?php
try {
    //code...
    $env = parse_ini_file('.env');

    $conn = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){
        mysqli_ssl_set($conn,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);

    }
    mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

    // //query truncate
    // $query = "TRUNCATE TABLE `tryst_info`";
    // mysqli_query($conn, $query) ;

    // show  data
    $query = "SELECT * FROM `tryst_info`";
    $result = mysqli_query($conn, $query) ;
    $row = mysqli_fetch_assoc($result);
  //print entire array
    print_r($row);





    $query = "COMMIT";
    mysqli_query($conn, $query) ;
    mysqli_close($conn);


} catch (\Throwable $th) {
    //throw $th
    echo $th;
}
    


?>
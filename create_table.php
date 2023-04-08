<?php
try {
    //code...
    $env = parse_ini_file('.env');

    $conn = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){
        mysqli_ssl_set($conn,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);

    }
    mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);


    $query = "ALTER TABLE `tryst_info` MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2 ;" ;
    mysqli_query($conn, $query) ;

    $query = "COMMIT";
    mysqli_query($conn, $query) ;



} catch (\Throwable $th) {
    //throw $th
    echo $th;
}
    


?>
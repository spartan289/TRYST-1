<?php
    // send table as json repsonse
    $env = parse_ini_file('../.env');
    $conn = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){
        mysqli_ssl_set($conn,NULL,NULL, "../".$env["MYSQL_ATTR_SSL_CA"], NULL, NULL);
    }
    mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);
    $query = "select * FROM `tryst_info`";
    $result = mysqli_query($conn, $query) ;
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($data);
    mysqli_close($conn);


?>
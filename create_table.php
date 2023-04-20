<?php
try {
    //code...
    $env = parse_ini_file('.env');

    $conn = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){
        mysqli_ssl_set($conn,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);

    }
    mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

    // $query = "TRUNCATE TABLE `tryst_info`";
    // $query="
    // ALTER TABLE `tryst_info`
    // MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
    // ";
    // mysqli_query($conn, $query) ;
//     ALTER TABLE `tryst_info`
//     ADD PRIMARY KEY (`index`);
//   ALTER TABLE `tryst_info`
//     MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
//   COMMIT;

    // show  data
    $query = "SELECT * FROM `tryst_info`";
    $result = mysqli_query($conn, $query) ;
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);





    $query = "COMMIT";
    mysqli_query($conn, $query) ;
    mysqli_close($conn);


} catch (\Throwable $th) {
    //throw $th
    echo $th;
}
    


?>
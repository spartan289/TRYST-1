<?php
try {
    //code...
    $con = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){
        mysqli_ssl_set($con,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);

    }
    mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

    $query = "CREATE TABLE `tryst_info` (
        `index` int(11) NOT NULL,
        `cname` varchar(200) NOT NULL,
        `cmobile` varchar(13) NOT NULL,
        `ccollege` varchar(200) NOT NULL,
        `cdate` timestamp NOT NULL DEFAULT current_timestamp(),
        `c_attended` tinyint(1) NOT NULL DEFAULT 0,
        `c_mailId` varchar(200) NOT NULL,
        `is_verified` tinyint(1) NOT NULL DEFAULT 0,
        `ad52ss` varchar(6500) NOT NULL,
        `tickverif` tinyint(1) NOT NULL DEFAULT 0
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='infor registration';";
    
    mysqli_query($conn, $query) ;

    $query = "ALTER TABLE `tryst_info`
        ADD PRIMARY KEY (`index`),
        ADD UNIQUE KEY `c_mailId` (`c_mailId`),
        ADD UNIQUE KEY `cmobile` (`cmobile`);";
    

    mysqli_query($conn, $query) ;
    
    $query = "ALTER TABLE `tryst_info`
    MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  COMMIT;";
      mysqli_query($conn, $query) ;


} catch (\Throwable $th) {
    //throw $th
    echo $th;
}
    


?>
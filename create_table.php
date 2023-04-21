<?php
try {
    //code...
    if (isset($_POST['submit'])) {

        $query = $_POST['query'];

            $env = parse_ini_file('.env');

            $conn = mysqli_init();
            if($env["MYSQL_ATTR_SSL_CA"] != NULL){
                mysqli_ssl_set($conn,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);
            }
            mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

            // show  data

            mysqli_query($conn, $query);
            
            // $query = "SHOW COLUMNS FROM `tryst_info`";
            // $result = mysqli_query($conn, $query) ;
            // $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // echo json_encode($data);



            $query = "COMMIT";
            mysqli_query($conn, $query) ;


            $query = "select * FROM `tryst_info`";
            $result = mysqli_query($conn, $query) ;
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($data);

            mysqli_close($conn);



        }
    } catch (\Throwable $th) {
        //throw $th
        echo $th;
}


    


?>
    <form action="create_table.php" method="post">
        <input type="textarea" name="query" placeholder="name">
        <input type="submit" name="submit" value="submit">
    </form>
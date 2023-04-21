<?php
try {
    //code...
    if (isset($_POST['submit'])) {

        $query = $_POST['query'];

            $env = parse_ini_file('.env');

<<<<<<< HEAD
            $conn = mysqli_init();
            if($env["MYSQL_ATTR_SSL_CA"] != NULL){
                mysqli_ssl_set($conn,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);

            }
            mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

            // show  data
            mysqli_query($conn, $query);
            
            $query = "SELECT * FROM `tryst_info`";
            $result = mysqli_query($conn, $query) ;
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($data);
=======
    // // // //query truncate
    // $query = "TRUNCATE TABLE `tryst_info`";
    // mysqli_query($conn, $query) ;

    // show  data
    $query = "SELECT * FROM `tryst_info`";
    $result = mysqli_query($conn, $query) ;
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);
>>>>>>> parent of ab5bebf (up1)





            $query = "COMMIT";
            mysqli_query($conn, $query) ;
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
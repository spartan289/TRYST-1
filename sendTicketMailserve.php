
<?php
        //start mysql connection


        require 'utils.php';
        $env = parse_ini_file('.env');
        $con = mysqli_init();
        if($env["MYSQL_ATTR_SSL_CA"] != NULL){
            mysqli_ssl_set($con,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);
    
        }
        mysqli_real_connect($con, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);
        
    

        $query = "SELECT * from `tryst_info` WHERE is_verified=True and tickverif=False";
        $result = mysqli_query($con,$query);

        // show result
        // create an array
        $res = array();

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $arr = array($row['cname'],$row['c_mailId'],$row['cmobile']);
                $res[] = $arr;
            }
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Mobile</th></tr>";
            
            $mail_link = 'https://localhost/TRYST-1/api/sendmail.php';
            foreach ($res as $row) {
                echo "<tr>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>". "<a href=".$mail_link."?data=" . encryptData($row[1],$row[2],$row[3]) . " target='_blank' '>Send Mail</a>" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        mysqli_close($con);
?>
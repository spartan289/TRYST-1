
<?php
        //start mysql connection


        require 'utils.php';
        $con = mysqli_init();
        if(getenv("MYSQL_ATTR_SSL_CA") != NULL){
            mysqli_ssl_set($con,NULL,NULL,getenv("MYSQL_ATTR_SSL_CA"), NULL, NULL);
    
        }
        mysqli_real_connect($conn, getenv("AZURE_MYSQL_HOST"), getenv("AZURE_MYSQL_USERNAME"), getenv("AZURE_MYSQL_PASSWORD"), getenv("AZURE_MYSQL_DBNAME"), 3306, MYSQLI_CLIENT_SSL);
            
    

        $query = "SELECT * from `tryst_info` WHERE is_verified=True and tickverif=False";
        $result = mysqli_query($con,$query);

        // show result
        // create an array
        $res = array();

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $arr = array($row['ad52ss'],$row['cname'],$row['c_mailId'],$row['cmobile']);
                $res[] = $arr;
            }
            echo "<table>";
            echo "<tr><th>photo</th><th>Name</th><th>Email</th><th>Mobile</th></tr>";
            
            $mail_link = 'https://tryst.azurewebsites.net/api/sendmail.php';
            foreach ($res as $row) {
                echo "<tr>";
                echo "<td><img src='" . $row[0] . "' height='200px' width='200px' /></td>";
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
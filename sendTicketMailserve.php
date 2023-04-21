
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
                $arr = array($row['ad52ss'],$row['cname'],$row['c_mailId'],$row['cmobile'],$row['ccollege'],$row['rollno'],$row['dob']);
                $res[] = $arr;
            }
            echo "<table>";
            echo "<tr><th>photo</th><th>Name</th><th>Email</th><th>Mobile</th><th>College Name</th><th> DOB</th></tr>";
            
            foreach ($res as $row) {
                $mail_link = 'https://tryst.azurewebsites.net/api/sendmail.php';
                
    
                echo "<tr>";
                echo "<td><img src='" . $row[0] . "' height='200px' width='200px' /></td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>". "<a href=".$mail_link."?data=" . encryptData($row[1],$row[2],$row[3]) ."&cname=".urlencode($row[4])."&dob=".urlencode($row[6])." target='_blank' '>Send Mail</a>" . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        mysqli_close($con);
?>
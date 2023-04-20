<?php
require_once 'vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;


require 'utils.php';



if (isset($_POST['submit'])) {
    session_start();

    $env = parse_ini_file('.env');
    $con = mysqli_init();
    if($env["MYSQL_ATTR_SSL_CA"] != NULL){
        mysqli_ssl_set($con,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);

    }
    mysqli_real_connect($con, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $college = $_POST['college'];


    $query = "SELECT * FROM `tryst_info` WHERE cmobile = '$mobile' or c_mailId = '$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // set message to registration.html
   
        $_SESSION['message'] = 'Mobile number or Email already registered';
        mysqli_close($con);

        header('location: /Register.php');
        exit();

    } else {
            //code...
            

            $query = "INSERT INTO `tryst_info` (cname, c_mailId , cmobile, ccollege) VALUES ('$uname', '$email', '$mobile', '$college')";
            sendVerificationMail($uname, $email, $mobile);

            mysqli_query($con, $query);
            $_SESSION['message'] = "Verification Mail has been sent verify to get Ticket Faster";
            mysqli_close($con);

            header('location: /');
            exit();

    }

}


function sendVerificationMail($name, $email, $mobile)
{
    require 'vendor/autoload.php';
    $verif_link = 'https://tryst.azurewebsites.net/api/verify.php?data=' . encryptData($name, $email, $mobile);

    $Body = "Dear Recipient,<br><br>

    Thank you for signing up for Tryst. We just need to verify your email address to complete the registration process. </br>
    To do so, please click on the following link for verification : ".$verif_link.".</br>
    
    We value your privacy and security and want to ensure that this email and verification </br>
    link are not misidentified as spam. Please add our email address to your contacts list and</br>
     mark this email as 'not spam' to ensure that you receive all future communications from us.</br>
    
    If you have any questions or concerns, please do not hesitate to contact us.</br>
     Thank you for choosing our service, and we look forward to serving you.</br></br>
    
    Best regards,</br>
    Tryst 2023</br>";
    // code to send mail
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'us2.smtp.mailhostbox.com	';
    $mail->SMTPAuth = true;
    // $mail->SMTPDebug = 2;
    $mail->Username = 'sagar@trystkmv.tech';
    $mail->Password = 'tzceevf9';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom('sagar@trystkmv.tech', 'Sagar');
    $mail->addAddress($email, $name);

    $mail->isHTML(true);
    $mail->Subject = 'Tryst`23 Verification Email';
    $mail->Body = $Body;

    if (!$mail->send()) {
    } else {
        //display error message
    }
}

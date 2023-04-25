<?php 
    // create a functions to send mail
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use Mailgun\Mailgun;


    function getQRCode($name,$email,$mobile){
        // code to generate QR code
        
        // fetch qr from goqr.com
        $url = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=';
        // encrypt data
        $data = encryptData($name,$email,$mobile);
        // send request to goqr.com
        $response = $url.$data;
        // save qr code
        // return qr code
        return $response;

    }
    function encryptData($name,$email,$mobile){
        // code to encrypt data
        $data = $name.",/|".$email.",/|".$mobile;
        $data = base64_encode($data);
        return $data;
    }

    function sendMail($name, $email, $mobile,$dob,$cname)
    {
        // code to send mail
        $mail = new PHPMailer;
        $mail->isSMTP();
        if(getenv('ENVIRONMENT') == 'production'){
            // $mail->Host = 'smtp.eu.mailgun.org';
            $mail->SMTPAuth = true;
            // $mail->SMTPDebug = 2;
            $mail->Host = 'smtp.eu.mailgun.org';
            $mail->Username = getenv('MAILGUN_USERNAME');
            $mail->Password = getenv('MAILGUN_PASSWORD');
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom(getenv('MAILGUN_USERNAME'), 'Admininstration Tryst');
    
        }
        else{
            // get .env file
            $envs = parse_ini_file('.envs');

            $mail->Host = 'us2.smtp.mailhostbox.com	';
            $mail->Username = $envs['C_EMAIL'];
            $mail->Password = $envs['C_PASS'];
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('admin@trystkmv2k23.tech', 'Admininstration Tryst');
        }
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = "Entrance Pass for Tryst'23";
        $qr = getQRCode($name, $email, $mobile);
        
        $mail->Body = "
        Dear ".$name." ,<br>

        Thank you for signing up for Tryst'23. We are pleased to attach your entrance pass for the event<br> that contains a unique QR code. The same QR code will be used for the entry to the event. 

        You are hereby requested to keep this pass readily available for the valid entry. A two step process will be followed for the entry: <br>
        1. Scanning of QR code to check whether the candidate has registered before or not. <br>
        2. A valid Identity proof, the same that you have uploaded on the website to register yourself. <br>
        Following points to be noted: <br>
        1. Entry is strictly restricted to preregistered students only once they show the valid QR code and ID proof. <br>
        2. This QR code is valid for single entry. This means that once you are inside the campus you cant go out and come back again. <br>
        3. Please ensure that the 'Name' and 'Date of birth' on your photo identification card matches the name on your entrance pass to avoid any inconvenience.
        <br>
        We encourage you familiarize yourself with the schedule of activities, as we are confident that you will have a great time. <br><br>

        Thank you for your interest in Tryst'23. We look forward to seeing you there. <br><br>

        Best regards, <br>
        Team Tryst <br><br>

        ----Recipient Details ----<br>
        Name : ".$name." <br>
        DoB :  ".$dob."  <br>
        College Name : ".$cname." <br>
        Phone number : ".$mobile."<br>
        <br>
        -----QR CODE ----<br>
        <img src='".$qr."' alt='QR Code'>
        ";
    
        if (!$mail->send()) {
            // echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false;
        } else {
            // echo 'Message has been sent';
            $env = parse_ini_file('.env');

            $conn = mysqli_init();
          
            if($env["MYSQL_ATTR_SSL_CA"] != NULL){
                mysqli_ssl_set($conn,NULL,NULL, $env["MYSQL_ATTR_SSL_CA"], NULL, NULL);
        
            }
        
            mysqli_real_connect($conn, $env["AZURE_MYSQL_HOST"], $env["AZURE_MYSQL_USERNAME"], $env["AZURE_MYSQL_PASSWORD"], $env["AZURE_MYSQL_DBNAME"], 3306, MYSQLI_CLIENT_SSL);

            $query = "UPDATE `tryst_info` SET tickverif=1 WHERE c_mailId = '$email' and is_verified=1;" ;
            $result = mysqli_query($conn, $query) ;
            mysqli_close($conn);
            return true;

        }
    }
    

    function decryptData($data){
        // code to decrypt data
        $data = base64_decode($data);
        //separate data
        $data = explode(",/|",$data);

        return $data;
    }
?>
<?php 
    // create a functions to send mail
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;

    function getQRCode($name,$email,$mobile){
        // code to generate QR code
        
        // fetch qr from goqr.com
        $url = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=';
        // encrypt data
        $data = encryptData($name,$email,$mobile);
        // send request to goqr.com
        $response = file_get_contents($url.$data);
        // save qr code
        file_put_contents('qr.png',$response);
        // return qr code
        return $response;

    }
    function encryptData($name,$email,$mobile){
        // code to encrypt data
        $data = $name.",/|".$email.",/|".$mobile;
        $data = base64_encode($data);
        return $data;
    }

    function sendMail($name, $email, $mobile)
    {
        // code to send mail
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'us2.smtp.mailhostbox.com';
        $mail->SMTPAuth = true;
        // $mail->SMTPDebug = 2;
        $mail->Username = 'sagar@trystkmv.tech';
        $mail->Password = 'tzceevf9';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('sagar@trystkmv.tech', 'Sagar');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Test Email';
        $mail->Body = 'This is a test email';
        $mail->AltBody = 'This is a test email';
    
        $qr = getQRCode($name, $email, $mobile);
        $mail->addStringAttachment($qr, 'qr.png');
    
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
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
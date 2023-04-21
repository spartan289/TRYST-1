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
<<<<<<< HEAD
        $mail->Subject = "Entrance Pass for Tryst'23";
        $mail->Body = "
        Dear ".$name.",<br><br>
        
        Thank you for signing up for Tryst'23. As a confirmation of your registration, we are pleased to attach your<br>
         entrance pass for the event in the form of a PNG file.<br><br>
        
        Your entrance pass contains a unique QR code that will be used to grant you access to the event. We kindly <br>
        request that you have this pass readily available<br>
        for presentation at the entrance. However, please note that in addition to the
         entrance pass, you will also need to present a valid form of identification to gain access to the event.

         <br><br>
         <img src='".$qr."' alt='QR Code' />
            <br><br>
        You may present a digital or physical identification card such as a passport, driver's license, or any government-issued ID.<br>
         Please ensure that the name on your <br>
        <br>identification card matches the name on your entrance pass to avoid any inconvenience.<br>
        
        We encourage you familiarize yourself with the schedule of activities, as we are confident that you will have a great time.<br>
        
        Thank you for your interest in Tryst'23. We look forward to seeing you there.<br>
        
        Best regards,<br>
        Team Tryst <br>       <img src='".$qr."' alt='QR Code' />

    

        ";
=======
        $mail->Subject = 'Test Email';
        $mail->Body = 'This is a test email';
        $mail->AltBody = 'This is a test email';
>>>>>>> parent of ab5bebf (up1)
    
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
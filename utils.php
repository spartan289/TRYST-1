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
       
        // return qr code
        return $url.$data;

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
        $qr = getQRCode($name, $email, $mobile);

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
        $mail->Subject = 'Tryst`23 Tickets';
        $mail->Body = "
        Dear Recipient,<br><br>

        Thank you for signing up for Tryst. Here is your ticket. <br>
        <img src='".$qr."' alt='QR Code' />

        
        We value your privacy and security and want to ensure that this email and verification <br>
        link are not misidentified as spam. Please add our email address to your contacts list and<br>
        mark this email as 'not spam' to ensure that you receive all future communications from us.<br>
        
        If you have any questions or concerns, please do not hesitate to contact us.<br>
        Thank you for choosing our service, and we look forward to serving you.<br><br>
        
        Best regards,<br>
        Tryst 2023<br>

        ";
    
    
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
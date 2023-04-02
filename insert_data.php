<?php
    session_start() ;
	use PHPMailer\PHPMailer\PHPMailer;
	require 'utils.php';
	
    function sendMail($name,$email,$mobile){
        require 'vendor/autoload.php';

        // code to send mail
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abc@outlook.com';
        $mail->Password = 'def';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('sagarpc2020@outlook.com', 'Sagar');
        $mail->addAddress($email, $name);
        
        $mail->isHTML(true);
        $mail->Subject = 'Test Email';
        $mail->Body = 'This is a test email';
        $mail->AltBody = 'This is a test email';

        $qr = getQRCode($name,$email,$mobile);
        $mail->addStringAttachment($qr, 'qr.png');

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

    }

    if(isset($_POST['submit'])) {
        $con = mysqli_connect('localhost', 'root', '', 'tryst') ;
        $uname = $_POST['uname'] ;
        $email = $_POST['email'] ;
        $mobile = $_POST['mobile'] ;
        $college = $_POST['college'] ;
        // check if 
        $query = "SELECT * FROM `tryst_info` WHERE cmobile = '$mobile' or c_mailId = '$email'" ;
        $result = mysqli_query($con, $query) ;
        if(mysqli_num_rows($result) > 0) {
            // set message to registration.html
			$_SESSION['message'] = 'Mobile number or Email already registered' ;
			header('location: registration.php') ;
			exit();
        }
		else{
			$query = "INSERT INTO `tryst_info` (cname, c_mailId , cmobile, ccollege) VALUES ('$uname', '$email', '$mobile', '$college')";

			mysqli_query($con, $query) ;
			sendVerificationMail($uname,$email,$mobile);


			$_SESSION['message'] = 'Registration successful ! Email With Ticket is Sent to your Email ID' ;
			header('location: ind.php') ;
		}

    }
    function sendVerificationMail($name,$email,$mobile){
        require 'vendor/autoload.php';
        $verif_link = 'http://localhost/TRYST-1/api/verify.php?data='.encryptData($name,$email,$mobile);

        $verif_mail = ' <h1>Verification Email</h1> <br> <p>Click on the link to verify your email</p> <br> <a href="'.$verif_link.'">Click here to verify your email</a>';
        // code to send mail
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sagarpc2020@outlook.com';
        $mail->Password = 'Sagar@9398';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('sagarpc2020@outlook.com', 'Sagar');
        $mail->addAddress($email, $name);
        
        $mail->isHTML(true);
        $mail->Subject = 'Verification Email';
        $mail->Body = $verif_mail;
        $mail->AltBody = 'This is a verification email';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }



            
    }    
?>

<?php
require_once 'vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

require 'utils.php';


session_start();

echo "hello";
if (isset($_POST['submit'])) {
    header('location: Register.php');
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
    // check if 
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $newFileName = $uname . "." . $imageFileType;
    $newFilePath = $target_dir . $newFileName;
    $blobName = $newFileName;
    $file = $_FILES['fileToUpload'];



    $query = "SELECT * FROM `tryst_info` WHERE cmobile = '$mobile' or c_mailId = '$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        // set message to registration.html
        $_SESSION['message'] = 'Mobile number or Email already registered';
        header('location: Register.php');
        exit();
    } else {
        try {
            //code...
            $_SESSION['message'] = "Verification Mail has been sent verify to get Ticket Faster";
            header('location: index.php');
            
            $surl = getImageURL($file);
            sendVerificationMail($uname, $email, $mobile);

            $query = "INSERT INTO `tryst_info` (cname, c_mailId , cmobile, ccollege, ad52ss) VALUES ('$uname', '$email', '$mobile', '$college','$surl')";
    
            mysqli_query($con, $query);

    
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            // header('location: Register.php');
        }
    }
    mysqli_close($con);

}
function getImageURL($file)
{

    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        $fileName = $file["name"];
        compressImage($file['tmp_name'], $file['tmp_name']);
        $connectionstring = 'DefaultEndpointsProtocol=https;AccountName=trystfiles;AccountKey=MxKyREoHTpL0VuARPUtZs5bB/ncjy7jJT7abC26DlbbYGS8tEBJpwA2/UIGu+np9sXHakgml/78C+AStTClZaA==;EndpointSuffix=core.windows.net';
        // send file to azure storage via curl
        $blobClient = BlobRestProxy::createBlobService($connectionstring);

        // Upload the file to Azure Blob Storage
        $fileContent = fopen($file['tmp_name'], "r");
        $containerName = "screenshots";
        $blobOptions = new CreateBlockBlobOptions();
        $blobOptions->setContentType($file['type']);
        //   $blobOptions->setContentLength($file['size']);
        $blobClient->createBlockBlob($containerName, $fileName, $fileContent, $blobOptions);

        // get file url
        $blobClient->getBlob($containerName, $fileName);
        $blobUrl = $blobClient->getBlobUrl($containerName, $fileName);
        return $blobUrl;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        return null;
    }
}
function compressImage($source, $destination)
{
    // Get image info 
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // Create a new image from file 
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }

    // Save image 
    imagejpeg($image, $destination);

    // Return compressed image 
    return $destination;
}

function sendVerificationMail($name, $email, $mobile)
{
    require 'vendor/autoload.php';
    $verif_link = 'https://tryst.azurewebsites.net/api/verify.php?data=' . encryptData($name, $email, $mobile);

    $verif_mail = ' <h1>Verification Email</h1> <br> <p>Click on the link to verify your email</p> <br> <a href="' . $verif_link . '">Click here to verify your email</a>';
    // code to send mail
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 2;
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

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}

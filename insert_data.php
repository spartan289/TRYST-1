<?php
require_once 'vendor/autoload.php';


use PHPMailer\PHPMailer\PHPMailer;

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;

require 'utils.php';
session_start();
if (isset($_POST['submit'])) {


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
    $rollno = $_POST['rollno'];
    $dob = $_POST['dob'];
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
        mysqli_close($con);

        header('location: /Register.php');
        exit();

    } else {
            //code...
            try{
                $surl = getImageURL($file);
                if($surl == NULL){
                    $_SESSION['message'] = 'Error in uploading image';
                    mysqli_close($con);
                    header('location: /Register.php');
                    exit();
                }

            }
            catch(Exception $e){
                $_SESSION['message'] = 'Error in uploading image';
                mysqli_close($con);
                header('location: /Register.php');
                exit();
            }

            $query = "INSERT INTO `tryst_info` (cname, c_mailId , cmobile, ccollege, ad52ss,rollno,dob,is_verified,tickverif) VALUES ('$uname', '$email', '$mobile', '$college','$surl','$rollno','$dob','1','0')";

            sendMail($uname, $email, $mobile, $dob, $college);
            mysqli_query($con, $query);
            $_SESSION['message'] = "Tickets has been sent to your mail ID";
            mysqli_close($con);
            header('location: /');
            exit();

    }

}
function getImageURL($file)
{
    // check if image file is a actual image or other extension

    


    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
        $fileName = $file["name"];
        compressImage($file['tmp_name'], $file['tmp_name']);
        $connectionstring = 'DefaultEndpointsProtocol=https;AccountName=tryststorage;AccountKey=WDRomwEvqkcfQ0IAnIk7rsAHwgcBfxC/L1UpTgEvHtSSXurGGBHjaxcr+ySjjjrUnjh/aWtDomL/+ASt85ZfvQ==;EndpointSuffix=core.windows.net';
        // send file to azure storage via curl
        $blobClient = BlobRestProxy::createBlobService($connectionstring);

        // Upload the file to Azure Blob Storage
        $fileContent = fopen($file['tmp_name'], "r");
        $containerName = "blobtr";
        $blobOptions = new CreateBlockBlobOptions();
        $blobOptions->setContentType($file['type']);
        //   $blobOptions->setContentLength($file['size']);
        $blobClient->createBlockBlob($containerName, $fileName, $fileContent, $blobOptions);

        // get file url
        $blobClient->getBlob($containerName, $fileName);
        $blobUrl = $blobClient->getBlobUrl($containerName, $fileName);
        return $blobUrl;
    } else {
        // echo "File is not an image.";
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

    $Body = "Dear Recipient,<br><br>

    Thank you for signing up for Tryst. We just need to verify your email address to complete the registration process. <br>
    To do so, please click on the following link for verification : ".$verif_link.".<br>
    
    We value your privacy and security and want to ensure that this email and verification <br>
    link are not misidentified as spam. Please add our email address to your contacts list and<br>
     mark this email as 'not spam' to ensure that you receive all future communications from us.<br>
    
    If you have any questions or concerns, please do not hesitate to contact us.<br>
     Thank you for choosing our service, and we look forward to serving you.<br><br>
    
    Best regards,<br>
    Tryst 2023<br>";
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

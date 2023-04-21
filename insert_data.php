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
            
            $surl = getImageURL($file);

            $query = "INSERT INTO `tryst_info` (cname, c_mailId , cmobile, ccollege, ad52ss) VALUES ('$uname', '$email', '$mobile', '$college','$surl')";
            sendVerificationMail($uname, $email, $mobile);

            mysqli_query($con, $query);
            $_SESSION['message'] = "Tickets has been sent to your mail ID";
            mysqli_close($con);
            header('location: /');
            exit();

    }

}
function getImageURL($file)
{

    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
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


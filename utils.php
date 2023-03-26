<?php 
    // create a functions to send mail
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
        $data = $name.",/|".$email."/|".$mobile;
        $data = base64_encode($data);
        return $data;
    }

    function decryptData($data){
        // code to decrypt data
        $data = base64_decode($data);
        //separate data
        $data = explode(',',$data);

        return $data;
    }
?>
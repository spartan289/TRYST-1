<?php
    session_start() ;
    
    $con = mysqli_connect('localhost', 'root', '', 'tryst') ;

    $email = $_POST['email'] ;
    $sql = "SELECT uname FROM registraion WHERE email = '$email'" ;
    
    $result = mysqli_query($con, $sql) ;
    if($result) {
        $row = mysqli_fetch_assoc($result) ;
        $_SESSION['auth'] = true ;
        
        $_SESSION['username'] = $row['uname'] ;
        $_SESSION['usermail'] = $email ;

       header('location: index.php') ;
       exit(0) ;
    }
?>
<?php
require_once('auth.php');
require_once('MainClass.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $register = json_decode($class->register());
    if($register->status == 'success'){
        $_SESSION['flashdata']['type']='success';
        $_SESSION['flashdata']['msg'] = ' Account has been registered successfully.';
        echo "<script>location.href = './login_verification.php';</script>";
        exit;
    }else{
        echo "<script>console.error(".json_encode($register).");</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with OTP</title>
    <link rel="stylesheet" href="./Font-Awesome-master/css/all.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./Font-Awesome-master/js/all.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        html,body{
            height:100%;
            width:100%;
        }
        main{
            height:calc(100%);
            width:calc(100%);
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
        .form-wrapper {
          margin: 10rem auto;
          max-width: 30rem;
        }
        .wrapper{
            text-align: center;
        }
        button {
            margin:auto;
            display:block;
            background-color: #c2a38b;
            border: none;
            color: white;
            padding: 10px;
            width: 80%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 20px;
            align-items: center;
        }
    </style>
</head>
<body style=" background-color:#b17081;">
    <main>
       <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 mb-4">
        </div>
       <div class="col-lg-3 col-md-8 col-sm-12 col-xs-12" style="border-radius: 25px;">
           <div class="card shadow rounded-5" >
                       <h1 class="text-center" style="color: black;">Welcome</h1>

            <span class="login100-form-title p-b-48" style="text-align : center;">
                        <img class="login-logo" height = "130px" width = "130px" src="images/logo2.png">
                    </span>
               <div class="card-header py-1">
                   <h4 class="card-title text-center">Create an Account</h4>
               </div>
               <div class="card-body py-4">
                   <div class="container-fluid">
                       <form action="./registration.php" method="POST">
                       <?php 
                            if(isset($_SESSION['flashdata'])):
                        ?>
                        <div class="dynamic_alert alert alert-<?php echo $_SESSION['flashdata']['type'] ?> my-2 rounded-0">
                            <div class="d-flex align-items-center">
                                <div class="col-11"><?php echo $_SESSION['flashdata']['msg'] ?></div>
                                <div class="col-1 text-end">
                                    <div class="float-end"><a href="javascript:void(0)" class="text-dark text-decoration-none" onclick="$(this).closest('.dynamic_alert').hide('slow').remove()">x</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php unset($_SESSION['flashdata']) ?>
                        <?php endif; ?>
                            <div class="form-group">
                               <label for="firstname" class="label-control">First Name</label>
                               <input type="text" name="firstname" id="firstname" class="form-control rounded-0" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" autofocus required>
                            </div>
                            <div class="form-group">
                               <label for="middlename" class="label-control">Middle Name</label>
                               <input type="text" name="middlename" id="middlename" class="form-control rounded-0" value="<?= isset($_POST['middlename']) ? $_POST['middlename'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                               <label for="lastname" class="label-control">Last Name</label>
                               <input type="text" name="lastname" id="lastname" class="form-control rounded-0" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required>
                            </div>
                           <div class="form-group">
                               <label for="email" class="label-control">Email</label>
                               <input type="email" name="email" id="email" class="form-control rounded-0" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                            </div>
                           <div class="form-group">
                               <label for="password" class="label-control">Password</label>
                               <input type="password" name="password" id="password" class="form-control rounded-0" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required>
                               <span class="input-group-addon" role="button" title="veiw password" id="passBtn">
                                  <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="clear-fix mb-4"></div>
                            <div class="wrapper">
                                <button >Create Account</button>
                            </div>

                       </form>
                   </div>
               </div>
           </div>
       </div>
    </main>
    <script type="text/javascript">
        const PassBtn = document.querySelector('#passBtn');
        PassBtn.addEventListener('click', () => {
        const input = document.querySelector('#password');
        input.getAttribute('type') === 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password');

        if (input.getAttribute('type') === 'text'){
            PassBtn.innerHTML = '<i class="fa fa-eye-slash"></i>';
        } 
        else{
        PassBtn.innerHTML = '<i class="fa fa-eye fa-fw" aria-hidden="true"></i>';
        }

});
    </script>
</body>
</html>
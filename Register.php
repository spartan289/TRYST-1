<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/logo1.png" />
  <title>TRYST'23-Register</title>
  <link rel="stylesheet" href="css/from.css">
  <link rel="stylesheet" href="css/common.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="background-image: url('images/logobg.png'); background-repeat: no-repeat; background-size:cover; background-position: center center; min-width: 100%; min-height: 100%;">
  <nav class="position" role="navigation">
    <!-- new -->
    <div id="menuToggle">
      <!--
            A fake / hidden checkbox is used as click reciever,
            so you can use the :checked selector on it.
            -->
      <input type="checkbox" />
      <span></span>
      <span></span>
      <span></span>
      <!--
            Too bad the menu has to be inside of the button
            but hey, it's pure CSS magic.
          -->
      <ul id="menu">
        <a href="index.php">
          <li>Home</li>
        </a>
        <a href="Main_Events.html">
          <li>Events</li>
        </a>
        <!-- <a href="Sponsor.html">
          <li>Sponsors</li>
        </a> -->
        <a class="action" href="Register.php">
          <li>Register</li>
        </a>
        <a href="team.html">
          <li>Contact Us</li>
        </a>
        <a href="Aboutus.html">
          <li>About Us</li>
        </a>
      </ul>
    </div>
    <a href="index.php"><label class="logo"> TRYST'23</a>
    </label>
    <ul class="options">
      <li><a href="index.php">Home </a> </li>
      <li><a href="Main_Events.html">Events</a> </li>
      <!-- <li><a href="Sponsor.html">Sponsors</a> </li> -->
      <li><a class="active" href="Register.php">Register</a> </li>
      <li><a href="team.html">Contact Us</a> </li>
      <li><a href="Aboutus.html">About Us </a> </li>
    </ul>

  </nav>

  <!-- <div id="process" class="process">
    <div>
      <div class="CTR">
        <span id="HD">Registration</span>
      </div>
    </div>
    <div class="step">
      <h1> <b> Step-1 : </b></h1>
      Scan the following QR to download the "Adda 52" app and register yourself on the app. <br><br>

      <img id="QR" src="images/QR_AddA52.jpg">
      ♠♠♠ or tap <a href="https://adda52.onelink.me/gdWi/ejm19vlx?af_qr=true" target="_blank" style="color: blue;">here</a> to downlaod the app ♠♠♠
    </div>
    <div class="step">
      <h1> <b> Step 2: </b></h1>
      Take a screenshot of your profile page which should comprise of your 'user id'.<br>
    </div>
    <div class="step">
      <h1> <b> Step 3:</b> </h1>
      Click on 'Continue' and fill in your details on the next page. <br>
    </div>
    <div class="note">
      (<i> <b>Note </b> </i> : Entry Tickets will be sent to you as soon as we check the uploaded screenshot. This
      process may take a couple of minutes :)<br>
    </div>
    <div class="CTR">
      <span id="HD">
        <button class="bt" onclick="viewform()"> Continue</button>
      </span>
    </div>
  </div> -->







<div id="regform">
    <div class="container">
      <div class="title">Registration</div>
      <div class="content">
        <h3> A Verification Mail will be sent to email id</h3>
        <form action="insert_data.php" name="trystform" method="post" enctype="multipart/form-data" onsubmit="validate()">

          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" placeholder="Enter your name" name="uname" required>
            </div>
            <div class="input-box">
              <span class="details">College Name</span>
              <input type="text" placeholder="Enter College Name" name="college" required>
            </div>
            <div class="input-box">
              <span class="details">College Roll Number</span>
              <input type="text" placeholder="Enter your college roll no." name="rollno" required>
            </div>
            <div class="input-box">
              <span class="details">Mobile Number</span>
              <input type="text" placeholder="Enter Mobile Number" name="mobile" required>
            </div>
            <div class="input-box">
              <span class="details">Email Id</span>
              <input type="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="input-box">
              <span class="details">Date of Birth</span>
              <input type="date" name="dob" max="2008-04-15" required>
            </div>
            <!-- <div class="inpimg"> -->
            <div class="input-box">
              <span class="details">Photo ID card</span>
              <input id="file-input" type="file" name="fileToUpload" required/>
              <span class="details" id="file-result">max size 400kb</span>
            </div>
            <!-- </div> -->
            <div class="note">
              <p class="details">You must upload a identification card which can be a aadhaar card, driver's license,
                or any government-issued ID, The details entered by an individual should match with the details as in
                the photo identification card.</p>
            </div>
          </div>
          <div class="button">
            <input id="file-submit" type="submit" name="submit" value="Register">
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="footer" style="position: relative;" id="foot">
    <div class="b" style="display: flex;">
      <div id="adrs">
        KESHAV MAHAVIDYALAYA <br> (University of Delhi)<br>H-4-5 Zone, Pitampura,<br> Near Sainik Vihar,
        Delhi-110034 <br>
      </div>
    </div>
    <div class="a">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14000.250902147813!2d77.1202477!3d28.6877702!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d03c34fb126e3%3A0xb857945e72aca18!2sKeshav%20Mahavidyalaya!5e0!3m2!1sen!2sin!4v1680190395920!5m2!1sen!2sin"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="c">
      For any queries contact us at :
      <div>
        <div class="email">
          <img src="https://cdn-icons-png.flaticon.com/128/732/732200.png" alt="">
          <a href="tryst.2k23@gmail.com"><span>tryst.2k23@gmail.com</span> </a>
        </div>
      </div>
    </div>
  </footer>
  <?php
 if(isset($_SESSION['message'])){
  //alert message
  echo "<script>alert('".$_SESSION['message']."');</script>";

  unset($_SESSION['message']);
} ?>
  <script src="js/main2.js"></script>
</body>

</html>

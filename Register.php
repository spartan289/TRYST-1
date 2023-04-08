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
<canvas id="canvas"></canvas>

<body
  style="background-image: url('images/!logo.png'); background-repeat: no-repeat; background-size:cover; background-position: center center; min-width: 100%; min-height: 100%;">
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
        <a href="frontpage.html">
          <li>Home</li>
        </a>
        <a href="Main_Events.html">
          <li>Events</li>
        </a>
        <a href="Sponsor.html">
          <li>Sponsors</li>
        </a>
        <a class="action" href="Register.html">
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
    <a href="frontpage.html"><label class="logo"> TRYST'23</a>
    </label>
    <ul class="options">
      <li><a href="frontpage.html">Home </a> </li>
      <li><a href="Main_Events.html">Events</a> </li>
      <li><a href="Sponsor.html">Sponsors</a> </li>
      <li><a class="active" href="Register.html">Register</a> </li>
      <li><a href="team.html">Contact Us</a> </li>
      <li><a href="Aboutus.html">About Us </a> </li>
    </ul>

  </nav>

  <div id="process" class="process">
    <div>
      <div class="CTR">
        <span id="HD">Registration Process</span>
      </div>
    </div>
    <div class="step">
      <h1> <b> Step-1 : </b></h1>
      Scan the following QR to download the "Adda 52" app and register yourself on the app. <br><br>

      <img id="QR" src="images/QR_AddA52.jpg">
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
  </div>







  <div id="regform">
    <div class="container">
      <div class="title">Registration</div>
      <div class="content">
        <form action="insert_data.php" method="post" enctype="multipart/form-data">
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
              <span class="details">Mobile Number</span>
              <input type="text" placeholder="Enter Mobile Number" name="mobile" required>
            </div>
            <div class="input-box">
              <span class="details">Email Id</span>
              <input type="email" placeholder="Enter your name" name="email" required>
            </div>
            <div class="inpimg">
              <span class="details">Adda52 profile ScreenShot</span>
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
          </div>
          <div class="button">
            <input type="submit" name="submit" value="Register">
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
      <span>Follow US!</span>
      <ul class="ftlist">
        <a href="" target="_blank"><img
            src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Twitter_colored_svg-128.png" alt=""></a>
        <a href="" target="_blank"><img
            src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Linkedin_unofficial_colored_svg-128.png"
            alt=""></a>
        <a href="" target="_blank"><img
            src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Instagram_colored_svg_1-128.png"
            alt=""></a>
        <a href="" target="_blank"><img
            src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Facebook_colored_svg_copy-128.png"
            alt=""></a>
      </ul>
      <div>
        For any queries contact us at :
        <div class="email">
          <a href="" target="_blank"><img src="https://cdn-icons-png.flaticon.com/128/732/732200.png" alt=""></a>
          <span>trystOC@gmail.com</span>

        </div>
      </div>
    </div>
  </footer>

  <script src="js/main2.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="images/logo1.png" />
  <link rel="stylesheet" href="css/styleRK.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/styleSG.css">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js"> </script>
  <title> TRYST'23 </title>
</head>

<body class="main">

  <?php
    // check if a session message is present
    session_start();
    // unset($_SESSION['message']);

    
  if(isset($_SESSION['message'])){
    // pop up the message
    echo "<script>alert('".$_SESSION['message']."');</script>";
    unset($_SESSION['message']);
  }
  ?>
  <div class="head"
    style="background-image: url('images/logobg.png'); background-repeat: no-repeat; background-size:cover; background-position: center center; min-width: 100%; min-height: 100%;">
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
          <a class="active" href="index.php">
            <li>Home</li>
          </a>
          <a href="Main_Events.html">
            <li>Events</li>
          </a>
          <a href="Sponsor.html">
            <li>Sponsors</li>
          </a>
          <a href="Register.php">
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
        <li><a class="active" href="index.php">Home </a> </li>
        <li><a href="Main_Events.html">Events</a> </li>
        <li><a href="Sponsor.html">Sponsors</a> </li>
        <li><a href="Register.php">Register</a> </li>
        <li><a href="team.html">Contact Us</a> </li>
        <li><a href="Aboutus.html">About Us </a> </li>
      </ul>

    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>

  <div class="Events">
    <!-- <div class="Events" style="background-image: url('images/event_bg.svg'); background-repeat: no-repeat; background-size:cover; background-position: center center; min-width: 100%; min-height: 100%;" > -->
    <div class="container px-5 py-24 mx-auto">
      <h1 class="position heading2">EVENTS
      </h1>
      <div class="flex flex-wrap -m-4">
        <div class="lg:w-1/3 sm:w-1/2 p-14">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full  object-cover object-center"
              src="images/event/anhad.jpeg">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100"
              id="position">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">BATTLE OF BANDS </h1>
              <p class="leading-relaxed">It's an opportunity for musicians to experiment with their
                    instruments and create new sounds and push the boundaries of traditional
                    music and explore new genres. </p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-14">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full  object-cover object-center"
              src="images\event\mostrar.png">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">MOSTRAR</h1>
              <p class="leading-relaxed ">  From black and white classics to modern cutting-edge works, the exhibition promises to be
                    a visual feast for the eyes.</p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-14">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full object-cover object-center "
              src="images/event/envinceF.jpeg">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">EVINCE: FASHION SHOW</h1>
              <p class="leading-relaxed ">A platform for participants to tell a story through fashion,
                     creatively crafted by their teams, and manifested through confidence, design. </p>
            </div>
          </div>
        </div>
        
        <div class="lg:w-1/3 sm:w-1/2 p-14">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full  object-cover object-center"
              src="images\event\Nrityang.png">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3"> UTHAAN</h1>
              <p class="leading-relaxed"> dance competition ,a stage to the dancers to showcase their skills and 
                provides a unique opportunity to witness the beauty and athleticism of western dance.</p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-14">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full  object-cover object-center"
              src="images\event\advaiitaa .png">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">ADVAITAA</h1>
              <p class="leading-relaxed"> celebrates the art of dance in various western styles such as hip hop,
                    jazz, or contemporary.Get set to unleash your inner talent in tyrst'23.</p>
            </div>
          </div>
        </div>     
        <div class="lg:w-1/3 sm:w-1/2 p-14">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full  object-cover object-center"
              src="images\event\vagmita.jpg">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">IRSHAAD</h1>
              <p class="leading-relaxed">a platform for poets to showcase their talent and express themselves in front
                 of an enthusiastic audience and celebrate the beauty of the languages.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="Main_Events.html"> <button style="padding: 5px; border: solid rgb(140, 133, 135); 
      margin: auto; display: block;font-size: 40px; color: #df9f2f;" class="position"> ALL EVENTS </button></a>
    <br><br><br>
  </div>

  <div class="Sponsors"
    style="background-image: url('images/event_bg.png'); background-repeat: no-repeat; background-size:cover; background-position: center center; min-width: 100%; min-height: 100%;">
    <h1 class="position heading2"> SPONSORS
    </h1>
    <div class="wrapper">
      <div class="slider">
        <div class="slide-track">
          <!-- Img Code -->
          <div class="slide">
            <img src="images/sponsors/delhiuniversityofficial.jpg">
          </div>
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <div class="slide">
            <img src="images/sponsors/du_dtu_nsut_igdtuw_festas_2023.jpg" />
          </div>
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <div class="slide">
            <img src="images/sponsors/du_india.jpg" />
          </div>
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <div class="slide">
            <img src="images/sponsors/du_online_campus.jpg" />
          </div>
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <div class="slide">
          <img src="images/sponsors/Duadda.jpg" />
          </div>
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
          <div class="slide">
            <img src="images/sponsors/duconnection.jpg" />
          </div>
          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;

        </div>
      </div>
    </div>

    <a href="Sponsor.html"> <button style="padding: 5px; border: solid rgb(140, 133, 135); 
    margin:auto;display: block;font-size: 40px; color: #df9f2f;" class="position"> ALL SPONSORS </button></a>
    <br>
    <br>
    <br>


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
  </div>
  <script src="js/main2.js"></script>
</body>

</html>
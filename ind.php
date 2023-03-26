<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/styleSG.css">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <style>
    nav {
      font-family: verdana;
      font-size: 900px;
    }
  </style>
  <title> TRYST'23 </title>

</head>

<body
  style="background-image: url('tryst_bg.png');	background-repeat: no-repeat; background-size: cover; height: 100%;">
  check if a session message is present
  <?php
  // check if a session message is present
  session_start();

  
  if(isset($_SESSION['message'])){
    // pop up the message
    echo "<script>alert('".$_SESSION['message']."');</script>";


    unset($_SESSION['message']);
  }
  ?>
  <header class="text-gray-60 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
          stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full"
          viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">TRYST'23</span>
      </a>
      <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
        <a href="" class="mr-5 hover:text-violet-900">About </a>
        <a href="" class="mr-5 hover:text-violet-900">Events</a>
        <a href="" class="mr-5 hover:text-violet-900">Sponsors</a>
        <a href="" class="mr-5 hover:text-violet-900">Contact Us </a>
      </nav>
      <button class="inline-flex items-center bg-blue-100 border-0 py-1 px-3 focus:outline-none
           hover:bg-red-200 rounded text-base mt-4 md:mt-0">REGISTER NOW
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </button>
    </div>
  </header>
  <h3 style="text-align: center ;font-size: 100px; font-family:harrington; color: rgb(132, 196, 80);">We are back with
  </h3>
  <h1 style="text-align: center;font-size: 100px;font-family: magneto; color: rgb(151, 59, 99)">TRYST '23</h1>

  <section class="text-black-600 body-font" style="background-image: linear-gradient
      (to top left,#396561,#37797f); background-repeat: no-repeat;">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 style="font-size: 80px; font-family:Franklin; color:rgb(241, 163, 75)">UPCOMING EVENTS</h1>

      </div>
      <div class="flex flex-wrap -m-4">
        <div class="lg:w-1/3 sm:w-1/2 p-4">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
              src="https://dummyimage.com/600x360">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Shooting Stars</h1>
              <p class="leading-relaxed">Get set to unleash your inner talent and fle your expertise in tyrst'23. </p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
              src="https://dummyimage.com/601x361">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h2 class="tracking-widest text-sm title-font font-medium text-green-500 mb-1">THE SUBTITLE</h2>
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The Catalyzer</h1>
              <p class="leading-relaxed"> Get set to unleash your inner talent and fle your expertise in tyrst'23.</p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
              src="https://dummyimage.com/603x363">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h2 class="tracking-widest text-sm title-font font-medium text-green-500 mb-1">THE SUBTITLE</h2>
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The 400 Blows</h1>
              <p class="leading-relaxed">Get set to unleash your inner talent and fle your expertise in tyrst'23. </p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
              src="https://dummyimage.com/602x362">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Neptune</h1>
              <p class="leading-relaxed"> Get set to unleash your inner talent and fle your expertise in tyrst'23.</p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
              src="https://dummyimage.com/605x365">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Holden Caulfield</h1>
              <p class="leading-relaxed"> Get set to unleash your inner talent and fle your expertise in tyrst'23.</p>
            </div>
          </div>
        </div>
        <div class="lg:w-1/3 sm:w-1/2 p-4">
          <div class="flex relative">
            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center"
              src="https://dummyimage.com/606x366">
            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
              <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Alper Kamu</h1>
              <p class="leading-relaxed"> Get set to unleash your inner talent and fle your expertise in tyrst'23.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div>
    <h1 style="font-family: Algerian; font-size: 100px; text-align: center; color: rgba(22, 204, 195, 0.559);"> SPONSORS
    </h1>
    <div class="wrapper">
      <div class="slider">
        <div class="slide-track">
          <!-- Img Code -->
          <div class="slide">
            <img src="img/deolite.png" />
          </div>

          <div class="slide">
            <img src="img/duclub.png" />
          </div>

          <div class="slide">
            <img src="img/colegevidya.png" />
          </div>

          <div class="slide">
            <img src="img/coke.png" />
          </div>

          <div class="slide">
            <img src="img/ibm.png" />
          </div>

          <div class="slide">
            <img src="img/insta.png" />
          </div>

          <div class="slide">
            <img src="img/Flash.png" />
          </div>

          <div class="slide">
            <img src="img/collegebuddy.png" />
          </div>

          <div class="slide">
            <img src="img/codingninjas.png" />
          </div>

          <div class="slide">
            <img src="img/edutech.png" />
          </div>

        </div>
      </div>
    </div>

    <a href=""> <button style="padding: 10px; border: solid rgb(140, 133, 135); 
  margin:auto;display: block;font-size: 40px; color: #e7e2ec; "> ALL SPONSORS </button></a>
  </div>

  <footer class="footer">
    <div class="col-1">
      <h3> USEFUL LINKS</h3>
      <a href="">About</a>
      <a href="#">Events</a>
      <a href="#">Sponsors</a>
      <a href="#">Contact</a>
    </div>

    <div class="col-2">
      <h3> ADDRESS </h3>
      KESHAV MAHAVIDYALAYA <br> (University of Delhi)
      <br>H-4-5 Zone, Pitampura,<br> Near Sainik Vihar, Delhi-110034 <br>
    </div>

    <div class="col-3">
      <h3>SOCIAL MEDIA HANDLES</h3>
      <a href="https://twitter.com" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
      <a href="" target="_blank"><ion-icon name="logo-linkedin"></ion-icon></a>
      <a href="" target="_blank"><ion-icon name="logo-youtube"></ion-icon></a>
      <a href="" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a>


    </div>

  </footer>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
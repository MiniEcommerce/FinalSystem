<?php
require_once 'controllers/authController.php';

if(!isset($_SESSION['id']))
{
    header('location: login.php');
    exit();
}
// Verify the user using token
if(isset($_GET['token'])){
    $token = $_GET['token'];
    verifyUser($token);
}
if($_SESSION['verified'] == 0)
{
  header('location: verification.php');
  exit();
}

?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!--Import Google Icon Font-->
      <link href="css/icons.css">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body style="background-color: black;">

<!--NAVIGATION BAR-->

  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper black">
        <a href="#!" class="brand-logo"><img src="IMG/Logo.png" width="60" height="60" class="img fluid"></a>
        <a href="#!" class="brand-logo center">GAME KIOSK</a>
        <ul class="right hide-on-med-and-down">
        <ul class="right hide-on-med-and-down">
         <li><a href="#homepage">Home</a></li>
         <li><a href="#products">Products</a></li>
         <li><a href="#about">About</a></li>
        <li><a href="FRONT.php?Logout=1">Log-out</a></li>
        </ul>
      </div>
    </nav>
  </div>

<!--Carousel Effect-->

  <div class="carousel carousel-slider" id = "homepage">
    <a class="carousel-item" href="#one!"><img src="IMG/carl-raw-m3hn2Kn5Bns-unsplash.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="IMG/ben-neale-zpxKdH_xNSI-unsplash.jpg"></a>
    <a class="carousel-item" href="#three!"><img src="IMG/carl-raw-8Gdayy2Lhi0-unsplash.jpg"></a>
  </div><br>

<!--Products-->
 
  <div class="Products" id="products">
    <h2>Products</h2>
  </div>

<div class="row">
  <div class="col-md-8 offset-md-4">
      <div class="row row-cols-1 row-cols-md-4">  
      <!--CODMW-->
          <div class="col m4">
            <div class="card h-100 grey darken-3">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="IMG/CODMWF.png">
                <span class="card-title">Call Of Duty: Modern Warefare</span> <!--DATABASE-->
              </div>
              <div class="card-content yellow-text text-yellow lighten-2"> 
                <p>P3,000.00</p>
              </div>
                <div class="card-reveal grey darken-3">
                    <span class="card-title yellow-text text-yellow lighten-2">Call Of Duty: Modern Warefare<i class="material-icons right">X</i></span>
                      <p>Call of Duty: Modern Warfare is a 2019 first-person shooter video game developed by Infinity Ward and published by Activision. Serving as the sixteenth overall installment in the Call of Duty series, as well as a reboot of the Modern Warfare sub-series, it was released on October 25, 2019, for Microsoft Windows, PlayStation 4, and Xbox One.</p>
                      <div class="quantity yellow-text text-yellow lighten-2">
                          <p>Quantity</p>
                          <input type="number" class="white-text text-white" min="1" max="9" step="1" value="1">
                          <button class="btn waves-effect waves-light" type="submit" name="action">Buy
                                <i class="material-icons right"></i>
                        </button>
                      </div>
                    </div>
                </div>
            </div>

      <!--FFVII-->

          <div class="col m4">
            <div class="card h-100 grey darken-3">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="IMG/ff7r-cover.jpg">
                <span class="black-text text-black card-title">Final Fantasy VII (Remake)</span>
              </div>
              <div class="card-content yellow-text text-yellow lighten-2">
                <p>P7,000.00</p>
              </div>
                <div class="card-reveal grey darken-3">
                    <span class="card-title yellow-text text-yellow lighten-2">Final Fantasy VII (Remake)<i class="material-icons right">X</i></span>
                      <p>Developer:  Square Enix Business Division 1</p>
                      <p>Publisher:    Square Enix</p>
                      <p>Directors: Tetsuya Nomura, Naoki Hamaguchi, Motomu Toriyama</p>
                      <p>Composers: Masashi Hamauzu, Mitsuto Suzuki, Nobuo Uematsu</p>
                      <p>Series:  Final Fantasy</p>
                      <p>Engine:  Unreal Engine 4</p>
                      <p>Platforms: PlayStation 4</p>
                      <p>Release: April 10, 2020/p>
                      <p>Genre:  Action role-playing</p>
                      <p>Modes: Single-player</p>
                      <p>Final Fantasy VII Remake is a 2020 action role-playing game developed and published by Square Enix. It is the first in a planned series of games remaking the 1997 PlayStation game Final Fantasy VII. Set in the dystopian cyberpunk metropolis of Midgar, players control mercenary Cloud Strife. He joins AVALANCHE, an eco-terrorist group trying to stop the powerful megacorporation Shinra from using the planet's life essence as an energy source. The gameplay combines real-time action with strategic and role-playing elements.</p>
                      <div class="quantity yellow-text text-yellow lighten-2">
                          <p>Quantity</p>
                          <input type="number" class="white-text text-white" min="1" max="9" step="1" value="1">
                          <button class="btn waves-effect waves-light" type="submit" name="action">Buy
                                <i class="material-icons right"></i>
                        </button>
                      </div>
                    </div>
                </div>
            </div>

      <!--TEKKEN-->

          <div class="col m4">
            <div class="card h-100 grey darken-3">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="IMG/TEKKEN.jpg">
                <span class="card-title">Tekken 7</span>
              </div>
              <div class="card-content yellow-text text-yellow lighten-2">
                <p>P3,000.00</p>
              </div>
                <div class="card-reveal grey darken-3">
                    <span class="card-title yellow-text text-yellow lighten-2">Tekken 7<i class="material-icons right">X</i></span>
                      <p>Developer: Bandai Namco Studios</p>
                      <p>Publisher: Bandai Namco Entertainment</p>
                      <p>Directors: Katsuhiro Harada, Yuichi Yonemori, Kouhei Ikeda</p>
                      <p>Composers: Rio Hamamoto, Taku Inoue, Akitaka Tohyama</p>
                      <p>Series:  Tekken</p>
                      <p>Engine:  Unreal Engine 4</p>
                      <p>Platforms:  Arcade, Microsoft Windows, PlayStation 4, Xbox One</p>
                      <p>Release: WW: March 18, 2015 WW: July 5, 2016 (FR) JP: February 13, 2019 (FR:Round2), PS4, Windows, Xbox One WW: June 2, 2017</p>
                      <p>Genre: Fighting</p>
                      <p>Modes: Single-player, multiplayer</p>
                      <p>Tekken 7 (鉄拳7) is a fighting game developed and published by Bandai Namco Entertainment. It is the ninth overall installment in the Tekken series. Tekken 7 had a limited arcade release in March 2015. An updated arcade version, Tekken 7: Fated Retribution, was released in July 2016, and features expanded content including new stages, costumes, items and characters. The home versions released for PlayStation 4, Xbox One and Microsoft Windows in June 2017 were based on Fated Retribution.</p>
                      <div class="quantity yellow-text text-yellow lighten-2">
                          <p>Quantity</p>
                          <input type="number" class="white-text text-white" min="1" max="9" step="1" value="1">
                          <button class="btn waves-effect waves-light" type="submit" name="action">Buy
                                <i class="material-icons right"></i>
                        </button>
                      </div>
                    </div>
                </div>
            </div>

  </div>
</div>

<!--ABOUT-->
  <div class="row about">
    <div class="container-fluid">
    
      <div class="col">
        <img src="IMG/zhan-zhang-6gS4AwmKKDg-unsplash.jpg" alt="" width="470" height="500">
      </div>

      <div class="col description" id = "about">
        <h1>About Game Kiosk</h1>
        <p>Game Kiosk is a Mini e-commerce system designed 
           for Playstation 4 games. To give you an insite of what an e-commerce 
           is, according to investopedia 
            "E-commerce, which can be conducted over computers, 
            tablets, or smartphones may be thought of like a 
            digital version of mail-order catalog shopping. 
            Nearly every imaginable product and service is 
            available through e-commerce transactions, 
            including books, music, plane tickets, and 
            financial services such as stock investing and 
            online banking. As such, it is considered a very 
            disruptive technology." Game kiosk, however, as mentioned
            the main product are Playstation 4 games. This system is
            created by 3 Diploma in Information Communication
            Technology students from Polytechnic University of the
            Philippines Taguig branch as a Final project for
            Integrative Programming.
        </p>
      </div>
    </div>
    
  </div><br>
<!--/ABOUT-->

<!--TEAM-->
  <div class="footertext">
    <h2>About The Team</h2>
    <p>Our team is composed of 4 members. 3 programmers and a designer. All students from PUPT DICT 2-1 A.Y. 2020-2021 students</p>
  </div><br>

  <div class="row footer">
    <div class="col s3">
      <h3>Joshua Concepcion</h3>
      <p>Programmer</p>
    </div>
    <div class="col s3">
      <h3>Rey Vincent Dolz</h3>
      <p>Programmer</p>
    </div>
    <div class="col s3">
      <h3>Muhammad Said</h3>
      <p>Programmer</p>
    </div>
    <div class="col s3">
      <h3>Eudes Augustine Silerio</h3>
      <p>Designer</p>
    </div>
  </div>
<!--TEAM-->

<!-- footer -->
  <div class="copyrights">
    <p>2021 by Game Kiosk. A project in Integrative Programming</p>
  </div>

      <!--JavaScript at end of body for optimized loading-->

      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script> 
              $(document).ready(function(){
              $('.sidenav').sidenav();
              });
              $('.carousel.carousel-slider').carousel({
              fullWidth: true,
             indicators: true
             });
      </script>

      <!--Inline CSS-->
      <style type="text/css">

        html {
          scroll-behavior: smooth;
        }

        .Products > h2 {
          color: white;
          text-align: center;
        }
        .card-reveal > p{
          color: white;
        }
         .description > p {
          color: white;
          text-align: justify;
          padding: 10px;
          width: 500px;
          height: 150px;
        }
        .description > h1 {
          margin-top: 150px;
          color: white;
          text-align: justify;
        } 
        .col, .description {
          align-items: center;
          margin-top: 50px;
          margin-left: 10%;
        }

        .footertext > h2 {
          color: white;
          margin-top: 50px;
          text-align: center;
        }
        .footertext > p {
          color: white;
          text-align: center;
        }

        .footer {
          background-color: gray;
          height: auto;
        }

        .footer > .col {
          margin-top: 20px;
          text-align: center;
          color: white;
        }

        .copyrights > p {
          color: white;
          text-align: center;
        }
      
      </style>
    </body>
  </html>
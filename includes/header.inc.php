<!doctype html>
<!--  
 * ********************* * 
 * Dawn Baker            *
 * Intro PHP             *
 * Assignment 1          *
 * for Steve George      *
 * ********************* *
--> 
<html lang="en">
  <head>
    <title>Honey...We're Home home page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Caveat:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/honey_were_home_desktop.css" media="screen" type="text/css" /> 
    <link rel="stylesheet" href="styles/honey_were_home_mobile.css" media="screen and (max-width: 767px)" type="text/css" />
    <link rel="stylesheet" href="styles/honey_were_home_print.css" media="print" type="text/css" />
      <style>
      /*  main content  */
  
    </style>
    <!--[if ie 8]>
      <script src="old_ie.js"></script>
      <style type="text/css">
        header,
        nav, 
        section,
        footer{
        display: block;
        font-family: Arial, sans-serif;
        font-size: 1em;
      }
      nav ul{
        list-style-type: none;
        }
      nav ul li a,
      .footer_nav ul li a{
          text-decoration: none;
          margin: 10px;
          padding: 1px;
          font-size: 1em;
          color: #000;
        }
      </style>      
    <![endif]-->

  </head> 

  <body>
  <!--[if ie]><br>
      <div id="ie_warning">This page will not display properly in IE8 or lower, Please update your browser</div><br>
    <![endif] -->
<!--    wrapper contains all content -->
    <div id="wrapper" class="boxshadow">
<!--    contains everything in the header -->
      <header>
        <div class="header_container">
          <div id="logo">
            <picture>
              <source media="(min-width: 768px)" srcset="images/main_logo150x170.png" />
                <source media="(min-width: 767px)" srcset="images/main_logo_half.png 1x, images/main_logo150x170.png 2x" />
                <img src="images/main_logo150x170.png" width="150" height="170" alt="Honey I'm Home Logo" />  
            </picture>
          </div>
          <h1 class="title_text">Honey...We're Home</h1>
          <nav id="main_nav">
            <ul>
              <li class="curved_borders"><a class="active" href="index.php">Home</a></li>
              <li class="curved_borders"><a class="active" href="about.php">About</a></li>
              <li class="curved_borders"><a class="active" href="areas.php">Areas</a></li>
              <li class="curved_borders"><a class="active" href="more.php">More</a></li>
              <li class="curved_borders"><a class="active" href="contact.php">Contact</a></li>
            </ul>
          </nav>
        </div>
      </header> 
<!--      end of header container -->
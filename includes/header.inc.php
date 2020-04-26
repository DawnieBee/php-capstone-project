<?php

/* 
 * Dawn Baker            
 * Intro PHP             
 * Assignment 2          
 */

require __DIR__ . '/../config.php';
?>

<!doctype html>

<html lang="en">
<head>
    <title><?=$title?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Caveat:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/honey_were_home_desktop.css" media="screen" type="text/css" /> 
    <link rel="stylesheet" href="styles/honey_were_home_mobile.css" media="screen and (max-width: 767px)" type="text/css" />
    <link rel="stylesheet" href="styles/honey_were_home_print.css" media="print" type="text/css" />
    <!-- style for you are here page indicators -->
    <style>
        a.current{
            background: #ff0;
            color: #000;
            padding: 5px;
            font-weight: bold;
        }

    </style>
    <?php if($title == "About Us") : ?>
    <style>
      section{
        min-height: 450px;
        width: 100%;
      }
      section h1, h2, h3, p{
        margin: 10px 20px 5px 20px;
        line-height: 1.4em;
      }
      .floated{
        float: right;
        margin: 30px 20px 15px 20px;
      }
    </style>
    <?php endif; ?>  
    <!-- end about style -->

    <?php if($title == "Areas") : ?>
    <style>      
      h2{
        text-align: center;
      } 
      /* main container for the boxes */
      #container{
        margin-top: 20px;
        margin-bottom: 30px;
      }
      .box{
        display: block;
        position: relative;
        width: 600px;
        left: 20px;
        margin-bottom: 20px;
      }
    </style>
    <?php endif; ?>
    <!-- end areas style -->

    <?php if($title == "Community Services") : ?>
    <style>
      section{
        min-height: 450px;
      }
      h2, h3, p{
        padding: 20px;
        margin: 0 auto;
      }
    </style>
    <?php endif; ?>
    <!-- end more style -->

    <!-- style content for contact page -->
    <?php if($title == "Contact Us") : ?>
    <style>
      
      /*  main content  */
      
      h2, h3, address, p{
        padding: 20px;
        margin: 0 auto; 
      }
      #form_container{
        position: relative;
        padding: 20px;
      }
      form legend{
        background-color: #333;
        color: #ff0;
        width: 130px;
        text-align: left;
        padding: 6px;
        border: 1px solid #333;
        border-radius: 15px;
        box-shadow: 0 1px 1px rgba(0,0,0,.6);
      }
      form label{
        clear: both;
        width: 130px;
        display: block;
        float: left;
      }
      form fieldset{
        width: 500px;
        border: 1px solid #333;
        margin-bottom: 20px;
        font-size: 0.9em;
        border-radius: 15px;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="tel"]{
        border: 1px solid #000;
        width: 200px;
        background-color: #fff;
        font-size: 1.1em;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        box-shadow: inset 1px 1px 2px rgba(0,0,0,.5);
      }
      datalist{
        float: left;
        display: none;
      }
      form input:hover{
        background-color: #ffb;
        box-shadow: 0 0 6px #ccc;
      } 
    </style> 
    <?php endif; ?>
    <!-- end more style -->
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
          <h1 class="title_text"><?=$title?></h1>
          <nav id="main_nav">
              <?php require __DIR__ . '/nav.inc.php'; ?>
          </nav>
        </div>
      </header> 
<!--      end of header container -->
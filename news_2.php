<!DOCTYPE html>
<!--
Template Name: Academic Education V2
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<?php
session_start();
?>
<head>
<title>Library | News</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <!-- ################################################################################################ -->
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Contact Us</a></li>
        <?php
        if (!isset($_SESSION["users_id"])) {
          # code...
          echo "<li><a href='log-in.php'>Member Login</a></li>";
        echo "<li><a href='log-in.php'>Staff Login</a></li>";
        }
        else {
          # code...
          echo "<li><a href='log-out.php'>Logout</a></li>";

        }
        
        ?>
      </ul>
    </nav>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php">Hong Kong Children's Library</a></h1>
      <p>The only limit is your imagination</p>
    </div>

    <!-- ################################################################################################ --> 
  </header>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li><a href="index.php">Home</a></li>
        <li><a class="drop" href="#">Books</a>
          <ul>
            <li><a href="gallery.php">Find Books</a></li>
            <li><a href="whats-new.php">What's New</a></li>
            <li><a href="log-in.php">Return Books</a></li>
            
          </ul>
        </li>
        <li ><a class="drop" href="#">Members</a>
            <ul><?php
            if (!isset($_SESSION["users_id"])) {
              # code...
              echo "<li class='active'><a href='#''>Log in</a></li>
            <li><a class='drop' href='#''>Not Member Yet</a>
              <ul>
                <li><a href='sign-up.php'>Sign up</a></li>
                <li><a href='#''>Find Out More</a></li>
              </ul>
            </li>";
            }
            else {
              # code...
              echo "<li><a href='log-out.php'>Logout</a></li>";

            }
            
            ?></ul>
        </li>
        <li><a href="events.php">Events</a></li>
        <li  class="active"><a href="#">News</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="location.php">Location</a></li>
        <li><a href="about.php">About</a></li>
      </ul>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="sidebar one_quarter first"> 
        <!-- ################################################################################################ -->
        <h6>News</h6>
        <nav class="sdb_holder">
          <ul>
            <li><a href="news.php">News</a></li>
          </ul>
        </nav>

        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="three_quarter"> 
        <!-- ################################################################################################ -->
        <h1 style = "font-size: 20px; color: black; font-weight: bold;">Resources for Children with Autism Available
          <p style = "font-size: 13px; font-weight: normal;"><time datetime="2045-04-06T08:15+00:00">Friday, 15<sup>th</sup> November 2017</time></p>
        </h1>
        <p>We’re committed to making our Library locations warm and engaging spaces for children on the autism spectrum.</p>
        <img class="imgr borderedbox" src="https://www.chipublib.org/wp-content/uploads/sites/3/2016/10/rocking-bowl.jpg" alt="">
        <p style = "color: black; font-size: 18px; font-weight: black;">Resources</p>
        <ul>
          <li><strong>Rocking bowl</strong>: Each HCL location has a rocking bowl for children to use. A rocking bowl is large enough for a child to sit inside and get comforting sensory stimulation by rocking or spinning.</li>
          <li><strong>Steffy Play Cubes</strong>: In the coming months, we’re adding Steffy Play Cubes at some locations. Children with sensory needs can use these play cubes to build a fort and create a quieter experience in the library.</li>
          <li><strong>Steffy Play Cubes</strong>: In the coming months, we’re adding Steffy Play Cubes at some locations. Children with sensory needs can use these play cubes to build a fort and create a quieter experience in the library.</li>
          <li><strong>
          Meeting rooms</strong>: Does your family need a quieter space? Book a meeting room or study room online, or ask if one is available during your visit.</li>
          <li><strong>
          Autism Reads for Kids and Parents</strong>: We recommend informational books and stories about kids with autism.</li>
        </ul>

        <p style = "color: black; font-size: 18px; font-weight: black;">Upcoming Events</p>
        <ul>
          <li><strong>Sensory Story Times</strong>: These fun, highly interactive events build literacy skills and engage the senses with books, songs and play. These special story times for kids up to age 12 and their families are designed to work for kids with special needs.</li>
          <li><strong>Special events</strong>: We are going to have our first Autism Hero Day at Hong Kong Library Center later this year. For more information about special events, call Children's Services at (852) 111-1234.</li>
        </ul>

        <p style = "color: black; font-size: 18px; font-weight: black;">Helpful Website</p>
        <ul>
          <li><a href ="http://www.autismpartnership.com.hk/en/" style = "text-decoration: none;">Autism Partnership</a>: TAP offers information about autism as well as tips for families and caregivers, including guides to introducing children to community resources such as libraries.</li>
        </ul>
         
        <p class="more" style="text-align: right; font-size: 15px; font-weight: bold;"><a href="news.php">Back to list &raquo;</a></p>
        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
      <!-- ################################################################################################ -->
      <div class="one_third first">
        <figure class="center"><img class="btmspace-15" src="../images/demo/worldmap.png" alt="">
          <figcaption><a href="#">Find Us With Google Maps &raquo;</a></figcaption>
        </figure>
      </div>
      <div class="one_third">
        <address>
        Hong Kong Polytechnic University<br>
        11 Yuk Choi Rd<br>
        Hung Hom<br>
        Postcode<br>
        <br>
        <i class="fa fa-phone pright-10"></i> 852 1234-1234<br>
        <i class="fa fa-envelope-o pright-10"></i> <a href="#">contact@domain.com</a>
        </address>
      </div>
      <div class="one_third">
        <p class="nospace btmspace-10">Stay Up to Date With What's Happening</p>
        <ul class="faico clear">
          <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="faicon-flickr" href="#"><i class="fa fa-flickr"></i></a></li>
          <li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
        <form class="clear" method="post" action="#">
          <fieldset>
            <legend>Subscribe To Our Newsletter:</legend>
            <input type="text" value="" placeholder="Enter Email Here&hellip;">
            <button class="fa fa-sign-in" type="submit" title="Sign Up"><em>Sign Up</em></button>
          </fieldset>
        </form>
      </div>
      <!-- ################################################################################################ --> 
    </footer>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left" style = "color: white;">Copyright &copy; 2017 - All Rights Reserved - <a href="#"  style = "color: white;">Savage</a></p>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="../layout/scripts/jquery.min.js"></script> 
<script src="../layout/scripts/jquery.fitvids.min.js"></script> 
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
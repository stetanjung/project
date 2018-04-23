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
<title>Library | Events</title>
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
          echo "<li><a href='log-in.php'>Log in</a></li>
            <li><a class='drop' href='#'>Not Member Yet</a>
              <ul>
                <li><a href='sign-up.php'>Sign up</a></li>
              </ul>
            </li>";
            }
            else {
              # code...
              echo "<li><a href='member-page.php'>Member Page</a></li><li><a href='member-update.php'>Update Info</a></li><li><a href='log-out.php'>Logout</a></li>";

        }
        
        ?>
      </ul>
        </li>
        <li class="active"><a href="#">Events</a></li>
        <li><a href="news.php">News</a></li>
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
        <h6>Events</h6>
        <nav class="sdb_holder">
          <ul>
            <li><a href="events.php">Events</a></li>
          </ul>
          <ul>
            <li><a href="past_events.php">Past Events</a></li>
          </ul>
        </nav>
        
        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="three_quarter" style="height: 700px"> 
        <!-- ################################################################################################ -->
        <h1>Current Events</h1>
        
        <div id="gallery">
        <figure>

          <ul class="nospace clear">
            <li class="one_quarter first"><a class="nlb" data-lightbox-gallery="gallery1" href="http://198.46.81.182/~townse12/sites/default/files/Books%20and%20Blocks%20Storytime%202017.jpg" title="Display Text 1"><img class="borderedbox" src="http://198.46.81.182/~townse12/sites/default/files/Books%20and%20Blocks%20Storytime%202017.jpg" alt=""></a><p style = "color: black;">Books and Blocks Story Time</p></li>
            <li class="one_quarter"><a class="nlb" data-lightbox-gallery="gallery1" href="http://198.46.81.182/~townse12/sites/default/files/Lego%20Club%202017_0.jpg"><img class="borderedbox" src="http://198.46.81.182/~townse12/sites/default/files/Lego%20Club%202017_0.jpg" alt=""></a><p style = "color: black;">Lego Club</p></li>
            <li class="one_quarter"><a class="nlb" data-lightbox-gallery="gallery1" href="http://198.46.81.182/~townse12/sites/default/files/Science%20time%20Nov%202017%20poster.jpg" title="Display Text 3"><img class="borderedbox" src="http://198.46.81.182/~townse12/sites/default/files/Science%20time%20Nov%202017%20poster.jpg" alt=""></a><p style = "color: black;">Science Time</p></li>
            <li class="one_quarter"><a class="nlb" data-lightbox-gallery="gallery1" href="https://i1.wp.com/www.kidsburgh.org/wp-content/uploads/2017/04/Storytime.jpg?fit=712%2C950&ssl=1" title="Display Text 3"><img class="borderedbox" src="https://i1.wp.com/www.kidsburgh.org/wp-content/uploads/2017/04/Storytime.jpg?fit=712%2C950&ssl=1" alt=""></a><p style = "color: black;">Tuesday & Thursday StoryTime</p></li> 
           
          </ul>
   
        </figure>
      </div>
        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- / main body -->

      <nav class="pagination">
        <ul>
         <!-- <li><a href="#">&laquo; Previous</a></li> -->
          <li class="current"><strong>1</strong></li>
          <!--<li><a href="#">2</a></li>
          <li><a href="#">Next &raquo;</a></li>-->
        </ul>
        </nav>
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
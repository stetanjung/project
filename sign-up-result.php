
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
<title>Library | Signup</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="sign-up/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="sign-up/demo.css" media="all" />
<!-- / Demo styling - remove before use -->
<style type="text/css">
.container .group{text-align:center;}
.container .group div{padding:8px 0; font-size:16px; font-family:Verdana, Geneva, sans-serif;}
.container .group div:nth-child(odd){color:#FFFFFF; background:#CCCCCC;}
.container .group div:nth-child(even){color:#FFFFFF; background:#979797;}
@media screen and (min-width:180px) and (max-width:900px) {
  .container .group div{margin-bottom:0;}
}
</style>
<!-- / Demo styling -->
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
    <div class="fl_right">
      <form class="clear" method="post" action="#">
        <fieldset>
          <legend>Search:</legend>
          <input type="text" value="" placeholder="Search Here">
          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>
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
            <?php
            if(isset($_SESSION['users_id'])){
            echo "<li><a href='member-page.php'>Return Books</a></li>";}
            else{
              echo "<li><a href='log-in.php'>Return Books</a></li>";}
            ?>
            
          </ul>
        </li>
        <li class="active"><a class="drop" href="#">Members</a>
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
            
            ?></ul>
        </li>
        <li><a href="events.php">Events</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="location.php">Location</a></li>
        <li><a href="#">About</a></li>
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
    
      <div class="clear">
         

        <?php

          include "connection.php";
          $child_FN = $_POST['first_name'];
          $child_LN = $_POST['last_name'];
          $child_username = $_POST['username'];
          $child_password = $_POST['password'];
          $child_dob = $_POST['date_of_birth'];
          $parent_FN = $_POST['parent_FN'];
          $parent_LN = $_POST['parent_LN'];
          $parent_phone = $_POST['phone'];
          $parent_email = $_POST['email'];

          $num_parent = 100000;
          $num_user = 1000000;

          $user_id = 0;
          $parent_id = 0;

          $max_user = mysqli_fetch_array(mysqli_query($con, "select max(users_id) as max_user_id from users"), MYSQLI_ASSOC);
          $max_parent = mysqli_fetch_array(mysqli_query($con, "select max(parents_id) as max_parent_id from parents"), MYSQLI_ASSOC);

          $user_id = substr($num_user + $max_user['max_user_id'] + 1, -6);
          $parent_id = substr($num_parent + $max_parent['max_parent_id'] + 1, -5);
          $child_password=md5($child_password);
          $exist_user = mysqli_fetch_array(mysqli_query($con, "select users_id from users where username = '$child_username' and password = '$child_password' and first_name = '$child_FN' and last_name = '$child_LN' and date_of_birth = '$child_dob'"));

          $exist_parent = mysqli_fetch_array(mysqli_query($con, "select parents_id from parents where first_name = '$parent_FN' and last_name = '$parent_LN' and phone_number = '$parent_phone' and email = '$parent_email'"));

          if($exist_parent == null){
            mysqli_query($con, "insert into parents (parents_id, first_name, last_name, phone_number, email) values ('$parent_id', '$parent_FN', '$parent_LN', '$parent_phone', '$parent_email')");
          }
          else{
            $parent_id = $exist_parent['parents_id'];
          }
          if($exist_user == null){
            mysqli_query($con, "insert into users (users_id, first_name, last_name, username, password, date_of_birth, parents_id) values ('$user_id', '$child_FN', '$child_LN', '$child_username', '$child_password', '$child_dob', '$parent_id')");
            echo "<p>You have created an account</p> <p><a href='member-page.php'>Go to member page</a></p>";
          }else{
            echo "<p>You account is not created.</p>";
          }
          $_SESSION['users_id']=$user_id;
          echo $con->error;
        ?>






        
        

      </div>
    </main>
  </div>
</div>


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
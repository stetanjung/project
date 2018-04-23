<?php
session_start();
?>
<!DOCTYPE html>
<!--
Template Name: Academic Education V2
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Library | Update Profile</title>
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
              echo "<li><a href='log-in.php.php'>Return Books</a></li>";}
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
              echo "<li><a href='member-page.php'>Member Page</a></li><li class='active'><a href='member-update.php'>Update Info</a></li><li><a href='log-out.php'>Logout</a></li>";

            }
            
            ?></ul>
        </li>
        <li><a href="events.php">Events</a></li>
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
    
      <div class="clear">
         <figure>
          <header class="heading">Update Member Info</header></figure>
          <div class="group">
            </figure>
            <div class="one_half first" style="background-color: white">
              <header class="heading" style="color: black">My Info</header>
              

              <div class="container" style="background-color: white">
                <div  class="forma" style="background-color: white">
                  <form id="contactform" action="member-update-result.php" method="POST">
                  <?php
                  include("connection.php");
                  $users_id=$_SESSION['users_id'];
                  $query_users=mysqli_query($con,"SELECT * FROM users WHERE users_id='$users_id'");
                  $users=mysqli_fetch_array($query_users);
                  $query_parents=mysqli_query($con,"SELECT * FROM parents WHERE parents_id='$users[parents_id]'");
                  $parents=mysqli_fetch_array($query_parents);
                  $password=md5($users['password']);
                  echo "
                    <p class='contact'><label for='name' style='float: left;'>First name</label></br></br></p> 
                    <input id='name' name='first_name' placeholder='First name' value='$users[first_name]' tabindex='1' type='text'> 
                    <p class='contact'><label for='name' style='float: left;'>Last name</label></br></br></p> 
                    <input id='name' name='last_name' placeholder='Last name' value='$users[last_name]' tabindex='1' type='text'> 
                    
                      <p class='contact'><label for='email' style='float: left;'>Birthday</label></br></br></p> 
                    <input id='email' name='date_of_birth' placeholder='DD/MM/YYYY' value='$users[date_of_birth]' type='date'> 
                   
                      <p class='contact'><label for='username' style='float: left;'>Username</label></p> 
                    <input id='username' name='username' placeholder='username' value='$users[username]' tabindex='2' type='text'> 
                    <p class='contact'><label for='password' style='float: left;'>Password</label></p> 
                    <input type='text' id='password' name='password' value='$users[password]' placeholder='password'> 
                           
                          ";
                          ?>
                       <br>
                         
                    
                   </div>      
                 </div>
              






              </div>
             <div class="one_half" style="background-color: white">
               <header class="heading" style="color: black">Parent Contact</header>



                <div class="container" style="background-color: white">
                <div  class="forma" style="background-color: white">
                    <?php
                    echo "
                    <p class='contact'><label for='name' style='float: left;'>First name</label></br></br></p> 
                    <input id='name' name='parent_FN' placeholder='First name' value='$parents[first_name]' tabindex='1' type='text'> 
                    <p class='contact'><label for='name' style='float: left;'>Last name</label></br></br></p> 
                    <input id='name' name='parent_LN' placeholder='Last name' value='$parents[last_name]' tabindex='1' type='text'> 
                    

                    <p class='contact'><label for='phone' style='float: left;'>Mobile phone</label></br></br></p> 
                      <input id='phone' name='phone' placeholder='phone number' value='$parents[phone_number]' type='text'>
                           <p class='contact'><label for='email' style='float: left;'>Email</label></br></br></p>   
                    <input id='email' name='email' placeholder='example@domain.com' value='$parents[email]' type='email'> 
                    <input type='hidden' name='users_id' value='$users_id'>
                    ";
                    ?>
                       <br>
                    <input class="buttom" name="submit" id="submit" value="Update!" type="submit" style="float: right;">
                    </form>
                  
                    
                   </div>      
                 </div>





             </div>
           </div>
          
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
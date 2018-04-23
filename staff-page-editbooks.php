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
<title>Library | Staff</title>
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
        <li><a href="#">News</a></li>
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
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="sidebar one_quarter first"> 
        <!-- ################################################################################################ -->
        <h6>Manage</h6>
        <nav class="sdb_holder">
          <ul>
            <li><a href="staff-page.php">Page</a></li>
            <li class="active"><a href="#">Manage Books</a>
              <ul>
                <li><a href="staff-page-addbooks.php">Add books</a></li>
                <li class="active"><a href="#">Search/Edit books</a></li>
              </ul>
            </li>
            <li class="active"><a href="statistic.php">Statistics</a></li>
          </ul>
        </nav>
   
        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="three_quarter"> 
        <!-- ################################################################################################ -->
        <h1>Search/Edit Books</h1>
      <?php
      $users_id=$_SESSION['users_id'];
      ?></br>
      





        
        <form method="POST" action="staff-page-editbooks-result.php">

        <?php

        if(!empty($_POST['edit']))
        {
          include("connection.php");
        ?>

          <table>
            <tr>
              <td>Title</td>
              <td>Year</td>
              <td>Author's first name</td>
              <td>Author's last name</td>
            </tr>
            <tr></tr>
        <?php
          $i=0;
          $edit=array();
          //$edit contains an array of books_id that wants to be edited.
          foreach($_POST['edit'] as $edit[$i]){
            $query=mysqli_query($con,"SELECT * FROM books WHERE books_id=$edit[$i]");
            $fetch=mysqli_fetch_array($query,MYSQLI_ASSOC);

            $author_query=mysqli_query($con,"SELECT first_name,last_name FROM authors WHERE authors_id=$fetch[authors_id]");
            $author=mysqli_fetch_array($author_query,MYSQLI_ASSOC);
            $first_name=$author["first_name"];
            $last_name=$author["last_name"];

            $publisher_query=mysqli_query($con,"SELECT publisher_name FROM publishers WHERE publishers_id=$fetch[publishers_id]");
            $publisher=mysqli_fetch_array($publisher_query,MYSQLI_ASSOC);
            $publisher_name=$publisher["publisher_name"];

            $languages_query=mysqli_query($con,"SELECT languages_name FROM languages WHERE languages_id=$fetch[languages_id]");
            $language=mysqli_fetch_array($languages_query,MYSQLI_ASSOC);
            $languages_name=$language["languages_name"];

            $genres_query=mysqli_query($con,"SELECT genre_name FROM genres WHERE genres_id=$fetch[genres_id]");
            $genre=mysqli_fetch_array($genres_query,MYSQLI_ASSOC);
            $genres_name=$genre["genre_name"];
            echo "
              <tr>
                <td><input type='text' name='title[$i]' value='$fetch[title]'></td>
                <td><input type='text' name='year[$i]' value='$fetch[year]'></td>
                <td><input type='text' name='first_name[$i]' value='$first_name'></td>
                <td><input type='text' name='last_name[$i]' value='$last_name'></td>
                <input type='hidden' name='books_id[$i]' value='$edit[$i]'>
              </tr>

            ";
            $i++;
          }
          echo "<input type='hidden' name='numRecords' value='$i'>";
        ?>
        <table>
            <tr>
              <td>Publisher's name</td>
              <td>Language</td>
              <td>Genre</td>
            </tr>
            <tr></tr>
        <?php
          $i=0;
          $edit=array();
          //$edit contains an array of books_id that wants to be edited.
          foreach($_POST['edit'] as $edit[$i]){
            $query=mysqli_query($con,"SELECT * FROM books WHERE books_id=$edit[$i]");
            $fetch=mysqli_fetch_array($query,MYSQLI_ASSOC);

            $author_query=mysqli_query($con,"SELECT first_name,last_name FROM authors WHERE authors_id=$fetch[authors_id]");
            $author=mysqli_fetch_array($author_query,MYSQLI_ASSOC);
            $first_name=$author["first_name"];
            $last_name=$author["last_name"];

            $publisher_query=mysqli_query($con,"SELECT publisher_name FROM publishers WHERE publishers_id=$fetch[publishers_id]");
            $publisher=mysqli_fetch_array($publisher_query,MYSQLI_ASSOC);
            $publisher_name=$publisher["publisher_name"];

            $languages_query=mysqli_query($con,"SELECT languages_name FROM languages WHERE languages_id=$fetch[languages_id]");
            $language=mysqli_fetch_array($languages_query,MYSQLI_ASSOC);
            $languages_name=$language["languages_name"];

            $genres_query=mysqli_query($con,"SELECT genre_name FROM genres WHERE genres_id=$fetch[genres_id]");
            $genre=mysqli_fetch_array($genres_query,MYSQLI_ASSOC);
            $genres_name=$genre["genre_name"];
            echo "
              <tr>
                <td><input type='text' name='publisher_name[$i]' value='$publisher_name'></td>
                <td><input type='text' name='languages_name[$i]' value='$languages_name'></td>
                <td><input type='text' name='genres_name[$i]' value='$genres_name'></td>
                <input type='hidden' name='books_id[$i]' value='$edit[$i]'>
              </tr>

            ";
            $i++;
          }
          echo "<input type='hidden' name='numRecords' value='$i'>";
        ?>
          </table><br><br>
          <input type="submit" value="EDIT!"><br><br>
          <h2><b>PLEASE RECHECK BEFORE CONFIRMING!</b></h2>
        <?php
          include("connectionclose.php");
        }
        else{
          
        }
        ?>


        </form>






        
      
       
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
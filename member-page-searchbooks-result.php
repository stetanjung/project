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
          echo "<li><a href='member-page.php'>Member Page</a></li><li><a href='member-update.php'>Update Info</a></li><li><a href='log-out.php'>Logout</a></li>";

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
            <?php
            if(isset($_SESSION['users_id'])){
            echo "<li><a href='member-page.php'>Return Books</a></li>";}
            else{
              echo "<li><a href='log-in.php.php'>Return Books</a></li>";}
            ?>
            
          </ul>
        </li>
        <li class="active"><a class="drop" href="#">Members</a>
            <?php
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
              echo "<li><a href='member-page.php'>Member Page</a></li><li><a href='log-out.php'>Logout</a></li>";

            }
            
            ?>
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
     
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="rounded"> 
        <!-- ################################################################################################ -->
        <h1>Search/Edit Books</h1>
      <?php
      $users_id=$_SESSION['users_id'];
      ?></br>
      




        <form method="POST" action="staff-page-searchbooks.php">
        <?php
        include("connection.php");

        $searchType=$_POST["searchType"];
        $searchResult=$_POST["searchResult"];
        echo "
          <input type='hidden' name='searchType' value='$searchType'>
          <input type='hidden' name='searchResult' value='$searchResult'>
        ";
        if(strcmp($searchType,"year")==0 || strcmp($searchType,"title")==0) 
          $search_book_query=mysqli_query($con,"SELECT * FROM books WHERE $searchType LIKE '%$searchResult%'");
        else if(strcmp($searchType,"authors_id")==0){
          $search_book_query=mysqli_query($con,"SELECT b.* FROM books b, authors a WHERE b.authors_id=a.authors_id AND a.first_name LIKE '%$searchResult%' OR a.last_name LIKE '%$searchResult%'");
        }
        else if(strcmp($searchType,"publishers_id")==0){
          $search_book_query=mysqli_query($con,"SELECT b.* FROM books b, publishers p WHERE b.publishers_id=p.publishers_id AND p.publisher_name LIKE '%$searchResult%'");
        }
        else if(strcmp($searchType,"genres_id")==0){
          $search_book_query=mysqli_query($con,"SELECT b.* FROM books b, genres g WHERE b.genres_id=g.genres_id AND g.genre_name LIKE '%$searchResult%'");
        }
        if(mysqli_num_rows($search_book_query)!=0){
        ?>
        <br>
        <?php
        if(strcmp($_SESSION['users_id'],"000000")==0){
          echo "<input type='submit' name='edit' value='Edit'> or <input type='submit' name='delete' value='Delete'><br><br>";
          }
        ?>
        </form>
        <?php
        if(!empty($_POST['edit'])) echo "<form action='staff-page-searchbooks-search.php' method='POST'>";
        if(!empty($_POST['delete'])) echo "<form action='deletebookprocess.php' method='POST'>";
        ?>
        <table>
          <tr>
            <td>Title</td>
            <td>Year</td>
            <td>Author</td>
            <td>Publisher</td>
            <td>Languages</td>
            <td>Genre</td>
          </tr>

        <?php

        while($row=mysqli_fetch_array($search_book_query,MYSQLI_ASSOC)){

          $author_query=mysqli_query($con,"SELECT first_name,last_name FROM authors WHERE authors_id=$row[authors_id]");
          $author=mysqli_fetch_array($author_query,MYSQLI_ASSOC);
          $author_name=$author["first_name"]." ".$author["last_name"];

          $publisher_query=mysqli_query($con,"SELECT publisher_name FROM publishers WHERE publishers_id=$row[publishers_id]");
          $publisher=mysqli_fetch_array($publisher_query,MYSQLI_ASSOC);
          $publisher_name=$publisher["publisher_name"];

          $languages_query=mysqli_query($con,"SELECT languages_name FROM languages WHERE languages_id=$row[languages_id]");
          $language=mysqli_fetch_array($languages_query,MYSQLI_ASSOC);
          $languages_name=$language["languages_name"];

          $genres_query=mysqli_query($con,"SELECT genre_name FROM genres WHERE genres_id=$row[genres_id]");
          $genre=mysqli_fetch_array($genres_query,MYSQLI_ASSOC);
          $genres_name=$genre["genre_name"];
          echo "
            <tr>
              <td>$row[title]</td>
              <td>$row[year]</td>
              <td>$author_name</td>
              <td>$publisher_name</td>
              <td>$languages_name</td>
              <td>$genres_name</td>
            ";
            if(!empty($_POST['edit'])) echo "<td><input type='checkbox' name='edit[]' value='$row[books_id]'></td>";
            if(!empty($_POST['delete'])) echo "<td><input type='checkbox' name='delete[]' value='$row[books_id]'></td>";
          echo "
            </tr>
          ";
        }
        if(!empty($_POST['edit'])) echo "<input type='submit' value='Edit!'";
        if(!empty($_POST['delete'])) echo "<input type='submit' value='Delete!'";
        include("connectionclose.php");
        ?>
        </table><br><br>
        <?php
        if(strcmp($_SESSION['users_id'],"000000")==0){
         echo "<a href='staff-page-searchbooks.php'>Back to search page</a>";
        }
        else{
          echo "<a href='gallery.php'>Back to search page</a>";
        }
      }
        else{
          echo "No result for the search<br>";
          if(strcmp($_SESSION['users_id'],"000000")==0){
         echo "<a href='staff-page-searchbooks.php'>Back to search page</a>";
        }
        else{
          echo "<a href='gallery.php'>Back to search page</a>";
        }
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
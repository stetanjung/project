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
<title>Library | Books | Find Books</title>
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
    <!-- #########################       unset($_SESSION['users_id']);     ####################################################################### --> 
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
        <li  class="active"><a class="drop" href="#">Books</a>
          <ul>
            <li  class="active"><a href="#">Find Books</a></li>
            <li><a href="whats-new.php">What's New</a></li>
            <?php
            if(isset($_SESSION['users_id'])){
            echo "<li><a href='member-page.php'>Return Books</a></li>";}
            else{
              echo "<li><a href='log-in.php'>Return Books</a></li>";}
            ?>
            
          </ul>
        </li>
        <li ><a class="drop" href="#">Members</a>
           <ul> <?php
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
      <div id="gallery">
        <figure>
          <header class="heading">Latest Images From The University</header>

            
        <form  method="POST" action="staff-page-searchbooks-result.php">
                    <fieldset>
                        <input type="radio" name="searchType" value="title" checked>Title 
              <input type="radio" name="searchType" value="year">Year 
              <input type="radio" name="searchType" value="authors_id">Author 
              <input type="radio" name="searchType" value="publishers_id">Publisher 
              <input type="radio" name="searchType" value="genres_id"> Genre <br><br>
                      <legend>Search:</legend>
                      <input type="text" value="" name="searchResult" placeholder="Look for Books"><br>
                      <button class="fa fa-search" type="submit" title="Search" ><em>Search</em></button><br>
                    </fieldset>
                  </form>




<form method="POST" action="member-page-borrow.php">
<?php
include("connection.php");



$search_book_query=mysqli_query($con,"SELECT * FROM books");
?>
<table>
  <tr>
    <td>Title</td>
    <td>Year</td>
    <td>Author</td>
    <td>Publisher</td>
    <td>Languages</td>
    <td>Genre</td>
    <td>Available?</td>
    <td>Borrow</td>
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
  $books_id=$row["books_id"];

  if($row['available']==0) $available="Not available";
  else $available="Available";
  echo "
    <tr>
      <td>$row[title]</td> 
      <td>$row[year]</td>
      <td>$author_name</td>
      <td>$publisher_name</td>
      <td>$languages_name</td>
      <td>$genres_name</td>
      <td>$available</td>
    ";
    
    if($row['available']==1 && !isset($_SESSION["users_id"])) echo "<td><a href='log-in.php'>login first</a></td>";
    else if($row['available']==1 && isset($_SESSION["users_id"])) echo "<td><input type='checkbox' name='borrow[]' value='$row[books_id]'></td>";

    else echo "<td><center>X</center></td>";
  echo "
    </tr>
  ";
}
?>
</table><br><br>
<input type="submit" value="Borrow!">
<?php
include("connectionclose.php");
?>
</form>





          <ul class="nospace clear">
            <li class="one_quarter first"><a class="nlb" data-lightbox-gallery="gallery1" href="https://images-na.ssl-images-amazon.com/images/I/513hgSybYgL._AC_US436_FMwebp_QL65_.jpg" title="Display Text 1"><img class="borderedbox" src="https://images-na.ssl-images-amazon.com/images/I/513hgSybYgL._AC_US436_FMwebp_QL65_.jpg" alt=""></a><p style = "color: black;">A Wrinkle in Time</p></li>
            <li class="one_quarter"><a class="nlb" data-lightbox-gallery="gallery1" href="https://images-na.ssl-images-amazon.com/images/I/51FCNdw-FcL._AC_US436_FMwebp_QL65_.jpg" title="Display Text 2"><img class="borderedbox" src="https://images-na.ssl-images-amazon.com/images/I/51FCNdw-FcL._AC_US436_FMwebp_QL65_.jpg" alt=""></a><p style = "color: black;">Knock-Knock Jokes for Kids</p></li>
            <li class="one_quarter"><a class="nlb" data-lightbox-gallery="gallery1" href="https://images-na.ssl-images-amazon.com/images/I/61XGdLECZ5L._AC_US436_QL65_.jpg" title="Display Text 3"><img class="borderedbox" src="https://images-na.ssl-images-amazon.com/images/I/61XGdLECZ5L._AC_US436_QL65_.jpg" alt=""></a><p style = "color: black;">Harry Potter and the Chamber of Secrets</p></li>
            <li class="one_quarter"><a class="nlb" data-lightbox-gallery="gallery1" href="https://images-na.ssl-images-amazon.com/images/I/51oGf6GzusL._AC_US436_QL65_.jpg" title="Display Text 4"><img class="borderedbox" src="https://images-na.ssl-images-amazon.com/images/I/51oGf6GzusL._AC_US436_QL65_.jpg" alt=""></a><p style = "color: black;">Fantastic Beasts and Where to Find Them</p></li>
            <li class="one_quarter first"><a class="nlb" data-lightbox-gallery="gallery1" href="https://images-na.ssl-images-amazon.com/images/I/51mSAELn6NL._AC_US436_QL65_.jpg" title="Display Text 5"><img class="borderedbox" src="https://images-na.ssl-images-amazon.com/images/I/51mSAELn6NL._AC_US436_QL65_.jpg" alt=""></a><p style = "color: black;">The Very Hungry Caterpillar (Chinese Edition)</p></li>
            <li class="one_quarter"><a class="nlb" data-lightbox-gallery="gallery1" href="https://images-na.ssl-images-amazon.com/images/I/51yJz-gDavL._AC_US436_QL65_.jpg" title="Display Text 6"><img class="borderedbox" src="https://images-na.ssl-images-amazon.com/images/I/51yJz-gDavL._AC_US436_QL65_.jpg" alt=""></a><p style = "color: black;">Frindle (Chinese Edition)</p></li>
            <li class="one_quarter"><a class="nlb" data-lightbox-gallery="gallery1" href="https://images-na.ssl-images-amazon.com/images/I/515bCkpiEsL._AC_US436_QL65_.jpg" title="Display Text 7"><img class="borderedbox" src="https://images-na.ssl-images-amazon.com/images/I/515bCkpiEsL._AC_US436_QL65_.jpg" alt=""></a><p style = "color: black;">Diary of a Wimpy Kid #12: Getaway</p></li>
            
          </ul>

        </figure>
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <nav class="pagination">
        <ul>
          <li class="current"><strong>1</strong></li>
        <!--  <li><a href="#">2</a></li>
          
          <li><strong>&hellip;</strong></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">Next &raquo;</a></li> -->
        </ul>
      </nav>
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
<script src="../layout/scripts/nivo-lightbox/nivo-lightbox.min.js"></script>
</body>
</html>
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
        <li><a href="#">A - Z Index</a></li>
        <li><a href="log-in.php">Member Login</a></li>
        <li><a href="#">Staff Login</a></li>
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
          <ul>
            <li><a href="log-in.php">Log in</a></li>
            <li><a class="drop" href="#">Not Member Yet</a>
              <ul>
                <li><a href="sign-up.php">Sign up</a></li>
                <li><a href="#">Find Out More</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="events.php">Events</a></li>
        <li  class="active"><a href="#">News</a></li>
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
        <h6>Statistics</h6>
        <nav class="sdb_holder">
          <ul>
            <li><a href="statistic.php">Visitors</a>
            </li>
            <li><a href="activemem.php">Active Members</a>
            </li>
          </ul>
        </nav>

        <!-- ################################################################################################ --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div id="content" class="three_quarter"> 
        <!-- ################################################################################################ -->
        <h1 style = "color: black;">Number of Visitors</h1>
        <p>- Statistics are based on user IP address and its visit date</p>
        
        <h1 style = "color: black;">Today</h1>
          <table>
            <thead>
              <tr style = 'text-align: center;'>
                <th>Date</th>
				<th>Total vistors</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              	include("connection.php");
              	if (mysqli_connect_errno()) {
 					 echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
 				}
 				$today = date('Y-m-d');
 				echo "<p>- Today is <span style = 'color: blue;'>$today</span></p>";
				$sql = "select count(ip) as total_visitor, date from counter where date = '$today'";
				$result = mysqli_query($con, $sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr style = 'text-align: center;'>";
						echo "<td>".$row['date']."</td>";
						echo "<td>".$row['total_visitor']."</td>";
						echo "</tr>";
					}
				}
				else{
					echo "0results";
				}
			?>

            </tbody>
          </table>


          <h1 style = "color: black;">Cumulative Visitors</h1>
          <table>
            <thead>
              <tr style = 'text-align: center;'>
				<th>Total vistors</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              	include("connection.php");
              	if (mysqli_connect_errno()) {
 					 echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
 				}
 				$today = date('Y-m-d');
				$sql = "select count(ip) as total_visitor from counter";
				$result = mysqli_query($con, $sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr style = 'text-align: center;'>";
						echo "<td>".$row['total_visitor']."</td>";
						echo "</tr>";
					}
				}
				else{
					echo "0results";
				}
			?>

            </tbody>
          </table>


        <h1 style = "color: black;">Daily</h1>
          <table>
            <thead>
              <tr style = 'text-align: center;'>
                <th>Date</th>
				<th>Total vistors</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              	include("connection.php");
              	if (mysqli_connect_errno()) {
 					 echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
 				}
 				$current_year = date('Y');
 				echo "<p>- Daily Visitors in current year, <span style = 'color: blue;'>$current_year</span></p>"; 
				$sql = "SELECT count(ip) as total_visitor, date from counter where year(date) = '$current_year' group by date";
				$result = mysqli_query($con, $sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr style = 'text-align: center;'>";
						echo "<td>".$row['date']."</td>";
						echo "<td>".$row['total_visitor']."</td>";
						echo "</tr>";
					}
				}
				else{
					echo "0results";
				}
			?>

            </tbody>
          </table>

          <h1 style = "color: black;">Montly</h1>
          <table>
            <thead>
              <tr style = 'text-align: center;'>
                <th>Month</th>
				<th>Total vistors</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              	include("connection.php");
              	if (mysqli_connect_errno()) {
 					 echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
 				}

 				$current_year = date('Y');
 				echo "<p>- Monthly Visitors in current year, <span style = 'color: blue;'>$current_year</span></p>"; 

				$sql = "SELECT count(ip) as total_visitor, month(date) as month from counter where year(date) = '$current_year' group by month(date)";
				$result = mysqli_query($con, $sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr style = 'text-align: center;'>";
						echo "<td>".$row['month']."</td>";
						echo "<td>".$row['total_visitor']."</td>";
						echo "</tr>";
					}
				}
				else{
					echo "0results";
				}
			?>

            </tbody>
          </table>

          <h1 style = "color: black;">Yearly</h1>
          <table>
            <thead>
              <tr style = 'text-align: center;'>
                <th>Year</th>
				<th>Total vistors</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              	include("connection.php");
              	if (mysqli_connect_errno()) {
 					 echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
 				}
				$sql = "select count(ip) as total_visitor, year(date) as year from counter group by year(date)";
				$result = mysqli_query($con, $sql);
				if($result->num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "<tr style = 'text-align: center;'>";
						echo "<td>".$row['year']."</td>";
						echo "<td>".$row['total_visitor']."</td>";
						echo "</tr>";
					}
				}
				else{
					echo "0results";
				}
			?>

            </tbody>
          </table>


        </div>
        
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
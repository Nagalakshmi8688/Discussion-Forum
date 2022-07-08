<?php
 include "connection.php";
            session_start(); 
            if(!isset($_SESSION['IS_LOGIN'])){
                header('location:login.php');
                      die();
            }
           ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Disscussion Forum</title>
         
        <link rel="stylesheet" type="text/css" href="prof3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" ></script>
  
    </head>
    <body onload="slider()">
       
        <div class="banner">
            <div class="slider">
                
            <img src="images/srm3.jfif" id="slideimg" >
            </div>
            <div class="overlay">
                <div class="navbar">
                    <div class="logo">
                        <img src="images/srm.png" >
                    </div>
                    </div>
                    <div class="content">
                        <h1>Welcome To The Disscussion Forum </h1>
                      <h3> If you have any doubts feel free & Write your Quires!!! </h3>
                    </div>
                    
            </div>
            </div>         
<div class="wrapper">
<?php

$res=mysqli_query($conn,"SELECT * FROM students where name='$_SESSION[login_user]' ;");
?>
<h2 style="margin-left:15px; } ">Profile</h2>

<?php
$row=mysqli_fetch_assoc($res);

?>

<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td style=font-size:20px;>";
	 						echo "<b> Student Name </b>";
	 					echo "</td>";

	 					echo "<td style=font-size:20px;>";
	 						echo $row['name'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td style=font-size:20px;>";
	 						echo "<b>Register No </b>";
	 					echo "</td>";
	 					echo "<td style=font-size:20px;>";
	 						echo $row['id'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td style=font-size:20px;>";
	 						echo "<b> Academic Year </b>";
	 					echo "</td>";
	 					echo "<td style=font-size:20px;>";
	 						echo $row['academic year'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td style=font-size:20px;>";
	 						echo "<b> Institution </b>";
	 					echo "</td>";
	 					echo "<td style=font-size:20px;>";
	 						echo $row['institution'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td style=font-size:20px;>";
	 						echo "<b> Semester </b>";	
	 					echo "</td>";
	 					echo "<td style=font-size:20px;>";
	 						echo $row['semester'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td style=font-size:20px;>";
	 						echo "<b> Section </b>";
	 					echo "</td>";
	 					echo "<td style=font-size:20px;>";
	 						echo $row['section'];
	 					echo "</td>";
	 				echo "</tr>";
                     echo "<tr>";
                     echo "<td style=font-size:20px;>";
                         echo "<b> D.O.B / Gender  </b>";
                     echo "</td>";
                     echo "<td style=font-size:20px;>";
                         echo $row['gender'];
                     echo "</td>";
                 echo "</tr>";
                     echo "<tr>";
                     echo "<td style=font-size:20px;>";
                         echo "<b> Father Name/Mother Name </b>";
                     echo "</td>";
                     echo "<td style=font-size:20px;>";
                         echo $row['parent name'];
                     echo "</td>";
                 echo "</tr>";
                
 				echo "</table>";
 				echo "</b>";
 			?>
</div>
<div class="button">

    <span class="fas fa-bars"> </span>
       </div>
            <nav class="sidebar">
           
                
				<div class="name">
    <?php
	echo "<img class='rounded-circle' src='images/".$_SESSION['pic']."'>";
	echo"<p> Welcome,</p>";
    echo "<h3> ".$_SESSION['login_user']."</h3>";
   
    
    ?>
    </div>
	<ul>
                
    <?php if( $_SESSION['role']=='admin') {?>
        <?php } ?>
                   <li ><a href="Home.php">Home</a></li>
                   <li>
                      <a href="your_posts.php" >Your Posts
                      <span >&rsaquo;</span>
                      </a>
                      
                   </li>
                   <?php if( $_SESSION['role']=='admin') {?>
                    <li  ><a href="review.php"> posts review</a></li>
                    <?php } ?>
                    <div class="row">
                    &nbsp; &nbsp; &nbsp;<li  ><a href="profile.php"><br><i class="fa fa-user" aria-hidden="true"></i></a></li>&ensp;
                  
                   <li  ><a href="update_password.php"><br><i class="fas fa-cog"></i></a></li>&ensp;
				    <li ><a href="logout.php"><br><i class="fas fa-power-off"></i></a></li>&nbsp;
                   </div>
</ul>
            
            </nav>
              
              
              <marquee direction="up" scrollamount="10"
              onmouseover="this.stop();" onmouseout="this.start();">
			  
                 <div class="thicker-up"> 
				 
				 <h3>The highest placement package offered at SRM University AP, Amaravati is Rs 50 LPA this year and 
                      the Lowest placement package is Rs 7 LPA. More than 599+ companies participated in SRM University AP(deemed) placements.
                       Most of the students got placed in top companies. Some of the top companies that participated in 2021 placements are Amazon, Microsoft, etc.</h3>
                    
					</div>
					<img src="images/ad1.jpeg" >
					
                    </marquee>



            <script>
                var slideimg = document.getElementById("slideimg");
                var images = new Array(
                    "images/srm3.jfif",
                    "images/srm_2.jpeg",
                    "images/Srm_1.jfif",
                    "images/b.jpg",
                    "images/g.jpg",
                    
                );
                var len = images.length;
                var i=0;
                function slider(){
                    if(i> len-1){
                        i=0;
                    }
                    slideimg.src = images[i];
                    i++;
                    setTimeout('slider()',3000);
                }
				
				function showReplyForm(self) {
    var commentId = self.getAttribute("data-id");
    if (document.getElementById("form-" + commentId).style.display == "") {
        document.getElementById("form-" + commentId).style.display = "none";
    } else {
        document.getElementById("form-" + commentId).style.display = "";
    }
}
$('.button').click(function(){
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");

});

	



                </script>
               

    </body>
</html>
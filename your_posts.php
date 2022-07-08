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
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title> Disscussion Forum</title>
         
        <link rel="stylesheet" type="text/css" href="post6.css">
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
                
   
                   <li ><a href="Home.php">Home</a></li>
                   <li class="active">
                      <a href="your_posts.php" >Your Posts
                      <span >&rsaquo;</span>
                      </a>
                      <ul>
                        <li class="active_1"><a href="CSE.php">CSE </a></li>
                         <li class="active_1"><a href="ECE.php">ECE</a> </li>
                         <li class="active_1"><a href="EEE.php">EEE</a></li>
                         <li class="active_1"><a href="Mechanical.php">Mechanical</a></li>
                         <li class="active_1"><a href="civil.php">Civil</a></li>
                        
                      </ul>
                   </li>
                   <?php if( $_SESSION['role']=='admin') {?>
                    <li  ><a href="review.php"> Posts Review</a></li>
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
            <div class="wrap">

<div class="container">
        <div class="row">
            <div class="col-md-12">
              
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="" id="filter"  class="form-control" placeholder="Search data" onkeyup="searchFun()">
                                       
                                    </div>
                                </form>

                          
                        </div>
                    </div>
                </div>
            </div>
                   </div>
                   </div>
                   
                   <div class="col-md-12">
               
               <div >
                   <table class="table table-bordered" id="myTable">
                       <thead>
                           <tr>
                               <th>id</th>
                               
                               
                               <th>comment</th>
                               <th>status</th>
                           </tr>
                           
                       </thead>
                       <tbody>
                      
<?php 

$conn = mysqli_connect("localhost","root","","discussion_forum");
$query = "SELECT * FROM comments";
$query_run = mysqli_query($conn, $query);

if(mysqli_num_rows($query_run) > 0)
{

foreach($query_run as $row)
{
   
   ?>
  
<tr>
<td><?= $row['id']; ?></td>

       <td><?= $row['comment']; ?></td>
   <td><?= $row['status']; ?></td>
      
     
   </tr>
   <?php
}
}

else
{
?>
   <tr>
       <td colspan="4">No Record Found</td>
   </tr>
<?php
}
?>
                   </div>
               
               
			
               
   
           
              



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
				
	
                $('.button').click(function(){
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");

});

function searchFun() {
      // Declare variables 
      var input, filter, table, tr, i, j, column_length, count_td;
      column_length = document.getElementById('myTable').rows[0].cells.length;
      input = document.getElementById("filter");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 1; i <= tr.length; i++) { // except first(heading) row
        count_td = 0;
        for(j = 1; j <= column_length-1; j++){ // except first column
            td = tr[i].getElementsByTagName("td")[j];
            /* ADD columns here that you want you to filter to be used on */
            if (td) {
              if ( td.innerHTML.toUpperCase().indexOf(filter) > -1)  {            
                count_td++;
              }
            }
        }
        if(count_td > 0){
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
      }
      
    }


                </script>
               

    </body>
</html>
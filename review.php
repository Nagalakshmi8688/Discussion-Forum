<?php
 include "connection.php";
            session_start(); 
            if(isset($_SESSION['role']) && $_SESSION['role']!='admin' ){
                header('location:home.php');
                      die();
            }
           ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Disscussion Forum</title>
         
        <link rel="stylesheet" type="text/css" href="review1.css">
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
                
                    <div class="content">
                        <h1>Welcome To The Disscussion Forum </h1>
                      <h3> If you have any doubts feel free & Write your Quires!!! </h3>
                    </div>
                    
            </div>
            </div>         

            <div class="wrapper">
                
            <div class="button">
            
<span class="fas fa-bars"> </span>
   </div>
       
    <div class="sidebar">
         <img src="images/srm.png" >
         <div class="name">
    <?php
	echo "<img class='rounded-circle' src='images/".$_SESSION['pic']."'>";
	echo"<p> Welcome,</p>";
    echo "<h3> ".$_SESSION['login_user']."</h3>";
    
    ?>
    </div>
        <ul>
            <li><a href="Home.php"><i class="fas fa-home"></i>Home</a></li>
            <li ><a href="your_posts.php"><i class="fas fa-user"></i>Your Posts</a>
            <ul>
                        <li class="active_1"><a href="comment_form.php">CSE
                            
                        </a>    
                        </li>
                         <li class="active_1"><a href="#">ECE
                         
                         </a>
                         
                        </li>
                         <li class="active_1"><a href="#">EEE
                          
                         </a>
                         
                        </li>
                         <li class="active_1"><a href="#">Mechanical
                            
                         </a>
                         
                        </li>
                         <li class="active_1"><a href="#">Civil
                            
                         </a>
                         
                        </li>
                        
                      </ul>
                   </li>
         <?php if( $_SESSION['role']=='admin') {?>
                    <li  ><a href="review.php"><i class="fas fa-address-card"></i> Posts review</a></li>
                    <?php } ?>
            
        </ul> 
        <div class="social_media">
          <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i></a>
          <a href="update_password.php"><i class="fas fa-cog"></i></a>
          <a href="logout.php"><i class="fas fa-power-off"></i></a>
      </div>
    </div>
    <div class="info">  
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>ID</th>
                                    <th>Comment</th>
                                    <th class="status">Action</th>
                                    <th >Status</th>
                                    <th>Reply_Of</th>
                                    <th>category</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  

                                    $query = "SELECT * FROM comments ORDER BY created_at DESC";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        
                                        foreach($query_run as $row)
                                        {
                                            
                                            ?>
                                           
                                        <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['comment']; ?></td>
                                      <td>
                                          <div class="dropdown">
                                        <button class="dropbtn">Review</button>
                                        <div class="dropdown-content">
                                        <a href="review.php?update=<?php echo $row['id'];?>">Accept</a>
                                        <a href="review.php?delete=<?php echo $row['id'];?>">Reject</a>
                                        </div>
                                        </div>
                                                                                    
                                    
                                                </td>
                                                <td><?= $row['status']; ?></td>
                                                <td><?= $row['reply_of']; ?></td>
                                                <td><?= $row['category']; ?></td>
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

                            </tbody>
                        </table>

                    <?php
                        if (isset($_GET['delete'])){
                            $id=$_GET['delete'];
                            mysqli_query($conn,"UPDATE `comments` SET status='Rejected' where id='$id'");
                            
                        }
                    ?>
                      <?php
                        if (isset($_GET['update'])){
                            $id=$_GET['update'];
                            mysqli_query($conn,"UPDATE `comments` SET status='approved' where id='$id'");
                           
                        }
                    ?>
               </div>
                   
               
            
          
              
              <marquee direction="up" scrollamount="10"
              onmouseover="this.stop();" onmouseout="this.start();">
			  
                 <div class="thicker-up"> 
				 
				 <h3>The highest placement package offered at SRM University AP, Amaravati is Rs 50 LPA this year and 
                      the Lowest placement package is Rs 7 LPA. More than 599+ companies participated in SRM University AP(deemed) placements.
                       Most of the students got placed in top companies. Some of the top companies that participated in 2021 placements are Amazon, Microsoft, etc.</h3>
                    
					</div>
					<img src="images/ad1.jpeg" >
					
                    </marquee>
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
				
	
                
              
           $('.wrapper .button').click(function(){
    $(this).toggleClass("click");
    $('.wrapper .sidebar').toggleClass("show");

});

                </script>
               

    </body>
</html>
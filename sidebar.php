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
         
      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" ></script>
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

.banner{
   display: block;
   position: fixed;
   -webkit-transform: translateY(-50%);
 -ms-transform: translateY(-50%);
 transform: translateY(-50%);
 
    width:90%;
    z-index: 1000;
    left:200px;
    top:0;
}

img{
    width:100%;
    height:220px;
    position:absolute;
}
.overlay{
    width:100%;
    height:220px;
    background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));
    position: absolute;
    top:0;
   
}

.content{
    width:50%;
    margin-left:300px;
   
    text-align:center;
    color:#fff;
    position: relative;
    animation-name: project;
    animation-duration: 1s;  
    animation-fill-mode: forwards;
}
@keyframes project{
    from {top:0px;}
    to {top:60px; }
}
.content h1{
    font-size: 40px;
}
.content h3{
    width:100%;
    margin: 25px auto 100px;
    font-weight:100;
    line-height:15px;
    font-size:20px;
  
}



.wrapper{
  display: flex;
  position: relative;
 
  font-family: 'Josefin Sans', sans-serif;
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background: #181414;
  padding: 30px 0px;
  position: fixed;
  
}
.wrapper .sidebar .name img{
    height:110px;
    width:120px;
    margin-top:-120px;
    margin-left:40px;
}
.wrapper .sidebar p{
    margin-left:45px;
    margin-top:220px;
    color:whitesmoke;
}

.wrapper .sidebar img{
  color: #fff;
  text-transform: uppercase;
  width:180px;
  height:100px;
  margin-bottom: 30px;
  margin-top:-20px;

}
.wrapper .sidebar h3{
    color:white;
   height:20px;
   width:80%;
   margin-left:20px;
   font-size:20px;
  margin-top:-10px;
}
.wrapper .sidebar ul{
    margin-top:40px;
    margin-left:5px;
}
.wrapper .sidebar ul li{
    
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
  list-style-type: none;
}    

.wrapper .sidebar ul li a{
  color: #bdb8d7;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #252525;
}
    
.wrapper .sidebar ul li:hover a{
  color: #fff;
}
 
.wrapper .sidebar .social_media{
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.wrapper .sidebar .social_media a{
  display: block;
  width: 50px;
  background: #383644;
  height: 40px;
  line-height: 45px;
  text-align: center;
  margin: 0 5px;
  color: #bdb8d7;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}


@media (max-height: 500px){
  .social_media{
    display: none !important;
  }
}
.wrapper .sidebar ul ul{
    position: absolute;
    left:200px;
    width:200px;
    margin-top:-40px;
    height:280px;
   z-index:10000;
    background:#181414;
    
}
.wrapper .sidebar ul ul li a{
    font-size: 17px;
     color: #e6e6e6;
    padding-left: 0px;
  }
  

marquee{
    position: fixed;
    -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%); 
    
    margin-left: 1260px;
    margin-top: 30.9%;
    width:270px;
    height:497px;
    border-left: 2px solid;
    background: white;
}
.thicker-up h3{
    font-size:20px;
    line-height: 40px;
    min-width: 50%;
    color:red;
    margin-left: 20px;
}

 

 
  </style>
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
    
            <li><a href="review_sidebar.php"><i class="fas fa-address-card"></i>Post Review</a></li>
        </ul> 
        <div class="social_media">
          <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
          <a href="#"><i class="fas fa-cog"></i></a>
          <a href="#"><i class="fas fa-power-off"></i></a>
      </div>
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
				
	
                
                $('.sidebar').toggleClass("show");
           $('nav ul li').click(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
		   


                </script>
               

    </body>
    </html>
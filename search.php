   
          



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Disscussion Forum</title>
         
        <link rel="stylesheet" type="text/css" href="search.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
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
            <div class="wrap">       
            <?php
     

     $conn = mysqli_connect("localhost", "root", "", "com_rep_system");
     if(isset($_POST['search']))
     {
         $search=$_POST['search'];
         $sql="SELECT * FROM comments WHERE comment LIKE
         '%$search%' OR name LIKE '%$search%'";
           $res = mysqli_query($conn, $sql);
           $count = mysqli_num_rows($res);
           if($count > 0){
             while($row = mysqli_fetch_assoc($res))
             {
              
              
               $comment= $row['comment'];
               $created_at= $row['created_at'];
              
                 ?>
                     <form action="" method="POST">
                     
                     <input type="text" name="comment" id="comment" value="<?php echo $comment; ?>" readonly/>
                     <input type="text" name="created_at" id="created_at" value="<?php echo $created_at; ?>"  readonly/>
                     
                     </form>
                 <?php
             }

           }
         
           else{
             echo "<div class='alert alert-danger'>
             there is no comment matching your search...
             </div>";
           }

         }
         
     ?>      
     </div>
                
            <nav class="sidebar">
                
                <ul>
                   <li class="active"><a href="#">Home</a></li>
                   <li>
                      <a href="Your Posts.php" >Your Posts
                      <span >&rsaquo;</span>
                      </a>
                      <ul>
                        <li class="active_1"><a href="#">CSE
                            <span >&rsaquo;</span>
                        </a>
                            <ul>
                                <li><a href="#">C</a></li>
                                <li><a href="#">C++</a></li>
                                <li><a href="#">Python</a></li>
                                <li><a href="#">Java</a></li>
                                <li><a href="#">DBMS</a></li>
                                <li><a href="#">Webdevelopment</a></li>
                            </ul>
                            
                        </li>
                         <li class="active_1"><a href="#">ECE
                            <span >&rsaquo;</span>
                         </a>
                         <ul>
                            <li><a href="#">Digital Signal</a></li>
                            <li><a href="#">Analog Electronics</a></li>
                            <li><a href="#">Signals Systems</a></li>
                            <li><a href="#">Data Communication</a></li>
                            <li><a href="#">Basic Electronics</a></li>
                            <li><a href="#">Digital Electronics</a></li>
                         </ul>

                        </li>
                         <li class="active_1"><a href="#">EEE
                            <span >&rsaquo;</span>
                         </a>
                         <ul>
                            <li><a href="#">Digital Signal</a></li>
                            <li><a href="#">Analog Electronics</a></li>
                            <li><a href="#">Signals Systems</a></li>
                            <li><a href="#">Data Communication</a></li>
                            <li><a href="#">Basic Electronics</a></li>
                            <li><a href="#">Digital Electronics</a></li>
                         </ul>
                        </li>
                         <li class="active_1"><a href="#">Mechanical
                            <span >&rsaquo;</span>
                         </a>
                         <ul>
                            <li><a href="#">Digital Signal</a></li>
                            <li><a href="#">Analog Electronics</a></li>
                            <li><a href="#">Signals Systems</a></li>
                            <li><a href="#">Data Communication</a></li>
                            <li><a href="#">Basic Electronics</a></li>
                         </ul>
                        </li>
                         <li class="active_1"><a href="#">Civil
                            <span >&rsaquo;</span>
                         </a>
                         <ul>
                            <li><a href="#">Strength of Materials</a></li>
                            <li><a href="#">Structural Analysis</a></li>
                            <li><a href="#">Concrete Technology</a></li>
                            <li><a href="#">Surveying</a></li>
                            <li><a href="#">Geology</a></li>
                            <li><a href="#">Fluid Mechanics</a></li>
                         </ul>
                        </li>
                        
                      </ul>
                   </li>
                   <li>
                      <a href="You Answered.php">You Answered</a>
                      
                   </li>
                   <li><a href="Bookmarks.php">Bookmarks</a></li>
                   <li><a href="most voted Questions.php">Most Voted Questions</a></li>
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
</script>
</head>
</html>


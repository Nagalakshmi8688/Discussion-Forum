<?php
  include "connection.php";
  session_start();
?> 
  
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
<style>
    
    body {
                background: url("https://getmyuni.azureedge.net/college-image/big/srm-university-amaravati.jpg")no-repeat center center fixed ;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
                opacity: 0.9;
                filter: alpha(opacity=50); /* For IE8 and earlier */
               
            }
            .logo{
    flex-basis:15%;
}
.logo img{
    left:10px;
    width:18%;
    height:110px;
}
      .background{
         
          margin:120px 550px;
          background:white;
          border:2px solid #464832;
          box-shadow: 5px 6px 6px 2px #e9ecef;
          border-radius:8px;

      }      
     
      .box form  input{
          padding:10px 10px;
          width:90%;
        font-size:15px;
        font-weight:600px;
        margin:0px 10px;
      }
      .box form label{
        
        margin-left:10px;
          width:50%;
        font-size:20px;
        font-weight:600px;
        line-height:30px;
      }
     .button {
          background:green;
          color:white;
       border:2px solid green;
       cursor:pointer;
          
      }

      @media screen and  (max-width: 501px){
        body{
          width:100%;
        }
        .logo img{
    left:10px;
    width:50%;
    height:110px;
}
.background{
         
         margin:60px 50px;
         background:white;
         border:2px solid #464832;
         box-shadow: 5px 6px 6px 2px #e9ecef;
         border-radius:8px;

     }   
     .box form label{
        margin-top:20px;
        margin-left:10px;
          width:80%;
        font-size:20px;
        font-weight:600px;
        line-height:30px;
      } 
      }

      @media screen and  (min-width: 500px) and (max-width:630px){
        body{
          width:100%;
        }
        .logo img{
    left:10px;
    width:50%;
    height:110px;
}
.background{
         
         margin:60px 50px;
         background:white;
         border:2px solid #464832;
         box-shadow: 5px 6px 6px 2px #e9ecef;
         border-radius:8px;

     }   
     .box form label{
        margin-top:20px;
        margin-left:10px;
          width:80%;
        font-size:20px;
        font-weight:600px;
        line-height:30px;
      } 
      }
      @media screen and  (min-width: 630px) and (max-width:730px){
        body{
          width:100%;
        }
        .logo img{
    left:10px;
    width:50%;
    height:110px;
}
.background{
         
         margin:60px 50px;
         background:white;
         border:2px solid #464832;
         box-shadow: 5px 6px 6px 2px #e9ecef;
         border-radius:8px;

     }   
     .box form label{
        margin-top:20px;
        margin-left:10px;
          width:80%;
        font-size:20px;
        font-weight:600px;
        line-height:30px;
      } 
      }
      @media screen and  (min-width: 730px) and (max-width:930px){
        body{
          width:100%;
        }
        .logo img{
    left:10px;
    width:30%;
    height:110px;
}
.background{
         
         margin:60px 200px;
         background:white;
         border:2px solid #464832;
         box-shadow: 5px 6px 6px 2px #e9ecef;
         border-radius:8px;
         width:50%;

     }   
     
     .box form label{
        margin-top:20px;
        margin-left:10px;
          width:80%;
        font-size:20px;
        font-weight:600px;
        line-height:30px;
      } 
      }
      @media screen and  (min-width: 930px) and (max-width:1300px){
        body{
          width:100%;
        }
        .logo img{
    left:10px;
    width:30%;
    height:110px;
}
.background{
         
         margin:60px 300px;
         background:white;
         border:2px solid #464832;
         box-shadow: 5px 6px 6px 2px #e9ecef;
         border-radius:8px;
         width:50%;

     }   
     
     .box form label{
        margin-top:20px;
        margin-left:10px;
          width:80%;
        font-size:20px;
        font-weight:600px;
        line-height:30px;
      } 
      }
    </style>
</head>

<body>

<main>
<div class="logo">
                        <img src="images/srm.png" >
                    </div>
        <div class="background">
       
            <div class="text">
              <center>  <h1>Login</h1></center>
                
            </div>
            <div class="box">
                <form class="form" method="POST" action="#">
                <label>Registration Number</label><br>
                    <input type="text" class="id" placeholder="Enter your Registered number" name="id" required><br><br>
                    <label>Password</label><br>
                    <input type="password" class="password" placeholder="Password" name="password" required><br><br>
                    
                    <input type="submit" name="submit" class="button" value="Login"><br><br>
    
                </form>
            </div>
        </div>
    </main> 
    <?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($conn,"SELECT * FROM `students` WHERE id='$_POST[id]' && password='$_POST[password]';");
      
    
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              
              <script type="text/javascript">
                alert("The username and password doesn't match.");
                window.location="login.php";
              </script> 
              
      
        <?php
        exit();
      }
      else
      {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['role'] = $row['role'];
        $_SESSION['IS_LOGIN'] ='yes';
        $_SESSION['id'] = $row['id'];
        $_SESSION['login_user'] = $row['name'];
        $_SESSION['pic']= $row['pic'];
		$_SESSION['email'] = $row['email'];
		
        
          ?>
          <script >
          
          window.location="profile.php";
        </script> 
        
     <?php
      
      }
    }

  ?>
    
</body>


</html>
<?php

include("connection.php");
include "comment.php";
session_start();
?>


<html>
<head>
<title>
</title>
<style>
  .heading{
    margin-left:400px;

margin-top:16%;
  }
form{
  margin-top:-290px;
	margin-left:400px;
	position:absolute;
	width:40%;
	height:220px;
  border:2px solid black;
}
.error{
 
margin-left:400px;

margin-top:19%;
	
}
form label{
  font-size:18px;
  padding:20px;
}
form label input{
  margin-left:10px;
}

@media screen and  (max-width: 501px){
  .heading{
   margin-left:55px; 
  margin-top:42%;
  }
  .heading h3{
    font-size:20px;
    
  }
  form{
  margin-top:80px;
	margin-left:40px;
	position:absolute;
	width:80%;
	height:380px;
  border:2px solid black;
  z-index:1;
}
.error{
 
 margin-left:70px;
 margin-top:-80px;
   
 }
 .error h3{
   font-size:20px;
 } 
 form label{
  font-size:18px;
  padding:10px;
  margin-left:80px;
  margin-top:10px;
}
 input{
  margin-left:50px;
}
#submit{
  width:100px;
  margin-top:35px;
  margin-left:-30px;
  background:black;
  color:white;
}
}


@media screen and  (min-width: 500px) and (max-width:630px){
  .heading{
   margin-left:75px; 
  margin-top:42%;
  }
  .heading h3{
    font-size:20px;
    
  }
  form{
  margin-top:80px;
	margin-left:60px;
	position:absolute;
	width:70%;
	height:380px;
  border:2px solid black;
  z-index:1;
}
.error{
 
 margin-left:70px;
 margin-top:-80px;
   
 }
 .error h3{
   font-size:20px;
 } 
 form label{
  font-size:18px;
  padding:10px;
  margin-left:100px;
  margin-top:10px;
}
 input{
   width:80%;
  margin-left:30px;
}
#submit{
  width:100px;
  margin-top:35px;
  margin-left:-30px;
  background:black;
  color:white;
}
}

@media screen and  (min-width: 630px) and (max-width:730px){
  .heading{
   margin-left:75px; 
  margin-top:42%;
  }
  .heading h3{
    font-size:20px;
    
  }
  form{
  margin-top:80px;
	margin-left:60px;
	position:absolute;
	width:70%;
	height:380px;
  border:2px solid black;
  z-index:1;
}
.error{
 
 margin-left:70px;
 margin-top:-80px;
   
 }
 .error h3{
   font-size:20px;
 } 
 form label{
  font-size:18px;
  padding:10px;
  margin-left:100px;
  margin-top:10px;
}
 input{
   width:80%;
  margin-left:30px;
}
#submit{
  width:100px;
  margin-top:35px;
  margin-left:-30px;
  background:black;
  color:white;
}
}
@media screen and  (min-width: 730px) and (max-width:830px){
  .heading{
   margin-left:145px; 
  margin-top:23%;
  }
  .heading h3{
    font-size:20px;
    
  }
  form{
  margin-top:50px;
	margin-left:150px;
	position:absolute;
	width:60%;
	height:380px;
  border:2px solid black;
  z-index:1;
}
.error{
 
 margin-left:90px;
 margin-top:-60px;
   
 }
 .error h3{
   font-size:20px;
 } 
 form label{
  font-size:18px;
  padding:10px;
  margin-left:100px;
  margin-top:10px;
}
 input{
   width:80%;
  margin-left:40px;
}
#submit{
  width:100px;
  margin-top:35px;
  margin-left:-30px;
  background:black;
  color:white;
}
}
@media screen and  (min-width: 830px) and (max-width:1030px){
  .heading{
   margin-left:145px; 
  margin-top:23%;
  }
  .heading h3{
    font-size:20px;
    
  }
  form{
  margin-top:50px;
	margin-left:150px;
	position:absolute;
	width:60%;
	height:380px;
  border:2px solid black;
  z-index:1;
}
.error{
 
 margin-left:90px;
 margin-top:-60px;
   
 }
 .error h3{
   font-size:20px;
 } 
 form label{
  font-size:18px;
  padding:10px;
  margin-left:100px;
  margin-top:10px;
}
 input{
   width:80%;
  margin-left:40px;
}
#submit{
  width:100px;
  margin-top:35px;
  margin-left:-30px;
  background:black;
  color:white;
}
}
@media screen and  (min-width: 1000px) and (max-width:1300px){
  .heading{
    margin-left:280px;

margin-top:16%;
  }
form{
  margin-top:-0px;
	margin-left:290px;
	position:absolute;
	width:60%;
	height:220px;
  border:2px solid black;
}
.error{
 
margin-left:280px;

margin-top:2%;
	
}
form label{
  font-size:18px;
  padding:20px;
}
form label input{
  margin-left:10px;
}

}
</style>
</head>
<body>
  <div class="heading"><h3>Update/ Change Your password</h3></div>
  <div class="error">
<?php


$id= $_SESSION['id'];
if(isset($_POST["curpass"]))
{
 $cur=$_POST["curpass"];
 $new=$_POST["newpass"];
 $conf=$_POST["conpass"];
 
 if($new <> $conf)
 {
   
  echo "<h3 style='color:red' >New password and Confirm Password is not Matched</h3>";
  
 }
 else{
  
  $sql="select * from students where id='$id' and password='$cur'";
 
      $result=$conn->query($sql);
      
        if(mysqli_num_rows($result)>0)
       {
          $sql="update students set password='$new' where id='$id' and password='$cur'";
         
         if($conn->query($sql))
    {
     echo "<h3 style='color:green '>Password has been change</h3>";
    }
    else
    {
           echo "<h3 style='color:red'>Invalid Current password</h3>";
    }
   
        }
       else
   {
    echo "<h3 style='color:red'>Invalid Current password</h3>";
   }
  
  
  
  
 }
 
}

?>
</div>
	<form action="" method="post">
		<label>Current Password</label>
			<input type="password"  name="curpass"><br>
			<label>New Password</label>&ensp;&ensp;&ensp;<input type="password" id="newpass" name="newpass"><br>
<label>Confirm Password</label><input type="password" id="conpass" name="conpass"><br>

<center><input type="submit" value="Change"  id="submit"></center>

</form>
</body>
</html>

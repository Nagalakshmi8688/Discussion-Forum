
<?php
 include "connection.php";
 include "comment.php";
        session_start();   

           ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Disscussion Forum</title>
         
        <link rel="stylesheet" type="text/css" href="post5.css">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
      
        <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" ></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		  
		 <script>
		 function fun(){
			 var  name= $("#name").val();
			 var  name= $("#email").val();
			 var  name= $("#comment").val();
			 if( name==''|| email==''|| comment==''){
				 swal({
  title: "Warning!",
  text: "Please fill all the Details!",
  icon: "warning",
  button: "Try Again!",
});

			 }
			 else{
		
		alert("Please wait!! Your post has been reviewing")
       
	}
		 }
		 </script>
		
    </head>
   
    <body >
   <div class="wrap1">
               
   <div class="com" >
<h1> Query  </h1></div><br>
<div class="wrapper">
<form action="index.php"  method="post">
 
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" required>
    
    <p>
	<div class="input-grouptype">
        <label style='font-size:23px'>Category</label>
        <select id="category" name="category">
        <option value="Select">--Please choose an option--</option>
        <option value="Digital Signal">Digital Signal</option>
  <option value="Analog Electronics">Analog Electronics</option>
  <option value="Signals Systems">Signals Systems</option>
  <option value="Data Communication">Basic Electronics</option>
  <option value="Digital Electronics">Digital Electronics</option>
</select><h5 style='color:red' > Please select the subject of your Query</h5>
</div>
    </p>
    <p>
	<div class="input-group">
        <label>Your name</label>
        <input type="text" name="name" id="name" value= <?php echo $_SESSION['login_user'] ?> readonly ></div>
    </p>
 
    <p>
	<div class="input-group">
        <label>Your email address</label>
        <input type="email" name="email" id="email"  value= <?php echo $_SESSION['email'] ?> readonly></div>
    </p><br>
 
    <p>
	<div class="input-group textarea">
        <label>Comment</label>
        <textarea name="comment" id="comment" placeholder="Enter your queries here........." required></textarea></div>
    </p>
 
    <p>
	<div class="input-group-btn">
        <input type="submit"  onclick="fun()" value="Add Comment" name="post_comment"></div><br>
        <h6 style='color:red' > *Note: Your Query will be sent to the authority, if they approve then it will be posted in home page</h6>
    </p>
</form>


</div>
 </div>
 




            

    </body>
</html>



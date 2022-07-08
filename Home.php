
 <?php
 include "home1.php";
 session_start();
 
 ?>

 

<!DOCTYPE html>
<html lang="en">-
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Disscussion Forum</title>
         
        <link rel="stylesheet" type="text/css" href="style10.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        
        <script src="https://kit.fontawesome.com/a076d05399.js" ></script>
    </head>
    <body >



    <div class="wrap">
                                        <button type="submit" class="btn btn-primary" style= "margin-left:80px; line-height:20px; margin-top:-50px;"><a href="home_search.php" style= "color:white;" >Search </a></button>
				
				
    <?php
 
 // connect with database
 $conn = mysqli_connect("localhost", "root", "", "discussion_forum");
  
 // get all comments of post
 $result = mysqli_query($conn, "SELECT * FROM comments WHERE post_id = 0 and status= 'approved' ORDER BY created_at DESC");
  
 // save all records from database in an array
 $comments = array();
 while ($row = mysqli_fetch_object($result))
 {
     array_push($comments, $row);
 }
 
 // loop through each comment
 
 foreach ($comments as $commtent_key => $comment)
 {
     // initialize replies array for each comment
     $replies = array();
  
     // check if it is a comment to post, not a reply to comment
     if ($comment->reply_of == 0)
     {

         // loop through all comments again
         foreach ($comments as $reply_key => $reply)
         {
             // check if comment is a reply
             if ($reply->reply_of == $comment->id)
             {
                 // add in replies array
                 array_push($replies, $reply);
  
                 // remove from comments array
                 unset($comments[$reply_key]);
             }
         }
     }
  
     // assign replies to comments object
     $comment->replies = $replies;
 }
 
 ?>
 
 <ul class="comments">
    <?php foreach ($comments as $comment): ?>
        <div class="single_comment">
        <li>
        
 
            <p>
                <?php echo $comment->name; ?>
            </p>
            <p>
                <?php echo $comment->category; ?>
            </p>
 
             <p class="com1">
                <?php echo $comment->comment; ?>
            </p>
 
             <p class="com2">
                <?php echo date("F d, Y h:i a", strtotime($comment->created_at)); ?>
            </p>
			</div>
		<div class="replyy">
            <div data-id="<?php echo $comment->id; ?>" onclick="showReplyForm(this);">
			<i class="fas fa-reply"></i><input type="submit" value="Reply" name="do_reply" ></div></div><br><br><br>
		<div class="text">
            <form action="index.php" method="post" id="form-<?php echo $comment->id; ?>" style="display: none;"><br>
            <input type="hidden" name="students_id" value="<?php echo $comment->id; ?>" required>
                <input type="hidden" name="reply_of" value="<?php echo $comment->id; ?>" required>
                <input type="hidden" name="post_id" value="0" required>
			<div class="row">
			<div class="input-group">
                
                    <label>Your name</label>
                    <input type="text" name="name" value= <?php echo $_SESSION['login_user'] ?> readonly>
                </div>
			<div class="input-group">
                                   <label>Your email address</label>
                    <input type="email" name="email" value= <?php echo $_SESSION['email'] ?> readonly>
                </div></div><br>
			 <div class="input-group textarea">
                <p>
                    <label>Comment</label>
                    <textarea name="comment" required></textarea>
                </p>
 </div>
			<div class="input-group-btn">
                <p>
                    <input type="submit" value="Reply" name="do_reply">
                </p></div>
            </form></div><br>
            <ul class="comments_reply">
    <?php foreach ($comment->replies as $reply): ?>
	 <div class="single_comment1">
        <li>
            <p>
                <?php echo $reply->name; ?>
            </p>
            <p>
                <?php echo $comment->category; ?>
            </p>
             <p class="com3">
                <?php echo $reply->comment; ?>
            </p>
 
            <p class="com4">
                <?php echo date("F d, Y h:i a", strtotime($reply->created_at)); ?>
            </p>
 
            <div onclick="showReplyForReplyForm(this);" data-name="<?php echo $reply->name; ?>" data-id="<?php echo $comment->id; ?>"> </div>
        </li></div><br>
    <?php endforeach; ?>
</ul>
        </li>
    <?php endforeach; ?>
</ul>
            
              

           <script>
                
				function showReplyForm(self) {
    var commentId = self.getAttribute("data-id");
    if (document.getElementById("form-" + commentId).style.display == "") {
        document.getElementById("form-" + commentId).style.display = "";
    } else {
        document.getElementById("form-" + commentId).style.display = "";
    }
}




                </script>
                
               

    </body>
</html>
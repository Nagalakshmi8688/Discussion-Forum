<?php
 session_start();
// index.php

include "connection.php";
 
if (isset($_POST["post_comment"]))
{   $category =  mysqli_real_escape_string($conn, $_POST["category"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $post_id = mysqli_real_escape_string($conn, $_POST["post_id"]);
    $reply_of = 0;
 
    mysqli_query($conn, "INSERT INTO comments(name,students_id, email, comment, post_id, created_at, reply_of, status,category) VALUES ('" .$name . "',  '". $_SESSION['id']. "' ,'" . $email . "', '" . $comment . "', '" . $post_id . "', NOW(), '" . $reply_of . "','pending','" . $category . "')");
	 header('location:review.php');
     header('location:your_posts.php');

}
  

?>


<?php
 
// index.php
 

 

if (isset($_POST["do_reply"]))
{   
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $post_id = mysqli_real_escape_string($conn, $_POST["post_id"]);
    $reply_of = mysqli_real_escape_string($conn, $_POST["reply_of"]);
 
    $result = mysqli_query($conn, "SELECT * FROM comments WHERE id = "  .$reply_of);
    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_object($result);

        // sending email
        $headers = 'From:divyasri_yamali@srmap.edu.in';
        $headers .= ' Forum Message'  . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n" ;
         
        $subject = "Reply on your comment by $name";
 
        $body = "<h1>Reply from:</h1>";
		 
        $body .= "<p>Email: " . $email . "</p>";
		
        $body .= "<p>Reply: " . $comment . "</p>";
		
 
        mail($row->email, $subject, $body, $headers);
    }
	
    mysqli_query($conn, "INSERT INTO comments(name, students_id,email, comment, post_id, created_at, reply_of,status) VALUES ('" .
    $name . "','". $_SESSION['id']. "' , '" . $email . "', '" . $comment . "', '" . $post_id . "', NOW(), '" . $reply_of . "','pending' )");
  
   header('location:your_posts.php');
   
}

?>

<script>
 
function showReplyForReplyForm(self) {
    var commentId = self.getAttribute("data-id");
   
 
        document.getElementById("form-" + commentId).style.display = "";

}
   
		 
</script>





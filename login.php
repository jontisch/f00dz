<?php
   
   session_start();
   if(isset($_SESSION['login_user'])){
      header("location:index.php?p=list");
   }
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $sql = "SELECT user_salt FROM users WHERE user_name = '$myusername'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $salt = $row['user_salt'];
      $hashedPassword = hash("SHA512", $mypassword . $salt);
      


      $sql = "SELECT user_active, user_id FROM users WHERE user_name = '$myusername' and user_password = '$hashedPassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['user_active'];
      $userid = $row['user_id'];
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1 && $active) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login_user_id'] = $userid;
         header("location:index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
	  }
   }
?>
<div class="row">
   <h2>
      Jamen, logga in då för fan
   </h2>
</div>
<div class="row">
   <div class="col-md-3">
   </div>
   <div class="col-md-6 col-xs-12">
      <form id='login_form' method=post action=''>
      	<input type=text class="form-control" placeholder="username" name="username" id="username-input">
      	<input type=password class="form-control" placeholder="password" name="password" id="pass-input">
      	<input type=submit class="btn btn-primary" value="Logga in">
      </form>	
   </div>
   <div class="col-md-3">
   </div>
</div>
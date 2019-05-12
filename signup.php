<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      // username and password sent from form 
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
      $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $errormessage = "";      
      

      $sql = "SELECT user_id FROM users WHERE user_name = '$username'";
      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);
      
      if($count != 0){
         $usernamefeedback = "has-feedback has-error";
         $usernameglyph = "glyphicon-warning-sign";
         $error = 1;
         $errormessage .= "<li class='list-group-item'>Användarnamnet är upptaget</li>";
      }
      
      if(strlen($username) <= 3){
         $usernamefeedback = "has-feedback has-error";
         $usernameglyph = "glyphicon-warning-sign";
         $error = 1;
         $errormessage .= "<li class='list-group-item'>Användarnamnet måste vara minst 4 tecken</li>";
      }

      if($_POST['password'] != $_POST['repeat-password']){
         $reppassfeedback = $passfeedback = "has-feedback has-error";
         $reppassglyph = $passglyph = "glyphicon-warning-sign";
         $error = 1;
         $errormessage .= "<li class='list-group-item'>Lösenorden matchar ej</li>";
      }else if(strlen($_POST['password']) <= 7){
         $reppassfeedback = $passfeedback = "has-feedback has-error";
         $reppassglyph = $passglyph = "glyphicon-warning-sign";
         $error = 1;
         $errormessage .= "<li class='list-group-item'>Lösenordet måste vara minst 8 tecken</li>";
      }
      
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $emailfeedback = "has-feedback has-error";
         $emailglyph = "glyphicon-warning-sign";
         $error = 1;
         $errormessage .= "<li class='list-group-item'>Ogiltigt mailformat</li>";
      }
      
      if(!$error){
         $seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
         shuffle($seed); // probably optional since array_is randomized; this may be redundant
         $salt = '';
         foreach (array_rand($seed, 32) as $k) $salt .= $seed[$k];
         $hashedPassword = hash("SHA512", mysqli_real_escape_string($conn,$_POST['password']) . $salt);
         $sql = "INSERT INTO users (user_name, user_password, user_email, user_first_name, user_last_name, user_active, user_salt) VALUES ('$username', '$hashedPassword', '$email', '$firstname', '$lastname', 0, '$salt')";
         $conn->query($sql);
         header("location:?p=login");
      }
   }
?>
<div class="row">
   <h2>
      Skapa konto
   </h2>
</div>
<div class="row">
   <div class="col-md-1">
   </div>
   <div class="col-md-10 col-xs-12">
      <form id='signup_form' method=post action=''>
      	<div class="form-horizontal">
            <?php
               if($error){
                  echo "<div class='col-sm-12'>
                     <ul class='list-group'>
                        $errormessage
                     </ul>
                  </div>";
               }
            ?>
            <div class="form-group <?php echo $usernamefeedback;?>">
               <label class="col-sm-2 control-label" for="username-input">Användarnamn:</label>
               <div class="col-sm-10">
                  <input type=text class="form-control" placeholder="Username" value="<? echo $username; ?>" name="username" id="username-input">
                  <span class="glyphicon <?php echo $usernameglyph;?> form-control-feedback"></span>
               </div>
         	</div>

            <div class="form-group <?php echo $passfeedback;?>">
               <label class="col-sm-2 control-label" for="pass-input">Lösenord:</label>
               <div class="col-sm-10">
                  <input type=password class="form-control <?php echo $haserror; ?>" placeholder="Password" name="password" id="pass-input">
                  <span class="glyphicon <?php echo $passglyph;?> form-control-feedback"></span>
               </div>
            </div>

            <div class="form-group <?php echo $reppassfeedback;?>">
               <label class="col-sm-2 control-label" for="repeat-pass-input">Upprepa lösenord:</label>
               <div class="col-sm-10">
                  <input type=password class="form-control <?php echo $haserror; ?>" placeholder="Repeat password" name="repeat-password" id="repeat-pass-input">
                  <span class="glyphicon <?php echo $reppassglyph;?> form-control-feedback"></span>
               </div>
            </div>

            <div class="form-group <?php echo $firstnamefeedback;?>">
               <label class="col-sm-2 control-label" for="firstname-input">Förnamn:</label>
               <div class="col-sm-10">
                  <input type=text class="form-control" placeholder="First name" value="<? echo $firstname; ?>" name="firstname" id="firstname-input">
                  <span class="glyphicon <?php echo $firstnameglyph;?> form-control-feedback"></span>
               </div>
            </div>

            <div class="form-group <?php echo $lastnamefeedback;?>">
               <label class="col-sm-2 control-label" for="lastname-input">Efternamn:</label>
               <div class="col-sm-10">
                  <input type=text class="form-control" placeholder="Last name" value="<? echo $lastname; ?>" name="lastname" id="lastname-input">
                  <span class="glyphicon <?php echo $lastnameglyph;?> form-control-feedback"></span>
               </div>
            </div>

            <div class="form-group <?php echo $emailfeedback;?>">
               <label class="col-sm-2 control-label" for="email-input">E-mail:</label>
               <div class="col-sm-10">
                  <input type=text class="form-control" placeholder="E-mail" value="<? echo $email; ?>" name="email" id="email-input">
                  <span class="glyphicon <?php echo $emailglyph;?> form-control-feedback"></span>
               </div>
            </div>

            <input type=submit class="btn btn-primary">
         </div>
      </form>	
   </div>
   <div class="col-md-1">
   </div>
</div>
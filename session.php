<?php
         include(db.php);
         session_start();
         $user_check=$_SESSION['login_user'];
         $ses_sql=mysqli_query($con,"select username,name from user_login where username='$user_check'");
         $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
         $loggedin_session=$row['name'];
         $loggedin_id=$row['username'];
         if(!isset($loggedin_session) || $loggedin_session==NULL) {
          echo "Go back";
                 header("Location: user.php");
                 }
        ?>
        //include login one html or php file here
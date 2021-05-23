<?php
     session_start();
     session_unset();

     session_destroy();
     echo '<script>alert("Logged out Successfully!"); 
          window.location.href = "/Chatbot/login.php"; 
          </script>' ;

?>
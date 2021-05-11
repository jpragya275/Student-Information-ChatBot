<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbConnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    $sql = "SELECT * FROM `signup` WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        if($password == $confirmPassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE `signup` SET password = '$hash' WHERE username = '$username' ";
            $result = mysqli_query($con, $sql);
            if($result){
               echo '<script>alert("Password changed successfully! You can now login."); window.location.href = "/chatBot/login.php"; </script>' ;
            }
            else{
                $error  = mysqli_error();
                echo '<script>alert("Some error occurred! Please try again"); window.location.href = "/chatBot/forgotPassword.php"; </script>' ;
            }
        }
        else{
            $error = "Passwords  do not match!";
            echo '<script> alert("Passwords  do not match!"); window.location.href = "/chatBot/forgotPassword.php"; </script>' ;
        }
    }
    else{
        $error = "No such Username exists! Please try again.";
        echo '<script>alert("No such Username exists! Please try again."); window.location.href = "/chatBot/forgotPassword.php"; </script>' ;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
*{
    box-sizing: border-box;
  }

  body{
    background-color:#f1f1f1;
    /* rgb(238, 235, 235); */
    font-family: Arial, Helvetica, sans-serif;
    overflow: hidden;
  }

  .column{
    float : left;
    width:50%;
    /* padding:5px; */
  }

  .row{
  /* content: "";
  clear: both; */
  display: flex;
  max-height: 100%;
  }


  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 12px;
  }


  button {
    background-color: #4c6faf;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 12px;
  }

  button:hover {
    opacity: 0.5;
  }

  img{
    height:85%;
    width:85%;
    border-radius: 50%;
    padding:10px;
    margin-left: 50px;
    position: -webkit-sticky;
    position: sticky;
    top:0;
  }
  
  .formScroll{
  background-color: #f1f1f1;
  width: 85%;
  height: 80%;
  /* overflow: scroll; */
  margin: 20px;
  }

  .container {
    padding: 16px;
  }

  h1{
    text-align: center;
    color: #4c6faf;
  }

</style>
</head>
<body>

  <h1>Forgot Password</h1>
  <br><br><br>

  <div class="row">
    <div class="column">
      <img src = "cb1.png" >
      <p style="color:black; font-size: large; text-align:center;" >Don't worry, you will recover it!</p>
    </div>
    
    <div class="column">
      <div class="formScroll">
        <form action="/chatBot/forgotPassword.php" method="post">         
    
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="username" required>
    
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter New Password" name="password" required>
    
          <label for="confirm"><b>Confirm New Password</b></label>
          <input type="password" placeholder="Confirm New Password" name="confirmPassword" required>           
            
          <button type="submit">Submit</button>
        
      </form>
    </div>
  </div>
  </div>


</body>
</html>

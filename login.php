<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbConnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `signup` WHERE username = '$username' ";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_assoc($result)){
          if(password_verify($password, $row['password'])){
            //////////////****************************direct to the home page******************************//////////////////////
            echo '<script>alert("Login Successful!"); window.location.href = "https://google.com"; </script>' ;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
          }
          else{
            echo '<script>alert("Invalid Credentials! Try Again."); window.location.href = "/chatBot/login.php"; </script>' ;
          }
        }
    }
    else{
        echo '<script>alert("Invalid Credentials! Try Again."); window.location.href = "/chatBot/login.php"; </script>' ;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
  *{
    box-sizing: border-box;
  }

  body{
    background-color:#f1f1f1;
    /* rgb(238, 235, 235); */
    font-family: Arial, Helvetica, sans-serif;
  }

  .column{
    float : left;
    width:auto;
  }

  .row{
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
    border-radius: 12px;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.5;
  }

  .createNew {
    width: auto;
    padding: 10px 18px;
    background-color: green;
  }

  .container {
    padding: 16px;
    border-radius: 12px;
  }

  span.psw {
    float: right;
    padding-top: 14px;
  }

  .formScroll{
  background-color: #f1f1f1;
  width: 85%;
  height: 70%;
  /* overflow: scroll; */
  margin: 20px;
  }

  img{
    height:85%;
    width:80%;
    border-radius: 50%;
    padding:10px;
    margin-left: 35px;
  }

  h1{
    text-align: center;
    color: #4c6faf;
  }

</style>

<body>
  <h1>Welcome to JNU chatbot!</h1>
  <br><br><br>

  <div class="row">
    <div class="column">
      <img src = "cb1.png" >
      <p style="color:black; font-size: large; text-align:center;" >The JNU chatbot is here to solve your queries!</p>
    </div>
    
    <div class="column">
      <br>
      <div class="formScroll">
        <form action="/chatBot/login.php" method="post">

          <div class="container" style="background-color:#f1f1f1">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
      
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
              
            <button type="login">Login</button>
          
            <button type = "button" onclick = "document.location='/chatBot/signup.php'" class = "createNew">Create New Account </button>
            <span class="psw"> <a href="/chatBot/forgotPassword.php">Forgot password?</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
    
</body>
</html>

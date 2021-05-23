<!-- ?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbConnect.php';
    $name = $_POST["name"];
    $course = $_POST["course"];
    $school = $_POST["school"];
    $yop = $_POST["yop"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
}

?> -->



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
    overflow: hidden;
  }

  .column{
    float : left;
    width:50%;
    /* padding:5px; */
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
    cursor: pointer;
    width: 100%;
    border-radius: 12px;
  }

  button:hover {
    opacity: 0.5;
  }
  
  img{
    height:50%;
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
  height: 55%;
  overflow: scroll;
  margin: 20px;
  }
  .container {
    padding: 16px;
  }

  h1{
    text-align: center;
    color: #4c6faf;
  }

  select {
        width: 100px;
        height: 40px;
        border-radius: 12px;
        /* margin: 10px; */
        /* padding:10px; */
    }

</style>
<body>

  <h1>Create New Account</h1>
  <br>
  
  <div class="row">
    <div class="column">
      <img src = "cb1.png" >
      <p style="color:black; font-size: large; text-align:center;" >Let the bot know you!</p>
    </div>

    <div class="column">
      <div class="formScroll">
        <form action="/chatBot/index.php" method="post">
          <div class="container" style="background-color:#f1f1f1">

            <label for="name"><b>Name</b></label>
            <input type="text" name = "name" required>

            <label for="course"><b>course</b></label>
            <input type="text"  name ="course" required>

            <label for="school"><b>school</b></label>
            <input type="text" name = "school" required>

            <label for="yop" style="white-space:pre-line;"><b>year of graduation</b></label>
            <br>
            <br>
            <select name="yop" required>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
            </select>
           
            <br>
            <br>

            <label for="email"><b>Email</b></label>
            <input type="text"name = "email" required>

            <label for="mobile"><b>Mobile Number</b></label>
            <input type="text" name = "mobile" required>
            
            <label for="username"><b>Username</b></label>
            <input type="text" name = "username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" name="password" required>

            <label for="psw"><b>Confirm Password</b></label>
            <input type="password" name="confirmPassword" required>
              
            <button type="submit">Submit</button>
      
      
        </form>    
      </div>    
    </div>
    
  </div>

</body>
</html>

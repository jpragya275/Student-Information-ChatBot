<?php
 include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
    <style>
        table{
       font-family: cursive;
       font-size: 20px;
       font-weight: bold;
       width:100%;
       padding:4px;
       height:500px;
    
       }
       .t1{
           background-color:grey;
           text-align:center;
           padding:4px;
           color: white;
       }
       .t2{
           background-color:wheat;
           text-align:center;
           padding:4px;
           color: darkbrown;
       }
       #log{
           color:black;
           font-weight:bold;
           text-align:center;
           background-color:wheat;
           padding:5px;
           font-family:cursive;
       }
       footer{
    padding: 5px;
    height: 30px;
    font-family: 'Baloo Bhai 2',cursive, bold;
    text-align: center;
    background-color: rgb(71, 86, 216);
}
        </style>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h1>STUDENT INFORMATION CHATBOT</h1>
        </div>
        <div class="navbar">
            <ul class="navb">
                <li><a href="user.php">Home</a></li>
                <li><a href="askques.php">Ask Question</sel></a></li>
                <li><a href="prev.php">Previously Asked Questions</a></li>
                <li><a href="myprof.php"><sel>My Profile</a></li>
                <li><a href="password.php">Change Password</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </div>
        <div id="contentbox"> 
    <h2 align='center' style='color:darkblue';>Welcome </h2>
    <?php
    $sql="SELECT * FROM user_login where username='alice2234'";
    $result=mysqli_query($conn,$sql);
    ?>
    <?php
     while($rows=mysqli_fetch_array($result)){
    ?>
    <form action="" method="POST">
      <table align="center" border="0" cellspacing='5' cellpadding='2'>
       <tr class="t1">
       <td> NAME: </td>
       <td> <?php echo $rows['name']; ?> </td>  
    </tr> 
    <tr class="t2">
       <td> COURSE: </td>
       <td> <?php echo $rows['course']; ?> </td>  
    </tr> 
    <tr class="t1">
       <td> MOBILE-NO: </td>
       <td> <?php echo $rows['mobile_no']; ?> </td>  
    </tr> 
    <tr class="t2">
       <td> SCHOOL: </td>
       <td> <?php echo $rows['school']; ?> </td>  
    </tr> 
    <tr class="t1">
       <td> YEAR OF GRADUATION: </td>
       <td> <?php echo $rows['yog']; ?> </td>  
    </tr> 
    <tr class="t2">
       <td> USERNAME: </td>
       <td> <?php echo $rows['username']; ?> </td>  
    </tr> 
    </table>
    </form>
    <?php
     }
    ?>
    </div>
    </div>
    <br> <br>
    <div>
    <footer>
        -------MY PROFILE--------
    </footer>
    </div>
</body>
</html>
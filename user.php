<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Home </title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
    <style>
        
#welcome{
    margin-top: 5px;
    float:right;
    opacity:70%;
    width:50%;
    height:400px;
}
#welText{
    border-style: ridge;
    float:left;
    height: 400px;
    width: 42% ;
    margin-left: 10px;
    color:rgb(78, 0, 0);
    text-align: justify;
    font-weight:lighter;
    padding:5px;
    margin-top: 150px;
    letter-spacing:2px;
    word-spacing: 3px;;
    font-size: 22px;
    font-family: 'Garamond,serif',cursive;
   
}
    </style>

</head>
<body >
    <div class="container">
        <div class="heading">
            <h1>STUDENT INFORMATION CHATBOT</h1>
        </div>
        <div class="navbar">
            <ul class="navb">
                <li><a href="user.php"><sel>Home</sel></a></li>
                <li><a href="askques.php">Ask Question</a></li>
                <li><a href="prev.php">Previously Asked Questions</a></li>
                <li><a href="myprof.php">My Profile</a></li>
                <li><a href="password.php">Change Password</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </div>
        <div id="welcome" class="para"> 
            <img src="image.jpg" alt="background image"> </div>
            <br><div><p id="welText">
             &nbsp; &nbsp;" Welcome here  !!<br>
            This Web Application provides answer to the queries of user. The user can query any 
            college related activities through this application. The activities can be Academic lectures, conference, workshop,
             Cultural activities,
             Sports activities,
             Protest demonstration by various organisation,
             Post dinner debates,
             Movie screening, etc. This system helps the student to be updated about the college activities.
             User does not have to go personally to college office for the enquiry.
             This application saves time for the student as well as teaching and non-teaching staffs."
    
        </p></div>
    
</body>
</html>
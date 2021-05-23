<?php
    $conn= new mysqli('localhost','root','','student chatbot');
    if($conn->connect_error)
        die('Connection failed : ' .$conn->connect_error);
    else
    {
        $q="SELECT DISTINCT * FROM `asked_ques` 
            WHERE status = 'helpful' 
            ORDER BY `date` DESC LIMIT 25";
        // $q="SELECT * from `asked_ques` WHERE status='abcd'";
        $result=$conn->query($q);
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previously Asked Questions</title>
    <!-- <link rel="stylesheet" href="prev.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
    <style>
        

h1{
    text-align: center;
    font-size: 50px ;
    color: #684682;
    text-shadow: wheat;
}

.navbar{
    /* border: 2px solid red; */
    text-align: center;
    width: 100%;
}
.navb{ 
    /* border: 2px solid yellow; */
    display: flex; 
    background-color:rgb(62 58 58) ;
    border-radius: 15px;
}
.navb li,a{
    /* border: 2px solid green; */
    text-decoration: none;
    list-style: none;
    font-family: 'Baloo Bhai 2', cursive;
    font-weight: bold;
    font-size: 20px;
    padding: 3px;
    color:white;
    margin: 2px 4px;
}
.navb li a:hover,sel{
    color:  rgb(238, 49, 49);
    cursor: pointer;
}

/* .sub-heading{
    border: 2px solid red;
    display: inline-block;
} */
h3{
    /* border: 2px solid red; */
    text-align: center;
    font-family: 'Baloo Bhai 2', cursive;
    font-weight: bold;
    font-size: 25px;
    color: purple;
    margin-top: 0px;
}

tr:nth-child(odd){
    background: #b3f4f7;
}
tr:nth-child(even){
    background : #e6f5c1;
}
th{
    background : #79bdde;
    
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
                <li><a href="askques.php" >Ask Question</a></li>
                <li><a href="prev.php"><sel>Previously Asked Questions</sel></a></li>
                <li><a href="myprof.php">My Profile</a></li>
                <li><a href="password.php">Change Password</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </div>
        <div class="sub-heading">
            <h3>Previously Asked Questions</h3>
        </div>
                <?php 
                    if($result->num_rows > 0)
                    { ?>
                        <div class="content">
                            <table align="center" border="1px" style="width : 800px;" >
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                </tr>
                                <?php
                        while($rows=$result->fetch_assoc())
                        {
                            ?>
                            <tr>
                                <td><?php echo $rows['Question'];?></td>
                                <td><?php echo $rows['ans'];?></td>
                                <td><?php echo $rows['category'];?></td>
                                <td><?php echo $rows['date'];?></td>
                            </tr>
                            <?php
                        }
                    }
                    else
                        echo "<p style= 'color : red ;' align='center'>".
                            "<font size= '30' face='Arial'>"
                        . "NO Record Found ! "."</p>";
                        
                ?>

            </table>
        </div>
    </div>
    
</body>
</html>
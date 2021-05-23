
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- <link rel="stylesheet" href="password.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
    <style>
        
 h1{
    text-align: center;
    font-size: 50px ;
    color:  #684682;
    text-shadow: wheat;
    /* background: rgb(156 10 10); */
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


.content{
    /* border: 2px solid red; */
    display: inline-block;
    margin-top: 50px;
    margin-left: 500px;
    width: max-content;
    text-align: center;
    padding: 20px;
    background-color: rgb(204, 198, 204);
    
}
.formgrp input{
    /* border: 2px solid pink; */
    margin: 10px 10px;
    padding: 2px;
    width: 250px;
    text-align: center;
    font-family: 'Baloo Bhai 2', cursive;
    font-size: 20px;
    border-radius: 15px;
}
.btn button{
    border-radius: 5px;
    font-family: 'Baloo Bhai 2', cursive;
    padding: 2px;
    font-size: 15px;
    background: rgb(45, 45, 94);
    color: mintcream;
    display: inline-block;
    margin-right: auto;
    
}

button:hover{
    cursor: pointer;
    color: rgb(165, 165, 199);
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
                <li><a href="prev.php">Previously Asked Questions</a></li>
                <li><a href="myprof.php">My Profile</a></li>
                <li><a href="password.php"><sel>Change Password</sel></a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <form action="" method="POST">
                <div class="formgrp">
                    <input type="password" name="current"  placeholder="Enter current password">
                </div>
                <div class="formgrp">
                    <input type="password" name="new"  placeholder="Enter new Password">
                </div>
                <div class="formgrp">
                    <input type="password" name="confirm"  placeholder="Confirm Password">
                </div>
               <div class="btn">
                    <input type="submit" name="submit">
               </div>
                
            </form>
        </div>
        <?php
            
            if(isset($_POST['submit']))
            {
                if(!$_POST['current'] || !$_POST['new'] ||  !$_POST['confirm'])
                {
                    ?>
                    <script>
                        confirm("Please enter the password and then click submit");
                    </script>
                    <?php
                }
                else if($_POST['current'] && $_POST['new'] && $_POST['confirm'])
                
                {
                    $current=$_POST['current'];
                    $new=$_POST['new'];
                    $confirm=$_POST['confirm'];
                    $conn= new mysqli('localhost','root','','student chatbot');
                    if($conn->connect_error)
                        die('Connection failed : ' .$conn->connect_error);
                        else
                    {
                        //here we require the username and then
                        // check if current=password of that username. if yes the proceed
                        //for now i m just checking if current exists in password column..
                        $q1=$conn->prepare("SELECT * from signup1
                            where `password`=?");
                        $q1->bind_param("s",$current);
                        $q1->execute();
                        $result=$q1->get_result();
                    }
                    if($result->num_rows>0)
                    {
                        if($new==$confirm)
                        {
                            $q=$conn->prepare("UPDATE signup1
                                set `password`=?
                                where `password`=?");
                            $q->bind_param('ss',$new ,$current);
                            $q->execute();
                            echo  "<p align='center'> <font color=green font face='arial' size='4pt' >
                            Password changed successfully !</font> </p>";
                        }
                        else
                        echo   "<p align='center'> <font color=red font face='arial' size='4pt' align='center'>
                        Re-write Password!</font> </p>";
                        
                    }
                    else    
                    echo  "<p align='center'> <font color=red font face='arial' size='4pt' align='center'>
                    Current password does not match!</font> </p>";
                    
                }
                
            }
        //     echo  "<p align='center'> <font color=blue font face='arial' size='4pt' align='center'>
        // Please Enter the Password</font> </p>";
        ?>
    </div>
    
    
</body>
</html>
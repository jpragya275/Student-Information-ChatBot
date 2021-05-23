<?php
    if(isset($_POST['reset']))
        $_POST=array();
                
    if(isset($_POST['query']) && isset($_POST['events']))
    {
        $ques=$_POST['query'];
        $cat=$_POST['events'];

        $conn= new mysqli('localhost','root','','student chatbot');
        if($conn->connect_error)
            die('Connection failed : ' .$conn->connect_error);
        else
        {
            $q=$conn->prepare("SELECT `answer` FROM `question` 
                WHERE `category`= ? AND ( (? LIKE CONCAT('%',`main_key`,'%'))
                OR (? LIKE CONCAT('%',`key1`,'%')) 
                OR (? LIKE CONCAT('%',`key2`,'%'))
                OR (? LIKE CONCAT('%',`key3`,'%')))"); 
            $q->bind_param("sssss",$cat,$ques,$ques,$ques,$ques);
            $q->execute();
            $result=$q->get_result();
            $row="";
            $st="helpful";
            if($result->num_rows > 0)
            {
                $row=$result->fetch_assoc();
                $query=$conn->prepare("INSERT into asked_ques VALUES (?,?,?,?,?)");
                $query->bind_param("sssss",$ques,$row['answer'],$cat,$dt,$st);
                $dt=date("Y-m-d");
                $query->execute();
            }
            else{
                $row="NO answer found!";
                $st="invalid answer";
                $query=$conn->prepare("INSERT into asked_ques VALUES (?,?,?,?,?)");
                $query->bind_param("sssss",$ques,$row,$cat,$dt,$st);
                $dt=date("Y-m-d");
                $query->execute();
            }
        }
        
    }
?>
                            
                
                            
                    

                                

            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask Question</title>
    <!-- <link rel="stylesheet" href="askques.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@500&display=swap" rel="stylesheet">
    <style>
        
h1{
    /* border: 2px solid red; */
    text-align: center;
    font-size: 50px ;
    color: #684682;
    text-shadow: wheat;
}

.navbar{
    /* border: 2px solid red; */
    /* display: block; */
    width: 100%;
    text-align: center;
    
}
.navb{
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
h3{
    text-align: center;
    font-family: 'Baloo Bhai 2', cursive;
    font-weight: bold;
    font-size: 30px;
    color:purple;
    /* background-color: rgb(245, 174, 245); */
    margin: 0px;
    
}
.content{
    /* border: 10px double purple; */
    display:inline-block;
    text-align: center;
    margin-left: 400px; 
    margin-top: 30px;
    padding: 20px 20px;
    background-color: rgb(204, 198, 204);
}

.formgrp input{
    /* border: 2px solid green; */
    margin: 10px 10px;
    padding: 5px;
    width: 450px;
    text-align: center;
    font-family: tahoma;
    font-size: 15px;
    border-radius: 15px;
    /* background-color: rgb(223, 219, 223); */
}
.formgrp label{
    margin: 5px 5px;
    font-size: 18px ;
    font-family:'Baloo Bhai 2', cursive ;
    text-align: center;
    /* background-color: rgb(223, 219, 223); */
}
.formgrp option{
    size: 20px;
    font-size: 15px;
    font-family:'Baloo Bhai 2', cursive ;
    /* background-color: rgb(223, 219, 223); */
}

.btngrp{
    /* border: 2px solid yellow; */
    margin-top: 10px;
}

.btngrp{
    border-radius: 5px;
    font-family: 'Baloo Bhai 2', cursive;
    padding: 2px;
    font-size: 15px;
    background: rgb(45, 45, 94);
    color: mintcream;
    display: inline-block;
    margin-right: auto;
    margin-right: 25px;
}
.butn {
  font-family: 'Baloo Bhai 2', cursive;
  background-color: #14141f;
  color: white;
  padding: 8px 12px;
  font-size: 16px;
  margin: -3px 1px;
  border: none;
  border-radius: 10px;
  cursor: pointer;
}
.butn:hover {
  color: #f00;
  background-color: #000;
}
.answergrp{
    /* border: 2px solid black; */
    margin-top: 20px;

}
.answer input{
    border-radius: 15px;
    text-align: center;
    font-family: 'Baloo Bhai 2', cursive;
    font-size: 15px;
    width: 450px;
    /* background-color: rgb(155, 107, 155); */
}
/*.answergrp button{
    border-radius: 5px;
    font-family: 'Baloo Bhai 2', cursive;
    padding: 2px;
    font-size: 15px;
    background: rgb(45, 45, 94);
    color: mintcream;
    display: inline-block;
    margin-top: 10px;
    margin-right: 25px;
} */
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
                <li><a href="askques.php"><sel>Ask Question</sel></a></li>
                <li><a href="prev.php">Previously Asked Questions</a></li>
                <li><a href="myprof.php">My Profile</a></li>
                <li><a href="password.php">Change Password</a></li>
                <li><a href="login.php">Logout</a></li>
            </ul>
        </div>
        <div class="sub-heading">
            <h3>Ask Your Queries Here...</h3>
        </div>
        <div class="content">
            <form action="" method="POST">
                <div class="formgrp">
                    <input type="text" name="query" placeholder="Enter your Query" value="<?php 
                        if(isset($_POST['query']))
                          {  echo $_POST['query']; } ?>">
                </div>
                <div class="formgrp">
                    <label for="event" >Choose category</label>
                    <select name="events" id="event" value="<?php 
                        if(isset($_POST['events']))
                           { echo $_POST['events']; } ?>" >
                        <option value="sel" >--select--</option>
                        <option value="Examination">Examination</option>
                        <option value="Seminar/Workshop">Seminar/Workshop</option>
                        <option value="holiday">Holiday</option>
                        <option value="admission">Admissions</option>
                        <option value="results">Results</option>
                        <option value="academics">Academics</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div>
               <br> <input type="submit" class="butn" value="SUBMIT" name="submit">
               &nbsp  <input type="submit" class="butn" value="RESET" name="reset" >
            </b>    </div>
                
            </form>
            <div class="answergrp">
             <div class="answer">
                    <h3>Answer:</h3>
                    <input type="text" value="<?php if(isset($_POST['submit'])) {
                        if($result->num_rows>0) echo $row['answer'] ;
                        else echo $row ; } ?>">
                </div><br>
                <button class="butn", name='invalid'>MARK AS INVALID</button>
                <!-- <input type="reset"  value="RESET" > -->
            </div>

        </div>
    </div>
</body>
</html>


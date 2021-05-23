<?php
     session_start();
     require("connect.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Answers by admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background: linear-gradient(to bottom, #3c3c3c 0%, #101010 100%);
  padding: 5px, 20px;
  text-align: center;
  font-size: 30px;
  color: white;
  border-radius:18px;
}

.column {
  float: left;
  padding: 10px;
}

/* Style the navigation menu */
.column.side {
  width: 40%;
  width: 250px;
  border-radius:12px;
  background-color: #e8ffff;
  padding: 20px;
}

.column.middle {
  width: 50%;
  border-radius:12px;
  background: linear-gradient(to bottom right, #aaffff 0%, #ffffff 100%);
  padding: 50px;
  margin:30px 50px;
}

/* Navigation Bar */
.column.side ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  border-radius:12px;
  background-color: #202020;
}

li a {
  display: block;
  color: #fff;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  color: #85ffff;
}
li a:hover:not(.active) {
  color: #85ffff;
}
.main{
 // margin-left: 16%;
  width: 400px;
  align: center;
  border-radius: 14px;
  padding: 18px;
  box-shadow:
		0 2px 6px rgba(0,0,0,0.5),
		inset 0 1px rgba(255,255,255,0.3),
		inset 0 10px rgba(255,255,255,0.2),
		inset 0 10px 20px rgba(255,255,255,0.25),
		inset 0 -15px 30px rgba(255,255,255,0.3);
	background:rgba(255,255,255,0.25);
}

.formgrp input{
    margin-top: 20px;
    align: center;
    margin-left: 16%;
    padding: 2px;
    width: 250px;
    text-align: center;
    font-family: 'Baloo Bhai 2', cursive;
    font-size: 20px;
    border-radius: 15px;
    z-index: 2;
}
.formgrp input:hover{
    border-radius: 20px;
}

#btn {
  background-color: #14141f;
  margin-top: 20px;
  margin-left: 40%;
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 12px;
  cursor: pointer;

}


/* Style the footer */
footer {
  background: linear-gradient(to bottom, #202020 0%, #101010 100%);
  border-radius: 15px;
  padding: 10px;
  text-align: center;
  color: white;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
/*mobile view*/
@media screen and (max-width: 767px) {
  .column.side, .column.middle {
    width: 100%;
    margin: 5px;
  }
  .main{
   width: 200px;
   padding: 14px 10px;
  }
  .formgrp input{
    margin-left: 2%;
    width: 180px;
    font-size: 15px;
   }
  #btn {
    margin-left: 30%;
  }
}
/* medium tablet */
@media screen and (min-width: 768px) and (max-width: 950px) {
  .column.side {
    max-width: 35%;
    margin: 5px;
  }
  .column.middle {
    float: right;
    min-width: 62%;
    margin: 5px;
  }
  .main{
    width: 300px;
    //margin-left: 6%;
  }
  .formgrp input{
    margin-left: 4%;

   }
}
/* large tablet */
@media screen and (min-width: 950px) and (max-width: 1150px) {
  .column.side {
    margin: 5px;
    width: 300px;
  }
  .column.middle {
    float: right;
    width: 65%;
    margin: 5px;
  }
  .main{
    width: 350px;
  }
  .formgrp input{
    margin-left: 10%;
    //display: none;
  }
}
</style>
</head>
<body>

	<header>
 		 <h2>Student Information Chatbot</h2>
	</header>
	<div class="row">
                  <div class="column side">

  			 <ul>
			    <b> <li><a href="adminprof.php">My Profile</a></li>
			        <li><a href="question.php">Latest Questions</a></li>
 	  			<li><a href="answer.php">New Questions</a></li>
 	  			<li><a href="new_entry.php">Add Questions</a></li>
 	  			<li><a href="logout.php">Log Out</a></li>
     			    </b>
			 </ul>
  		  </div>
            <div class="column middle">
    			 <h1>Change Password</h1>
             <div class="main">
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
               <div>
                    <input type="submit" name="submit" id="btn" align='center';>
               </div>

            </form>
        </div>
        <?php
            $user=$_SESSION['username'];
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

                        $q1="SELECT * from signup where username='$user'";
                        $result = mysqli_query($conn, $q1);
                        if(mysqli_num_rows($result) == 1){
                            while($row = mysqli_fetch_assoc($result))
                            {
                               $pass1 = $row['password'];
                               if($pass1== $current)
                               {
                                    if($new==$confirm)
                                    {
                                        $q=$conn->prepare("UPDATE signup set `password`=? where username=?");
                                        $q->bind_param('ss',$new ,$user);
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
                }
                }

                ?>


    </div>
    </div>
    </div>
    <footer>
  		  <p>--Admin answer page--</p>
    </footer>
</body>
</html>






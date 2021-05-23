<?php include("dbConnect.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>My Profile</title>
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
  width: 35%;
  width: 250px;
  border-radius:12px;
  background-color: #e8ffff;
  padding: 20px;
}

.column.middle {
  width: 65%;
  border-radius:12px;
  background: linear-gradient(to bottom right, #aaffff 0%, #ffffff 100%);
  padding: 50px;
  margin:30px;

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

#datemin {
  border-radius: 12px;
  width: 200px;
}
#butn {
  background-color: #14141f;
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  border-radius: 12px;
  cursor: pointer;
}



table {
  border-collapse: collapse;
  width: 100%;
  align:center;
  padding:3px 5px;
}


tr:nth-child(even) { background-color: #fff;}

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
.t1{
  background-color:grey;
  color: white;
  text-align:center;
  font-weight:bold;
  padding:5px;
  color:darkblue;

}
.t2{
  background-color:wheat;
  text-align:center;
  font-weight:bold;
  padding:5px;
  color:darkblue;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
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
			    <b> <li><a class="active" href="profile.php">My Profile</a></li>
			        <li><a href="question.php">Latest Questions</a></li>
 	  			<li><a href="answer.php">New Questions</a></li>
 	  			<li><a href="new_entry.php">Add Questions</a></li>
                                <li><a href="https://www.google.com/">Log Out</a></li>
     			    </b>
			 </ul>
  		  </div>
 		  <div class="column middle">
                 <h1 align='center' style='color:darkblue';>Welcome </h2>
                 <?php
                      $sql="SELECT * FROM user_login where username='robin24'";
                      $result=mysqli_query($con,$sql);
                 ?>
                 <?php
                      while($rows=mysqli_fetch_array($result)){
                 ?>
                 <form action="" method="POST">
                 <table  cellspacing='15' cellpadding='13'>
                         <tr class="t1">
                         <td> NAME: </td>
                         <td> <?php echo $rows['name']; ?> </td>
                         </tr>
                         <tr class="t2">
                         <td> MOBILE-NO: </td>
                         <td> <?php echo $rows['mobile_no']; ?> </td>
                         </tr>
                         <tr class="t1">
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
       </div>
       </div>
	<footer>
  		  <p>--Admin answer page--</p>
	</footer>

</body>
</html>

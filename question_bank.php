<!DOCTYPE html>
<html lang="en">
<head>
<title>Question Bank</title>
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
.main textarea{
    padding: 5%;
    position: auto;
    border-radius: 15px;
    text-align: center;
    font-size: 15px;

}


table {
  border-collapse: collapse;
  width: 100%;
}

th{
   background-color: #000;
   color: white;
}
th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid lightcyan;	
  /*border-radius: 4px;	*/
}
 td{ font-size: 14px; }

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
			    <b> <li><a href="adminprof.php">My Profile</a></li>
			        <li><a href="question.php">Latest Questions</a></li>
 	  			<li><a href="answer.php">New Questions</a></li>
 	  			<li><a href="new_entry.php">Add Questions</a></li>
 	  			<li><a href="logout.php">Log Out</a></li>
     			    </b>
			 </ul>
  		  </div>
 		  <div class="column middle">
    			 <h1>Question Bank</h1>
                         <div class="main">
                             <form action="" method="post">
				<label for="datemin">Filter by Date</label>
  				<input type="date" id="datemin" name="datemin" min="2021-01-01" value="<?php
                                                      if(isset($_POST['datemin']))
                                                      {  echo $_POST['datemin']; } ?>"> <br><br>
                                <input type="submit" id="butn" value="Submit">
                             </form>

                             <?php
                             require("connect.php");

                             if(isset($_POST['datemin']))
                             {
                                 $date = $_POST["datemin"];
                                 $sql = "SELECT * FROM question WHERE dateAsked>= '$date' ORDER BY `dateAsked` DESC";
                                 $result = $conn->query($sql);

                                 if($result->num_rows > 0)
                                 { echo "
                                      <div style='overflow-x:auto;'>
  					<table>
    					     <tr>
     						<th>Question</th>
      						<th>Answer</th>
      						<th>Question Dated</th>
      						<th>Category</th>
                                                <th>Status</th>
     					     </tr>";

                                   while($row = $result->fetch_assoc())
                                   {
                                      echo
                                          "<tr><td>"
                                          . $row['main_key'] . "</td><td>"
                                          . $row['answer'] . "</td><td>"
                                          . $row['dateAsked'] . "</td><td>"
                                          . $row['category'] . "</td><td>"
                                          . $row['status'] . "</td></tr>" ;
                                   }
                                   echo "</table>";
                                   }

                                   else
                                   {
                                        echo "No results!";
                                   }

                             }

                             $conn->close();

                             ?>



				</div>

		         </div>
		  </div>

        </div>

	<footer>
  		  <p>--Admin answer page--</p>
	</footer>

</body>
</html>

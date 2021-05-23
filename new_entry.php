<?php
   require("connect.php");
   if(isset($_POST['question']))
      {   
          $sql = $conn -> prepare ("INSERT INTO admin (Question, Answer, category, key1, key2, key3, status) VALUES (?,?,?,?,?,?,?)" ) ;
          $q = $_POST["question"];
          $a = $_POST["answer"];
          $c = $_POST["category"];
          $k1 = $_POST["key1"];
          $k2 = $_POST["key2"];
          $k3 = $_POST["key3"];
          if($a=='') $s = "invalid";
          else $s = "answered";
          $sql -> bind_param("sssssss", $q, $a, $c, $k1, $k2, $k3, $s);
          $sql -> execute();
          ?>
          <script>
                  alert("Question added successfully!");
          </script>
          <?php
      }




$conn->close();

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
  width: 25%;
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

.butn {
  background-color: #14141f;
  color: white;
  padding: 14px;
  font-size: 16px;
  margin: -3px 1px;
  border: none;
  border-radius: 12px;
  cursor: pointer;
}
.butn:hover {
  color: #66ffff;
  background-color: #000;
}


.inputs{
  border-radius: 12px;
  width: 250px;
  height: 40px;
}
.main.one { float: left;}
.main.two { float: right;}


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
@media screen and (max-width: 767px){
  .column.side, .column.middle {
    width: 100%;
    margin: 5px;
  }
  .main.one { float: none;}
  .main.two { float: none;}
  .inputs{
  width: 230px;
  height: 35px;
  }
}
/* medium tablet view*/
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
  .inputs{
  width: 170px;
  height: 30px;
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
 	  			<li><a class="active" href="new_entry.php">Add Questions</a></li>
 	  			<li><a href="https://www.google.com/">Log Out</a></li>
     			    </b>
			 </ul>
  		  </div>
 		  <form action="" method="post">
                  <div class="column middle">
    			 <div class="main one">
    			         <p> <b>Question: </b> <br>  <input type="text" name="question" class="inputs" required> </p>
		   	         <p>   <b>Answer: </b> <br>  <input type="text" name="answer" class="inputs"> </p>
                                 <p>  <b>Category: </b> <br> <input type="text" name="category" class="inputs" required> </p>
    			 </div>
    			 <div class="main two">
    			         <p> <b>Key 1: </b> <br>  <input type="text" name="key1" class="inputs" required> </p>
		   	         <p> <b>Key 2: </b> <br>  <input type="text" name="key2" class="inputs" required>  </p>
                                 <p> <b>Key 3: </b> <br>  <input type="text" name="key3" class="inputs" required> </p>
    			 </div>

		  </div>

 		  <div class="column side">
   			        <p> <a href="answer.php"><button class="butn", type="submit" value="Submit" >Submit</button></a> </p>
		 		<p> <a href="#"><button class="butn", type="reset" value="Reset">Reset</button></a> </p>
		 		
                   </div>
                  </form>
        </div>

	<footer>
  		  <p>--Admin answer page--</p>
	</footer>

</body>
</html>


<?php
   require("connect.php");

   if(isset($_POST['ans']))
   {    $stmt = $conn -> prepare ("UPDATE admin SET Answer = (?), status = 'answered' WHERE id = ?" ) ;
        $entry = $_POST['ans'];
        $id = $_POST['id'];
        $stmt -> bind_param("si", $entry, $id);
        $stmt -> execute();

     }
    if(isset($_POST['invalid']))
     {    $stmt = $conn -> prepare ("DELETE FROM `admin` WHERE `admin`.`id` = ?" ) ;
          $id = $_POST['id'];
          $stmt -> bind_param("i", $id);
          $stmt -> execute();
          ?>
        <script>
                alert("Question removed!");
        </script>
        <?php
      }
      if(isset($_POST['skip']))
     {
        $stmt = $conn -> prepare ("UPDATE admin SET Answer = (?), status = 'invalid' WHERE id = ?" ) ;
        $entry = "skipped";
        $id = $_POST['id'];
        $stmt -> bind_param("si", $entry, $id);
        $stmt -> execute();
          ?>
        <script>
                alert("Question skipped!");
        </script>
        <?php
       }
   $sql = "SELECT id, Question, category FROM admin WHERE Answer = ' ' OR Answer IS NULL ORDER BY `dateAsked` ASC";
   $result = $conn->query($sql);

   if($result->num_rows > 0)
   {
     $row = $result->fetch_assoc();
     $display = $row['Question'];
     $display_category = $row['category'];
     $id = $row['id'];

    }
    else
    {
      $display = "No more unanswered Questions!";
      $display_category = " ";
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
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #d9d9d9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.6);
  z-index: 1;
  }
.dropdown { position: relative; }

.btn {
  color: black;
  padding: 15px;
  font-size: 16px;
  background-color: #d9d9d9;
  border-radius: 12px;
  border: none;
  cursor: pointer;
}
.btn:hover {
  background-color: #fafafa;

}
.dropdown-content a {
  color: black;
  text-align: center;
  padding: 14px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {
  background-color: #fafafa;
  border-radius: 12px;
}


.dropdown-content btn {
  color: black;
  padding: 14px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {
  display: block;
  border-radius: 12px;
  margin-left: 100px;
}
.inpt{
    position: auto;
    background-color: #f9f9f9;
    border: 2px solid black;
    border-radius: 15px;
    font-size: 15px;
    width: 270px;
    height: 40px;
}
.inputs{
    position: auto;
    border-radius: 15px;
    text-align: center;
    font-size: 15px;
    width: 380px;
    height: 200px;
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
@media screen and (max-width: 767px){
  .column.side, .column.middle {
    width: 100%;
    margin: 5px;
  }
  .inputs{
    width: 280px;
    height: 400px;
  }
  .inpt{
    width: 180px;
    height: 40px;
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
    width: 380px;
    height: 200px;
  }
  .inpt{
    width: 269px;
    height: 40px;
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
  .inputs{
    width: 420px;
    height: 200px;
  }
  .inpt{
    width: 315px;
    height: 40px;
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
 	  			<li><a class="active" href="answer.php">New Questions</a></li>
 	  			<li><a href="new_entry.php">Add Questions</a></li>
                                <li><a href="https://www.google.com/">Log Out</a></li>
     			    </b>
			 </ul>
  		  </div>
 		  <form action="" method="post">
                  <div class="column middle">
    			 <h2>Question: </h2>
                         <div class="main">
                         	 <p> <b> <?php echo $display; ?> </b> </p>
                         	 <p> <b><label for="category">Category: </label> </b>
                                        &nbsp &nbsp
                                        <input type="text" name="category" class="inpt" value="<?php echo $display_category; ?>" disabled> </p>

                                 <p>   <h4>Answer: </h4> <br>  <input type="text" name="ans" class="inputs"> 
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                 </p>
    			 </div>
		  </div>

 		  <div class="column side">
   			 <div class="dropdown">
				<button class="butn">other Options</button>
 		 		<div class="dropdown-content">

                                        <button class="btn" name="invalid">Mark Question Invalid</button>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <a href="invalid.php">View invalid Answers</a>

 		  		</div>
	 		 </div>

                                <p> <button class="butn", type="submit" value="Submit">Submit</button></a> </p>
                                <p> <button class="butn"  name="skip">Skip Question</button></a>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                </p>

                   </div>
                   </form>
        </div>

	<footer>
  		  <p>--Admin answer page--</p>
	</footer>

</body>
</html>

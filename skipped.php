<?php
   require("connect.php");
   //$admin=0;
   //$user=0;
   if((isset($_POST['ans'])) && ($_POST['ans'])!="")
   {
        if($result1->num_rows > 0)
        {
          $stmt = $conn -> prepare ("UPDATE question SET answer = (?), status = 'answered' WHERE Q_id = ?" ) ;
          $id = $_POST['Q_id'];
        }
         else if($result2->num_rows > 0)
        {
          $stmt = $conn -> prepare ("UPDATE asked_ques SET ans = (?), status = 'helpful' WHERE id = ?" ) ;
          $id = $_POST['id'];
        }
        $answer = $_POST['ans'];
        $stmt -> bind_param("si", $answer, $id);
        $stmt -> execute();
        ?>
        <script>
                alert("Answer added successfully!");
        </script>
        <?php
     }
    if(isset($_POST['valid']))
     {   if($result1->num_rows > 0)
         {
             $stmt = $conn -> prepare ("UPDATE question SET status = 'answered' WHERE Q_id = ?" );
             $id = $_POST['Q_id'];
          }
          else if ($result2->num_rows > 0)
          {
             $stmt = $conn -> prepare ("UPDATE asked_ques SET status = 'invalid question' WHERE id = ?" ) ;
             $id = $_POST['id'];
          }

          $stmt -> bind_param("i", $id);
          $stmt -> execute();

          if($result1->num_rows > 0)
           {
            ?>
            <script>
                alert("Answer marked valid!");
            </script>
            <?php
           }
          else if ($result2->num_rows > 0)
          {
            ?>
            <script>
                alert("Question marked invalid!");
            </script>
            <?php

          }
      }
      if(isset($_POST['remove']))
      {
          if($result1->num_rows > 0)
          {
              $stmt = $conn -> prepare ("DELETE FROM question WHERE question.Q_id = ?" ) ;
              $id = $_POST['Q_id'];
          }
          else if ($result2->num_rows > 0)
          {
              $stmt = $conn -> prepare ("DELETE FROM `asked_ques` WHERE `asked_ques`.`id` = ?" ) ;
              $id = $_POST['id'];
          }
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
          if($result1->num_rows > 0)
          {
             $stmt = $conn -> prepare ("UPDATE question SET status = 'invalid answer' WHERE Q_id = ?" ) ;
             $id = $_POST['Q_id'];
          }
          else if ($result2->num_rows > 0)
          {
              $stmt = $conn -> prepare ("UPDATE asked_ques SET status = 'new' WHERE id = ?" ) ;
              $id = $_POST['id'];
          }
          $stmt -> bind_param("i", $id);
          $stmt -> execute();
          ?>
          <script>
                alert("Question skipped!");
          </script>
          <?php
       }

       // 1 is for questions skipped in question table -> status: invalid answer (to skip)
       // 2 is for questions skipped asked_ques table  -> status: new

   //question with invalid answer in bank was skipped
   $sql1 = "SELECT Q_id, main_key, answer, category FROM question WHERE `status` = 'skipped' ORDER BY `dateAsked` ASC";
   $result1 = $conn->query($sql1);

   if($result1->num_rows > 0)
   {
     //$admin=1;  $user=0;
     $row1 = $result1->fetch_assoc();
     $display_question = $row1['main_key'];
     $display_answer = $row1['answer'];
     $display_category = $row1['category'];
     $display_date = " ";
     $id = $row1['Q_id'];

    }
    else
    {  //new question was skipped
       $sql2 = "SELECT id, Question, ans, category, date FROM asked_ques WHERE status = 'skipped' ORDER BY `date` ASC";
       $result2 = $conn->query($sql2);

       if($result2->num_rows > 0)
       {
           //$admin=0;  $user=1;
           $row2 = $result2->fetch_assoc();
           $display_question = $row2['Question'];
           $display_answer = $row2['ans'];
           $display_category = $row2['category'];
           $display_date = "Asked on: " .$row2['date'];
           $id = $row2['id'];

        }
        else
        {
            //$admin=0; $user=0;
            $display_question = "No more unanswered Questions!";
            $display_answer = "  ";
            $display_category = "  ";
        }
      }

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Skipped Questions</title>
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
  box-shadow:
		0 2px 6px rgba(0,0,0,0.5),
		inset 0 1px rgba(255,255,255,0.3),
		inset 0 10px rgba(255,255,255,0.2),
		inset 0 10px 20px rgba(255,255,255,0.25),
		inset 0 -15px 30px rgba(255,255,255,0.3);
	background: #e8ffff;
//  background-color: #e8ffff;
  padding: 20px;
}

.column.middle {
  width: 50%;
  border-radius: 6px;
  //background: linear-gradient(to bottom right, #aaffff 0%, #ffffff 100%);
  padding: 50px;
  margin:30px;
  box-shadow:
		0 2px 6px rgba(0,0,0,0.5),
		inset 0 1px rgba(255,255,255,0.3),
		inset 0 10px rgba(255,255,255,0.2),
		inset 0 10px 20px rgba(255,255,255,0.25),
		inset 0 -15px 30px rgba(255,255,255,0.3);
	background:linear-gradient(to bottom right, #aaffff 0%, #ffffff 100%);
}

/* Navigation Bar */
.column.side ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  border-radius:12px;
  box-shadow:
		0 2px 6px rgba(0,0,0,0.5),
		inset 0 1px rgba(255,255,255,0.3),
		inset 0 10px rgba(20,20,20,0.2),
		inset 0 10px 20px rgba(25,25,25,0.25),
		inset 0 -15px 30px rgba(25,25,25,0.3);
	background: #202020;
  //background-color: #202020;
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
  padding: 15px 19px;
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

.inputs{
    position: auto;
    border-radius: 15px;
    text-align: center;
    font-size: 15px;
    width: 380px;
    height: 200px;
}
.inpt{
    position: auto;
    background-color: #f9f9f9;
    border: 2px solid black;
    border-radius: 15px;
    font-family: 'Baloo Bhai', cursive;
    font-size: 15px;
    width: 250px;
    height: 40px;
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
 		  <form action="" method="post">
                  <div class="column middle">
    			 <div style="float: right; position: absoluter; margin-right: 6px; margin-top:-10px;">
                                <b> <?php echo $display_date; ?> </b>
                         </div>
                         <h2>Skipped Questions: </h2>
                         <div class="main">
                         	 <p> <b><label for="question">Question: </label> </b>
                                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                        <input type="text" name="question" class="inpt" value="<?php echo $display_question; ?>" disabled> </p>
                                 <p> <b><label for="p_ans">Previous Answer: </label> </b>
                                        <input type="text" name="p_ans" class="inpt" value="<?php echo $display_answer; ?>" disabled> </p>
                                 <p> <b><label for="category">Category: </label> </b>
                                        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                        <input type="text" name="category" class="inpt" value="<?php echo $display_category; ?>" disabled> </p>
                                 <p> <b><label for="ans">Answer: </label> </b>  </br> </br>
                                        &nbsp &nbsp
                                        <input type="text" name="ans" class="inputs">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                 </p>
    			 </div>
		  </div>

 		  <div class="column side">
   			 <div class="dropdown">
				<button class="butn">other Options</button>
 		 		<div class="dropdown-content">
                                        <a href="Skipped.php">Reload Page</a>
                                        <button class="btn" name="valid">Mark Valid/Invalid</button>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <button class="btn" name="remove">Remove the question</button>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">

 		  		</div>
	 		 </div>

                                <p> <a href="invalid.php"><button class="butn", type="submit" value="Submit" >Submit</button></a> </p>
		 		<p> <button class="butn"  name="skip">Skip Question</button>
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

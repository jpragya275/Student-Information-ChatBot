<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbConnect.php';
    $name = $_POST["name"];
    $course = $_POST["course"];
    $school = $_POST["school"];
    $yop = $_POST["yop"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    $sql = "SELECT * FROM `signup` WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 0){
        if($password == $confirmPassword){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `signup` (`name`, `course`, `school`, `year of graduation`, `email`, `mobile`, `username`, `password`)
                    VALUES ('$name', '$course', '$school', '$yop', '$email', '$mobile', '$username', '$hash');";
            $result = mysqli_query($con, $sql);
            if($result){
               echo '<script>alert("Signup Successful! You can now login."); window.location.href = "/chatBot/login.php"; </script>' ;
            }
            else{
                $error  = mysqli_error();
            }
        }
        else{
            $error = "Passwords  do not match!";
        }
    }
    else{
        $error = "Username already exists! Please choose a different one";
    }
}
?>

<script type = "text/javascript">
    var x = "<?php echo "$error"?>";
    alert(x);
    window.location.href = "/chatBot/signup.php";
</script>
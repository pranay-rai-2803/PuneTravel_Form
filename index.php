<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // create a database connection
    $con = mysqli_connect($server, $username, $password);
    
    // check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    //collect post variables execute the query
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` ( `Name`, `Age`, `Gender`,
            `Email`, `Phone`, `Other`, `Date`)     VALUES ('$name',
             '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //   echo $sql;   
      
      if($con->query($sql) == true){
        //   echo "successfully inserted";

        //flag for insertion variable
        $insert = true;
      }else {
          echo "ERROR : $sql </br> $con->error";
      }

      // close connection variable
      $con->close();

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Welcome to Travel Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet">
    <script src='main.js'></script>
    <link rel="stylesheet" href="style.css">
    
</head>


<body>
    <img class="bg" src ="bg.jpg" alt="Pune">
    <div class="container">
        <h3>Welcome to PuneTravels</h3>
        <p>Enter your deatils and submit this form to 
            confirm your participation in the trip</p>
            <?php
            if($insert == true){
            echo  "<p class='submitMsg'>Thanks for submitting the form . Hope to see you soon in person.</p> ";           
            }
            ?>

            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your age ">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender ">
                <input type="email" name="email" id="email" placeholder="Enter your emailId">
                <input type="phone" name="phone" id="phone" placeholder="Enter your mobile number">                
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information 
                here"></textarea>
                <button type="btn">Submit</button>
                <button type="reset">Reset</button>
            </form>
    </div>
    <script src="index.js"></script>
</body>


</html>
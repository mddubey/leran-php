<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }

    $mysqli = new mysqli("localhost","root","","first_db") or die("Error " . mysqli_error($mysqli));
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $details = $mysqli->real_escape_string($_POST['details']);
       $time = strftime("%X"); //time
       $date = strftime("%B %d, %Y"); //date
       $decision = "no";

       foreach($_POST['public'] as $each_check) //gets the data from the checkbox
       {
          if($each_check != null){ //checks if checkbox is checked
             $decision = "yes"; // sets the value
          }
       }

       $mysqli->query("INSERT INTO list(details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')"); //SQL query
       header("location:home.php");
    }
    else
    {
       header("location:home.php");
    }
?>
<html>
  <head>
    <title>My first PHP website</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <?php
    session_start(); //starts the session
    if($_SESSION['user']){ //checks if user is logged in
    }
    else{
    header("location:index.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
  ?>
  <body>
    <h2>Home Page</h2>
    <p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
    <a href="logout.php">Click here to logout</a><br/><br/>
    <form action="add.php" method="POST">
      Add more to list: <input type="text" name="details"/><br/>
      public post? <input type="checkbox" name="public[]" value="yes"/><br/>
      <input type="submit" value="Add to list"/>
    </form>
    <h2 align="center">My list</h2>
    <table border="1px" width="100%" class = "table table-hover">
      <tr>
        <td align="center"><strong>Id</strong></td>
        <td align="center"><strong>Details</strong></td>
        <td align="center"><strong>Post Time</strong></td>
        <td align="center"><strong>Edit Time</strong></td>
        <td align="center"><strong>Edit</strong></td>
        <td align="center"><strong>Delete</strong></td>
        <td align="center"><strong>Public Post</strong></td>
      </tr>
      <?php
        $mysqli = new mysqli("localhost","root","","first_db") or die("Error " . mysqli_error($mysqli));
        $query = $mysqli->query("Select * from list"); // SQL Query
        while($row = mysqli_fetch_array($query)){
          Print "<tr>";
          Print '<td align="center">'. $row['id'] . "</td>";
          Print '<td align="center">'. $row['details'] . "</td>";
          Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
          Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
          Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
          Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
          Print '<td align="center">'. $row['public']. "</td>";
          Print "</tr>";
        }
      ?>
    </table>
    <script>
      function myFunction(id){
        var r=confirm("Are you sure you want to delete this record?");
        if (r==true)
          window.location.assign("delete.php?id=" + id);
      }
    </script>
  </body>
</html>
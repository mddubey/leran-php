<html>
    <head>
        <title>My first PHP website</title>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
    </head>
    <body>
        <?php
        echo "<p>I am here</p>";
        ?>
        <a href="login.php">Click here to login</a> <br/>
        <a href="register.php">Click here to register</a>
        <br/>
        <h2 align="center">List</h2>
        <table border="1px" class = "table table-hover">
            <tr>
                <td align="center"><strong>Id</strong></td>
                <td align="center"><strong>Details</strong></td>
                <td align="center"><strong>Post Time</strong></td>
                <td align="center"><strong>Edit Time</strong></td>
            </tr>
            <?php
                $mysqli = new mysqli("localhost","root","","first_db") or die("Error " . mysqli_error($mysqli));
                $query = $mysqli->query("Select * from list Where public='yes'"); // SQL Query
                while($row = mysqli_fetch_array($query))
                {
                    Print "<tr>";
                    Print '<td align="center">'. $row['id'] . "</td>";
                    Print '<td align="center">'. $row['details'] . "</td>";
                    Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
                    Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
                    Print "</tr>";
                }
            ?>
        </table>
    </body>
</html>
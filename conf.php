
<?php

$db_server = "localhost";
$db_user="root";
$db_password="123";
$db_database="apple";

$mysqli = new mysqli($db_server,$db_user,$db_password,$db_database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
  echo "Connected successfully";

if(isset($_POST['search'])){

$search_db=$_POST['search'];
$sql ="SELECT * FROM iphone WHERE p_name LIKE '%$search_db%' OR p_gb LIKE '%$search_db%'";
$result=$mysqli->query($sql);

}


?>


<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>Search Button</h1>

<form method="POST" action="">
    <input type="text" name="search">
    <input type="submit" value="Submit">


</form>





<tbody>
        <?php
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){

        
        echo "
        
        <p>".$row['id']. " " .$row['p_name'] . " ".$row['p_gb']." ".$row['p_colour']."</p> 
        ";
    }
    }
        ?>
      </tbody>


</body>
</html> 
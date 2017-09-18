<?php

//filter_input(INPUT_POST, 'var_name') instead of $_POST['var_name']
//filter_input_array(INPUT_POST) instead of $_POST
        
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mytodolistdb";
    
try 
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM tasks WHERE id=" . filter_input(INPUT_GET, 'id');

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    
    header("Location: index.php");
    die();
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;



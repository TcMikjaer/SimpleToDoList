<?php

//if ( !empty(filter_input_array(INPUT_POST))) {
//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $dbname = "mytodolistdb";
//
//    
//    $taskDescription = $taskDescription = filter_input(INPUT_POST, 'task');
//    
//    try 
//    {
//        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
//        $sql = "INSERT INTO tasks (text) VALUES ('" . $taskDescription . "')";
//        $conn->exec($sql); // use exec() because no results are returned
//        header("Location: index.php");
//        die();
//    }
//    catch(PDOException $e)
//    {
//        echo $sql . "<br>" . $e->getMessage();
//    }
//
//    $conn = null;
//}


if ( !empty(filter_input_array(INPUT_POST))) {

$taskDescription = $taskDescription = filter_input(INPUT_POST, 'task');
    
    try 
    {
        $pdo = $DB->connect();
        $sql = "INSERT INTO tasks (text) VALUES ('" . $taskDescription . "')";
        $pdo->exec($sql);
        $DB->disconnect();
        header("Location: index.php");
        die();
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
}
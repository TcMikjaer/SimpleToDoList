<?php
require "Task.php";
require 'Database.php';
require "Header.php";
require "Query.php";

class ToDoList
{
    private $DB;
    public $UPDATEID = null;
    
    public function __construct() 
    {
        $this->DB = new Database();
    }
    
    public function update() 
    {
        if (!empty(filter_input(INPUT_GET, 'CREATE')))
        {   
            $test = new Query($this->DB);
            $test->execute("INSERT INTO tasks(description) VALUES(:description)", [':description' => addslashes(filter_input(INPUT_GET, 'description'))]);
            header("Location: Index.php");
            die();
        }
        elseif (!empty(filter_input(INPUT_GET, 'DELETE'))) 
        {
            $test = new Query($this->DB);
            $test->execute("DELETE FROM tasks WHERE id = :id", [':id' => filter_input(INPUT_GET, 'id')]);
            header("Location: Index.php");
            die();
        }
        elseif (!empty(filter_input(INPUT_GET, 'INITUPDATE'))) 
        {
            $this->UPDATEID = filter_input(INPUT_GET, 'id');

        }
        elseif (!empty(filter_input(INPUT_GET, 'UPDATE'))) 
        {
            $test = new Query($this->DB);
            $test->execute("UPDATE Tasks SET description = :description WHERE id = :id", 
                [
                    ':id' => filter_input(INPUT_GET, 'id'),
                    ':description' => filter_input(INPUT_GET, 'descriptionUpdated')
                ]
            );
            header("Location: Index.php");
            die();
        }
    }
    
    public function getTasks()
    {
//        $test = new Query($this->DB);
//        $test->execute("SELECT * FROM Tasks ORDER BY id DESC", null);
//        return $test;  
        try 
        {
            $PDO = $this->DB->connect();
            $statement = $PDO->query("SELECT * FROM Tasks ORDER BY id DESC");
            $statement->execute(null);
            $result = [];
            while ($row = $statement->fetch())
            {
                array_push($result,new Task($row['id'], $row['description']));
            } 
            $this->DB->disconnect();
            return $result;  
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
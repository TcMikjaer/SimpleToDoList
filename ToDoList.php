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
        if (!empty($action = filter_input(INPUT_GET, 'action')))
        {
            $query = new Query($this->DB);
            switch ($action) {
                case "create":
                    $query->execute("INSERT INTO tasks(description) VALUES(:description)", [':description' => addslashes(filter_input(INPUT_GET, 'description'))]);
                    break;
                case "delete":
                    $query->execute("DELETE FROM tasks WHERE id = :id", [':id' => filter_input(INPUT_GET, 'id')]);
                    break;
                case "update":
                    $query->execute("UPDATE Tasks SET description = :description WHERE id = :id", 
                        [
                            ':id' => filter_input(INPUT_GET, 'id'),
                            ':description' => filter_input(INPUT_GET, 'descriptionUpdated')
                        ]
                    );
                    break;
            }
            if($action == "initupdate")
            {
                $this->UPDATEID = filter_input(INPUT_GET, 'id');
            }
            else 
            {
                header("Location: Index.php");
                die(); 
            }
        }
    }
    
    public function getTasks()
    {
        $test = new Query($this->DB);
        return $test->execute("SELECT * FROM Tasks ORDER BY id DESC");
    }
}
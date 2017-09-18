<?php

class CRUD 
{
    private $database;
    private $sql;
    private $pdo;
    private $statement;
    public function __construct($database) 
    {
        $this->database = $database;
    }
    public function create() 
    {
        try 
        {
            $this->connect();
            $this->sql = "INSERT INTO tasks(description) VALUES(:description)";
            $this->prepare();
            $this->statement->execute(array( 
               "description" => addslashes(filter_input(INPUT_GET, 'description'))
            ));
            $this->disconnect();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function delete()
    {
        try 
        {
            $pdo = $this->database->connect();
            $statement = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
            $statement->bindParam(':id', filter_input(INPUT_GET, 'id'), PDO::PARAM_INT);   
            $statement->execute();
            $this->database->disconnect();
            header("Location: index.php");
            die();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function read()
    {
        $pdo = $this->database->connect();
        $sql = 'SELECT * FROM Tasks ORDER BY id DESC';
        $result = [];
        foreach ($pdo->query($sql) as $row) {
            array_push($result,new Task($row['id'], $row['description']));
        }
        $this->database->disconnect();
        return $result;   
    }
    public function update($id, $description) 
    {
        $pdo = $this->database->connect();
        $statement = $pdo->prepare("UPDATE Tasks SET description = :description WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':description',$description , PDO::PARAM_STR, 12);
        $statement->execute(); 
        $this->database->disconnect();
    }
    private function connect() 
    {
        $this->pdo = $this->database->connect();
    }
    private function prepare() 
    {
        $this->statement = $this->pdo->prepare($this->sql);
    }
    private function disconnect() 
    {
        $this->database->disconnect();
    }
}
<?php

class Query
{
    private $db;
    
    public function __construct(Database $db) 
    {
        $this->db = $db;
    }
    
    public function execute($query, $params)
    {
        try 
        {
            $PDO = $this->db->connect();
            $statement = $PDO->prepare($query);
            $statement->execute($params);
            $result = [];
            while ($row = $statement->fetch())
            {
                array_push($result,new Task($row['id'], $row['description']));
            } 
            $this->db->disconnect();
            return $result;  
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
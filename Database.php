<!--Final so far-->

<?php
class Database
{
    private $dbName = 'MyToDoListDB' ;
    private $dbHost = 'localhost' ;
    private $dbUsername = 'root';
    private $dbUserPassword = '';
    private $cont  = null;
     
    public function connect()
    {
       if ( $this->cont == null)
       {     
            try
            {
                $this->cont = new PDO( "mysql:host=".$this->dbHost.";"."dbname=".$this->dbName, $this->dbUsername, $this->dbUserPassword); 
            }
            catch(PDOException $e)
            {
                die($e->getMessage()); 
            }
       }
       return $this->cont;
    }
     
    public function disconnect()
    {
        $this->cont = null;
    }
}

<?php
require "Task.php";
require 'Database.php';
require "Header.php";
require "CRUD.php";

class ToDoList 
{
    private $DB;
    private $CRUD;
    public $UPDATEID = null;
 
    public function __construct() 
    {
        $this->DB = new Database();
        $this->CRUD = new CRUD($this->DB);
    }
    
    public function update() 
    {
        if (!empty(filter_input(INPUT_GET, 'CREATE')))
        {   
            $this->CRUD->create();
        }
        elseif (!empty(filter_input(INPUT_GET, 'DELETE'))) 
        {
            $this->CRUD->delete();
        }
        elseif (!empty(filter_input(INPUT_GET, 'INITUPDATE'))) 
        {
            $this->UPDATEID = filter_input(INPUT_GET, 'id');

        }
        elseif (!empty(filter_input(INPUT_GET, 'UPDATE'))) 
        {
            $this->CRUD->update(filter_input(INPUT_GET, 'id'), filter_input(INPUT_GET, 'descriptionUpdated'));
        }
        return $this->CRUD->read();
    }
}
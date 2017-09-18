<?php

class Task {
    
    public $id;
    public $description;
    
    public function __construct($id, $description) 
    {
        $this->id = $id;
        $this->description = $description;
    }
    
}
<?php 

class player{
    private $id;
    private $name;
    private $age;
    private $evaluate;
    private $nation;

    public function __construct($id, $name, $age, $evaluate, $nation){
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->evaluate = $evaluate;
        $this->nation = $nation;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getAge(){
        return $this->age;
    }

    public function getEvalua(){
        return $this->evaluate;
    }

    public function getNation(){
        return $this->nation;
    }
    
}
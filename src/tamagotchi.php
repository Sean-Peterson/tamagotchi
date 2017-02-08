<?php
class Tamagotchi
{
    private $name;
    private $food;
    private $attention;
    private $rest;

    function __construct($name, $food, $attention, $rest)
    {
        $this->name = $name;
        $this->food = $food;
        $this->attention = $attention;
        $this->rest = $rest;
    }



    function getName()
    {
        return $this->name;
    }

    function getFood()
    {
        return $this->food;
    }

    static function setFood()
    {
        return $this->food = $food + 10;
    }

    function getAttention()
    {
        return $this->attention;
    }

    function getRest()
    {
        return $this->rest;
    }

    function save()
    {
        array_push($_SESSION['tam_status'], $this);
    }

    static function getAll()
    {
        return $_SESSION['tam_status'];
    }

    static function delete()
    {
        $_SESSION['tam_status'] = array();
    }
}


?>

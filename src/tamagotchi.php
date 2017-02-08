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

    function setFood()
    {
        $this->food = $this->food + 10;
    }

    function getAttention()
    {
        return $this->attention;
    }

    function setAttention()
    {
        $this->attention = $this->attention + 10;
    }

    function getRest()
    {
        return $this->rest;
    }

    function setRest()
    {
        $this->rest = $this->rest + 10;
    }

    function setTime()
    {
        $this->food = $this->food - 10;
        $this->attention = $this->attention - 10;
        $this->rest = $this->rest - 10;
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

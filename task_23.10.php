<?php

interface CarsInterface
{
    public function wipers();
    public function signal();
}

abstract class Tech implements CarsInterface
{
    protected $driver;

    public function getDriver()
    {
        echo $this->driver;
    }
    public function moveForward()
    {
        echo "Move forward ";
    }
    public function moveBack()
    {
        echo "Move back ";
    }
    public function wipers()
    {
        echo "Wipers ";
    }
    public function signal()
    {
        echo "Signal ";
    }
}

class Car extends Tech
{
    protected $driver = "Car driver ";

    public $nitrogen = "Nitrogen ";

    public $interior = "Leather interior ";
}

class Panzer extends Tech
{
    protected $driver = "Panzer driver ";
    public function shoot()
    {
        echo "Shoot ";
    }
}

class Bulldozer extends Tech
{
    protected $driver = "Bulldozer driver ";
    public function bucketControl()
    {
        echo "Bucket control ";
    }
}

class ControlSystem
{
    public $control;
    public function __construct(Tech $tech)
    {
        $this->control = $tech;
    }
    public function actions()
    {
        $this->control->getDriver();
        $this->control->moveForward();
        $this->control->signal();
        if($this->control instanceof Panzer) $this->control->shoot();
        if($this->control instanceof Car) echo $this->control->interior;
    }
}


$car = new Car();
$panzer = new Panzer();
$bulldozer = new Bulldozer();

$controlSystem = new ControlSystem($car);
$controlSystem->actions();

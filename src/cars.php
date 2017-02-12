<?php
    class Car
    {
        private $year;
        private $make;
        private $model;
        private $miles;
        private $color;
        private $price;
        private $image;

        function __construct($year,$make, $model, $miles, $color, $price, $image)
        {
            $this->year = $year;
            $this->make = $make;
            $this->model = $model;
            $this->miles = $miles;
            $this->color = $color;
            $this->price = $price;            
            $this->image = $image;
        }

        // GETTERS
        function getYear()
        {
            return $this->year;
        }

        function getMake()
        {
            return $this->make;
        }

        function getModel()
        {
            return $this->model;
        }

        function getMiles()
        {
            return $this->miles;
        }

        function getColor()
        {
            return $this->color;
        }

        function getPrice()
        {
            return $this->price;
        }

        function getImage()
        {
            return $this->image;
        }

        static function getAll()
        {
            return $_SESSION['list_of_cars'];
        }

        function save()
        {
            array_push($_SESSION['list_of_cars'], $this);
        }

        static function deleteAll()
        {
            $_SESSION['list_of_cars'] = array();
        }

    }
?>

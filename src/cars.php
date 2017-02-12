<?php
    class Car
    {
        private $make;
        private $model;
        private $price;
        private $miles;
        private $color;
        // private $image;

        function __construct($make, $model, $price, $miles, $color)
        {
            $this->make = $make;
            $this->model = $model;
            $this->price = $price;
            $this->miles = $miles;
            $this->color = $color;
            // $this->image = $image;
        }

        // GETTERS
        function getMake()
        {
            return $this->make;
        }

        function getModel()
        {
            return $this->model;
        }

        function getPrice()
        {
            return $this->price;
        }

        function getMiles()
        {
            return $this->miles;
        }

        function getColor()
        {
            return $this->color;
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

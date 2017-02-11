<?php
    class Car
    {
        private $make;
        private $model;
        private $price;
        private $miles;
        private $color;
        private $image;

        function __construct($car_make, $car_model, $car_price, $car_miles, $car_color, $car_image)
        {
            $this->make = $car_make;
            $this->model = $car_model;
            $this->price = $car_price;
            $this->miles = $car_miles;
            $this->color = $car_color;
            $this->image = $car_image;
        }

        // Setter getter Make
        function setMake($new_make)
        {
            $this->make = $new_make;
        }
        function getMake()
        {
            return $this->make;
        }

        // Setter getter Model
        function setModel($model)
        {
            $this->model = $model;
        }
        function getModel()
        {
            return $this->model;
        }

        // Setter getter Price
        function setPrice($new_price)
        {
            $this->price = $new_price;
        }
        function getPrice()
        {
            return $this->price;
        }

        // Setter getter Miles
        function setMiles($new_miles)
        {
            $this->miles = $new_miles;
        }
        function getMiles()
        {
            return $this->miles;
        }

        // Setter getter Miles
        function setColor($new_color)
        {
            $this->color = $new_color;
        }
        function getColor()
        {
            return $this->color;
        }

        // Setter getter Image
        function setImage($new_image)
        {
            $this->image = $new_image;
        }
        function getImage()
        {
            return $this->image;
        }

    }
?>

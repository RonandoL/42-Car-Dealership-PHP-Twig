<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cars.php";

    session_start();
    if (empty($_SESSION['list_of_cars'])) {
        $_SESSION['list_of_cars'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
    // End Red Tape

    // GET HOME ROUTE
    $app->get("/", function() use ($app) {
        return $app['twig']->render('cars.html.twig', array('cars' => Car::getAll()));
    });

    // INSTANTIATE - ADD CAR ROUTE
    $app->post("/dealership", function() use ($app) {
        $car = new Car($_POST['year'], ucfirst($_POST['make']), ucfirst($_POST['model']), $_POST['miles'], ucfirst($_POST['color']), $_POST['price'], $_POST['image']);
        $car->save();

        return $app['twig']->render('cars.html.twig', array('cars' => Car::getAll()));
    });

    // DELETE ALL CARS from list_of_cars
    $app->post("/delete", function() use ($app) {
        Car::deleteAll();

        return $app['twig']->render('cars.html.twig');
    });


    return $app;

?>

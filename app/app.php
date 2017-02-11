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

    $app->get("/dealership", function() {
        $accord1 = new Car("Honda", "Accord", 25500, 313, "Red", "http://www.2017acura.com/wp-content/uploads/2016/03/2017-Honda-Accord-front-250x200.jpg");
        $f1501 = new Car("Ford", "F150", 35000, 20, "Blue", "http://carphotos4.cardomain.com/images/0015/06/09/15986090_medium.jpg");
        $f1502 = new Car("Ford", "F150", 35000, 20, "Black", "http://wheelandtiredist.com/wp-content/uploads/cache/2015/07/ford-f150-fuel-beast/762270627.jpg");
        $accord2 = new Car("Honda", "Accord", 35900, 5, "Blue", "http://blaquediamond.com/wp-content/uploads/cache/2015/10/2003_Honda_Accord_blue_BD-4_20in_silver-2/1925395515.jpg");
        $mustang1 = new Car("Ford", "Mustang", 45999, 113, "Red", "http://www.latestcarmodel.com/wp-content/uploads/2016/02/hd-wallpaper-ford-mustang-tuning-car-gt-hd-250x200.jpg");
        $corolla1 = new Car("Toyota", "Corolla", 25900, 59, "White", "http://mt-belanocar.magentothemes.net/media/wysiwyg/magenthemes/static/jetta.jpg");
        $camaro1 = new Car("Chevy", "Camaro", 49500, 3, "Black", "http://www.latestcarmodel.com/wp-content/uploads/2016/02/chevrolet-camaro-black-concept-3-wide-250x200.jpg");
        $camaro2 = new Car("Chevy", "Camaro", 55000, 0, "White", "http://carphotos.cardomain.com/ride_images/3/3440/541/33597770009_medium.jpg");

        $all_cars = [$accord1, $f1501, $f1502, $accord2, $mustang1, $corolla1, $camaro1, $camaro2];

        // Filter based on User's Price Point
        $price_point = $_GET["price"];
            if ($price_point == 0) {
              $price_point = 55555;
            }
        $price_matched_cars = [];
        foreach ($all_cars as $car) {
          if ($car->getPrice() <= $price_point ) {
            array_push($price_matched_cars, $car);
          }
        }

        // Filter based on User's Price Point
        $color_choice = ucfirst($_GET['color']);
            if ($color_choice != "Red" && $color_choice != "White" && $color_choice != "Blue" && $color_choice != "Black") {
              $color_choice = "Black";
            }
        $color_matched_cars = [];
        foreach ($price_matched_cars as $priced_car) {
          if ($priced_car->getColor() == $color_choice) {
            array_push($color_matched_cars, $priced_car);
          }
        }

        echo "<!DOCTYPE html>
        <html>
          <head>
            <meta charset='utf-8'>
            <title>Suzie's Car Pavillion</title>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
          </head>

          <body>
            <div class='container'>
              <div class='jumbotron'>
              <h1>Suzie's Car Pavillion</h1>
              <h4>Your filters are:</h4>
              <p>Price Point: $" . $price_point . "</p>
              <p>Color Preference: " . $color_choice . "</p>
            </div>";

        foreach ($color_matched_cars as $car) {
            echo "<div class='row'>
                    <div class='col-md-3'>
                      <img src='" . $car->getImage() . "'>
                    </div>
                    <div class='col-md-3'>
                      <h2>" . $car->getMake() . " " . $car->getModel() . "</h2>
                      <h4>$" . $car->getPrice() . "</h4>
                      <p>Miles: " . $car->getMiles() . "</p>
                      <p>Color: " . $car->getColor() . "</p>
                    </div>
                  </div>  <!-- Row --> <br>";
        }

            return "</div>  <!-- container -->
              </body>
            </html>";
    });

    return $app;



?>

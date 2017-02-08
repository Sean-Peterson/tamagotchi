<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/tamagotchi.php";

    session_start();

    if (empty($_SESSION['tam_status'])) {
        $_SESSION['tam_status'] = array();
    }

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../view'
    ));

    // home page has input for places
    $app->get("/", function() use ($app) {
        return $app['twig']->render('create.html.twig');
    });

    $app->post("/update", function() use ($app) {
        $name = new Tamagotchi($_POST['name'], 50, 50, 50);
        $name->save();
        return $app['twig']->render('update.html.twig', array('new_tam' => $name));
    });

    $app->post("/home", function() use ($app) {
        return $app['twig']->render('home.html.twig', array('new_tam' => Tamagotchi::getAll()));
    });

    $app->post("/give", function() use ($app) {
        Tamagotchi::setFood();
        return $app['twig']->render('home.html.twig', array('new_tam' => Tamagotchi::getAll()));
    });

    $app->post("/delete", function() use ($app) {
        Tamagotchi::delete();
        return $app['twig']->render('create.html.twig');
    });

    return $app;
?>

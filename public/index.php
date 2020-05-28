<?php

/* Integration autoload */

require __DIR__.'/../vendor/autoload.php';

/* Integration Model */

require __DIR__.'/../app/Models/CoreModel.php';
require __DIR__.'/../app/Models/Pokemon.php';
require __DIR__.'/../app/Models/Type.php';
require __DIR__.'/../app/Models/TypeById.php';



/* Integration DBDAta */

require __DIR__.'/../app/Utils/DBData.php';


require __DIR__.'/../app/Controllers/CoreController.php';
require __DIR__.'/../app/Controllers/MainController.php';

$router = new AltoRouter();


$staticUrl = isset($_SERVER['BASE_URI']) ? trim($_SERVER['BASE_URI']) : '/';

$router->setBasePath($staticUrl);


$router->map('GET', '/', ['MainController', 'home'], 'home');
$router->map('GET', '/pokemon/[i:id]', ['MainController', 'pokdetails'], 'pokemonDetails');
$router->map('GET', '/types/', ['MainController', 'type'], 'listType');
$router->map('POST', '/types/pokemon/[i:id]', ['MainController', 'poktype'], 'pokemonByType');


$match = $router->match();

if ($match) {

    $controllerName = $match['target'][0];
    $actionName = $match['target'][1];

    $controller = new $controllerName($staticUrl);
    $controller->$actionName(intval($match['params']['id'])); 

} else {

    $controller = new MainController($staticUrl);
    $controller->notFound();
}
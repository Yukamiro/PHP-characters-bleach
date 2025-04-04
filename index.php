<?php
require __DIR__ . "/vendor/autoload.php";

use App\Controller\CharacterController;
use App\Controller\HomeController;



if (isset($_GET['action'])) {

    $action = $_GET['action'];
} else {

    $action = 'homePage';
}


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    $id = null;
}


if (isset($_GET['type'])) {
    $type = $_GET['type'];
} else {
    $type = null;
}

if (isset($_GET['name'])) {
    $name = $_GET['name'] ?: "";
} else {
    $name = null;
}

var_dump($_GET);

$homeController = new HomeController();

if ($action === "homePage") {

    $homeController->homePage($name, $type);
} else if ($action === "detailPage") {

    $homeController->detailPage($id);
}

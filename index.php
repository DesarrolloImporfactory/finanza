<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $servidor = $data['servidor'];
    if ($servidor == 'marketplace') {
        require_once 'Config/ConfigMKP.php';
    } else {
        require_once 'Config/Config.php';
    }
} else {
    require_once 'Config/Config.php';
}

$rute = !empty($_GET['url']) ? $_GET['url'] : 'Home/index';
$array = explode('/', $rute);
$controller = $array[0];
$method = "index";
$parameter = "";
if (!empty($array[1])) {
    if (!empty($array[1] != "")) {
        $method = $array[1];
    }
}
if (!empty($array[2])) {
    if (!empty($array[2] != "")) {
        for ($i = 2; $i < count($array); $i++) {
            $parameter .= $array[$i] . ',';
        }
        $parameter = trim($parameter, ',');
    }
}
require_once 'Config/App/autoload.php';
$dirController = 'Controllers/' . $controller . '.php';
if (file_exists($dirController)) {
    require_once($dirController);
    $controller = new $controller();
    if (method_exists($controller, $method)) {
        $controller->$method($parameter);
    } else {
        echo "No existe el metodo";
    }
} else {
    echo "No existe el controlador";
}

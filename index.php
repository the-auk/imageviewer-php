<?php
namespace groupname\hw3;
use groupname\controllers as control;

if(!empty($_GET['c'])){
    $controller = $_GET['c'];
}
else{
    $controller = "in";
}

if($controller=="in"){
    require_once("./Controllers/controllerin.php");
    $controller = new control\ControllerIn();
    $controller->run();
}
if($controller=="out"){
    require_once("./Controllers/ControllerOut.php");
    $controller = new control\ControllerOut();
    $controller->run();
}


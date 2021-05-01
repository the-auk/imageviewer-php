<?php 
    namespace groupname\controllers;
    require_once(__DIR__."/Controller.php");
    require_once("./Views/ViewIn.php");

    use groupname\views as views;

    class ControllerIn extends Controller{
        function run(){
            session_start();      
        if (!isset($_SESSION['cur'])) {
             $_SESSION['cur'] = 11;
            }
    if(isset($_POST['top'])){
        $_SESSION['cur'] = $_SESSION['cur']-10;
        header("Location:"."./index.php?c=in");
    }
    if(isset($_POST['left'])){
        $_SESSION['cur'] = $_SESSION['cur']-1;
        header("Location:"."./index.php?c=in");
    }
    if(isset($_POST['right'])){
        $_SESSION['cur'] = $_SESSION['cur']+1;
        header("Location:"."./index.php?c=in");
    }
    if(isset($_POST['down'])){
        $_SESSION['cur'] = $_SESSION['cur']+10;
        header("Location:"."./index.php?c=in");
    } 
    if(isset($_POST['go'])){
        $current=$_REQUEST['xpos'].$_REQUEST['ypos'];
    $_SESSION['cur'] = $current;
        header("Location:"."./index.php?c=in");
    }
    if(isset($_POST['in'])){
        session_destroy();
        header("Location:"."./index.php?c=out");
    } 
    $this->view = new views\ViewIn();
    $this->view->render();
        }
    }
    ?>
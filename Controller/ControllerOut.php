<?php 
    namespace groupname\controllers;
    require_once(__DIR__."/Controller.php");
    require_once("./Views/ViewOut.php");

    use groupname\views as views;

    class ControllerOut extends Controller{
        function run(){
            session_start();
            
        if (!isset($_SESSION['cur'])) {
                 $_SESSION['cur'] = 1111;
             }
        if(isset($_POST['top'])){
            $_SESSION['cur'] = $_SESSION['cur']-100;
            header("Location:"."./index.php?c=out");
        }
        if(isset($_POST['left'])){
            $_SESSION['cur'] = $_SESSION['cur']-1;
            header("Location:"."./index.php?c=out");
        }
        if(isset($_POST['right'])){
            $_SESSION['cur'] = $_SESSION['cur']+1;
            header("Location:"."./index.php?c=out");
        }
        if(isset($_POST['down'])){
            $_SESSION['cur'] = $_SESSION['cur']+100;
            header("Location:"."./index.php?c=out");
        }
        if(isset($_POST['go'])){
            $current=$_REQUEST['npos'].$_REQUEST['mpos'].$_REQUEST['xpos'].$_REQUEST['ypos'];
            $_SESSION['cur'] = $current;
            header("Location:"."./index.php?c=out");
        }
        if(isset($_POST['out'])){
            session_destroy();
            header("Location:"."./index.php?c=in");
        }
            $this->view = new views\ViewOut();
            $this->view->render();
        }
    }
?>
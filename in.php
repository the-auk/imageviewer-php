<?php
session_start();
if (!isset($_SESSION['cur'])) {
         $_SESSION['cur'] = 11;
            $_SESSION['state'] = 'out';
     }
if(isset($_POST['top'])){
    $_SESSION['cur'] = $_SESSION['cur']-10;
    echo $_SESSION['cur'];
}
if(isset($_POST['left'])){
    $_SESSION['cur'] = $_SESSION['cur']-1;
    echo $_SESSION['cur'];
}
if(isset($_POST['right'])){
    $_SESSION['cur'] = $_SESSION['cur']+1;
    echo $_SESSION['cur'];
}
if(isset($_POST['down'])){
    $_SESSION['cur'] = $_SESSION['cur']+10;
    echo $_SESSION['cur'];
}
?>

<!DOCTYPE HTML>
<html>
<body>
    <form method="post">
        Zoom <input type="submit" name="in" value="In">
        <input type="submit" name="out" value="Out"><br />
        </form>
    <form method="post">
        <input type="number" placeholder="x" name="xpos" min="0" max="3">
        <input type="number" placeholder="y" name="ypos" min="0" max="3">
        <input type="submit" name="go" value="Go"><br />
        </form>
    <?php
    if(isset($_POST['go'])){
        $current=$_REQUEST['xpos'].$_REQUEST['ypos'];
    $_SESSION['cur'] = $current;
    echo $_SESSION['cur'];
    }
    ?>
    <form method="post">
        &emsp;<input type="submit" name="top" value="^"><br />
        <input type="submit" name="left" value="<">
        <input type="submit" name="right" value=">"><br />
        &emsp;<input type="submit" name="down" value="v">
    </form>
    <?php
        $xa = floor($_SESSION['cur'] / 10);
        $ya = $_SESSION['cur'] % 10; 
        for($i=$xa-1;$i<=$xa+1;$i++){
            for($j=$ya-1;$j<=$ya+1;$j++){    
            $name=$j.$i;
                if($name>=0){
                    ?>&nbsp;<img src="images/<?php echo $name ?>.jpg"><?php
                }
                else{
                    ?>&nbsp;<img src="images/black.jpg"><?php
                }
        }
            ?>
        <br />
        <?php
        }
        ?>
    
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['cur'])) {
         $_SESSION['cur'] = 1111;
     }
if(isset($_POST['top'])){
    $_SESSION['cur'] = $_SESSION['cur']-100;
}
if(isset($_POST['left'])){
    $_SESSION['cur'] = $_SESSION['cur']-1;
}
if(isset($_POST['right'])){
    $_SESSION['cur'] = $_SESSION['cur']+1;
}
if(isset($_POST['down'])){
    $_SESSION['cur'] = $_SESSION['cur']+100;
}
?>

<!DOCTYPE HTML>
<html>
<body>
    <form method="post">
        Zoom <input type="submit" name="in" value="In">
        <input type="submit" name="out" value="Out" attr="this.disabled = true"><br />
        </form>
    <form method="post">
        <input type="number" placeholder="x" name="xpos" min="0" max="3">
        <input type="number" placeholder="n" name="npos" min="0" max="3">
        <input type="number" placeholder="y" name="ypos" min="0" max="3">
        <input type="number" placeholder="m" name="mpos" min="0" max="3">
        <input type="submit" name="go" value="Go"><br />
        </form>
    <?php
    if(isset($_POST['go'])){
        $current=$_REQUEST['npos'].$_REQUEST['mpos'].$_REQUEST['xpos'].$_REQUEST['ypos'];
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
        $temp = $_SESSION['cur'];
        $na = $temp%10;
        $temp=$temp/10;
        $xa = $temp%10;
        $temp=$temp/10;
        $ma = $temp%10;
        $temp=$temp/10;
        $ya = $temp%10;
        for($j=$ma-1;$j<$ma+2;$j++){ 
            for($i=$na-1;$i<$na+2;$i++){
                if($na>3){$na=0;$xa=$xa+1;}
                if($na<0){$na=0;$xa=$xa-1;}
                if($ma>3){$ma=0;$ya=$ya+1;}
                if($ma<0){$ma=0;$ya=$ya-1;}
                if($xa<0){$xa=0;}
                if($xa>3){$xa=3;}
                if($ya<0){$ya=0;}
                if($ya>3){$ya=3;}
                if($na<0){$na=0;}
                if($na>3){$na=3;}
                if($ma<0){$ma=0;}
                if($ma>3){$ma=3;}
                $name=$ya.$j.$xa.$i;
                    if(!($i<0 or $i>3 or $j<0 or $j>3 or $xa<0 or $xa>3 or $ya<0 or $ya>3)){
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

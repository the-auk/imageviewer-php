<?php
namespace groupname\views;
require_once(__DIR__."/View.php");
class ViewIn extends View{
    function render(){
        
        ?>
        <form method="post">
        Zoom <input type="submit" name="in" value="In"><br />
        </form>
    <form name="go" method="post" onsubmit="return validateForm()">
        <input type="number" placeholder="x" name="xpos" required>
        <input type="number" placeholder="y" name="ypos" required>
        <input type="submit" name="go" value="Go"><br />
        </form>
    <script>
        function validateForm(){
        var x = document.go.xpos.value;
        var y = document.go.ypos.value;
        if(x<0 || x>3 || y<0 || y>3){
            alert("Wrong input! Try again with values 0 to 3.");
            return false;
        }
        }
    </script>
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
                if($i>=0 and $j>=0 and $i<=3 and $j<=3){
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
   }
}
?>

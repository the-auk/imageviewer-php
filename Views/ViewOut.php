<?php
namespace groupname\views;
require_once(__DIR__."/View.php");

class ViewOut extends View{
    function render(){?>
        <form method="post">
        Zoom
        <input type="submit" name="out" value="Out" attr="this.disabled = true"><br />
        </form>
    <form name="go" method="post" onsubmit="return validateForm()">
        <input type="number" placeholder="x" name="xpos">
        <input type="number" placeholder="n" name="npos">
        <input type="number" placeholder="y" name="ypos">
        <input type="number" placeholder="m" name="mpos">
        <input type="submit" name="go" value="Go"><br />
        </form>
        <script>
        function validateForm(){
        var x = document.go.xpos.value;
        var y = document.go.ypos.value;
        var n = document.go.npos.value;
        var m = document.go.mpos.value;
        if(x<0 || x>3 || y<0 || y>3 || n<0 || n>3 || m<0 || m>3){
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
            $temp = $_SESSION['cur'];
            $na = $temp%10;$temp=$temp/10;
            $xa = $temp%10;$temp=$temp/10;
            $ma = $temp%10;$temp=$temp/10;
            $ya = $temp%10;
        for($j=$ma-1;$j<$ma+2;$j++){ 
            for($i=$na-1;$i<$na+2;$i++){
                if($na>3){$na=0;$xa=$xa+1;}if($na<0){$na=0;$xa=$xa-1;}if($ma>3){$ma=0;$ya=$ya+1;}if($ma<0){$ma=0;$ya=$ya-1;}if($xa<0){$xa=0;}if($xa>3){$xa=3;}if($ya<0){$ya=0;}if($ya>3){$ya=3;}if($na<0){$na=0;}if($na>3){$na=3;}
                if($ma<0){$ma=0;}if($ma>3){$ma=3;}
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
    }
}
?>
<?php

$dir = $argv[2];
if( is_dir($dir) === false )
{
    mkdir($dir);
}
$im = imagecreatefromjpeg($argv[1]);
$height = imagesy($im);
$width = imagesx($im);

for($i=0;$i<4;$i++){
 for($j=0;$j<4;$j++){
        $im2 = imagecrop($im, ['x' => $i*$width/4, 'y' => $j*$width/4, 'width' => $width/4, 'height' => $height/4]);
        if ($im2 !== FALSE) {
            $name=$i.$j;
            imagejpeg($im2, $dir."/"."$name.jpg");
            imagedestroy($im2);
        }                       
    }
}

for($j=0;$j<4;$j++){
    for($m=0;$m<4;$m++){
        for($i=0;$i<4;$i++){
            for($n=0;$n<4;$n++){
            $x=$i*200+$n*50;
            $y=$j*200+$m*50;
            $im2 = imagecrop($im, ['x' => $x, 'y' => $y, 'width' => 50, 'height' => 50]);
            $thumb = imagecreatetruecolor(200, 200);
            $bool = imagecopyresized($thumb, $im2, 0, 0, 0, 0, 200, 200, 50, 50);
            if ($bool !== FALSE) {
                $name=$j.$m.$i.$n;
                imagejpeg($thumb, $dir."/"."$name.jpg");
                imagedestroy($thumb);
        }                       
    }
   }
 }
}

$back = @imagecreate(200, 200)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 0, 0, 0);
imagejpeg($back, $dir."/"."black.jpg");



?>
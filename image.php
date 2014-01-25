<?php
Session_Start();
$ses_id = session_id();
$fontPath = 'FreeSans.ttf'; //font type
$imgPath = 'hangouts.png'; //base image
if (isset($_POST['name'])) 
$string1POST = $_POST['name'];
else
$string1POST = '';
if (isset($_POST['sub'])) 
$string2POST = $_POST['sub'];
else
$string2POST = '';
header('Content-Description: File Transfer');
header("Content-type: application/octet-stream ");
$fontpath = realpath('.'); //replace . with a different directory if needed
putenv('GDFONTPATH='.$fontpath);

$stringAngle= 0;

    $image = imagecreatefrompng($imgPath);
    $color = imagecolorallocate($image, 255, 255, 255);
    $string = $string1POST;
    $fontSize = 25; //Top
    $x = 16; //Top
    $y = 310; //Top
 $string2 = $string2POST;
    $fontSize2 = 13; //bottom
    $x2 = 16; //bottom

    $y2 = 336; //bottom
	
$saveFile = '/tmp/' . $ses_id . '.png';
imagealphablending( $image, false );
imagesavealpha( $image, true );
 imagealphablending($image, true);
imagettftext($image, $fontSize, $stringAngle, $x, $y, $color, $fontPath, $string);
imagettftext($image, $fontSize2, $stringAngle, $x2, $y2, $color, $fontPath, $string2);
    imagepng($image, $saveFile);

header("Content-disposition: attachment; filename= HangoutThird.png");
readfile($saveFile);
unlink($saveFile);
?>
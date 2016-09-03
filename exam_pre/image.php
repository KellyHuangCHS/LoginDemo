<?php
	header("Content-type: image/png");
	$im = @imagecreate(80, 20);
	$bgcolor = imagecolorallocate($im, 230, 230, 230);
	$code ='';
	
	srand((double)microtime()*1000000);
	$x=rand(10, 20);
	for($i=0;$i<4;$i++){
		$fontcol = imagecolorallocate($im,rand(0, 255),rand(0,100),rand(100, 255));
		$authornum = rand(0, 9);
		$code .= $authornum;
		imagestring($im, rand(3, 5), $x+$i*10, 1, $authornum, $fontcol);
	}
	
	session_start();
	$_SESSION['code']=$code;
	
	for($i=0;$i<100;$i++){
		$randcol = imagecolorallocate($im,rand(0,255),rand(0,100),rand(100, 255));
		imagesetpixel($im, rand(0,80), rand(0,20), $randcol);
	}
	
	imagepng($im);
	imagedestroy($im);
?>
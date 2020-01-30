<?php

  require('cfg.php');
  
  // set backgrounds
  $bg = array();
  $bg[] = 'bg1.png';
  $bg[] = 'bg2.png';
  $bg[] = 'bg3.png';
  $bg[] = 'bg4.png';
  $image = imagecreatefrompng($bg[m_smtp_c_Rand(0, count($bg)-1)]) or die('Cannot create image');

  // set background and allocate drawing colours
  $background = imagecolorallocate($image, 0x66, 0xCC, 0xFF);
  imagefill($image, 0, 0, $background);
  $linecolor = imagecolorallocate($image, 0x33, 0x99, 0xCC);
  $textcolor1 = imagecolorallocate($image, 0x00, 0x00, 0x00);
  $textcolor2 = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);

  // draw random lines on canvas
  for($i=0; $i < 8; $i++) {
    imagesetthickness($image, m_smtp_c_Rand(1, 3));
    imageline($image, m_smtp_c_Rand(0, 160), 0, m_smtp_c_Rand(0, 160), 45, $linecolor);
  }

  // using a mixture of TTF fonts
  $fonts = array();
  $fonts[] = "font1.ttf";
  //$fonts[] = "font2.ttf";
  
  // add random digits to canvas using random black/white colour
  $digit = '';
  for($x = 10; $x <= 130; $x += 30) {
    $textcolor = (m_smtp_c_Rand(0, 9999) % 2) ? $textcolor1 : $textcolor2;
    $digit .= ($num = m_smtp_c_Rand(0, 9));
    imagettftext($image, 20, m_smtp_c_Rand(-30, 30), $x, m_smtp_c_Rand(20, 42), $textcolor, dirname(__FILE__).'/'.$fonts[array_rand($fonts)], $num);
  }
  
  // save cookie
  setcookie('MSC_digit', md5($digit . $m_smtp_c_digitSalt), 0, '/');

  // display image and clean up
  header('Content-type: image/png');
  imagepng($image);
  imagedestroy($image);

?>
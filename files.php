<?php
echo $fp = fopen( "/home/alina/Documents/phptext.txt", "w")or die("cant");
echo fread($fp,filesize(" /home/alina/Documents/phptext.txt"));
echo fwrite($fp, 'Cats chase mice');
fclose($fp);
?>
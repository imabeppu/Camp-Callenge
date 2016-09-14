<?php
//var_dump($_FILES);
$file_name = 'upload.txt';
move_uploaded_file( $_FILES['userfile']['tmp_name'], $file_name);
$file_txt = file_get_contents('upload.txt');
echo $file_txt;
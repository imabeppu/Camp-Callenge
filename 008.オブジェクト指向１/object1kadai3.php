<?php
class human{
public $name = '';
public $age = 0;
public function settei($n,$a){
  global $name;
  global $age;
$name = $n;
$age = $a;
return array($name,$age);
}
public function hyouji(){
  global $name;
  global $age;
 echo $name.'<br>'. $age;
 }
}

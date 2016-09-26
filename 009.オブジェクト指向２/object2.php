<?php
abstract class base{
  protected $table='';
  protected function lord(){
  try{
  $pdo_object= new PDO('mysql:host=localhost;dbname=object2;charset=utf8','imabe','ppu');
  }
  catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception->getMessage());
  }

  $select="select * from $this->table";
  $query=$pdo_object->prepare($select);
  $query->execute();
  $result=$query->fetchall(PDO::FETCH_ASSOC);
 $pdo_object=NULL;
return $result;
}

  public function show(){
    global $result;
    foreach($result as $value){foreach($value as $key => $value){echo $key.$value;}echo '<br>';
    }
  }
  }


class Human extends base{
  function __construct(){
   $this->table='hito';
}
function test(){
  global $table;
$result = parent::lord();
return $result;
}
}


class Station extends base{
function __construct(){
$this->table='eki';
}
function test(){
  global $table;
$result = parent::lord();
return $result;}
}

$human= new Human();
$result= $human->test();
$human->show();
$eki= new Station();
$result= $eki->test();
$eki->show();

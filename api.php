<?
include('decimals.php');
if (isset($_REQUEST['seed'])) {
  $seed = $_REQUEST['seed'];
}
else { 
  $seed = rand(1,100);
}

if (isset($_REQUEST['length'])) {
  $length = $_REQUEST['length'];
}
else { 
  $length = 200;
}
if (isset($_REQUEST['num_dice'])) {
  $num_dice = $_REQUEST['num_dice'];
}
else {
  $num_dice = 2;
}
$string = substr(preg_replace('/[^1-6]/','',$pi_decimals),$seed);
$array = preg_split('//',$string);
foreach ($array as $k=>$v) {
  if ($k%3 == 0) { 
    $newstring .= $v;
  }
}
$newstring = substr($newstring,0,$length);
$items = array();
for ($i=0; $i<$length; $i+=2) {
  $one = substr($newstring,$i,1);
  $two = substr($newstring,$i+1,1);
  array_push($items, '['.$one.','.$two.']');
}
$js = join(',',$items);
print '['.$js.']';
?>
<?
include('decimals.php');
$seed = 78;
$length = 200;
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
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    var a = [<?=$js;?>];
    var i = 0;
    $('#roll').click(function() {
	$('#result').html(a[i][0]+' '+a[i][1]);
	i++;
      });
  });
</script>

<div id="roll">Roll</div>
<div id="result"></div>
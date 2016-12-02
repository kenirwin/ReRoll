<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<style type="text/css">
@import url("dice3.css");
body { background-color: darkgreen; color: #fff}
.button {
 padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 10px;
 }

#roll { background-color: brown; color: white; 
font-size: 200%;
width: 5em;
border: 2px solid gold;
}
#result { 
margin-top: 1em;
width: 10em;
 } 
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<?php
if (isset($_REQUEST['seed'])) {
  $seed = $_REQUEST['seed'];
}
else { 
  $seed = rand(1,100);
}
//$js = file_get_contents('http://kenirwin.net/projects/reroll/api.php?'.$_SERVER['QUERY_STRING']);
$js = file_get_contents('http://kenirwin.net/projects/reroll/api.php?seed='.$seed);
?>
<script>
$(document).ready(function() {
    var a = <?=$js;?>;
    var i = 0;
    var words = ['zero','one','two','three','four','five','six']
    $('#roll').click(function() {
	var i1 = a[i][0];
	var i2 = a[i][1];
	//	$('#result').html(a[i][0]+' '+a[i][1]);
	$('#first').removeAttr('class').addClass('die '+words[i1]);
	$('#second').removeAttr('class').addClass('die '+words[i2]);
	i++;
      });
  });
</script>
<body>
<center>
<h1>Game No. <?=$seed;?></h1>
  <form>Set Game Number (1-100): <input type="text" size="5" name="seed"> <input type="submit" value="Enter"></form>
<div id="roll" class="button">Roll</div>
<div id="result"><div id="first"></div> <div id="second"></div></div>
</center>
</body>
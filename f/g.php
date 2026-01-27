<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุพัตรา หาญกุดเลาะ(ปริม)</title>
</head>

<body>
<h1>สุพัตรา หาญกุดเลาะ(ปริม)</h1>

<form method="post" action="">
แม่สูตรคูณของปริม<input type="number" name="a" min="2" max="100" autofocus required>
<button type="submit" name="Submit">OK</button>
</form>
<hr>

<?php
if (isset($_POST['Submit'])) {
	
	$m = $_POST['a'] ;
	
	
	for($i=1;$i<=12;$i++){
		$b = $m * $i ;
		echo "{$m} x {$i} = {$b} <br> " ;
	}
}

?>
</body>
</html>
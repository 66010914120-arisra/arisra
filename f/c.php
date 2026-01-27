<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>สุพัตรา หาญกุดเลาะ(ปริม)</title>
</head>

<body>
<h1>สุพัตรา หาญกุดเลาะ(ปริม)</h1>

<form method="post" action="">
กรอกตัวเลข <input type="number" name="a" min="0" max="100" autofocus required>
<button type="submit" name="Submit">OK</button>
</form>
<hr>

<?php
if (isset($_POST['Submit'])) {
	
	$score = $_POST['a'];
	if ($score >= 80) {
		$grade = "A" ;
	} else if ($score >= 70) {
		$grade = "B" ;
	} else if ($score >= 60) {
		$grade = "C" ;
	} else if ($score >= 50) {
		$grade = "D" ;
	} else {
		$grade = "F" ;
	}
echo "<h3>คะแนน $score ได้เกรด $grade</h3>" ;

}

?>
</body>
</html>
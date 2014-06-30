<?php

// Example usage creating a table via the constructor.
$attributes = ['class' => 'table'];
$headers = ['Header 1', 'Header 2', 'Header 3'];
$rows = [
	['R1C1', 'R1C2', 'R1C3'],
	['R2C1', 'R2C2', 'R2C3'],
	['R3C1', 'R3C2', 'R3C3']
];

$t = new HTML\Table($attributes, $headers, $rows);
print $t->getHTML();

// Example of building a table using the element objects and functions.
$table = new HTML\Table(['class' => 'table']);
$table->createHeader(['ID', 'Col 1', 'Col 2', 'Col 3', 'Col 4']);

foreach (range(1, 10) as $number) {
	$content = array(
		$number,
		rand(0, 1000),
		rand(0, 1000),
		rand(0, 1000),
		rand(0, 1000)
	);
	$row = new HTML\Row($content, ['id' => 'row-'.$number]);
	$table->addRow($row);
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Table Generator</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
	<?php print $table->getHTML(); ?>
</div>

</body>
</html>

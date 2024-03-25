<?php
require_once 'DBColumn.php';
require_once 'DBRows.php';
require_once 'DBWarehouse.php';
require_once 'DBProducts.php';

$DBColumn = new DBColumn();
$DBRows = new DBRows();
$DBWh = new DBWarehouse();
$DBProduct = new DBProducts();




function getCsvData($name) {
	$csvFile = fopen("adatok.csv", 'r');
    $lines = [];
	while (! feof($csvFile)) {
		$line = fgetcsv($csvFile, 200, ";");
		switch($name)
		{
			case "columns":
				$lines[] = [
					"name" => $line[0],
					"id_rows" => $line[4]
				]; break;
			case "products":
				$lines[] = [
					"name" => $line[0],
					"id_column" => $line[6],
					"min_qty" => 10,
					"quantity" => rand(0,40),
					"price" => $line[7]
				]; break;
			case "rows":
				$lines[] = [
					"name" => $line[0],
					"id_store" => $line[2]
				]; break;
		}
		
	}
	fclose($csvFile);
	
	return $lines;
}

$DBColumn -> fillTableColumn();
$DBRows -> fillTableRows();
$DBWh -> fillTableWarehouse();
$DBProduct -> fillTableProducts();

function fillTables($name)
{
	$csv = getCsvData($name);
	$DBColumn = new DBColumn();
	$DBRows = new DBRows();
	$DBWh = new DBWarehouse();
	$DBProduct = new DBProducts();
	$sql = 'INSERT INTO (%s) (%s) VALUES (%s)';
	$fields = '';
	$values = '';
	foreach ($csv as $field => $value) {
		if ($fields > '') {
			$fields .= ',' . $field;
		} else
			$fields .= $field;

		if ($values > '') {
			if (strpos($value, "'")) {
				$value = str_replace("'", "", $value);
			}
			$values .= ',' . "'$value'";
		} else
			$values .= "'$value'";
	}
	$sql = sprintf($sql, $name, $fields, $values);
	echo $sql . '<br>';
	try {
		switch($name)
		{
			case "columns": $DBColumn->mysqli->query($sql); break;
			case "rows": $DBRows->mysqli->query($sql); break;
			case "warehouses": $DBWh->mysqli->query($sql); break;
			case "products": $DBProduct->mysqli->query($sql); break;
		} 
	} catch (Exception $e) {
		var_dump($e);
		echo $sql;
	}
}
<?php
require_once '.\src\AbstractPage.php';
require_once 'DBColumn.php';
require_once 'DBRows.php';
require_once 'DBWarehouse.php';
require_once 'DBProducts.php';

$DBColumn = new DBColumn();
$DBRows = new DBRows();
$DBWh = new DBWarehouse();
$DBProduct = new DBProducts();
$DB = new DB();
$DB->createDatabase();

$DBColumn -> fillTableColumn();
$DBRows -> fillTableRows();
$DBWh -> fillTableWarehouse();
$DBProduct -> fillTableProducts();


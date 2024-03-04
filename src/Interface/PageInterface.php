<?php


interface PageInterface
{
    static function insertHtmlHead();

    static function insertHtmlNav();

    static function insertHtmlFooter();

    static function showExportBtn($action);

    static function showImportBtn();

    static function showTruncateBtn();

    static function showTableHead();

    static function showTableBody(array $entities);

    static function showTable(array $entities);

    static function showSearchBar();

    static function showCsvImportBtn();

    static function showExportImportButtons($isEmptyDb, $action, $makers = [], $selectedId = 0);

}
<?php

require_once ".\src\Interface\PageInterface.php";
abstract class AbstractPage implements PageInterface
{

    static function insertHtmlHead()
    {
        echo '
        <!doctype html>
        <html lang="hu-hu">
        <head>
            <meta charset="utf-8">
            <title>Raktár kezelő</title>
        
            <!-- Scripts -->
            <script src="js/jquery-3.7.1.js" type="text/javascript"></script>
            <script src="./js/warehouse.js" type="text/javascript"></script>
        
            <!-- Styles -->
            <link href="./css/styles.css" rel="stylesheet">
        </head>';
    }

    static function insertHtmlNav()
    {
        echo '
        <nav>
            <a href="index.php"><i class="fa fa-home" title="Kezdőlap"></i></a>
            <a href="makers.php"><button type="button">Gyártók</button></a>
            <a href="models.php"><button type="button">Modellek</button></a>
        </nav>';
    }

    static function insertHtmlFooter()
    {
        echo '
        <footer>

        </footer>
        </html>';
    }

    static function showExportBtn($action)
    {
        echo '
            <form method="post" action="' . $action . '">
                <button id="btn-export" name="btn-export" title="Export to .CSV"><i class="fa fa-file-excel"></i>&nbsp;Export CSV</button>
            </form>';
    }

    static function showImportBtn()
    {
        echo '
            <button id="btn-import" name="btn-import" title="Import CSV">
                <i class="fa fa-file-import"></i>&nbsp;Import CSV</button>
        ';
    }

    static function showTruncateBtn()
    {
        echo '
            <form method="post" action="">
                <button id="btn-truncate" name="btn-truncate" title="Adatok törlése"><i class="fa fa-trash"></i>&nbsp;Adatok törlése</button>
            </form>';
    }

    abstract static function showTableHead();

    abstract static function showTableBody(array $entities);


    abstract static function showTable(array $entities);

    static function showAbcButtons(array $abc)
    {
        echo "<div style='display: flex'>";
        self::showAbcButton('*');
        foreach ($abc as $ch) {
            self::showAbcButton($ch);
        }
        echo "</div><br>";
    }

    private static function showAbcButton($ch)
    {
        echo "
            <form method='post' action=''>
                <input type='hidden' name='ch' value='$ch'>
                <button type='submit'>$ch</button>&nbsp;
            </form>
            ";
    }

    static function showSearchBar()
    {
        echo '
        <form method="post" action="">
            <input type="search" name="needle" placeholder="Keres">
                <button type="submit" id="btn-search" name="btn-search" title="Keres">
                    <i class="fa fa-search"></i>
                </button>
        </form>
        <br>';
    }

    static function showCsvImportBtn()
    {
        echo '
            <div id="import" class="hidden">
                <form method="post" action="">
                    <input type="file" name="input-file">
                    <button type="submit" value="open-file">Import</button>
                    <button type="button" id="btn-cancel-import" title="Mégse"><i class="fa fa-cancel"></i></button>
                </form> 
                <br>
            </div>
        ';
    }

    static function showExportImportButtons($isEmptyDb, $action, $makers = [], $selectedId = 0)
    {
        echo '<div style="display: flex">';
        if (!$isEmptyDb) {
            self::showExportBtn($action);
            self::showTruncateBtn();
        }
        else {
            self::showImportBtn();
        }
        echo '</div><br>';
        self::showCsvImportBtn();
    }
}
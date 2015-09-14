<?php
/*	controllers/admin/entries.php
**
**	8/30/15 - Test good.
**  9/13/15 - Rewrite & Test output from PG 143-144 - good.
**
*/
include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table( $db );
$allEntries = $entryTable->getAllEntries();

$entriesAsHtml = include_once "views/admin/entries-html.php";
return $entriesAsHtml;
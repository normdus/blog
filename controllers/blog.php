<?php
/*
**	controllers/blog.php
**
**	8/30/15 - PG 128 - Tested.
**			- PG 133 - Tested.
**			- PG 136 - 
*/

include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table( $db );
$entries = $entryTable->getAllEntries();

$isEntryClicked = isset( $_GET['id'] );
if ( $isEntryClicked) {
	//show one entry with specific ID
	$entryID = $_GET['id'];
	$entryData = $entryTable->getEntry( $entryID );
	$blogOutput = include_once "views/entry-html.php";
} else {
	// list all entries
	$entries = $entryTable->getAllEntries();
	$blogOutput = include_once "views/list-entries-html.php";
}
return $blogOutput;
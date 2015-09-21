<?php
/*********************************************************************
**	controllers/blog.php                                            **
**						                                            **
*********************************************************************/

include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table( $db );

$isEntryClicked = isset( $_GET['id'] );
if ( $isEntryClicked) {
/*
**	2nd time blog: controller & id - user has clicked to read more.
**	Single entry id loaded.
**	Comment entry form loaded.
**  all comments related to id loaded.
*/	
	$entryId = $_GET['id'];
	$entryData = $entryTable->getEntry( $entryId );
	$blogOutput = include_once "views/entry-html.php";
	$blogOutput .= include_once "controllers/comments.php";
} else {
/*
**	1st time index: front controller.
**  default view listing all blog entries.**
*/	
	$entries = $entryTable->getAllEntries();
	$blogOutput .= include_once "views/list-entries-html.php";
}

return $blogOutput;
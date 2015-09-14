<?php
/*
**
**	controllers/admin/editor.php
**	models/Blog_Entry_Table.class.php
**  views/admin/editor-html.php
**
**	9/13/15 - PG 152 - XXXXXXX
**
**	$entryTable is an [Instance Object] of Blog_Entry_Table [Class]  
**  $object->method or ->property
*/

include_once "models/Blog_Entry_Table.class.php";
$entryTable = new Blog_Entry_Table( $db );

// process admin editor form - TWO buttons
$editorSubmitted = isset( $_POST['action'] );
if ( $editorSubmitted ) {
	$buttonClicked = $_POST['action'];

	$save = ( $buttonClicked === 'save');
	$id = $_POST['id'];
	
	$insertNewEntry = ( $save and $id === '0' );
	$deleteEntry = ( $buttonClicked === 'delete' );
	$updateEntry = ( $save and $insertNewEntry === false );

	$title = $_POST['title'];
	$entry = $_POST['entry'];

	if ( $insertNewEntry ){
		// This gets the last entry_id of the saved entry
		$saveEntryId = $entryTable->saveEntry( $title, $entry);

	} else if ( $updateEntry ) {
		$entryTable->updateEntry( $id, $title, $entry );
		$saveEntryId = $id;  // 
	} else if ( $deleteEntry ) {
		$entryTable->deleteEntry( $id );
	}
}

/*
**	Admin Post links list - a link is clicked 
**  to edit an existing post.  
*/ 
$entryRequested = isset( $_GET['id'] );
if ( $entryRequested ) {
	$id = $_GET['id'];
	$entryData = $entryTable->getEntry( $id );
	$entryData->entry_id = $id;
	$entryData->message ="";
}

$entrySaved = isset( $saveEntryId );
if ( $entrySaved ) {
	$entryData = $entryTable->getEntry( $saveEntryId );
	$entryData->message = "Entry was saved";
}

//load relevant view
$editorOutput = include_once "views/admin/editor-html.php";
return $editorOutput;
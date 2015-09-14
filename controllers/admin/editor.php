<?php
/*
**	complete source code for controllers/admin/editor.php
**
**	8/30/15 - PG 121 & 122 - Tested
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
	$insertNewEntry = ( $buttonClicked === 'save' );
	$deleteEntry = ( $buttonClicked === 'delete' );
	$id = $_POST['id'];

	if ( $insertNewEntry ){
		// get title and entry data from editor form
		$title = $_POST['title'];
		$entry = $_POST['entry'];
		// save the new entry  --model--
		// Table Object->saveEntry Method
		$entryTable->saveEntry( $title, $entry);
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
}

//load relevant view
$editorOutput = include_once "views/admin/editor-html.php";
return $editorOutput;
<?php
/*
**	views/admin/editor-html.php
**
**  8/30/15 - Updated with PG 146 changes Tested
**	9/13/15 - Added Stdclass and editor msg - PG 154
*/

$entryDataFound = isset( $entryData );
if( $entryDataFound === false ) {
	$entryData = new StdClass();
	$entryData->entry_id = 0;	// --- type='hidden' 
	$entryData->title = "";
	$entryData->entry_text = "";
	$entryData->message = "";
}
return "
<form method='post' action='admin.php?page=editor' id='editor'>
	<input type='hidden' name='id' value='$entryData->entry_id' />
	<fieldset>
		<legend>New Post Submission</legend>
		
		<label>Post Title</label>
		<input type='text' name='title' maxlength='150' value='$entryData->title' />

		<label>Blog Post Entry</label>
		<textarea name='entry'>$entryData->entry_text</textarea>
		
		<fieldset id='editor-buttons'>
			<input type='submit' name='action' value='save' />
			<input type='submit' name='action' value='delete' />
			<p id='editor-message'>$entryData->message</p>
		</fieldset>
	</fieldset>
</form>";
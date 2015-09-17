<?php
/*
**
**	views/comment-form-html.php
**	9/16/15 - created   
**
*/
$idIsFound = isset( $entryId );
if ( $idIsFound === false ) {
	trigger_error('views/comment-form-html.php needs an $entry');
}

return "
<form action='index.php?page=blog&amp;id=$entryId' method='post' id='comment-form'>
	<input type='hidden' name='entry-id' value='$entryId' />
	<label>Your name</label>
	<input type='text' name='user-name'>
	<label>Your comment</label>
	<textarea name='new-comment'></textarea>
	<input type='submit' value='post!' />
</form>";
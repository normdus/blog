<?php
/*
**
**	controllers/admin/entries.php
**	models/Blog_Entry_Table.class.php [allEntries]
**	views/admin/entries-html.php
**
**	9/13/15 - Reviewed - added comments & Tested
*/

if( isset( $allEntries) === false ) {
	trigger_error('views/admin/entries-html.php needs $allEntries');
}
// Creates a clickable list of blog entries 
$entriesAsHTML = "<ul>";
while ( $entry = $allEntries->fetchObject() ) {
	$href ="admin.php?page=editor&amp;id=$entry->entry_id";
	$entriesAsHTML .= "<li><a href='$href'>$entry->title</a></li>";
}
$entriesAsHTML .="</ul>";
return $entriesAsHTML;
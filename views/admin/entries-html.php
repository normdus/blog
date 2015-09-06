<?php
/*
**	views/admin/entries-html.php
**
**	8/30/15 - Created & Tested
*/

if( isset( $allEntries) === false ) {
	trigger_error('views/admin/entries-html.php needs $allEntries');
}

$entriesAsHTML = "<ul>";
while ( $entry = $allEntries->fetchObject() ) {
	$href ="admin.php?page=editor&amp;id=$entry->entry_id";
	$entriesAsHTML .= "<li><a href='$href'>$entry->title</a></li>";
}
$entriesAsHTML .="</ul>";
return $entriesAsHTML;
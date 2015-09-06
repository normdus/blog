<?php
/*
**	views/entry-html.php
**
**	8/30/15 - Created from PG 135 & 136
**
*/
$entryDataFound = isset( $entryData );
if ( $entryDataFound === false ) {
	trigger_error('views/entry-html.php needs an $entryData object');
}
// properties in $entry: entry_id, title, entry_text, date_created
return "<article>
			<h1>$entryData->title</h1>
			<div class='date'>$entryData->date_created</div>
			$entryData->entry_text
		</article>";
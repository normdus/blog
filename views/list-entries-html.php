<?php
/*
** views/list-entries-html.php
**
**	8/30/15 - PG 132 - Tested.
**
*/
$entriesFound = isset( $entries );
if ( $entriesFound === false ) {
	trigger_error( 'views/list-entries-html.php');
}

// create a <ul> element
$entriesHTML = "<ul id ='blog-entries'>";

// loop through all $entries from the database
// remember each row temporarily as $entry
// $entry will be a StdClass object with entry_id, title and intro
while ( $entry = $entries->fetchObject() ){
	$href = "index.php?page=blog&amp;id=$entry->entry_id";
	// create an <li> for each of the entries
	$entriesHTML .= "<li>
		<h2>$entry->title</h2>
		<div>$entry->intro
			<p><a href='$href'>Read more</a></p>
		</div>
	</li>";
}
// end the <ul>
$entriesHTML .= "</ul>";
return $entriesHTML;
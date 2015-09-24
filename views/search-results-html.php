<?php
/*
**
**	views/search-results-html.php
**	only processed if search requested...
**	must have $searchData or error
**
*/
$searchDataFound = isset( $searchData ); // where comes from?
if ( $searchDataFound === false ){
	trigger_error('view/search-results-html.php needs searchData');  // problem if here and no data
}
//  build an html view using $searchHTML with unordered list...
$searchHTML = "<section id='search'><p>You searched for <em>$searchTerm</em></p><ul>";

// be 100% clear on what this code is doing!!
while ( $searchRow = $searchData->fetchObject() ){
	$href = "index.php?page=blog&amp;id=$searchRow->entry_id";
	$searchHTML .= "<li><a href='$href'>$searchRow->title</li>";
}
$searchHTML .= "</ul></section";
return $searchHTML;
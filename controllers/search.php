<?php
/*
**  Index.php Front controller processes submit button
**	button clicked for search reguest - any search text for testing
**	search.php search controller
**	failed to create search-result-html.php view (dah)
**  die
*/

include_once "models/Blog_Entry_Table.class.php";
/*
**	instantiates an object from the Blog_Entry_Table class.
*/
$blogTable = new Blog_Entry_Table( $db );

$searchOutput = "";

//  check if submit button was clicked - search requested
if ( isset($_POST['search-term']) ){
	$searchTerm = $_POST['search-term'];  // search-term from search-form-html.php
/*
**	Calls $blogTable object's searchEntry method to search 
**	the table passing a $searchTerm
*/	
	$searchData = $blogTable->searchEntry( $searchEntry );

	$searchOutput = include_once "views/search-result-html.php";
}

return $searchOutput;
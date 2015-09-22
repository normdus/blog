<?php
/*
**
**	index.php - front controller
**	- DB connection - instantiate $db object
**	- includes - controllers/blog.php
**	- includes - views/page.php
**
*/
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

include_once "models/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->title = "PHP/Msql blog project";
$pageData->addCSS("css/blog.css");

$dbInfo = "mysql:host=127.0.0.1;dbname=simple_blog";
$dbUser = "nduchene";
$dbPassword = "norm3488";

// What is happening in the next two lines of code??
// What is a PDO object?
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// code for search request
$pageRequested = isset( $_GET['page'] );
$controller = "blog";
if ( $pageRequested ) {
	if ( $_GET['page'] === "search" ) {
		$controller = "search";
	}
}
$pageData->content .=include_once "views/search-form-html.php";

// The default controller is blog or search if requested.
$pageData->content .=include_once "controllers/$controller.php";

// load view so model data will be merged with the page template
$page = include_once "views/page.php";
// output generated page
echo $page;
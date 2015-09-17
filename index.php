<?php
/*
**	complete code for index.php
**
**	8/30/15 - PG 127 Tested.
**			- Updated PG 128.
**
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

// $pageData->content = "<h1>We're connected</h1>";
$pageData->content .=include_once "controllers/blog.php";

// load view so model data will be merged with the page template
$page = include_once "views/page.php";
// output generated page
echo $page;
<?php
/*
**	blog - admin.php
*	9/13/15 - Pg 157 - Tested & commited
*/
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

/** 	Page_Data()		**/
include_once "models/Page_Data.class.php"; 	
$pageData = new Page_Data();   								
$pageData->title = "PHP/MySql blog demo";
$pageData->addCSS("css/blog.css");
////$pageData->addScript("js/editor.js");  bug in downloaded books code 

$pageData->content = include_once "views/admin/admin-navigation.php";

/*
**	admin.php
**
** database connection:  Table Data gateway design pattern vs active record pattern
** Table gateway pattern specifies one PHP class per table. 
** Code from page 119 
*/
$dbInfo = "mysql:host=127.0.0.1;dbname=simple_blog";
$dbUser = "nduchene";
$dbPassword = "norm3488";

// try to create a database connection with a PDO object
$db = new PDO( $dbInfo, $dbUser, $dbPassword );
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/* 
**  END of Database Connection
*/

$navigationIsClicked = isset( $_GET['page'] );  // user input
if ( $navigationIsClicked ) {
	$contrl = $_GET['page'];  	// all set to load corresponding controller
} else {
	$contrl = "entries";		// set to load default controller
}

$pageData->content .=include_once "controllers/admin/$contrl.php";

$page = include_once "views/page.php";  
echo $page;
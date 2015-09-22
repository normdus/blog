<?php
/*
**
**
**
*/

include_once "models/Blog_Entry_Table.class.php";
$blogTable = new Blog_Entry_Table( $db );

$searchData = $blogTable->searchEntry( "test");

$firstResult =  $searchData->fetchObject();

$searchOutput = print_r($firstResult, true);

$searchForm = include_once "views/search-form-html.php";

$searchOutput .= $searchForm;

return $searchOutput;
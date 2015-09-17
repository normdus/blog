<?php
/*
**
**	9/16/15 - created
**
**  Complex View - A view made up of multiple controllers, views, models.
**
**  controllers/blog.php - is the primary controller. 
**		- loads a single blog post views/entry-html.php
**		- next it loads the output from this controller 
**	
**	controllers/comments.php - secondary controller
**		- 
**  	- next loads comment form view 
**		- 
**   
**  This comments controller loads the Form View below.
*/
include_once "models/Comment_Table.class.php";
$commentTable = new Comment_Table($db);

$allComments = $commentTable->getAllById( $entryId );
$firstComment = $allComments->fetchObject();

$testOutput = print_r( $firstComment, true );
die( "<pre>$testOutput</pre>");

$comments = include_once "views/comment-form-html.php";
return $comments;
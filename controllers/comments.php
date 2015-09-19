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

/*
**	
**	The user has clicked on a specific post to read the entire post,
**	add new comments ( new-comment isset - post! clicked ),
**  read existing comments. 
*/
$newCommentSubmitted = isset( $_POST['new-comment']);
if ( $newCommentSubmitted ) {
	$whichEntry = $_POST['entry-id'];
	$user = $_POST['user-name'];
	$comment = $_POST['new-comment'];
	$commentTable->saveComment( $whichEntry, $user, $comment );
}
/*
**	
**
**
*/
$comments = include_once "views/comment-form-html.php";


$allComments = $commentTable->getAllById( $entryId );
$comments .=include_once "views/comments-html.php";
return $comments;
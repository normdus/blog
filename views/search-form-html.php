<?php
/*
**	views/search-form-html.php
**
**	9/23 - tested as html in browser and sublime.
**  Looked fine!  The problem is after from submitted.
*/
return "<aside id='search-bar'>
	<form method='post' action='index.php?page=search'>
		<input type='search' name='search-term' />
		<input type='submit' value='search' />
	</form>
</aside>";
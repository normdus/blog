<?php
/*
*************************************************
**  This page.php is built and echoed to user.  **
**																							**
**	$pageData->css is one property of new 			**
**	Page_Data class that has 4 properties.			**
**				      																**
**																							**	
**************************************************/
return "<!DOCTYPE html>
<html>
	<head>
		<title>$pageData->title</title>
 		<meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
 		$pageData->css
 		$pageData->embeddedStyle
 	</head>
 	<body>
 		$pageData->content
 		$pageData->scriptElements
 	</body>
</html>";
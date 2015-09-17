<?php
/*
**	9/16/15
**	Create comments table
**
**
*/

/*  Hosted Free Site
$servername = "localhost";
$username = "1012928";
$password = "norm3488";
$dbname = "1012928";
*/
$servername = "127.0.0.1";
$username = "nduchene";
$password = "norm3488";
$dbname = "simple_blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successfull: " . $conn->error;
}

//*************************************************//
//*      [DROP ALL] comment table       *//
//*************************************************//
$sqlDrop = "DROP TABLE IF EXISTS comment";

if ($conn->query($sqlDrop) === TRUE) {
    echo "Tables comment [DROP ALL] successfully<br>";
} else {
    echo "Error dropping table: " . $conn->error;
}
//*************************************************//
//*      [CREATE] comment table          *//
//*************************************************//
$sqlCreate = "CREATE TABLE comment (
	comment_id		INT NOT NULL AUTO_INCREMENT,
	entry_id		INT NOT NULL,
	author 			VARCHAR( 75 ),
	txt 			TEXT,
	date	TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (comment_id),
	FOREIGN KEY (entry_id) REFERENCES blog_entry (entry_id)
)";
if ($conn->query($sqlCreate) === TRUE) {
    echo "Tables comment [Created] successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}
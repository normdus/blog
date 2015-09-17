<?php
$servername = "localhost";
$username = "1012928";
$password = "norm3488";
$dbname = "1012928";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successfull: " . $conn->error;
}

//*************************************************//
//*      [DROP ALL] blog_entry table       *//
//*************************************************//
$sqlDrop = "DROP TABLE IF EXISTS blog_entry";

if ($conn->query($sqlDrop) === TRUE) {
    echo "Tables blog_entry [DROP ALL] successfully<br>";
} else {
    echo "Error dropping table: " . $conn->error;
}
//*************************************************//
//*      [CREATE] blog_entry table          *//
//*************************************************//
$sqlCreate = "CREATE TABLE blog_entry (
	entry_id		INT(5) UNSIGNED	AUTO_INCREMENT PRIMARY KEY,
	title 			VARCHAR(150) 	NOT NULL,
	entry_text 		TEXT NOT NULL, 
	dated_created	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	price 			DECIMAL(9.2),
	pix 			CHAR(15)		NOT NULL 
)";
if ($conn->query($sqlCreate) === TRUE) {
    echo "Tables blog_entry [Created] successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}
//************************************//

/*
`entry_id` INT NULL AUTO_INCREMENT , 
	`title` VARCHAR(150) NOT NULL ,
	 `entry_text` TEXT NOT NULL , 
	`date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`crap` TEXT NOT NULL , 
	PRIMARY KEY (`entry_id`)) ENGINE = InnoDB;
*/
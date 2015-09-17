<?php
/*
**  9/16/15 - created
**	models/Comment_Table.class.php
**
**
*/
//	parent class definition 
include_once "models/Table.class.php";

// extend current class from parent class
class Comment_Table extends Table{

	public function saveComment ( $entryId, $author, $txt ) {
		$sql = "INSERT INTO comment ( entry_id, author, txt )
				VALUES (?, ?, ?)";
		$data = array( $entryId, $author, $txt );
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
}
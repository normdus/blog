<?php
/*
** 			Blog_Enty_Table.class.php
**
**		Table Data Gateway Design Pattern
**
**  Date:       Tested:
** 	08/30/15 	- PG 120 
**				- PG 129 
**				- PG 135 
**	09/13/15 	- PG 138 - 147
**
**	$entryTable is an [Instance Object] of Blog_Entry_Table [Class]  
**  $object->method or ->property
** 
*/       

class Blog_Entry_Table {
	
	private $db;

	public function __construct ( $db ) {
		$this->db = $db;		
	}
/*
**
**	Parent class OOP???  Tested to pg - 139
**	
*/
	private function makeStatement ( $sql, $data = NULL) {
		$statement = $this->db->prepare( $sql );
		try{
			$statement->execute( $data );
		} catch (Exception $e) {
			$exceptionMessage = "<p>SQL failed: $sql </p>
				<p>Exception: $e</p>";
			trigger_error($exceptionMessage);
		}
		return $statement;
	}

	public function getEntry ( $id ) {
		$sql = "SELECT entry_id, title, entry_text, date_created	
			FROM blog_entry
			WHERE entry_id = ?"; 
		$data = array( $id );  
		$statement = $this->makeStatement($sql, $data);
		$model = $statement->fetchObject();
		return $model;
	}

    // PDO - SQL injection attacks & single double-quotes handled...
	public function saveEntry ( $title, $entry ) {
		$sql = "INSERT INTO blog_entry ( title, entry_text )
					VALUES ( ?, ? )";  // ? are placeholders
		$formData = array( $title, $entry );  // create an array with dynamic data
		$statement = $this->makeStatement( $sql, $formData );		
	}

//	Changes from PG 139 - Tested.
	public function getAllEntries() {
		$sql = "SELECT entry_id, title,
				SUBSTRING(entry_text, 1, 150) AS intro  
				FROM blog_entry";				// intro is an alias for the new column
		$statement = $this->makeStatement( $sql );		
		return $statement;
	}

	public function deleteEntry( $id ) {
		$sql = "DELETE FROM blog_entry WHERE entry_id = ?";
		$data = array( $id );
		$statement = $this->makeStatement( $sql, $data );
	}
}
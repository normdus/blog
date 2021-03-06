<?php
/*
** 			Blog_Enty_Table.class.php
**
**		Table Data Gateway Design Pattern
****  
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

		//  standard PDO method - needs an auto-incrementing primary key 
		return $this->db->lastInsertID();	// return ID of just inserted entry
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
		$this->deleteCommentsById( $id );
		$sql = "DELETE FROM blog_entry WHERE entry_id = ?";
		$data = array( $id );
		$statement = $this->makeStatement( $sql, $data );
	}

	public function deleteCommentsById ( $id ) {
		include_once "models/Comment_table.class.php";
		$comments = new Comment_table( $this->db );
		$comments->deleteByEntryId( $id );
	}

	public function updateEntry ( $id, $title, $entry ) {
		$sql = "UPDATE blog_entry
				SET title = ?,
				entry_text = ?
				WHERE entry_id = ?";
		$data = array( $title, $entry, $id );
		$statement = $this->makeStatement( $sql, $data );
		return $statement;
	}
	//  difficult bug to find - 2nd search term spa before closing 
	//  double quote. Nothing would display.... Checked all multiple
	//  times. similar mistake in html... both times PHP no error.
	//  spent hours on just this.  This is the job I love....          
	public function searchEntry ( $searchTerm ) {
		$sql = "SELECT entry_id, title FROM blog_entry
				WHERE title LIKE ?
				OR entry_text LIKE ?";
		$data = array( "%$searchTerm%", "%$searchTerm%" );
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
}


<?php
/*
** 			Blog_Enty_Table.class.php
**
**		Table Data Gateway Design Pattern
**
** 	08/30/15 	- PG 120 Tested.
**				- PG 129 Tested.
				- PG 135  

**
** >>>>> There are more changes since page 120 <<<<<<<
*/       

class Blog_Entry_Table {
	
	private $db;

	public function __construct ( $db ) {
		$this->db = $db;		
	}

    // PDO - SQL injection attacks & single double-quotes handled...
	public function saveEntry ( $title, $entry ) {
		$sql = "INSERT INTO blog_entry ( title, entry_text )
					VALUES ( ?, ? )";  // ? are placeholders
		$statement = $this->db->prepare( $sql );
		$formData = array( $title, $entry );  // create an array with dynamic data
		try{
			$statement->execute( $formData ); // pass the $formData as argument to execute
		} catch (Exception $e){
			$msg = "<p>You tried to run this sql: $sql</p>
			 		<p>Exception: $e</p>";
			trigger_error($msg);
		}
	}

	public function getEntry ( $id ) {
		$sql = "SELECT entry_id, title, entry_text, date_created	
			FROM blog_entry
			WHERE entry_id = ?";  // ? are placeholders

		$statement = $this->db->prepare( $sql );
		$data = array( $id );  // create an array with dynamic data
		try{
			$statement->execute( $data ); // pass the $data as argument to execute
		} catch (Exception $e){
			$msg = "<p>You tried to run this sql: $sql</p>
			 		<p>Exception: $e</p>";
			trigger_error($msg);		
		}
		$model = $statement->fetchObject();
		return $model;
	}

//	Changes from PG 129 - Tested.
	public function getAllEntries() {
		$sql = "SELECT entry_id, title,
				SUBSTRING(entry_text, 1, 150) AS intro  
				FROM blog_entry";				// intro is an alias for the new column
		$statement = $this->db->prepare( $sql );
		try { 
			$statement->execute();
		} catch ( Exception $e ) {
			$exceptionMessage = "<p>You tried to run this sql: $sql <p>
						<p>Exception: $e</p>";
			trigger_error($exceptionMessage);
		}
		return $statement;
	}
}
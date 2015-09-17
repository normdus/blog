<?php
/*
**
**	class Table just prepares an SQL statement
**  and executes   not sure yet???
**
**
*/
class Table {
	protected $db;

	public function __construct ( $db ){
		$this->db = $db;
	}

	protected function makeStatement ( $sql, $data = null ) {
		$statement = $this->db->prepare( $sql );
		try{ 
			$statement->execute( $data );
		} catch (Exception $e) {
			$exceptionMessage = "<p>You tried to run this sql: $sql <p>
					<p?Exception: $e</p>";
		}
	  	return $statement;
	}
}
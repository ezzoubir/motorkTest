<?php

namespace Motork;

use Mysqli;

class DB {

	public function __construct($user, $password, $database, $host = 'localhost') {
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->host = $host;
	}

	protected function connect() {
		return new mysqli($this->host, $this->user, $this->password, $this->database);
	}

	public function query($query) {
		$db = $this->connect();
		$result = $db->query($query);
		
		while ( $row = $result->fetch_object() ) {
			$results[] = $row;
		}
		
		return $results;
	}



	public function insert($table, $data) {

		// Check for $table or $data not set
		if ( empty( $table ) || empty( $data ) ) {
			return false;
		}
		
		// Connect to the database
		$db = $this->connect();

		list( $fields, $placeholders, $values ) = $this->prep_query($data);

		$stmt = $db->prepare("INSERT INTO {$table} ({$fields}) VALUES ({$placeholders})");
		$stmt->bind_param("issssis", $values['0'], $values['1'], $values['2'], $values['3'], $values['4'], $values['5'], $values['6']);
		// Execute the query
		$stmt->execute();
		
		// Check for successful insertion
		if ( $stmt->affected_rows ) {
			return true;
		}
		
		return false;
	}
	
		
	private function prep_query($data, $type='insert') {
		// Instantiate $fields and $placeholders for looping
		$fields = '';
		$placeholders = '';
		$values = array();
		
		// Loop through $data and build $fields, $placeholders, and $values			
		foreach ( $data as $field => $value ) {
			$fields .= "{$field},";
			$values[] = $value;
			$placeholders .= '?,';			
		}
		
		// Normalize $fields and $placeholders for inserting
		$fields = substr($fields, 0, -1);
		$placeholders = substr($placeholders, 0, -1);
		
		return array( $fields, $placeholders, $values );
	}

}
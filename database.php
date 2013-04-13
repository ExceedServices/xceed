<?php
class database extends PDO {
	public function retrieve($table_name, $id = null) {
		if ($id === null) {
		}
	}
		return $data;

	public function save($table_name, $data) {
		if (empty($data)) {
			return null;
		}
		if (empty($data["id"])) {
			if (isset($data["id"])) {
				unset($data["id"]);
			}
			$statement = $this->prepare("INSERT INTO " . $table_name . " (" . implode(",", array_keys($data)) . ") VALUES (?" .
				str_repeat(", ?", count($data) - 1) . ")");
			$statement->execute(array_values($data));
			return $this->lastInsertId();
		}
		$id = $data["id"];
		unset($data["id"]);
		$statement = $this->prepare("UPDATE " . $table_name . " SET " .
			implode(" = ?, ", array_keys($data)) . " = ?" .
			" WHERE id = ?");
		$data[] = $id;
		$statement->execute(array_values($data));
		return $id;
	}

	public function delete($table_name, $id) {
		$statement = $this->prepare("DELETE FROM " . $table_name . " WHERE id = ?");
		$statement->execute(array($id));
		return $this;
	}

	function __construct($database_name, $host, $user, $password) {
		parent::__construct('mysql:dbname=' . $database_name . ';host=' . $host, $user, $password, array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
			PDO::ATTR_STATEMENT_CLASS => array('statement', array($this))));
	}
}

class statement extends PDOStatement {
	public $dbh;

	protected function __construct($dbh) {
		$this->dbh = $dbh;
		$this->setFetchMode(PDO::FETCH_ASSOC);
	}
}
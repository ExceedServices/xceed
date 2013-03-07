<?php
class database extends PDO {
	public function retrieve($table_name, $id = null) {
		if ($id === null) {			return $this->retrieve_where($table_name);
		}		$data = $this->retrieve_by_field($table_name, "id", $id);		if (isset($data[$id])) {			return $data[$id];		}		return array();
	}	public function retrieve_by_field($table_name, $field, $variable) {		return $this->retrieve_where($table_name, $field . " = ?", $variable);	}	public function retrieve_where($table_name, $where = "", $variables = null) {		if (!empty($where) && stripos($where, "WHERE") === false) {			$where = "WHERE " . $where;		}		return $this->retrieve_sql("SELECT *			FROM " . $table_name . "			" . $where, $variables);	}	public function retrieve_sql($sql, $variables = null) {		$statement = $this->prepare($sql);		if (!empty($variables)) {			$statement->execute(normalize_array($variables));		} else {			$statement->execute();		}		$data = array();		while ($row = $statement->fetch()) {			$data[$row["id"]] = $row;		}
		return $data;	}

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
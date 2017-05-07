<?php 

class log {

	public $sql;
	public $email;
	public $type;
	public $numrow;

	public function sql($sql) {
		$this->sql = mysql_query($sql);

		if(mysql_num_rows($this->sql) >0) {
			while ($row = mysql_fetch_array($this->sql)) {
				$this->email = $row['email'];
				$this->type = $row['type'];
			}
			$this->numrow = 1;
		} else {
			$this->numrow = 0;
		}
	}
	public function getemail() {
		return $this->email;
	}
	public function gettype() {
		return $this->type;
	}
	public function numrow() {
		return $this->numrow;
	}
}

class addemployee  {

	public $esql;
	public $sm;

	public function esql($esql) {
		$this->esql = mysql_query($esql);

		if($this->esql === TRUE) {
			$this->sm = "Successful";
		} 
		else {
			$this->sm = "Failled.Try again!";
		}
	}
	public function getsm() {
		return $this->sm;
	}
}
 

?>
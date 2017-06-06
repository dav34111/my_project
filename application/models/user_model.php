<?php

class User_model extends Model{

	public function check($login, $pass){
		$query = "SELECT * FROM user WHERE login = :login AND pass = :pass";
		$db = $this->_dbHandle->prepare($query);
		$db->execute(['login'=>$login, 'pass'=>$pass]);
		$count = $db->rowCount();
		return $count;
	}

	public function city(){
		$query = "SELECT * FROM city2";
		$city = $this->_dbHandle->query($query);
		$view = $city->fetchAll(PDO::FETCH_ASSOC);
		return $view;
	}

	public function add_info($name, $code, $district, $population){
		$query1 = "INSERT INTO city2 (name, countrycod, district, population) VALUES (:name, :code, :district, :population)";
		$db = $this->_dbHandle->prepare($query1);
		$db->execute(['name'=>$name, 'code'=>$code, 'district'=>$district, 'population'=>$population]);
	}

	public function remove($id){
		$query = "DELETE FROM city2 WHERE id = '$id'";
		$this->_dbHandle->query($query);
	}

	public function update($id, $name, $code, $district, $population){
		$query1 = "UPDATE city2 SET name='$name', countrycod='$code', district='$district', population='$population' WHERE id='$id'";
		$this->_dbHandle->query($query1);
	}
}
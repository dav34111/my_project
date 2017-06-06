<?php

class SQLQuery {
    protected $_dbHandle;
    protected $_result;
    //PDO
    /** Connects to database **/

    function connect($address, $account, $pwd, $name) {
       
         $this->_dbHandle = new PDO("mysql:host=$address;dbname=$name", $account, $pwd);
         return 1;
    }

    /** Disconnects from database **/

    function disconnect() {
       
        $this->_dbHandle->close();
        return 1;
    }
    
    function selectAll() {
    	$query = 'select * from `'.$this->_table.'`';
    	return $this->query($query);
    }
    
    function select($id) {
    	$query = "select * from $this->_table where id = $id";
       	return $this->query($query);    
    }

	
    /** Custom SQL Query **/

	function query($query) {

		$this->_result = $this->_dbHandle->query($query);
        if (preg_match("/select/i",$query)) {
            return $this->_result = $this->_result->fetchAll(PDO::FETCH_ASSOC);
        }


	}

    /** Get number of rows **/
    function getNumRows() {
        return mysqli_num_rows($this->_result);
    }

    /** Free resources allocated by a query **/

    function freeResult() {
        mysqli_free_result($this->_result);
    }

    /** Get error string **/

    function getError() {
        //return mysqli_error($this->_dbHandle);
    }
}

<?php

	/**
	 * 
	 */
	/*connection class for product list with methods*/
	class _DBConnection
	{
		private $connection;
		private $sql;
		/*mysqli constructor*/
		function __construct($dbhost, $dbuser, $dbpassword, $dbname) 
		{
			/*setting parameters for data base connection*/
			$connect = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
			/*set connection variable*/
			$this->_setConnect($connect);
			/*check if DB works!*/
			if(!$this->_getConnect()){
				die('Could not connect to MySQL database: '.mysqli_error($connection));
			}
		}

		function __destruct() {
			/*destructor*/
			unset($this->connection);
			unset($this->sql);
			
		}

		function _sendInsert()
		{
			/*setting query*/
			$sql = $this->_getQuery();
			/*running query*/
			if (mysqli_query($this->_getConnect(), $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($this->_getConnect());
            }
            mysqli_close($this->_getConnect());
		}

		function _setConnect($connect)
		{
			$this->connection = $connect;
		}

		function _setQuery($sql)
		{
			$this->sql = $sql;
		}

		function _getConnect()
		{
			return $this->connection;
		}

		function _getQuery()
		{
			return $this->sql;
		}
	}
?>
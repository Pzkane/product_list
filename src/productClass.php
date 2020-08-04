<?php 
	include ($_SERVER['DOCUMENT_ROOT'].'/product_list/src/DBConnection.php');
	/**
	 * 
	 */
	/*abstract class with standart parameters - exists only for children*/
	abstract class productClass
	{
		private $type;
		private $sku;
		private $name;
		private $price;

		private $dbhost;
		private $dbuser;
		private $dbpass;
		private $dbname;

		public function __construct($type, $sku, $name, $price)
		{
			$this->_setType($type);
			$this->_setSKU($sku);		
			$this->_setName($name);	
			$this->_setPrice($price);
		}

		function __destruct() {
		}
		//SETters
		public function _setType($type)
		{
			$this->type = $type;
		}

		public function _setSKU($sku)
		{
			$this->sku = $sku;
		}

		public function _setName($name)
		{
			$this->name = $name;
		}

		public function _setPrice($price)
		{
			$this->price = $price;
		}

		//GETters
		public function _getType()
		{
			return $this->type;
		}

		public function _getSKU()
		{
			return $this->sku;
		}

		public function _getName()
		{
			return $this->name;
		}

		public function _getPrice()
		{
			return $this->price;
		}

		//database data
		public function _setDBParams()
		{
			$this->dbhost = 'localhost:3306';
		 	$this->dbuser = 'root';
		 	$this->dbpass = '';
			$this->dbname = 'products';
		}

		public function _getDBHost()
		{	
			return $this->dbhost;
		} 

		public function _getDBUser()
		{
			return $this->dbuser;
		}

		public function _getDBPass()
		{
			return $this->dbpass;
		}

		public function _getDBName()
		{
			return $this->dbname;
		}
	}
 ?>
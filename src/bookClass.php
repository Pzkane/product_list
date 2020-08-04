<?php
	/**
	 * 
	 */
	/*class for books*/
	class bookClass extends productClass
	{
		private $kg;
		
		function __construct($type, $sku, $name, $price, $kg)
		{
			/*extending constructor*/
			parent::__construct($type, $sku, $name, $price);
			$this->_setKG($kg);
			$this->_setDBParams();
			/*creating connection*/
			$dbparams = new _DBConnection($this->_getDBHost(), $this->_getDBUser(), $this->_getDBPass(), $this->_getDBName());
			/*setting up request*/
			$dbparams->_setQuery('INSERT INTO books '.
			'(SKU, Name, Price, Weight_KG, type) '.
			'VALUES ("'.$this->_getSKU().'", "'.$this->_getName().'", "'.$this->_getPrice().'", "'.$this->_getKG().'", "'.$this->_getType().'")');
			/*executing request*/
			$dbparams->_sendInsert();
			unset($dbparams);
		}

		function __destruct() {
			unset($this->SKU);
			unset($this->Name);
			unset($this->Price);
			unset($this->kg);
		}
		//SETters
		final function _setKG($kg)
		{
			$this->kg = $kg;		
		}
		//GETters
		final function _getKG()
		{
			return $this->kg;
		}
	}

?>
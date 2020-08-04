<?php
	//include ($_SERVER['DOCUMENT_ROOT'].'/product_list/src/productClass.php');
	/**
	 * 
	 */
	class DVDClass extends productClass
	{
		private $size;
		
		function __construct($type, $sku, $name, $price, $size)
		{
			/*extending constructor*/
			parent::__construct($type, $sku, $name, $price);
			$this->_setSize($size);
			$this->_setDBParams();
			/*creating connection*/
			$dbparams = new _DBConnection($this->_getDBHost(), $this->_getDBUser(), $this->_getDBPass(), $this->_getDBName());
			/*setting up request*/
			$dbparams->_setQuery('INSERT INTO dvddisc '.
			'(SKU, Name, Price, Size_MB, type) '.
			'VALUES ("'.$this->_getSKU().'", "'.$this->_getName().'", "'.$this->_getPrice().'", "'.$this->_getSize().'", "'.$this->_getType().'")');
			/*executing request*/
			$dbparams->_sendInsert();
			unset($dbparams);
		}

		function __destruct() {
			unset($this->SKU);
			unset($this->Name);
			unset($this->Price);
			unset($this->size);
		}
		//SETters
		final function _setSize($size)
		{
			$this->size = $size;		
		}
		//GETters
		final function _getSize()
		{
			return $this->size;
		}
	}

?>
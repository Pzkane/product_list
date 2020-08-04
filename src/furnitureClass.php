<?php
	//include ($_SERVER['DOCUMENT_ROOT'].'/product_list/src/productClass.php');
	/**
	 * 
	 */
	class furnitureClass extends productClass
	{
		private $h;
		private $w;
		private $l;
		
		function __construct($type, $sku, $name, $price, $h, $w, $l)
		{
			/*extending constructor*/
			parent::__construct($type, $sku, $name, $price);
			$this->_setHxWxL($h, $w, $l);
			$this->_setDBParams();
			/*creating connection*/
			$dbparams = new _DBConnection($this->_getDBHost(), $this->_getDBUser(), $this->_getDBPass(), $this->_getDBName());
			/*setting up request*/
			$dbparams->_setQuery('INSERT INTO furniture '.
			'(SKU, Name, Price, Height, Width, Length, type) '.
			'VALUES ("'.$this->_getSKU().'", "'.$this->_getName().'", "'.$this->_getPrice().'", "'.$this->_getH().'", "'.$this->_getW().'", "'.$this->_getL().'", "'.$this->_getType().'")');
			/*executing request*/
			$dbparams->_sendInsert();
			unset($dbparams);
		}

		function __destruct() {
			unset($this->SKU);
			unset($this->Name);
			unset($this->Price);
			unset($this->h);
			unset($this->w);
			unset($this->l);
		}
		//SETters
		final function _setHxWxL($h, $w, $l)
		{
			$this->h = $h;
			$this->w = $w;
			$this->l = $l;
		}
		//GETters
		final function _getH()
		{
			return $this->h;
		}

		final function _getW()
		{
			return $this->w;
		}

		final function _getL()
		{
			return $this->l;
		}
	}
?>
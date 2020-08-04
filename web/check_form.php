<?php 
	require_once ($_SERVER['DOCUMENT_ROOT'].'/product_list/include/classes.php'); //for creating product object
	session_start();	//for $_SESSION error
	/*default error var EQUALS to 0*/
	$error = 0;
	/*in case of submission*/
	if (isset($_POST['submit'])) {
		/*define variables from POST*/
		$sku_data = $_POST["sku_var"];
		$name_data = $_POST["name_var"];
		$price_data = $_POST["price_var"];
		$listBox = $_POST["comboBox"];
		/*check if one of fiels is still empty*/
		if(!empty($sku_data) && !empty($name_data) && !empty($price_data)){
			switch ($listBox) {

				case 'Book':					
					$weight = $_POST["weight_var"];
					if(!empty($weight)){
						$product = new bookClass(1, $sku_data, $name_data, $price_data, $weight);
						$product->__destruct();
						unset($product);
					}else{
						$error = 1;
					}
					break;

				case 'DVD-disc':
					$size = $_POST["size_var"];
					if(!empty($size)){
						$product = new DVDClass(2, $sku_data, $name_data, $price_data, $size);
						$product->__destruct();
						unset($product);
					}else{
						$error = 1;
					}
					break;

				case 'Furniture':
					$h = $_POST["h_var"];
					$w = $_POST["w_var"];
					$l = $_POST["l_var"];
					if(!empty($h) && !empty($w) && !empty($l)){
						$product = new furnitureClass(3, $sku_data, $name_data, $price_data, $h, $w, $l);
						$product->__destruct();
						unset($product);
					}else{
						$error = 1;
					}
					/* debug
					echo $product->_getSKU()."<br>";
					echo $product->_getName()."<br>";
					echo $product->_getPrice()."<br>";
					echo $product->_getH()."<br>";
					echo $product->_getW()."<br>";
					echo $product->_getL()."<br>";
					*/
					break;

			}
		}else{
			$error = 1;
		}
		/*in case of error set $_SESSION variable*/
		if($error == 1){
			$_SESSION['type_in_error'] = "Fill in all the fields!";
			header("Location: http://localhost/product_list/web/adding_form.php");
			exit();
		}else{
			session_unset();
			session_destroy(); 
			echo "
				<script type=\"text/javascript\">
				alert(\"Data has been added!\");
				window.location.replace(\"http://localhost/product_list/index.php\");
				</script>
			";
		}
	}
?>
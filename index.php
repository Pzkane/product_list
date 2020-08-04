<?php
	/*creating connection*/
	$dbconnect = new mysqli('localhost:3306', 'root', '', 'products');

	/*check database connection */
	if (mysqli_connect_errno()) {
	    printf("Could not connect to MySQL database: ", mysqli_connect_error());
	    exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product list</title>
	<!---CSS import--->
	<link rel="stylesheet" href="http://localhost/product_list/style/general.css">
	<link rel="stylesheet" href="http://localhost/product_list/style/index.css">
</head>
<body>
	<!---clickable button--->
	<form action="web/callback.php", method="post">
		<input id="submit1", type="submit", name="submit1" class="button", value="Apply">
	
		<!---selection block--->
		<select id="variantBox" name="variantBox">
		    <option value="add">Add Product</option>
		    <option value="del">Mass Delete Action</option>
	    </select>	


	<div class="header-params">
		<h1>Product List</h1>
	</div>

	<?php
		for($i = 0; $i < 3; $i++){
			/*defining query*/
			switch ($i) {
				case 0:
					$query = "SELECT SKU, Name, Price, Weight_KG, type FROM books";
					break;
				
				case 1:
					$query = "SELECT SKU, Name, Price, Size_MB, type FROM dvddisc";
					break;

				case 2:
					$query = "SELECT SKU, Name, Price, Height, Width, Length, type FROM furniture";
					break;
			}
			/*running query*/
			$data = mysqli_query ($dbconnect, $query);
			/*displaying query*/
			while($row = mysqli_fetch_array($data,MYSQLI_ASSOC)){
				?>
				<div class="block-params">
			    		<input type="checkbox", name="divCheck[]", id="divCheck[]", value='<?php echo $row['SKU'] ?>'> <!---checkboxes for delete--->
						<p><?php echo $row['SKU'] ?></p>							<!---sku number--->
						<p><?php echo $row['Name']  ?></p>					<!---name--->
						<p><?php echo $row['Price']  ?> $</p>				<!---price--->
						<?php
							/*displaying unique data for each type*/
							switch ($i) {
								case 0:
									?><p>Weight: <?php echo $row['Weight_KG'] ?> KG</p><?php 		//special attribute - weight(KG)
									break;
								
								case 1:
									?>
									<p>Size: <?php echo $row['Size_MB'] ?> MB</p><?php   			 //special attribute - Size(MB)
									break;

								case 2:
									?>
									<p>Dimensions: <?php echo $row['Height'] ?>x<?php echo $row['Width'] ?>x<?php echo $row['Length'] ?></p><?php	//special attribute - Dimensions(HxWxL)
									break;
							}
						?>
					</div>
				<?php
			}
		}
		/*close connection*/
		mysqli_close($dbconnect);
	?>
	</form>
</body>
</html>
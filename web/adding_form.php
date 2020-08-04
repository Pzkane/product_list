<?php session_start(); //for $_SESSION error
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Add</title>
	<link rel="stylesheet" href="http://localhost/product_list/style/adding_form.css">
	<link rel="stylesheet" href="http://localhost/product_list/style/general.css">
	<script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script type="text/javascript" src='http://localhost/product_list/src/hide_reveal.js'></script>
</head>
<body>
	<div class="header-params">
		<h1>Product Add</h1>
	</div>
	<!---redirect to index.php--->
	<button id="applyBtn", onclick="javascript:window.location.href='http://localhost/product_list/index.php'", class="button">Back to List</button>

	<?php
		/*error diplay if needed*/
		if(!empty($_SESSION['type_in_error'])){
			?>
				<p class="error-fill"><?php echo $_SESSION['type_in_error'] ?></p>
			<?php
			unset($_SESSION['type_in_error']);
		}
	?>
	<!---main add form--->
	<form action="check_form.php" method="post">
		<label for="sku_var">SKU: </label><input id="sku_var", type="text", name="sku_var", readonly="readonly"/>
		<label for="name_var">Name: </label><input type="text", name="name_var"/>
		<label for="price_var">Price: </label><input type="number", step=".01", name="price_var"/>
		<!---product type combobox values--->
		<label for="comboBox" class="longLabel">Type Switcher</label><select name="comboBox" onchange="JS_hide_reveal('sku_var', 'submit', 'book_ID', 'dvd_ID', 'furn_ID', this)">
		    <option value="none">Select Product</option>
		    <option value="Book">Book</option>
		    <option value="DVD-disc">DVD-disc</option>
		    <option value="Furniture">Furniture</option>
	    </select>
		<!---book form reveal--->
		<div id="book_ID" class="hidden-element">
			<label for="weight_var" class="longLabel">Input weight(kg):</label><input type="number", step=".01", id="weight_var", name="weight_var" />
			<p>Please provide weight in <span>KG</span>.</p>
		</div>
		<!---dvd form reveal--->
		<div id="dvd_ID" class="hidden-element">
			<label for="size_var", class="longLabel">Input size(MB):</label><input type="number", id="size_var", name="size_var" />
			<p>Please provide DVD size in <span>MB</span>.</p>
		</div>
		<!---furniture form reveal--->
		<div id="furn_ID" class="hidden-element">
			<label for="h_var", class="longLabel">Input H(eight):</label><input type="number", step=".01", id="h_var", name="h_var" /><br>
			<label for="w_var", class="longLabel">Input W(idth):</label><input type="number", step=".01", id="w_var", name="w_var"/><br>
			<label for="l_var", class="longLabel">Input L(enght):</label><input type="number", step=".01", id="l_var", name="l_var"/>
			<p>Please provide dimensions in <span>H</span>x<span>W</span>x<span>L</span>.</p>
		</div>
		<!---.js script to reveal / hide elements--->
		<script>JS_hide_reveal();</script> 
		<input id="submit", class="hidden-element button", type="submit", name="submit" value="Save"/>
	</form>	
</body>
</html>

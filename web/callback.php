<?php
	if(isset($_POST['submit1'])) {
		$variant = $_POST['variantBox'];
			switch ($variant) {
				case 'add':
					/*credirect to product adding form*/
					header("Location: http://localhost/product_list/web/adding_form.php");
					exit();
					break;
				
				case 'del':
					/*check if at least 1 checkbox is active*/
					if(isset($_POST['divCheck'])){
						$dbconnect = new mysqli('localhost:3306', 'root', '', 'products');

						/*check database connection*/
						if (mysqli_connect_errno()) {
						    printf("Could not connect to MySQL database: ", mysqli_connect_error());
						    exit();
						}
						/*mass delete action*/
						$array = $_POST['divCheck'];
						$listCheck = "'" . implode("','", $array) . "'";
						/*delete action for each table*/
						for($i = 0; $i < 3; $i++){
							switch ($i) {
								case 0:
									echo $query = "DELETE FROM books WHERE SKU IN ($listCheck)";
									break;
					
								case 1:
									echo $query = "DELETE FROM dvddisc WHERE SKU IN ($listCheck)";
									break;

								case 2:
									echo $query = "DELETE FROM furniture WHERE SKU IN ($listCheck)";
									break;
									
							}
							$deleteSQL = mysqli_query ($dbconnect, $query);						
						}
						/*close connection*/
						mysqli_close($dbconnect);
						echo "
							<script>
								alert(\"Data has been vaporized!\");
								window.location.replace(\"http://localhost/product_list/index.php\");
							</script>
						";
						break;
					}else{
						echo "
							<script>
								alert(\"Select at least 1 product!\");
								window.location.replace(\"http://localhost/product_list/index.php\");
							</script>
						";
					}
			}
		}
?>
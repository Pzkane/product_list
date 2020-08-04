function JS_hide_reveal(SKU_var, submit, bk, dvd, furn, element)
{
	function JS_rand_ID() /*creating random ID for SKU*/
	{
		var x = Math.floor(Math.random()*999999);
		var prenull = "";
		if(x.toString().length<6){
			for(i = 1; i < 6-x.toString().length; i++){
				prenull += "0";
			}
			prenull += x.toString();
		}else{
			prenull = x.toString();
		}
		return prenull;
	}

	var id = JS_rand_ID();
	/*hiding / revealing blocks as well creating SKUs*/
	switch (element.value) {
		case "Furniture":
			document.getElementById(SKU_var).value = "FE" + id;
			document.getElementById(bk).style.display = "none";
			document.getElementById(dvd).style.display = "none";
			document.getElementById(furn).style.display = "block";
			document.getElementById(submit).style.display = "block";
			break;

		case 'Book':	
			document.getElementById(SKU_var).value = "BK" + id;				
			document.getElementById(bk).style.display = "block";
			document.getElementById(dvd).style.display = "none";
			document.getElementById(furn).style.display = "none";
			document.getElementById(submit).style.display = "block";
			break;

		case 'DVD-disc':
			document.getElementById(SKU_var).value = "DD" + id;
			document.getElementById(bk).style.display = "none";
			document.getElementById(dvd).style.display = "block";
			document.getElementById(furn).style.display = "none";
			document.getElementById(submit).style.display = "block";
			break;
		
		case "none":
			document.getElementById(SKU_var).value = "";
			document.getElementById(bk).style.display = "none";
			document.getElementById(dvd).style.display = "none";
			document.getElementById(furn).style.display = "none";
			document.getElementById(submit).style.display = "none";
			if(document.getElementById(SKU_var).value==""){
				alert("empty fields!");
			}
			break;
	}	
}

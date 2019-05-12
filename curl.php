<?php
include 'session.php';
if(isset($_POST['ingredientName'])){
	include 'conn.php';
	$ingredientName = $_POST['ingredientName'];
	$query = "INSERT INTO ingredients (ingredient_name, ingredient_name_plural) VALUES ('$ingredientName', '$ingredientName')";
	$conn->query($query);
}
if(isset($_POST['url'])){
	$url = $_POST['url'];
	$DEBUG = 0;
	if(strpos($url,"ica.se") !== FALSE){
		$source = 0;
		if($DEBUG)echo"Source: ica";
	} else if(strpos($url,"coop.se") !== FALSE){
		$source = 1;
		if($DEBUG)echo"Source: coop";
	} else {
		$source = -1;
		if($DEBUG)echo"Source: undefined";
	}
	
	// Set up the curl and xpath
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 

	$result = curl_exec($curl);
	$dom = new DOMDocument();
	$res = $dom->loadHTML($result);

	$xpath = new DomXPath($dom);
	//Get the header
	switch($source){
	case 0:
		$class = 'recipepage__headline';
		$headline = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
		break;
	case 1:
		$class = 'Recipe-title';
		$headline = $xpath->query("//h1[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
		break;
	default:
		break;
	}
	foreach ($headline as $h){
		$header = $h->nodeValue;
	}
	if($DEBUG)echo "<br><br>Header: " . $header;
	//Get the how-to
	switch($source){
	case 0:
		$class = 'recipe-howto';
		$description = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]/ol");
		break;
	case 1:
		$class = 'Recipe-instructionItem';
		$description = $xpath->query("//li[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]/p");
		break;
	default:
		break;
	}
	$descrString = '<ol>';
	foreach ($description as $descr){
		foreach($descr->childNodes as $k =>$node){
			$descrString .= "<li>" . $node->nodeValue . "</li>";
			
		}
	}
	$descrString .= "</ol>";
	if($DEBUG)echo"<br><br>Description: " . $descrString;
	
	//Get the image
	switch($source){
	case 0:
		$class = 'print-only';
		$image = $xpath->query("//img[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]/@src");
		break;
	case 1:
		$class = 'Recipe-image';
		$image = $xpath->query("//img[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]/@src");
		break;
	default:
		break;
	}
	
	foreach($image as $i){
		$imageurl = $i->nodeValue;
	}
	if($source == 1){
		$imageurl = "https:" . str_replace("w_400,h_400", "w_500,h_500", $imageurl);
	}
	if($DEBUG)echo"<br><br>Img url: " . $imageurl;
	//Get the cook time
	switch($source){
	case 0:
		$class = 'recipe-header__difficulty';
		$time = $xpath->query("//div[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
		break;
	case 1:
		$itemprop = 'cookTime';
		$time = $xpath->query("//span[contains(concat(' ', normalize-space(@itemprop), ' '), ' $itemprop ')]");
		break;
	default:
		break;
	}
	foreach($time as $t){
		$cooktime = filter_var($t->nodeValue, FILTER_SANITIZE_NUMBER_INT);
	}
	if($DEBUG)echo"<br><br>Cooktime: " . $cooktime;
	
	//Get the portion count
	switch($source){
	case 1:
		$class = 'Recipe-portionsCount';
		$serves = $xpath->query("//span[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]");
		foreach($serves as $s){
			$portions = $s->nodeValue;
		}
		if($DEBUG)echo"<br><br>Portions count: " . $portions;
		break;
	default:
		$portions = '';
		break;
	}

	//Get the ingredients
	switch($source){
	case 0:
		echo "	<script>";
			// Get ingredient js object and print inside script tags
		$temp = $xpath->query("//script[text()[contains(.,'window.__recipeData')]]");
		foreach($temp as $i){
			echo $i->nodeValue;
		}
		
		// JS function to convert ingredient to JSON
		echo "
				var obj = {};
				document.addEventListener('DOMContentLoaded', function(event){
				var ingList = window.__recipeData['ingredientGroups'];
				document.getElementById('serves-text').value = window.__recipeData['ingredientGroups'][0]['Portions'];
				var obj = {};
				var itemindex = 0;
				obj['0'] = {'title':'default', 'items':{}};
				ingList.forEach(function(ent, index, arr){
					//console.log(ent);
					ent['Ingredients'].forEach(function(innerEnt, innerIndex, innerArr){
						var datta = innerEnt['Ingredient'];
						var amount = (innerEnt['Quantity'] == 0?'':innerEnt['Quantity'])  + (innerEnt['Unit']!==null?' '+innerEnt['Unit']:'');
						obj['0']['items'][itemindex++] = {'id':String(datta), 'amount':String(amount)};
					});
				});
				";
			
		echo "
				var jsonString = JSON.stringify(obj);
				document.getElementById('i-json-text').value = jsonString;
				".($DEBUG?"//":"")."document.getElementById('parse-recipe-form').submit();
			});
		</script>";
		break;
	case 1:
		echo "	
		
		<script>
			document.addEventListener('DOMContentLoaded', function(event){
				".($DEBUG?"//":"")."document.getElementById('parse-recipe-form').submit();
			});
		</script>";
		
		$class = 'Recipe-ingredient';
		$childclassAmount = 'Recipe-ingredientAmount';
		$childclassType = 'Recipe-ingredientType';
		$ingelements = $xpath->query("//li[contains(concat(' ', normalize-space(@class), ' '), ' $class ')]/span[@class='$childclassAmount' or @class='$childclassType']");
		$coopIngredients[]->title = 'default';
		$coopIngredients[0]->items = Array();
		$counter = 0;
		foreach($ingelements as $e){
			if($counter%2==0){
				$coopIngredients[0]->items[]->amount = $e->nodeValue; 
			} else {
				$coopIngredients[0]->items[$counter/2]->id = $e->nodeValue;
			}				
			$counter++;
			//$portions = $s->nodeValue;
		}
		$coopIngredients = json_encode($coopIngredients,JSON_FORCE_OBJECT);

		//if($DEBUG)echo"<br><br>Portions count: " . $portions;
		break;
	default:
		break;
	}





	
	//Print form skeleton
	echo "  
	
	<form method=post action='.\?p=addcurl' id='parse-recipe-form'>
		<input type=hidden name='name' id='name-text' value='$header'>
		<input type=hidden name='descr' id='descr-text' value='$descrString'>
		<input type=hidden name='img-url' id='img-text' value='$imageurl'>
		<input type=hidden name='time' id='time-text' value='$cooktime'>
		<input type=hidden name='serves' id='serves-text' value='$portions'>
		<input type=hidden name='i-json' id='i-json-text' value='$coopIngredients'>
		<input type=hidden name='import' value='ica'>
		<input type=hidden name='page-url' value='$url'>
		<input type=submit>
	</form>

";
	

	
} else {
	echo 'No address';
}
?>
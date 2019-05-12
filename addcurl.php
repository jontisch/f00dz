<?php
include 'session.php';
$name = (isset($_POST['name'])?$_POST['name']:"");
$serves = (isset($_POST['serves'])?$_POST['serves']:"");
$time = (isset($_POST['time'])?$_POST['time']:"");
$descr = (isset($_POST['descr'])?$_POST['descr']:"");
$ingredients = (isset($_POST['i-json'])?$_POST['i-json']:"");
$url = (isset($_POST['img-url'])?$_POST['img-url']:"");
$page_url = (isset($_POST['page-url'])?$_POST['page-url']:"");

if(isset($_POST['import'])){
	$query = "SELECT * FROM ingredients";
	$result = $conn->query($query);
	while($row = $result->fetch_assoc()){
		$ingredient = new Ingredient($row['ingredient_id'], $row['ingredient_name'], $row['ingredient_name_plural']);
			$i[$ingredient->_id] = $ingredient;
	}
	$importedIngredients = json_decode($ingredients, true);
	$modifiedIngredients = $importedIngredients;
	foreach($modifiedIngredients['0']['items'] as $k => $v){
		$highestsim = 0;
		$highestid = -1;
		foreach($i as $ik => $iv){
			$sim = similar_text(mb_convert_case($v['id'], MB_CASE_TITLE, 'UTF-8'), mb_convert_case($iv->_name, MB_CASE_TITLE, 'UTF-8'));
			if($sim > $highestsim){
				$highestsim = $sim;
				$highestid = $ik;
			}
			$sim = similar_text(mb_convert_case($v['id'], MB_CASE_TITLE, 'UTF-8'), mb_convert_case($iv->_name_plural, MB_CASE_TITLE, 'UTF-8'));
			if($sim > $highestsim){
				$highestsim = $sim;
				$highestid = $ik;
			}
		
		}
		$modifiedIngredients['0']['items'][$k]['id'] = $highestid;
	}
	//$ingredients = json_encode($importedIngredients, JSON_FORCE_OBJECT);
	//var_dump($ingredients);
}
echo "
	<div class='row padded-row'>
		<h3>Granska importerat recept</h3>
	</div>
	<div class='row padded-row'>
		<form method=post action=add.php id='parse-recipe-form'>
			Namn: <input type=text class='form-control' name='name' id='name-text' value='$name'>
			Beskrivning: <input type=text class='form-control' name='descr' id='descr-text' value='$descr'>
			Bild-URL: <input type=text class='form-control' name='img-url' id='img-text' value='$url'>
			Tid: <input type=text class='form-control' name='time' id='time-text' value='$time'>
			Portioner: <input type=text class='form-control' name='serves' id='serves-text' value='$serves'>
			
			<div class='col-xs-6'><h4>Original</h4></div>
			<div class='col-xs-6'><h4>Match</h4></div>
			<div class='col-xs-6'>
";
foreach($modifiedIngredients['0']['items'] as $ki => $vi){
	echo "		
				<div class='row'>
					<div class='col-xs-10'>
						<input type=text class='form-control' value='". $importedIngredients['0']['items'][$ki]['id'] ."'>
					</div>
					<div class='col-xs-2'>
						<button type=button class='btn plus-button btn-primary'>+</button>
					</div>
				</div>
				";
}
echo "
</div>
<div class='col-xs-6'>
";
foreach($modifiedIngredients['0']['items'] as $ki => $vi){
	echo "		
				<div class='row'>
					<div class='col-xs-10'>
						<input type=text data-itemindex='$ki' data-itemid='". $vi['id'] ."' list='curl-ingredient-list' class='curl-datalist-input form-control' value='". $i[$vi['id']]->_name ."'>
					</div>
					<div class='col-xs-2'>
						<button type=button class='btn btn-primary plus-button invisible'>+</button>
					</div>
				</div>";
}

	echo "</div>
	<datalist id='curl-ingredient-list'>";
foreach($i as $ki => $vi){
	echo "<option data-itemid='".$vi->_id. "' value='".$vi->_name."'>";
}
echo "		</datalist>
			<input type=hidden name='i-json' id='i-json-text' value='". json_encode($modifiedIngredients, JSON_FORCE_OBJECT) ."'> 
			<input type=submit class='btn btn-primary'>
		</form>
	</div>
	<form action='curl.php' method=post id='add-ingredient-refresh-form'>
		<input type=hidden name='url' value='$page_url'>
		<input type=hidden name='ingredientName' value='' id='add-ingredient-input'>
	</form>
	";
?>
<?php
if(!isset($_GET['id'])){
	$id = 1;
} else {
	$id = $_GET['id'];
}
$query = "SELECT * FROM recipes WHERE recipe_id ='" . $id . "'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$r = new Recipe($row['recipe_id'], 
				$row['recipe_name'], 
				$row['recipe_cooktime'], 
				$row['recipe_ingredients'], 
				$row['recipe_rating'], 
				$row['recipe_serves'], 
				$row['recipe_imageformat'], 
				$row['recipe_description']);
$ratingWidth = ($r->_rating <= 0)?0:$r->_rating*16;
$query = "SELECT * FROM ingredients";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
	$ingredient = new Ingredient($row['ingredient_id'], $row['ingredient_name'], $row['ingredient_name_plural']);
	$i[$ingredient->_id] = $ingredient;
}
echo "
		<div class='row'>
			<h3>".$r->_name."</h3>
			<img class='full_image' src='img/$r->_id.$r->_imgformat'>
			<div class='row padded-row'>
				<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-right'>
					<img src='img/icons/clock.png' class='icon-big'> " . $r->_cooktime . " minuter
				</div>
				<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text_center'>
					<div style='width:".$ratingWidth."px;' class='rating' id='rating-div'></div>
					" . ($ratingWidth?"":"<button type=button class='btn' id='btn-rating'>betygsätt</button>") . "
				</div>
				<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-left'>
					" . $r->_serves . " portioner <img src='img/icons/plate.png' class='icon-big'>
				</div>
			</div>
			
			<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4 col col-xl-4 text_left'>
				";
/*foreach($r->_ingredients as $k => $v){
	if($k != "default") echo "<ul class='list-group'><li class='list-group-item active'><strong>$k</strong></li>";
	foreach($v as $subindex => $subamount){
		$amount = filter_var($subamount, FILTER_SANITIZE_NUMBER_INT);
		echo "<li class='list-group-item'>" . $subamount . " " . mb_convert_case(($amount <= 1)?$i[$subindex]->_name:$i[$subindex]->_name_plural, MB_CASE_TITLE, 'UTF-8') . "</li>";
	}
	if($k != "default") echo "</ul>";
}*/

foreach($r->_ingredients as $segment){
if($segment['title'] != "default") echo "<ul class='list-group'><li class='list-group-item active'><strong>". $segment['title'] ."</strong></li>";
	foreach($segment['items'] as $item){
		$amount = filter_var($item['amount'], FILTER_SANITIZE_NUMBER_INT);
		echo "<li class='list-group-item'>" . $item['amount'] . " " . mb_convert_case(($amount <= 1)?$i[$item['id']]->_name:$i[$item['id']]->_name_plural, MB_CASE_TITLE, 'UTF-8') . "</li>";
	}
	if($segment['title'] != "default") echo "</ul>";
}

	
echo "		
			</ul>
			</div>
			<div class='col-xs-12 col-sm-8 col-md-8 col-lg-8 col col-xl-8 text-left'>" .
			$r->_descr
			. "</div>
		</div>
		<div class='jumbotron on-top' id='rating-jumbo'>
			<div class='row padded-row'>
				<h3>Betyg</h3>
			</div>
			<div class='row padded-row'>
				<div class='rate-symbol' data-rating=1></div>
				<div class='rate-symbol' data-rating=2></div>
				<div class='rate-symbol' data-rating=3></div>
				<div class='rate-symbol' data-rating=4></div>
				<div class='rate-symbol' data-rating=5></div>
			</div>
			<div class='row padded-row'>
				<form action=rating.php method=post>
					<input type=hidden name='id' value='".$r->_id."'>
					<input type=hidden name='rating' id='rating-input' value='".$r->_rating."'>
					<input type=submit class='btn btn-primary'>
					<button type=button class='btn btn-primary' id='close-button'>Avbryt</button>
				</form>
			</div>	
		</div>
		";
		if($loggedin) echo "<a href='?p=recipeform&id=".$r->_id."' class='top-right-corner'></a>
		";	

?>

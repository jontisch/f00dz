<?php
// Page navigation setup
$offset = $_GET['o'] * $RESULTSPERPAGE;
$filter = $_GET['f'];
switch($_GET['order']){
case "name":
	$order = "ORDER BY recipe_name";
	break;
case "rating":
	$order = "ORDER BY recipe_rating DESC";
	break;
case "time":
	$order = "ORDER BY recipe_cooktime ";
	break;
default:
	$order = "ORDER BY recipe_id DESC";
}


$forwardLinkAddress = "?p=list&o=" . (isset($_GET['o'])?($_GET['o']+1):"1") . (isset($_GET['f'])?"&f=$filter":"");
$backwardLinkAddress = "?p=list&o=" . (isset($_GET['o'])?($_GET['o']>0?($_GET['o']-1):"0"):"0") . (isset($_GET['f'])?"&f=$filter":"");

$query = "SELECT recipe_id FROM recipes" . ($filter?" 
WHERE recipe_name LIKE '%$filter%' 
OR recipe_description LIKE '%$filter%'":"");
$result = $conn->query($query);

$nResults = $result->num_rows;

$forwardActive = ($offset+$RESULTSPERPAGE) < $nResults;
$backwardsActive = $offset > 0;
// END

// Actual query and object setup for the selection
$query = "SELECT * FROM recipes" . ($filter?" 
WHERE recipe_name LIKE '%$filter%' 
OR recipe_description LIKE '%$filter%' ":" ") . 
$order . "
LIMIT $RESULTSPERPAGE 
OFFSET $offset";

$result = $conn->query($query);
while($row = $result->fetch_assoc()){
        $recipe = new Recipe($row['recipe_id'], $row['recipe_name'], $row['recipe_cooktime'], $row['recipe_ingredients'], $row['recipe_rating'], $row['recipe_serves'],$row['recipe_imageformat'], $row['recipe_description']);
        $recipes[] = $recipe;
}
//END
?>
<div class='filter-box jumbotron'>
	<div class='row'>
		<form method=get action='?p=list'>
			<div class="row minimizable-header" id="filter-recipe-header">
				<h4>Sök recept</h4>
			</div>
			<div class="row padded-row minimizable-body" id="filter-recipe-body">
				<div class="col-xs-12 col-sm-6 col-md-6 padded-row">
					<h5>Sökord</h5>
					<input type=text name="f" class="form-control">
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 padded-row">
					<div class="btn-group" data-toggle="buttons">
						<h5>Sortering</h5>
						<label class="btn btn-primary active">
							<input type=radio name='order' value='rating' class='form-control' checked>Betyg
						</label>
						<label class="btn btn-primary">
							<input type=radio name='order' value='name' class='form-control'>Titel
						</label>
						<label class="btn btn-primary">
							<input type=radio name='order' value='time' class='form-control'>Tillagningstid
						</label>
					</div>
				</div>
				<input type=submit class='btn btn-primary'>
			</div>
		</form>
	</div>
</div>


<?php
foreach ($recipes as $v) {
	$ratingWidth = ($v->_rating <= 0)?0:$v->_rating*16;
	$noRating = ($ratingWidth)?"":"Ej betygsatt";
echo "			<div class='row text_left small_text_center fading'>
					<a href='?p=recipe&id=" . $v->_id . "'><span class='link-span'></span></a> 
					<div class='col-md-4 col-sm-4 col-xs-12 col-lg-4 col-xl-4'>
						<img class='thumb_image' src='img/" . $v->_id . "_thumb." . $v->_imgformat . "'>
					</div>
					<div class='col-md-8 col-sm-8 col-xs-12 col-lg-8 col-xl-8'>
						<h4 style='overflow:hidden;white-space: nowrap;'>".ucfirst($v->_name)."</h4>
						$noRating
						<div style='width:".$ratingWidth."px;' class='rating'></div>
						<ul class='text_left'>
							<li>$v->_cooktime min</li>
							<li> " . $v->_numIngredients . " ingrediens" . (($v->_numIngredients != 1)? "er" : "") . "</li>
							<li>$v->_serves portioner</li>
						</ul>
					</div>
				</div>
";
}
if($backwardsActive) echo "			<a href='$backwardLinkAddress' id='left-page-selector' class='scrollable-item'><span class='stretched-horizontally'>&#9664;</span></a>";
if($forwardActive) echo "			<a href='$forwardLinkAddress' id='right-page-selector' class='scrollable-item'><span class='stretched-horizontally'>&#9654;</span></a>";

?>
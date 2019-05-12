<?php
include "session.php";
$query = "SELECT * FROM ingredients";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
	$ingredient = new Ingredient($row['ingredient_id'], $row['ingredient_name'], $row['ingredient_name_plural']);
	$i[$ingredient->_id] = $ingredient;
}
if(isset($_GET['id'])){
	$recipeid = $_GET['id'];
	$query = "SELECT * FROM recipes WHERE recipe_id = $recipeid";
	if($result = $conn->query($query)){
		$row = $result->fetch_assoc();
		$r = new Recipe($row['recipe_id'], 
						$row['recipe_name'], 
						$row['recipe_cooktime'], 
						$row['recipe_ingredients'], 
						$row['recipe_rating'], 
						$row['recipe_serves'], 
						$row['recipe_imageformat'], 
						$row['recipe_description']);
	}
}

?>
<form method=post action='add.php<?php if($r)echo "?id=$recipeid";?>' id='add-recipe-form'>
	<div class='row padded-row'>
		<input type=submit class='btn btn-success'>
	</div>
	<div class='row padded-row'>
		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12'>
			Namn:
			<input id='name-text' type=textfield class='form-control' placeholder='Ange receptnamn' name='name' value='<?php if($r)echo$r->_name;?>'>
		</div>
	</div>
	<div class='row padded-row'>
		<div class='col-xs-12 col-sm-12 <?php if($r){echo 'col-md-8 col-lg-8 col col-xl-8';} else {echo 'col-md-12 col-lg-12 col col-xl-12';} ?> '>
			Bild-URL:
			<input id='image-text' type=textfield class='form-control' placeholder='Ange URL till bild <?php if($r)echo 'om du vill byta ut den befintliga';?>' name='img-url'>
		</div>
		<?php if($r)
			echo "<div class='col-xs-12 col-sm-12 col-md-4 col-lg-4 col col-xl-4'>
				<img class='thumb_image' src='img/" . $r->_id . "_thumb." . $r->_imgformat . "'>
			</div>";
		?>
	</div>
	<div class='row padded-row'>
		<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 col col-xl-6'>
			Tillagningstid:
			<input id='time-text' type=number class='form-control' placeholder='Minuter' name='time' value='<?php if($r)echo$r->_cooktime;?>'>
		</div>
		<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 col col-xl-6'>
			Portioner:
			<input id='serves-text' type=number class='form-control' placeholder='Portioner' name='serves' value='<?php if($r)echo$r->_serves;?>'>
		</div>
	</div>
	<div class='row padded-row'>
		<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col col-xl-6'>
			Ingredienser:
			<div class='ingredient-div'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12'>
				
					<ul class='list-group text-left connectable-list' id='ingredient-list-ul'>
<?php
if($r){
	foreach($r->_ingredients as $segment){
		if($segment['title'] != "default"){
			echo "<ul class='list-group sub-ul'>
								<li data-header=" . $segment['title'] . " class='list-group-item active handle-item ingredient-array-item'>	
									<strong>" . $segment['title'] . "</strong>
								</li>
								<ul class='list-group connectable-list sub-connectable-ul'>";
		}
		foreach($segment['items'] as $item){
			$amount = filter_var($item['amount'], FILTER_SANITIZE_NUMBER_INT);
			echo "<li data-index='" . $item['id'] . "' data-amount='" . $item['amount'] . "' class='list-group-item ingredient-array-item'>" . $item['amount'] . " " . mb_convert_case(($amount <= 1)?$i[$item['id']]->_name:$i[$item['id']]->_name_plural, MB_CASE_TITLE, 'UTF-8') . "</li>";
		}
		if($segment['title'] != "default"){
			echo "</ul></ul>";
		}
	}
}
?>		
					</ul>
				</div>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12'>
					<button type=button id='add-ingredient-button' class='btn btn-primary'>Lägg till ingrediens</button>
					<button type=button id='add-header-button' class='btn btn-primary'>Lägg till rubrik</button>
				</div>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12 padded-row'>
					<button class='btn btn-primary btn-remove icon-trash-white' id='droppable' type=button></button>
				</div>
			</div>
		</div>
		<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col col-xl-6'>
		Beskrivning:
		<textarea id='descr-text' class='form-control' placeholder='Ange receptbeskrivning' name='descr' ><?php if($r)echo$r->_descr;?></textarea>
		</div>
	</div>

	<div class='row padded-row'>
		<input type=hidden name='i-json' value='' id='i-json-hidden'>
		<input type=submit class='btn btn-success'>
	</div>
</form>
<?php
if(!$r) echo "<form action='curl.php' method=post>
	<div class='row padded-row'>
		<h4>Importera recept</h4>
		<input type=text name='url' class='form-control' placeholder='Ange url att importera'>
		<input type=submit class='btn btn-success'>
	</div>
</form>";
?>
	<div class="jumbotron on-top" id="ingredient-picker">
		<div class="row">
			<h3>
				Lägg till ingrediens
			</h3>
		</div>
		<div class="row padded-row">
			<div class='add-ingredient-div'>
				<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col col-xl-4'>
					<input type=text class='form-control' id='ingredient-amount' placeholder='Mängd'>
				</div>
				<div class='col-xs-8 col-sm-8 col-md-8 col-lg-8 col col-xl-8'>
					<input type=text class='form-control' id='ingredient-name' placeholder='Ingrediens'>
					<div class='list-group text_left' id='add-ingredient-list-div'>
<?php foreach($i as $k => $v) echo "<a data-index=" . $v->_id . " class='list-group-item list-group-item-action ingredient-list-entry' >" . mb_convert_case($v->_name, MB_CASE_TITLE, 'UTF-8') . "</a>"; ?>
					</div>
				</div>
				
			</div>
		</div>
		<div class='row padded-row'>
			<button type=button id='confirm-ingredient-button' class='btn btn-primary'>Lägg till</button>
			<button type=button id='close-button' class='btn btn-primary'>Avbryt</button>
		</div>
	</div>
	<div class="jumbotron on-top" id="header-creator">
		<div class="row">
			<h3>
				Lägg till rubrik
			</h3>
		</div>
		<div class="row padded-row">
			<div class='add-header-div'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12'>
					<input type=text class='form-control' id='header-name'>
				</div>
			</div>
		</div>
		<div class='row padded-row'>
			<button type=button id='confirm-header-button' class='btn btn-primary'>Lägg till</button>
			<button type=button id='close-button' class='btn btn-primary'>Avbryt</button>
		</div>
	</div>

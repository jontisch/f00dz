<?php
include "session.php";
$query = "SELECT * FROM ingredients";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
	$ingredient = new Ingredient($row['ingredient_id'], $row['ingredient_name'], $row['ingredient_unit']);
	$i[] = $ingredient;
	
}
?>
<form method=post action='addz.php' id='add-recipe-form'>
	<div class='row padded-row'>
		<input type=submit class='btn btn-success'>
	</div>
	<div class='row padded-row'>
		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12'>
			Namn:
			<input id='name-text' type=textfield class='form-control' placeholder='Ange receptnamn' name='name'>
		</div>
	</div>
	<div class='row padded-row'>
		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12'>
			Bild-URL:
			<input id='image-text' type=textfield class='form-control' placeholder='Ange URL till bild' name='img-url'>
		</div>
	</div>
	<div class='row padded-row'>
		<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 col col-xl-6'>
			Tillagningstid:
			<input id='time-text' type=number class='form-control' placeholder='Minuter' name='time'>
		</div>
		<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6 col col-xl-6'>
			Portioner:
			<input id='serves-text' type=number class='form-control' placeholder='Portioner' name='serves'>
		</div>
	</div>
	<div class='row padded-row'>
		<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col col-xl-6'>
			Ingredienser:
			<div class='ingredient-div'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12'>
				
					<ul class='list-group text-left connectable-list' id='ingredient-list-ul'>
						
							<!--ul class="list-group sub-ul">
								<li data-header="Ett" class="list-group-item active handle-item ingredient-array-item">	
									<strong>Ett</strong>
								</li>
								<ul class="list-group connectable-list sub-connectable-ul">
									<li data-index="4" data-amount="100dl" class="list-group-item ingredient-array-item">Ärter: </li>
									<li data-index="7" data-amount="23" class="list-group-item ingredient-array-item">Vetemjöl: </li>
									<li data-index="2" data-amount="3" class="list-group-item ingredient-array-item">Quornbitar: </li>
								</ul>		
							</ul>		
							<ul class="list-group sub-ul">
								<li data-header="Sås" class="list-group-item active handle-item ingredient-array-item">	
									<strong>Sås</strong>			
								</li>			
								<ul class="list-group connectable-list sub-connectable-ul">			
									<li data-index="5" data-amount="en näve" class="list-group-item ingredient-array-item">Vatten: </li>
									<li data-index="6" data-amount="oändligt" class="list-group-item ingredient-array-item">Grönsaksbuljong: </li>
								</ul>		
							</ul-->
						
						
						
						
					</ul>
		


				</div>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col col-xl-12'>
					<button type=button id='add-ingredient-button' class='btn btn-primary'>Lägg till ingrediens</button>
					<button type=button id='add-header-button' class='btn btn-primary'>Lägg till rubrik</button>
				</div>
			</div>
		</div>
		<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6 col col-xl-6'>
		Beskrivning:
		<textarea id='descr-text' class='form-control' placeholder='Ange receptbeskrivning' name='descr'></textarea>
		</div>
	</div>

	<div class='row padded-row'>
		<input type=hidden name='i-json' value='' id='i-json-hidden'>
		<input type=submit class='btn btn-success'>
	</div>
</form>
	<div class="jumbotron on-top" id="ingredient-picker">
		<div class="row">
			<h3>
				Lägg till ingrediens
			</h3>
		</div>
		<div class="row padded-row">
			<div class='add-ingredient-div'>
				<div class='col-xs-8 col-sm-8 col-md-8 col-lg-8 col col-xl-8'>
					<input type=text class='form-control' id='ingredient-name'>
					<div class='list-group text_left' id='add-ingredient-list-div'>
<?php foreach($i as $k => $v) echo "<a data-index=" . $v->_id . " class='list-group-item list-group-item-action ingredient-list-entry' >" . mb_convert_case($v->_name, MB_CASE_TITLE, 'UTF-8') . "</a>"; ?>
					</div>
				</div>
				<div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col col-xl-4'>
					<input type=text class='form-control' id='ingredient-amount'>
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



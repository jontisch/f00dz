<?php
include "session.php";
if($_POST['id'] > 0){
    if(isset($_POST['del'])){
		$query = "DELETE FROM ingredients WHERE ingredient_id = '". $_POST["id"] . "'";
	} else if(isset($_POST['n'])){
		$query = "UPDATE ingredients SET ingredient_name = '". $_POST["n"] . "', ingredient_name_plural = '". ((isset($_POST['np']) && $_POST['np'] != "")?$_POST['np']:$_POST['n']) ."'
					WHERE ingredient_id = '" . $_POST["id"] . "'";
	}
//	var_dump($query);
	$conn->query($query);
} else if(isset($_POST['n'])){
	$name = $_POST['n'];
	$name_plural = ((isset($_POST['np']) && $_POST['np'] != "")?$_POST['np']:$_POST['n']);
	$query = "INSERT INTO ingredients (ingredient_name, ingredient_name_plural) VALUES ('$name', '$name_plural')";
	$conn->query($query);
}

$query = "SELECT * FROM ingredients";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
	$ingredient = new Ingredient($row['ingredient_id'], $row['ingredient_name'], $row['ingredient_name_plural']);
	$ingredients[] = $ingredient;
}

?>
	<div class="row">
		<form action="?p=ingredients" method=post>
			<input type=hidden name=id value="">
			<div class='col-md-6 col-sm-12 col-xs-12 col-lg-6 col-xl-6'>
				Namn:<input class="form-control" id="name-field" name="n" type=text>
			</div>
			<div class='col-md-6 col-sm-12 col-xs-12 col-lg-6 col-xl-6'>
				Namn plural:<input class="form-control" id="name-plural-field" name="np" type=text>
			</div>
	</div>
	<div class="row padded-row">		
		<input type=hidden value="0" id="id-field" name="id">
		<input class="btn btn-success" id="submit-button" value="Lägg till" type=submit>
		</form>
	</div>
	<div class='row text_left'>
		<div class='col-md-8 col-sm-8 col-xs-8 col-lg-8 col-xl-8'>
			<h4>Ingrediens</h4>
		</div>
	</div>
	<div id='ingredient-list-div'>
<?php


//Looping through all the ingredients and presenting them on a row each with name, unit and buttons for editing and removal
foreach ($ingredients as $i){
	echo "<div class='row fading' id='ingredient-list-item'>
			
			<div class='col-md-8 col-sm-8 col-xs-8 col-lg-8 col-xl-8 text_left name-col'>
				<span class='sing'>" . mb_convert_case($i->_name, MB_CASE_TITLE, 'UTF-8') . "</span> / <span class='plur'>" . mb_convert_case($i->_name_plural, MB_CASE_TITLE, 'UTF-8') . "</span>
			</div>
			<div class='col-md-4 col-sm-4 col-xs-4 col-lg-4 col-xl-4 text_right'>
				<form action='index.php?p=ingredients' id='delete-form' method=post>			
					<input type=button data-id='$i->_id' class='btn btn-success btn-edit'>
					<input type=hidden name='del' value='y'>
					<input type=hidden name='id' value='$i->_id'>
					<input type=hidden name='p' value='ingredients'>
					<input type=submit value='' data-id='$i->_id' class='btn btn-danger btn-remove icon-trash-black'>
				</form>
			</div>
		</div>";
}
?>
	</div>
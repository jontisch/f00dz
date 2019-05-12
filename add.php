<?php
include 'session.php';
header('Location: ./');
include 'conn.php';
include 'classes.php';
$name = (isset($_POST['name'])?$_POST['name']:"");
$serves = (isset($_POST['serves'])?$_POST['serves']:"");
$time = (isset($_POST['time'])?$_POST['time']:"");
$descr = (isset($_POST['descr'])?$_POST['descr']:"");
$ingredients = (isset($_POST['i-json'])?$_POST['i-json']:"");
$url = (isset($_POST['img-url'])?$_POST['img-url']:"");
$ownerid = $_SESSION['login_user_id'];

if(isset($_GET['id'])){
	$query = "UPDATE recipes SET 
	recipe_name='$name', 
	recipe_serves='$serves', 
	recipe_cooktime='$time', 
	recipe_description='$descr', 
	recipe_ingredients='$ingredients' WHERE recipe_id='". $_GET['id'] . "'";
	$conn->query($query);
	if($url != ""){
		shell_exec("imgresize.sh $url img/" . $_GET['id']);
	}
	
} else {
	if(isset($_POST['import'])){
		$query = "SELECT * FROM ingredients";
		$result = $conn->query($query);
		while($row = $result->fetch_assoc()){
			$ingredient = new Ingredient($row['ingredient_id'], $row['ingredient_name'], $row['ingredient_name_plural']);
			$i[$ingredient->_id] = $ingredient;
		}
		$importedIngredients = json_decode($ingredients, true);
		foreach($importedIngredients['default'] as $k => $v){
			$highestsim = 0;
			$highestid = -1;
			foreach($i as $ik => $iv){
				$sim = similar_text(mb_convert_case($k, MB_CASE_TITLE, 'UTF-8'), mb_convert_case($iv->_name, MB_CASE_TITLE, 'UTF-8'));
				if($sim > $highestsim){
					$highestsim = $sim;
					$highestid = $ik;
				}
				$sim = similar_text(mb_convert_case($k, MB_CASE_TITLE, 'UTF-8'), mb_convert_case($iv->_name_plural, MB_CASE_TITLE, 'UTF-8'));
				if($sim > $highestsim){
					$highestsim = $sim;
					$highestid = $ik;
				}
			
			}
			$importedIngredients['default'][$highestid] = $importedIngredients['default'][$k];
			unset($importedIngredients['default'][$k]);
		}
		$ingredients = json_encode($importedIngredients);
	
	}
	$query = "INSERT INTO recipes
	(recipe_name, recipe_serves, recipe_cooktime, recipe_description, recipe_ingredients, recipe_owner_id)
	VALUES
	('$name', '$serves', '$time', '$descr', '$ingredients', '$ownerid')";
	var_dump($query);
	$conn->query($query);
	$query = "SELECT recipe_id FROM recipes ORDER BY recipe_createtime DESC LIMIT 1";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	shell_exec("imgresize.sh $url img/" . $row['recipe_id']);
}
?>
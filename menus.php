<?php
	include 'session.php';
	$userid = $_SESSION['login_user_id'];
	$query = "SELECT * FROM menus WHERE menu_owner_id = $userid ORDER BY menu_id DESC";
	$result = $conn->query($query);
	while($row = $result->fetch_assoc()){
		$menu = new Menu(
			$row['menu_id'], 
			$row['menu_name'], 
			$row['menu_createtime'], 
			$row['menu_duration'], 
			$row['menu_start_date'], 
			$row['menu_recipes'], 
			$row['menu_owner_id'], 
			$row['menu_comments']);
		$menus[] = $menu;
	}


?>
<h3>Menyer</h3>
<?php
	foreach ($menus as $mk => $mv) {
		echo "<div class='jumbotron'><div class='minimizable-header'><h4>". $mv->_name . "</h4></div>
		<div class='minimizable-body'>
		<ul class='list-group'>";
		$today = new DateTime();
		$today->setTime(0,0,0);
		$day = new DateTime($mv->_start_date);
		$day->setTime(0,0,0);
		$diff = $today->diff( $day )->days;
		for($i=0; $i < $mv->_duration; $i++){
			$recipe_id = $mv->_recipes[$i]['id'];
			$query = "SELECT * FROM recipes WHERE recipe_id = $recipe_id";
			$result = $conn->query($query);
			while($row = $result->fetch_assoc()){
				$recipe = new Recipe($row['recipe_id'], $row['recipe_name'], $row['recipe_cooktime'], $row['recipe_ingredients'], $row['recipe_rating'], $row['recipe_serves'],$row['recipe_imageformat'], $row['recipe_description']);
			}
			echo "
			<div class='row text_left list-group-item" . ($diff?"":" active") . "'>
				<div class='col-xs-2'>
					" . mb_convert_case($DAYNAMES[$day->format('N')%7], MB_CASE_TITLE, 'UTF-8') . " middag
				</div>
				<div class='col-xs-8'>
					" . $recipe->_name . "
				</div>
				<div class='col-xs-1'>
				</div>
				<div class='col-xs-1'>
					<a href='index.php?p=recipe&id=" . $recipe->_id . "'><img class='icon' src='img/icons/arrow_right" . ($diff?"-black":"-white") . ".png'></a>
				</div>
			</div>";
			$day->modify('+1 day');
			$diff = $today->diff( $day )->days;
			echo "
			<div class='row text_left list-group-item" . ($diff?"":" active") . "'>
				<div class='col-xs-2'>
					" . mb_convert_case($DAYNAMES[$day->format('N')%7], MB_CASE_TITLE, 'UTF-8') . " lunch
				</div>
				<div class='col-xs-8'>
					" . $recipe->_name . "
				</div>
				<div class='col-xs-1'>
				</div>
				<div class='col-xs-1'>
					<a href='index.php?p=recipe&id=" . $recipe->_id . "'><img class='icon' src='img/icons/arrow_right" . ($diff?"-black":"-white") . ".png'></a>
				</div>
			</div>";
		}
		echo "</ul></div></div>";
	}
?>
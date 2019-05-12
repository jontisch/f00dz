<?php
$RESULTSPERPAGE = 10;
$DAYNAMES = ['sön', 'mån', 'tis', 'ons', 'tor', 'fre', 'lör'];
class Recipe {
	public function __construct($id, $name, $cooktime, $ingredients, $rating, $serves, $imgformat, $descr){
		$this->_id = $id;
		$this->_name = $name;
		$this->_cooktime = $cooktime;
		$this->_ingredients = json_decode($ingredients, true);
		$this->_rating = $rating;
		$this->_serves = $serves;
		$this->_imgformat = $imgformat;
		$this->_descr = $descr;
		$this->_numIngredientHeaders = sizeof($this->_ingredients);
		$this->_numIngredients = 0;
		foreach($this->_ingredients as $iobj){
			$this->_numIngredients += sizeof($iobj['items']);
		}
	}
}

class Ingredient {
	public function __construct($id, $name_singular, $name_plural){
			$this->_id = $id;
			$this->_name = $name_singular;
			$this->_name_plural = $name_plural;
	}
}

class Menu {
	public function __construct($id, $name, $createtime, $duration, $start_date, $recipes, $owner_id, $comments) {
		$this->_id = $id;
		$this->_name = $name;
		$this->_createtime = $createtime;
		$this->_duration = $duration;
		$this->_start_date = $start_date;
		$this->_recipes = json_decode($recipes, true);
		$this->_owner_id = $owner_id;
		$this->_comments = $comments;
	}
}

?>

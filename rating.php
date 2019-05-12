<?php
include 'session.php';
header('Location: ./');
include "conn.php";
if($_POST['rating'] < 6 && $_POST['rating'] > -1 && isset($_POST['id'])){
	$query = "UPDATE recipes SET recipe_rating = '".$_POST['rating']."' WHERE recipe_id = '".$_POST['id']."'";
	$conn->query($query);
}

?>
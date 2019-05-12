<?php
include 'session.php';
var_dump($_POST);
echo "
	<div class='row'>
		<h4>Ny matlista</h4>
	</div>
	<form action='./?p=newmenu' method=post id='new-menu-form'>
		<div class='row'>
			<div class='col-xs-12'>
				<label>Namn:</label>
				<input type=text id='name-input' class='form-control' name='name'>
			</div>
		</div>
		<div class='row'>
			<div class='col-xs-6'>
				<label>Startdatum:</label>
				<input type=date id='start-date-input' class='form-control' name='start'>
			</div>
			<div class='col-xs-6'>
				<label>Antal dagar:</label>
				<input type=number id='duration-input' value='7' class='form-control' name='dur'>
			</div>
		</div>
		<input type=submit>
	</form>"
	;
?>
<?php
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		foreach ($name as $key) {
			echo($key.'<br>');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>create text inputs based on user input</title>
	<title>Date record keeper</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style type="text/css">
		.container-input{
			padding: 0% 37%;
		}
		.append_child{
			padding: 0% 30%;
		}
	</style>
</head>
<header>
	<h2 align="center">Create an input text based on user entary</h2>
	<h3 align="center">read the value from the input text</h3>
</header>
<body>
	<div class="container">
		<div class="container-input"><div class="input-group"><input type="text" name="number_children" onkeyup="get_correct_number(this)" id="number_children" maxlength="2" minlength="1" placeholder="Enter the number of children you have" class="form-control"><span class="input-group-addon"><button class="btn btn-info btn-xs" id="create_children">Create fields</button>
		</span></div></div>	
	</div>
	<div class="container container_children" style="display: none;">
		<form method="post">
			<div class="append_child">
				
			</div>
			<h2 align="center"><button class="btn btn-success button_add" name="submit"></button></h2>
		</form>
	</div>
</body>
</html>
<script type="text/javascript">
	function get_correct_number(input){
		var accepted = /[^0-9]/gi;
        input.value = input.value.replace(accepted, '');
	}
	function get_correct_name(input){
		var accepted = /[^A-Z .-]/gi;
        input.value = input.value.replace(accepted, '');
	}
	$(document).ready(function(){
		$(document).on('keyup','#number_children', function(){
			$('.append_child').html('');
		});
		$(document).on('click','#create_children', function(){
			var number = $('#number_children').val();
			if (number != '') {
				if (number == 0) {}
				else{
					if (number > 1) {
						$('.button_add').html('Add children');
					}
					else{
						$('.button_add').html('Add child');
					}
					$('.container_children').show();
					for (var i = 0; i < number; i++) {
						$('.append_child').append('<div class="form-group"><label>child '+(i+1)+'</label><input type="text" name="name[]" id="name" onkeyup="get_correct_name(this)" class = "form-control"></div>');
					}
				}
			}
		});
	});
</script>
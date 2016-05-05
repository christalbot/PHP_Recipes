<?php
require_once("includes/includes.php");

/*
if(isset($_POST['recipe'])){
	echo "<pre>";
	print_r($_POST['recipe']);
	$json = json_encode(htmlentities($_POST['recipe']));
	print_r($json);
	echo "</pre>";
}
#*/

#/*
if(isset($_POST['recipe'])){
	
	$json = json_encode($_POST['recipe']);
	
	//Insert into recipes table
	if($stmt = mysqli_prepare($con, "INSERT INTO recipes (Title, Recipe) VALUES (?, ?)")){
		$title = htmlentities($_POST['recipe']['title']);
		if(mysqli_stmt_bind_param($stmt, "ss", $title, $json)){
			if(mysqli_stmt_execute($stmt)){
				if($recipeID = mysqli_stmt_insert_id($stmt)){
					header("location: index.php");
				} else echo "Error 1 ";
			} else echo "Error 2 ";
		} else echo "Error 3 ";
	} else echo "Error 4 ";
}
//*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("includes/headeritems.php"); ?>
<title>Add New Recipe</title>
</head>
<body>
<?php require_once("includes/menu.php") ?>
<form class="form" role="form" method="post" enctype="application/x-www-form-urlencoded" >
<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1>Add recipe</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1 col-md-3">
			</div>
			<div class="col-sm-10 col-md-6 form-group">
			 <div class="text-center">
                <div class="form-group">
                    <label for="recipe_title">Title</label>
                    <input class="form-control" type="text" id="recipe_title" name="recipe[title]" size="100%">
                </div>
			 </div>
			</div>
			<div class="col-sm-1 col-md-3">
			</div>
		</div>
		
		<fieldset><legend>Ingredients</legend>
			
			<!-- Initial Ingredient Group -->
			<div class="add-recipe-main-container" id="ing_group_0">
			
				<!-- Group Name - Hidden -->
				<div class="row" id="ing_g0_head_0">
                    <div class="col-xs-3 col-md-2">
                        <span class=""><input type="text" class="txtSmallItalicBold" id="ing_groupname_0" name="recipe[ingredients][0][title]" placeholder="Group Name"></span>
                    </div>
                    <br><br>
				</div>
				
				<!-- Initial Row -->
				<div class="row" id="ing_g0_line_0">
                    <div class="col-xs-3 col-md-2">
                        <span class=""><input type="text" class="form-control" id="ing_g0_0_quantity" name="recipe[ingredients][0][0][quantity]" placeholder="Quantity"></span>
                    </div>
                    <div class="col-xs-3 col-md-2">
                        <span class=""><input type="text" class="form-control" id="ing_g0_0_unit" name="recipe[ingredients][0][0][unit]" placeholder="Unit"></span>
                    </div>
                    <div class="col-xs-6 col-md-8">
                        <span class=""><input type="text" class="form-control" id="ing_g0_0_ingredient" name="recipe[ingredients][0][0][ingredient]" placeholder="Ingredient"></span>
                    </div>
				</div>
			
				<!-- Buttons (Ingredients) -->
				<div class="row">
					<div class="col-xs-12">
						<button type="button" class="btn btn-default btn-sm btn-addIngButton" id="add_btn_group_0" title="Add Ingredient"><span class="glyphicon glyphicon-plus"></span></button>
						<button type="button" class="btn btn-default btn-sm btn-minusIngButton" id="minus_btn_group_0" title="Remove Ingredient"><span class="glyphicon glyphicon-minus"></span></button>
					</div>
				</div>
				
			</div>

			<br>
			
			<!-- Buttons (Ingredient Groups) -->
			<div class="row">
				<div class="col-xs-12">
					<button type="button" class="btn btn-default btn-sm" id="btn_add_ingredient_group" title="Add Ingredient Group"><span class="glyphicon glyphicon-plus"></span></button>
					<button type="button" class="btn btn-default btn-sm" id="btn_minus_ingredient_group" title="Remove Ingredient Group"><span class="glyphicon glyphicon-minus"></span></button>
				</div>
			</div>
		
		</fieldset>
		
		<br>
		
		<div class="row">
			<div class="col-xs-12">
				<fieldset>
					<legend>Directions</legend>
					
					<!-- Initial Directions Group -->
					<div class="add-recipe-main-container" id="dir_group_0">
					
						<!-- Group Name - Hidden -->
						<div class="row" id="dir_g0_head_0">
								<div class="col-xs-12">
											<span class=""><input type="text" class="txtSmallItalicBold" id="dir_groupname_0" name="recipe[directions][0][title]" placeholder="Group Name"></span>
								</div>
								<br><br>
						</div>
					
						<!-- Initial Row -->
						<div class="row" id="dir_g0_line_0">
							<div class="col-xs-12">
										<span class=""><input size="100%" type="text" class="form-control" id="dir_g0_0_direction" name="recipe[directions][0][0]" placeholder="Direction"></span>
							</div>
						</div>
					
						<!-- Buttons (Directions) -->
						<div class="row">
							<div class="col-xs-12">
								<button type="button" class="btn btn-default btn-sm btn-addDirButton" id="add_btn_groupx_0" title="Add Direction"><span class="glyphicon glyphicon-plus"></span></button>
								<button type="button" class="btn btn-default btn-sm btn-minusDirButton" id="minus_btn_groupx_0" title="Remove Direction"><span class="glyphicon glyphicon-minus"></span></button>
							</div>
						</div>
						
					</div>
		
					<br>
					
					<!-- Buttons (Direction Groups) -->
					<div class="row">
						<div class="col-xs-12">
							<button type="button" class="btn btn-default btn-sm" id="btn_add_direction_group" title="Add Direction Group"><span class="glyphicon glyphicon-plus"></span></button>
							<button type="button" class="btn btn-default btn-sm" id="btn_minus_direction_group" title="Remove Direction Group"><span class="glyphicon glyphicon-minus"></span></button>
						</div>
					</div>
			
				</fieldset>
			</div>
		</div>
		
		<br>
		
		<div class="row">
			<div class="col-xs-12">
				<button type="submit" class="btn btn-default pull-left">Add Recipe</button>
			</div>
		</div>
		
</div>
</form>
<p>&nbsp;</p>
<?php require_once("includes/footeritems.php"); ?>

<script>
	$(document).ready(function(e) {
		var addIngredientArray = [0];
		var addDirectionArray = [0];
		var addIngGroupIndex = 0;
		var addDirGroupIndex = 0;
		
		$(document).on('click', '.btn-addIngButton', function(e) {
			var id = e.target.id;
			var num = parseInt( id.slice( id.lastIndexOf("_")+1, id.length ) );
			$('#ing_g' + num + '_line_' + addIngredientArray[num]).after(
					'<div class="row" id="ing_g' + num + '_line_' + (++addIngredientArray[num]) + '">' + 
						'<div class="col-xs-3 col-md-2">' +
							'<span><input type="text" size="5" class="form-control" id="ing_g' + num + '_' + addIngredientArray[num] + '_quantity" name="recipe[ingredients][' + num + '][' + addIngredientArray[num] + '][quantity]" placeholder="Quantity"></span>' +
						'</div>' +
						'<div class="col-xs-3 col-md-2">' +
							'<span><input type="text" size="5" class="form-control" id="ing_g' + num + '_' + addIngredientArray[num] + '_unit" name="recipe[ingredients][' + num + '][' + addIngredientArray[num] + '][unit]" placeholder="Unit"></span>' +
						'</div>' +
						'<div class="col-xs-6 col-md-8">' +
							'<span><input type="text" size="100%" class="form-control" id="ing_g' + num + '_' + addIngredientArray[num] + '_ingredient" name="recipe[ingredients][' + num + '][' + addIngredientArray[num] + '][ingredient]" placeholder="Ingredient"></span>' +
						'</div>' +
					'</div>'
			);
		});
		
		$(document).on('click', '.btn-addDirButton', function(e) {
			var id = e.target.id;
			var num = parseInt( id.slice( id.lastIndexOf("_")+1, id.length ) );
			console.log(addDirectionArray[num]);
			addDirectionArray[num]++;
			console.log(addDirectionArray[num]);
			$('#dir_g' + num + '_line_' + (addDirectionArray[num] - 1)).after(
				'<div class="row" id="dir_g' + num + '_line_' + addDirectionArray[num] + '">' +
					'<div class="col-xs-12">' +
						'<span class=""><input size="100%" type="text" class="form-control" id="dir_g' + num + '_' + addDirectionArray[num] + '_direction" name="recipe[directions][' + num + '][' + addDirectionArray[num] + ']" placeholder="Direction"></span>' +
					'</div>' +
				'</div>'
				);
		});
		
		$('#btn_add_ingredient_group').click(function(e) {
			if(addIngGroupIndex < addIngredientArray.length) addIngredientArray.push(0);
			$('#ing_group_' + addIngGroupIndex++).after(
					'<div class="add-recipe-main-container" id="ing_group_' + addIngGroupIndex + '">' +
						'<div class="row" id="ing_g' + addIngGroupIndex + '_head_0">' +
							'<div class="col-xs-3 col-md-2">' +
								'<span class=""><input type="text" class="txtSmallItalicBold" id="ing_groupname_' + addIngGroupIndex + '" name="recipe[ingredients][' + addIngGroupIndex + '][title]" placeholder="Group Name"></span>' +
							'</div><br><br>' +
						'</div>' +
						'<div class="row" id="ing_g' + addIngGroupIndex + '_line_0">' +
							'<div class="col-xs-3 col-md-2">' +
										'<span class=""><input size="5" type="text" class="form-control" id="ing_g' + addIngGroupIndex + '_0_quantity" name="recipe[ingredients][' + addIngGroupIndex + '][0][quantity]" placeholder="Quantity"></span>' +
							'</div>' +
							'<div class="col-xs-3 col-md-2">' +
										'<span class=""><input size="5" type="text" class="form-control" id="ing_g' + addIngGroupIndex + '_0_unit" name="recipe[ingredients][' + addIngGroupIndex + '][0][unit]" placeholder="Unit"></span>' +
							'</div>' +
							'<div class="col-xs-6 col-md-8">' +
										'<span class=""><input size="100%" type="text" class="form-control" id="ing_g' + addIngGroupIndex + '_0_ingredient" name="recipe[ingredients][' + addIngGroupIndex + '][0][ingredient]" placeholder="Ingredient"></span>' +
							'</div>' +
						'</div>' +
						'<div class="row">' +
							'<div class="col-xs-12">' +
								'<button type="button" class="btn btn-default btn-sm btn-addIngButton" id="add_btn_group_' + addIngGroupIndex + '" title="Add Ingredient"><span class="glyphicon glyphicon-plus"></span></button>' +
								'<button type="button" class="btn btn-default btn-sm btn-minusIngButton" id="add_btn_group_' + addIngGroupIndex + '" title="Remove Ingredient"><span class="glyphicon glyphicon-minus"></span></button>' +
							'</div>' +
						'</div>' +
					'</div>'
			);
			if(addIngGroupIndex > 0) $('#ing_g0_head_0').show();
		});
		
		$('#btn_add_direction_group').click(function(e) {
			if(addDirGroupIndex < addDirectionArray.length) addDirectionArray.push(0);
			$('#dir_group_' + addDirGroupIndex++).after(
				'<div class="add-recipe-main-container" id="dir_group_' + addDirGroupIndex + '">' +
					'<div class="row" id="dir_g' + addDirGroupIndex + '_head_0">' +
						'<div class="col-xs-12">' +
							'<span class=""><input type="text" class="txtSmallItalicBold" id="dir_groupname_' + addDirGroupIndex + '" name="recipe[directions][' + addDirGroupIndex + '][title]" placeholder="Group Name"></span>' +
						'</div>' +
						'<br><br>' +
					'</div>' +
					'<div class="row" id="dir_g' + addDirGroupIndex + '_line_0">' +
						'<div class="col-xs-12">' +
								'<span class=""><input size="100%" type="text" class="form-control" id="dir_g' + addDirGroupIndex + '_0_direction" name="recipe[directions][' + addDirGroupIndex + '][0]" placeholder="Direction"></span>' +
						'</div>' +
					'</div>' +
					'<div class="row">' +
						'<div class="col-xs-12">' +
							'<button type="button" class="btn btn-default btn-sm btn-addDirButton" id="add_btn_groupx_' + addDirGroupIndex + '" title="Add Direction"><span class="glyphicon glyphicon-plus"></span></button>' +
							'<button type="button" class="btn btn-default btn-sm btn-minusDirButton" id="minus_btn_groupx_' + addDirGroupIndex + '" title="Remove Direction"><span class="glyphicon glyphicon-minus"></span></button>' +
						'</div>' +
					'</div>' +
				'</div>'
				);
				if(addDirGroupIndex > 0) $('#dir_g0_head_0').show();
		});
		
		$(document).on('click', '.btn-minusIngButton', function(e) {
			var id = e.target.id;
			var num = parseInt( id.slice( id.lastIndexOf("_")+1, id.length ) );
			if(addIngredientArray[num] > 0){
				$('#ing_g' + num + '_line_' + addIngredientArray[num]).remove();
				addIngredientArray[num]--;
			}
		});
		
		$(document).on('click', '.btn-minusDirButton', function(e) {
			var id = e.target.id;
			var num = parseInt( id.slice( id.lastIndexOf("_")+1, id.length ) );
			if(addDirectionArray[num] > 0){
				$('#dir_g' + num + '_line_' + addDirectionArray[num]).remove();
				addDirectionArray[num]--;
			}
		});
		
		$('#btn_minus_ingredient_group').click(function(e) {
			if(addIngGroupIndex > 0){
				$('#ing_group_' + addIngGroupIndex).remove();
				if(addIngGroupIndex < addIngredientArray.length) addIngredientArray.pop();
				addIngGroupIndex--;
			}
			if(addIngGroupIndex == 0) $('#ing_g0_head_0').hide();
		});
		
		$('#btn_minus_direction_group').click(function(e) {
			if(addDirGroupIndex > 0){
				$('#dir_group_' + addDirGroupIndex).remove();
				if(addDirGroupIndex < addDirectionArray.length) addDirectionArray.pop();
				addDirGroupIndex--;
			}
			if(addDirGroupIndex == 0) $('#dir_g0_head_0').hide();
		});
	});
</script>
</body>
</html>
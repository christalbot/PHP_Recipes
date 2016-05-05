<?php
require_once("includes/includes.php");

if(isset($_GET['r'])){
	$id = intval($_GET['r']);
	$recipe = mysqli_fetch_assoc(mysqli_query($con, "SELECT recipe from recipes WHERE RecipeID=$id"));
} else {
	die("Error. Invalid url!");
}

$recipe = json_decode($recipe['recipe'], true);
if(!$recipe) die("JSON Error");

$num_of_ingredient_groups = count($recipe['ingredients']);
$num_of_direction_groups = count($recipe['directions']);

/*
if(isset($_POST['recipe'])){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
//	print_r();
}
#*/

#/*
if(isset($_POST['recipe'])){
	//Insert into recipes table
	if($stmt = mysqli_prepare($con, "UPDATE recipes SET Title=?, Recipe=? WHERE RecipeID=$id")){
		$title = htmlentities($_POST['recipe']['title']);
		$json = json_encode($_POST['recipe']);
		if(mysqli_stmt_bind_param($stmt, "ss", $title, $json)){
			if(mysqli_stmt_execute($stmt)){
				header("location: recipe.php?r=$id");
			} else echo "Error 1 ". mysqli_error($con);
		} else echo "Error 2 ";
	} else echo "Error 3 ";
}
//*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("includes/headeritems.php"); ?>
<title>Edit: <?php echo htmlentities($recipe['title']) ?></title>
</head>
<body>
<?php require_once("includes/menu.php") ?>
<form class="form" role="form" method="post" enctype="application/x-www-form-urlencoded" >
<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1>Edit recipe</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1 col-md-3">
			</div>
			<div class="col-sm-10 col-md-6 form-group">
			 <div class="text-center">
					<div class="form-group">
						<label for="recipe_title">Title</label>
						<input class="form-control" type="text" id="recipe_title" name="recipe[title]" size="100%" value="<?php echo htmlentities($recipe['title']); ?>">
					</div>
				</div>
			</div>
			<div class="col-sm-1 col-md-3">
			</div>
		</div>
		
		<fieldset><legend>Ingredients</legend>

			<?php
			for($ii = 0; $ii < $num_of_ingredient_groups; $ii++){
            ?>
                
                    <!-- Initial Ingredient Group -->
                    <div class="add-recipe-main-container" id="ing_group_<?php echo $ii; ?>">
                    
                    	<?php
                        #if(count($num_of_ingredient_groups) > 1){
						?>
                            <!-- Group Name - Hidden -->
                            <div class="row" id="ing_g<?php echo $ii; ?>_head_0">
                                <div class="col-xs-3 col-md-2">
                                    <span class="">
                                        <input type="text" class="txtSmallItalicBold" id="ing_groupname_<?php echo $ii; ?>" name="recipe[ingredients][<?php echo $ii; ?>][title]" placeholder="Group Name" value="<?php if(!empty($recipe['ingredients'][$ii]['title'])) { echo htmlentities($recipe['ingredients'][$ii]['title']); } ?>">
                                    </span>
                                </div>
                                <br><br>
                            </div>
                        <?php
						#}
						?>
                        
                        <?php
                        for($jj = 0; $jj < (count($recipe['ingredients'][$ii])-1); $jj++){ //-1 ignores 'title' field
                        ?>
                            <!-- Ingredient group dynamic Rows -->
                            <div class="row" id="ing_g<?php echo $ii; ?>_line_<?php echo $jj; ?>">
                                <div class="col-xs-3 col-md-2">
                                    <span class=""><input type="text" class="form-control" id="ing_g<?php echo $ii; ?>_<?php echo $jj; ?>_quantity" name="recipe[ingredients][<?php echo $ii; ?>][<?php echo $jj; ?>][quantity]" placeholder="Quantity" value="<?php echo htmlentities($recipe['ingredients'][$ii][$jj]['quantity']); ?>"></span>
                                </div>
                                <div class="col-xs-3 col-md-2">
                                    <span class=""><input type="text" class="form-control" id="ing_g<?php echo $ii; ?>_<?php echo $jj; ?>_unit" name="recipe[ingredients][<?php echo $ii; ?>][<?php echo $jj; ?>][unit]" placeholder="Unit" value="<?php echo htmlentities($recipe['ingredients'][$ii][$jj]['unit']); ?>"></span>
                                </div>
                                <div class="col-xs-6 col-md-8">
                                    <span class=""><input type="text" class="form-control" id="ing_g<?php echo $ii; ?>_<?php echo $jj; ?>_ingredient" name="recipe[ingredients][<?php echo $ii; ?>][<?php echo $jj; ?>][ingredient]" placeholder="Ingredient" value="<?php echo htmlentities($recipe['ingredients'][$ii][$jj]['ingredient']); ?>"></span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    
                        <!-- Buttons (Ingredients) -->
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="button" class="btn btn-default btn-sm btn-addIngButton" id="add_btn_group_<?php echo $ii; ?>" title="Add Ingredient"><span class="glyphicon glyphicon-plus"></span></button>
                                <button type="button" class="btn btn-default btn-sm btn-minusIngButton" id="minus_btn_group_<?php echo $ii; ?>" title="Remove Ingredient"><span class="glyphicon glyphicon-minus"></span></button>
                            </div>
                        </div>
                    </div>

                
            <?php
			}
            ?>
                

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
                    
                    <?php
					for($ii = 0; $ii < $num_of_direction_groups; $ii++){
					?>
					
						<!-- Initial Direction Group -->
                        <div class="add-recipe-main-container" id="dir_group_<?php echo $ii; ?>">
                        
                        	<?php
							#if(count($num_of_direction_groups) > 1){
							?>
                                <!-- Group Name - Hidden -->
                                <div class="row" id="dir_g<?php echo $ii; ?>_head_0">
                                    <div class="col-xs-3 col-md-2">
                                        <span class=""><input type="text" class="txtSmallItalicBold" id="dir_groupname_<?php echo $ii; ?>" name="recipe[directions][<?php echo $ii; ?>][title]" placeholder="Group Name" value="<?php echo htmlentities($recipe['directions'][$ii]['title']); ?>"></span>
                                    </div>
                                    <br><br>
                                </div>
                            <?php
							#}
							?>
                            
                            <?php
                            for($jj = 0; $jj < (count($recipe['directions'][$ii])-1); $jj++){ //-1 ignores 'title' from list
                            ?>
                                <!-- Direction group dynamic Rows -->
                                <div class="row" id="dir_g<?php echo $ii; ?>_line_<?php echo $jj; ?>">
                                    <div class="col-xs-12">
                                        <span class=""><input type="text" class="form-control" id="dir_g<?php echo $ii; ?>_<?php echo $jj; ?>_quantity" name="recipe[directions][<?php echo $ii; ?>][<?php echo $jj; ?>]" placeholder="Quantity" value="<?php echo htmlentities($recipe['directions'][$ii][$jj]); ?>"></span>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        
                            <!-- Buttons (Directions) -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="button" class="btn btn-default btn-sm btn-addDirButton" id="add_btn_groupx_<?php echo $ii; ?>" title="Add Direction"><span class="glyphicon glyphicon-plus"></span></button>
                                    <button type="button" class="btn btn-default btn-sm btn-minusDirButton" id="minus_btn_groupx_<?php echo $ii; ?>" title="Remove Direction"><span class="glyphicon glyphicon-minus"></span></button>
                                </div>
                            </div>
                        </div>
                        
                    <?php
					}
					?>
                    
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
				<button type="submit" class="btn btn-default pull-left">Save</button>
			</div>
		</div>
		
</div>
</form>
<p>&nbsp;</p>
<?php require_once("includes/footeritems.php"); ?>

<script>
	$(document).ready(function(e) {
		var addIngredientArray = [0];
		<?php
		if($num_of_ingredient_groups > 0){
			for($ii = 0; $ii < $num_of_ingredient_groups; $ii++){
				echo "addIngredientArray[$ii] = " . (count($recipe['ingredients'][$ii])-2) . ";\n"; //-2 ignores 'title' from list and starts index at 0
			}
		}
		?>
		var addDirectionArray = [0];
		<?php
		if($num_of_direction_groups > 0){
			for($ii = 0; $ii < $num_of_direction_groups; $ii++){
				echo "addDirectionArray[$ii] = " . (count($recipe['directions'][$ii])-2) . ";\n"; //-2 ignores 'title' from list and starts index at 0
			}
		}
		?>
		var addIngGroupIndex = <?php echo ($num_of_ingredient_groups - 1); ?>; //-1 starts index from 0
		var addDirGroupIndex = <?php echo ($num_of_direction_groups - 1); ?>; //-1 starts index from 0
		console.log(addIngredientArray);

		<?php if($num_of_ingredient_groups > 1) { echo "$('#ing_g0_head_0').show();"; } ?>
		<?php if($num_of_direction_groups > 1) { echo "$('#dir_g0_head_0').show();"; } ?>
		
		$(document).on('click', '.btn-addIngButton', function(e) {
			var id = e.target.id;
			var num = parseInt( id.slice( id.lastIndexOf("_")+1, id.length ) );
			console.log("id = " + id);
			console.log("num = " + num);
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
			console.log("id = " + id);
			console.log("num = " + num);
			console.log("addIngredientArray = " + addIngredientArray);
		});
		
		$(document).on('click', '.btn-addDirButton', function(e) {
			var id = e.target.id;
			var num = parseInt( id.slice( id.lastIndexOf("_")+1, id.length ) );
			console.log(addDirectionArray);
			addDirectionArray[num]++;
			$('#dir_g' + num + '_line_' + (addDirectionArray[num] - 1)).after(
				'<div class="row" id="dir_g' + num + '_line_' + addDirectionArray[num] + '">' +
					'<div class="col-xs-12">' +
						'<span class=""><input size="100%" type="text" class="form-control" id="dir_g' + num + '_' + addDirectionArray[num] + '_direction" name="recipe[directions][' + num + '][' + addDirectionArray[num] + ']" placeholder="Direction"></span>' +
					'</div>' +
				'</div>'
				);
		});
		
		$('#btn_add_ingredient_group').click(function(e) {
			console.log('#ing_group_' + addIngGroupIndex);
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
			console.log(addDirGroupIndex);
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
				console.log(addDirGroupIndex);
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
<?php
//Debug info
/*
echo "<pre>";
echo "num_of_ingredient_groups = $num_of_ingredient_groups";
echo "</pre>";
#*/
?>
</body>
</html>
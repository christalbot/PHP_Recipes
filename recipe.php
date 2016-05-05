<?php
require_once("includes/includes.php");

if(isset($_GET['r'])){
	$id = intval($_GET['r']);
	$result = mysqli_fetch_all(mysqli_query($con, "SELECT recipe from recipes WHERE RecipeID=$id"));
	$recipe = json_decode($result[0][0], true);
} else {
	die("Error. Invalid url!");
}

/*
echo "<pre>";
print_r($recipe);
echo "</pre>";
#*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once("includes/headeritems.php"); ?>
<title>Recipe: <?php echo $recipe['title'] ?></title>
</head>
<body>
<?php require_once("includes/menu.php") ?>
<div class="container">
	<div class="panel panel-<?php echo $theme ?>">
		<div class="panel-heading">
			<div class="h4"><?php echo ucwords(htmlentities($recipe['title'])) ?> <a href="edit.php?r=<?php echo $id ?>" title="Edit"><span class="glyphicon glyphicon-edit pull-right"></span></a></div>
		</div>
		<div class="panel panel-body">
			<fieldset>
			<legend>Ingredients</legend>
			
				<?php
				for($ii = 0; $ii < count($recipe['ingredients']); $ii++){
					if(!empty($recipe['ingredients'][$ii]['title'])){ 
						?>
						<div class="txtSmallItalicBold"><?php echo ucwords(htmlentities($recipe['ingredients'][$ii]['title'])) ?></div>
						<?php
					}

					for($jj = 0; $jj < count($recipe['ingredients'][$ii])-1; $jj++){
						?>
							<div class="row ingredientRow">
								<span class="col-xs-2 col-md-2 ingredientRowItem"><?php echo "<strong>" . htmlentities($recipe['ingredients'][$ii][$jj]['quantity']) . "</strong> <i class=\"unit\">" . htmlentities($recipe['ingredients'][$ii][$jj]['unit']) . "</i>" ?></span>
								<span class="col-xs-10 col-md-10 ingredientRowItem"><?php echo htmlentities($recipe['ingredients'][$ii][$jj]['ingredient']) ?></span>
							</div>
						<?php
					}
				}
				?>
				
			</fieldset>
			<div class="row">
				&nbsp;
		</div>
			<fieldset>
			<legend>Directions</legend>

				<?php
				for($ii = 0; $ii < count($recipe['directions']); $ii++){
					if(!empty($recipe['directions'][$ii]['title'])){ 
					?>
						<div class="txtSmallItalicBold"><?php echo ucwords(htmlentities($recipe['directions'][$ii]['title'])) ?></div>
					<?php
					}
					if($directions_numbered) echo "<ol>";
					else echo "<ol class=\"list-group\">";
					for($jj = 0; $jj < count($recipe['directions'][$ii])-1; $jj++){
						?>
							<li class="<?php if(!$directions_numbered) echo "list-group-item"; ?>"><?php echo htmlentities($recipe['directions'][$ii][$jj]) ?></li>
						<?php
					}
					echo "</ol>";
				}
				?>
				
				
			</fieldset>
		</div>
	</div>
</div>
<?php require_once("includes/footeritems.php"); ?>
</body>
</html>
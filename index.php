<?php
require_once("includes/includes.php");

if(isset($_GET['letter'])){
	switch($_GET['letter']){
		case 'a': $letter = 'a'; break;
		case 'b': $letter = 'b'; break;
		case 'c': $letter = 'c'; break;
		case 'd': $letter = 'd'; break;
		case 'e': $letter = 'e'; break;
		case 'f': $letter = 'f'; break;
		case 'g': $letter = 'g'; break;
		case 'h': $letter = 'h'; break;
		case 'i': $letter = 'i'; break;
		case 'j': $letter = 'j'; break;
		case 'k': $letter = 'k'; break;
		case 'l': $letter = 'l'; break;
		case 'm': $letter = 'm'; break;
		case 'n': $letter = 'n'; break;
		case 'o': $letter = 'o'; break;
		case 'p': $letter = 'p'; break;
		case 'q': $letter = 'q'; break;
		case 'r': $letter = 'r'; break;
		case 's': $letter = 's'; break;
		case 't': $letter = 't'; break;
		case 'u': $letter = 'u'; break;
		case 'v': $letter = 'v'; break;
		case 'w': $letter = 'w'; break;
		case 'x': $letter = 'x'; break;
		case 'y': $letter = 'y'; break;
		case 'z': $letter = 'z'; break;
		default: $letter = 'a'; break;
	}
	$query = "SELECT recipeid,title FROM recipes WHERE Title LIKE '${letter}%' ORDER BY title ASC";
} else if(isset($_GET['all'])){
	$query = "SELECT recipeid,title FROM recipes ORDER BY title ASC";
} else if(isset($_GET['search'])){
	$term = htmlentities($_GET['search']);
	$query = "SELECT recipeid,title FROM recipes WHERE Title LIKE '%{$term}%' ORDER BY title ASC";
} else {
	if($show_all){
		$query = "SELECT recipeid,title FROM recipes ORDER BY title ASC";
	} else {
		$query = "SELECT recipeid FROM recipes WHERE 1 = 0";
	}
	if($show_recent){
		$recent_recipes = mysqli_fetch_all(mysqli_query($con, "SELECT recipeid,title FROM recipes ORDER BY RecipeID DESC LIMIT 0,${number_of_recent_entries}"), MYSQLI_ASSOC);
	}
}

if($res = mysqli_query($con, $query)){
	$num_results = mysqli_num_rows($res);
	$recipes = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else die("SQL Error " . mysqli_error($con));

$total_recipes = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(RecipeID) as total FROM recipes"));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<?php require_once("includes/headeritems.php"); ?>
  	<title>Recipes</title>
  </head>
  <body>
	<?php require_once("includes/menu.php") ?>
    <div class="container">
    <?php
	if(count($_GET) === 0){
	?>
        <div class="row">
            <div class="col-xs-">
                <div class="panel panel-<?php echo $theme ?> text-center">
                    <div class="panel-body h3">
                        Total Recipes <span class="label label-<?php echo $theme ?>"><?php echo $total_recipes['total'] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if($show_recent){
        ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-<?php echo $theme ?> text-center">
                        <div class="panel-heading">
                            Recently added
                        </div>
                        <div class="panel-body text-left">
							<?php
                            for($ii = 0; $ii < count($recent_recipes); $ii++){
                            ?>
                            <div class="">
                                <a href="recipe.php?r=<?php echo intval($recent_recipes[$ii]['recipeid']); ?>"><?php echo ucwords($recent_recipes[$ii]['title']); ?></a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } //End of if($show_recent)
        ?>
	<?php
		if($show_all){
		?>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-<?php echo $theme ?> text-center">
						<div class="panel-heading">
							All recipes
						</div>
						<div class="panel-body text-left">
							<?php
							for($ii = 0; $ii < count($recipes); $ii++){
							?>
							<div class="">
								<a href="recipe.php?r=<?php echo intval($recipes[$ii]['recipeid']); ?>"><?php echo ucwords($recipes[$ii]['title']); ?></a>
							</div>
							<?php } ?>
						</div>
					 </div>
				</div>
			</div>
		<?php
		}
	} //End of if(count($_GET) === 0)
	else { ?>
    	<div class="row">
            <div class="col-xs-">
                <div class="panel panel-<?php echo $theme ?> text-center">
                    <div class="panel-body h3">
                        Total <?php if(isset($letter)) echo strtoupper($letter); else if(isset($term)) echo "'$term'"; ?> Recipes <span class="label label-<?php echo $theme ?>"><?php echo count($recipes) ?></span>
                    </div>
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-sm-12">
                <div class="panel panel-<?php echo $theme ?> text-center">
                    <div class="panel-heading">
                        <?php if(isset($letter)) echo strtoupper($letter); else if(isset($term)) echo "'$term'"; ?> recipes
                    </div>
                    <div class="panel-body text-left">
                        <?php
                        for($ii = 0; $ii < count($recipes); $ii++){
                        ?>
                        <div class="">
                            <a href="recipe.php?r=<?php echo intval($recipes[$ii]['recipeid']); ?>"><?php echo ucwords($recipes[$ii]['title']); ?></a>
                        </div>
                        <?php } ?>
                    </div>
                 </div>
            </div>
        </div>
	<?php
    }
	#echo "<pre>";
	#print_r($recipes);
	#echo "</pre>";
	?>
    </div>
	<?php require_once("includes/footeritems.php"); ?>
  </body>
</html>
<nav class="navbar navbar-default panel-default" role="navigation">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1">
      	<span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo "."; ?>"><span class="h3"><i class="fa fa-lg fa-cutlery"></i></span> Recipes</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
      	<li><a href="add.php" title="Create recipe"><span class="glyphicon glyphicon-plus"></span></a></li>
        <!--<li><a href="import.php" title="Import recipe"><span class="glyphicon glyphicon-import"></span></a></li>
        <li><a href="export.php" title="Export recipes"><span class="glyphicon glyphicon-export"></span></a></li>-->
      	<?php if(!$show_all){ ?><li class=""><a href=".?all"><span class="" title="All">All</span></a></li><?php } ?>
        <li class="<?php if(isset($letter)){ if($letter === 'a') echo "active"; } ?>"><a href=".?letter=a"><span class="" title="A">A</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'b') echo "active"; } ?>"><a href=".?letter=b"><span class="" title="B">B</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'c') echo "active"; } ?>"><a href=".?letter=c"><span class="" title="C">C</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'd') echo "active"; } ?>"><a href=".?letter=d"><span class="" title="D">D</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'e') echo "active"; } ?>"><a href=".?letter=e"><span class="" title="E">E</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'f') echo "active"; } ?>"><a href=".?letter=f"><span class="" title="F">F</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'g') echo "active"; } ?>"><a href=".?letter=g"><span class="" title="G">G</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'h') echo "active"; } ?>"><a href=".?letter=h"><span class="" title="H">H</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'i') echo "active"; } ?>"><a href=".?letter=i"><span class="" title="I">I</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'j') echo "active"; } ?>"><a href=".?letter=j"><span class="" title="J">J</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'k') echo "active"; } ?>"><a href=".?letter=k"><span class="" title="K">K</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'l') echo "active"; } ?>"><a href=".?letter=l"><span class="" title="L">L</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'm') echo "active"; } ?>"><a href=".?letter=m"><span class="" title="M">M</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'n') echo "active"; } ?>"><a href=".?letter=n"><span class="" title="N">N</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'o') echo "active"; } ?>"><a href=".?letter=o"><span class="" title="O">O</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'p') echo "active"; } ?>"><a href=".?letter=p"><span class="" title="P">P</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'q') echo "active"; } ?>"><a href=".?letter=q"><span class="" title="Q">Q</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'r') echo "active"; } ?>"><a href=".?letter=r"><span class="" title="R">R</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 's') echo "active"; } ?>"><a href=".?letter=s"><span class="" title="S">S</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 't') echo "active"; } ?>"><a href=".?letter=t"><span class="" title="T">T</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'u') echo "active"; } ?>"><a href=".?letter=u"><span class="" title="U">U</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'v') echo "active"; } ?>"><a href=".?letter=v"><span class="" title="V">V</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'w') echo "active"; } ?>"><a href=".?letter=w"><span class="" title="W">W</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'x') echo "active"; } ?>"><a href=".?letter=x"><span class="" title="X">X</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'y') echo "active"; } ?>"><a href=".?letter=y"><span class="" title="Y">Y</span></a></li>
        <li class="<?php if(isset($letter)){ if($letter === 'z') echo "active"; } ?>"><a href=".?letter=z"><span class="" title="Z">Z</span></a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search" action="." method="get" enctype="application/x-www-form-urlencoded">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

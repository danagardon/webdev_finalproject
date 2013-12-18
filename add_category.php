<?php

include_once("resources/init.php");

if ( isset($_POST['name']) ) {
	$name = trim($_POST['name']);

	if ( empty($name) ){
		$error = 'You must submit a category name.';
	} else if ( category_exists('name', $name) ) {
		$error = 'That category already exists.';
	} else if ( strlen($name) > 24 ) {
		$error = ' Category names can be max 24 characters.' ;
	}

	if ( ! isset($error) ) {
		add_category($name);
		$success = '<i class="icon-ok">&nbsp;</i>The category has been added';

		header("location: add_post.php");
	}
}

?>

<!DOCTYPE html>
	<html lang="en">

<head>
	<title>IShare.ILearn Add Category Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
    	<a href="home.php"><div id="logo"></div></a>
       	<div id="menu">
        <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="category_list.php">Categories</a></li>
        <li><a href="add_post.php">Add Post</a></li>
        <li class="active"><a href="logout.php">Log-out</a></li>
        
        </ul>
        </div>
  </div>
     </div>
     
     <div id="page-wrapper">
     <div id="page" class="container">
     <div id="wrappertop">
     <h1>Add Category</h1>
     <div id="divider"></div>
     </div>
     <div id="wrappermiddle">

				<?php
				if ( isset($errors) && ! empty($errors) ) {
					echo '<div class="alert alert-block"><button type="button" class="close" data-dismiss="alert">&times;</button><ul><li>', implode('<li></li>', $errors), '</li></ul></div>';
				}
				?>
                       <div id="username_input">
			<form action="" method="post">
					<div>
						<input type="text" name="name" id="posttitle" placeholder="Category Name" value="">
						<?php
							 if ( isset($error)) {
							 	echo " <span class='help-inline'><i class='icon-exclamation'>&nbsp;</i>${error}</span>";
							 } else if ( isset($success)) {
								echo "<span class='help-inline'>${success}</span>";
							}
						?>
			        
                     <div id="submit">
						<input type="submit" id="addpost" value="Add Category" class="btn btn-success">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
 <div id="copyright" class="container">
    <p>Copyrights IShare. ILearn 2013 All Rights Reserved</p>
    </div>
</body>
<html>

<!--
<div class="control-group error">
  <label class="control-label" for="inputError">Name</label>
  <div class="controls">
    <input type="text" name="name" id="inputError">
    
  </div>
  <input type="submit" value="Add Category" class="btn btn-success">
</div>
-->
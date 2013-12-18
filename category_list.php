<?php include_once('resources/init.php') ?>
<!DOCTYPE html>
	<html lang="en">
<head>
	<title>IShare.ILearn User Category Page</title>
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
     <h1>Categories</h1>
     <div id="divider"></div>
     </div>
     <div id="wrappermiddle">
<?php 
foreach  ( get_categories() as $category ) {
		?>
		<p class="categorylist"><img src="Images/arrow.png" class="arrow"><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a> </p>
		<?php
		}
?>
<br>
<br>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
		 <div id="copyright" class="container">
    <p>Copyrights IShare. ILearn 2013 All Rights Reserved</p>
    </div>	
</body>
</html>


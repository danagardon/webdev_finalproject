<?php 
	include_once('resources/init.php'); 
	
	if ( isset($_POST['title'], $_POST['contents'], $_POST['category']) ) {
			//var_dump($_POST);
		$errors = array();

		$title 		= trim($_POST['title']);
		$contents 	= trim($_POST['contents']);

		if ( empty($title)) {
			$errors[] = 'You need to supply a title';
		} else if ( strlen($title) > 255 ){
			$errors[] = 'The title can not be longer than 255  characters';	
		}
		if ( empty($contents) ) {
			$errors[] = 'You need to supply some text';
		}
		if ( ! category_exists('id', $_POST['category']) ){
			$errors[] = 'That category does not exist';	
		}

		if ( empty($errors) ) {
			add_post($title, $contents, $_POST['category']);

			$id = mysql_insert_id();

			header('location: home.php?id=' . $id);
			die();
		}
	}
?>
<!DOCTYPE html>
	<html lang="en">
<head>
	<title>IShare.ILearn Add Post Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <script>
var txt = $('#comments'),
    hiddenDiv = $(document.createElement('div')),
    content = null;

txt.addClass('txtstuff');
hiddenDiv.addClass('hiddendiv common');

$('body').append(hiddenDiv);

txt.on('keyup', function () {

    content = $(this).val();

    content = content.replace(/\n/g, '<br>');
    hiddenDiv.html(content + '<br class="lbr">');

    $(this).css('height', hiddenDiv.height());

});
</script>
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
     <h1>Welcome to Ishare Ilearn</h1>
     <h3>Share what you know!</h3>
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
		<input type="text" name="title" id="posttitle" placeholder="Title" value="<?php if ( isset($_POST['title']) ) echo $_POST['title']; ?>">
        
      
		<textarea name="contents" id="postcontent" placeholder="Type Content Here." class="common"><?php if ( isset($_POST['contents']) ) echo $_POST['contents']; ?></textarea>
				
               
						
                        <div class="select-style">
                        <span id="category">Category:
						  <select name="category">
							<?php 
								foreach ( get_categories() as $category) {
									echo("<option value=\"" .  $category["id"] . "\">{$category['name']}</option>");
								?>
								<!--<option value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?> </option>-->
							<?php 
								}
							?>
						</select></span></div>
                        <div id="submit">
						<input type="submit" id="addpost" value="Add Post" class="btn btn-success">
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
</html>

				
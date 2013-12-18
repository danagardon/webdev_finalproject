<?php 

include_once('resources/init.php');


#$posts = ( isset($_GET['id']) ) ? get_posts($_GET['id']) : get_posts();

$posts = get_posts(((isset($_GET['id'])) ? $_GET['id'] : null));

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>IShare.ILearn User Home Page</title>
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
     <h1>All Featured Posts</h1>
     <div id="divider"></div>
     </div>
     <div id="wrappermiddle">
     
     <?php
				foreach ( $posts as $post ) {
		//echo json_encode($post);
					if ( ! category_exists('name', $post ['name'] ) ){
						$post['name'] = 'Uncategorised';
					}
					?>

					<div class="post">
						<h2><img src="Images/quote.png" class="quotepic"><a href="index.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></h2>
						<small id="date"> Posted on <?php echo date('d-m-Y h:i:s', strtotime($post['date_posted'])); ?>
							in <span class="category"> <a href="category.php?id=<?php echo $post['category_id']; ?>"><?php echo $post['name'];?></a>
						</span></small><hr>
						<p class="post-content"><?php echo nl2br($post['contents']);?></p>

						<div class="post-functions">
							<ul>
								<li><a href="delete_post.php?id=<?php echo $post["post_id"]; ?>" onclick="return confirm('Are you sure you want to delete?')"> Delete this post</a></li>
								<li><a href="edit_post.php?id=<?php echo $post['post_id']; ?>"> Edit post</a></li>
							</ul>
						</div>
					</div>
					<?php
				}
				?>
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
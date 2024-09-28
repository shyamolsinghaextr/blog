<?php
	include "site_components/head.php";
	include "site_components/nav.php";
	require_once "db_connection.php";
	
	$post_id  = $_GET['id'];
	$sql = "SELECT * FROM posts WHERE id = '$post_id'"; 
	$result = mysqli_query($conn, $sql); 
	$post_data = mysqli_fetch_assoc($result);
	
?>

    <!-- Blog Post Content -->
    <div class="container post-header">
        <h1 class="display-4"> <?php echo $post_data['post_head']?></h1>

        <!-- Post Content -->
        <div class="post-content">
            <?php echo $post_data['post']?>
        </div>

	</div>

<?php
	include "site_components/footer.php";
?>

<?php
	include "site_components/head.php";
	include "site_components/nav.php";
	require_once "db_connection.php";
	
	$sql = "SELECT * FROM posts ORDER BY id DESC"; 
	$result = mysqli_query($conn, $sql); 
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


    <!-- Blog Posts Section -->
    <div id="blogPosts" class="container my-5">
        <h2 class="text-center mb-4">Recent Posts</h2>
        <div class="row">
		
        <?php
		
			foreach ($posts as $post) {
				
				$post_content = implode(' ', array_slice(explode(' ', strip_tags($post['post'])), 0, 30));
				
				echo "
					<div class='col-md-4 mb-4'>
						<div class='card blog-post'>
							<img src='https://via.placeholder.com/400x200' class='card-img-top' alt='Blog Post Image'>
							<div class='card-body'>
								<h5 class='card-title'>".$post['post_head']."</h5>
								<p class='card-text'>".$post_content."...</p>
								<a href='http://localhost/blog/post_view.php?id=".$post['id']."' target='_blank' class='btn btn-primary'>Read More</a>
							</div>
						</div>
					</div>
				";
			}

		?>
			
			
        </div>
    </div>

<?php
	include "site_components/footer.php";
?>

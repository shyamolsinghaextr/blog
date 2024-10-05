<?php 
	require_once('db_connection.php');
	include 'components/head.php';
	include 'components/navbar.php';
	include 'components/sitebar.php';
	
	if(isset($_GET['id'])){
		$postID = $_GET['id'];
		$sql = "SELECT * FROM posts WHERE id = '$postID'"; 
		$result = mysqli_query($conn, $sql); 
		$post_data = mysqli_fetch_assoc($result);
	}

	
	if(isset($_POST['Submit'])){
		
	
		$post_head = $_POST['post_head'];
		$post = $_POST['post'];
		$category = $_POST['category'];
		$postID = $_POST['postID'];
		
		$sql = "UPDATE posts SET post_head = '$post_head', post = '$post', category = '$category' WHERE id = '$postID'";
		$result = mysqli_query($conn, $sql);
		header("Location: posts.php");
	}
?>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Update a Post</h3>
            <form method="POST" action="post_edit.php?id=<?php echo $_GET['id'] ?>">
			  <input type="hidden" name="postID" value="<?php echo $postID; ?>">
              <div class="mb-3">
                <label for="postTitle" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="postTitle" name = 'post_head' value = '<?php echo $post_data['post_head']; ?>' placeholder="Enter post title" required>
              </div>
              <div class="mb-3">
                <label for="postContent" class="form-label">Post Content</label>
                <textarea class="form-control" id="postContent" name = 'post' rows="5" placeholder="Write your post here..." required><?php echo $post_data['post']; ?></textarea>
              </div>
			  <div class="mb-3">
              <label for="postCategory" class="form-label">Category</label>
              <select class="form-select" id="postCategory" name = 'category' required>
                <option value="<?php echo $post_data['category'];?>">Selected (<?php echo $post_data['category']; ?>)</option>
                <option value="News">News</option>
                <option value="Sports">Sports</option>
                <option value="Entertainment">Entertainment</option>
              </select>
            </div>
              <button type="submit" name = 'Submit' class="btn btn-primary w-100">Update Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php include 'components/footer.php'; ?>
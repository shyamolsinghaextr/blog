<?php 
require_once('db_connection.php');
include 'components/head.php';
if($_SESSION["Role"] == 'editor'){header("Location: dashboard.php");}
include 'components/navbar.php';
include 'components/sitebar.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post Form</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php

    $error = "";
    $success = "";
    
    if (isset($_POST['submit'])) {
		
        $post_head = $_POST['post_head'];
        $post = $_POST['post'];
        $category = $_POST['category'];
    
        if(empty($post_head)) {
            $error = 'Please write post heading.';
        }
        else if(empty($post)) {
            $error = 'Please write post.';
        }
		 else if(empty($category)) {
            $error = 'Please Select post category.';
        }
      
        else{
			$sql = "INSERT INTO posts(category, post_head, post) VALUES ('$category','$post_head','$post')"; 
			$result = mysqli_query($conn, $sql); 
			echo "Post Create successful";
		}
    }
?>


  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Create a Post</h3>
            <form method="POST" action="post_create.php">
              <div class="mb-3">
                <label for="postTitle" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="postTitle" name = 'post_head' placeholder="Enter post title" required>
              </div>
              <div class="mb-3">
                <label for="postContent" class="form-label">Post Content</label>
                <textarea class="form-control" id="postContent" name = 'post' rows="5" placeholder="Write your post here..." required></textarea>
              </div>
			  <div class="mb-3">
              <label for="postCategory" class="form-label">Category</label>
              <select class="form-select" id="postCategory" name = 'category' required>
                <option value="">Select a category</option>
                <option value="News">News</option>
                <option value="Sports">Sports</option>
                <option value="Entertainment">Entertainment</option>
              </select>
            </div>
              <div class="mb-3">
                <label for="postImage" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="postImage" accept="image/*">
              </div>
              <button type="submit" name = 'submit' class="btn btn-primary w-100">Create Post</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




<?php include 'components/footer.php';?>
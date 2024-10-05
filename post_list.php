<?php 
require_once('db_connection.php');
include 'components/head.php';
include 'components/navbar.php';
include 'components/sitebar.php';
?>

    <div class="flex-grow-1 p-3">
        <h2>User Data</h2>
        
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Post Heading</th>
                    <th>Post Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
			
			<?php

			$sql = "SELECT * FROM posts ORDER BY id DESC";
			$result = mysqli_query($conn, $sql); 
			$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
			
			foreach ($posts as $post) {
				$post_content = implode(' ', array_slice(explode(' ', strip_tags($post['post'])), 0, 10));
			echo "
				<tr>
					<td>".$post['id']."</td>
					<td>".$post['post_head']."</td>
					<td>".$post_content."</td>
					<td>
						<a href='post_edit.php?id=".$post['id']."' class='btn btn-primary btn-sm'>Edit</a>
						<a href='post_delete.php?id=".$post['id']."' class='btn btn-danger btn-sm'>Delete</a>
						<a href='post_view.php?id=".$post['id']."' target='_blank' class='btn btn-success btn-sm'>View</a>
					</td>
				</tr>
				";
			}

			
			?>
                
            </tbody>
        </table>
		
<?php include 'components/footer.php';?>
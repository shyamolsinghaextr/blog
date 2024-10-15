<?php
  require_once('db_connection.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <?php
  
  if(isset($_SESSION["Login"])){
	  header("Location: dashboard.php");
  }
  
    $error = "";
    $success = "";
    
    if (isset($_POST['submit'])) {
		
        $phone = $_POST['phone'];
        $password = $_POST['password'];
    
        if(empty($phone)) {
            $error = 'Please fill in your phone number.';
        }
        else if(empty($password)) {
            $error = 'Please fill in your password.';
        }
        else if(strlen($password) < 8 || strlen($password) > 20) {
            $error = 'Password must be 8-20 characters long.';
        }
        else{
			
			$sql = "SELECT * FROM users WHERE phone = '$phone' AND password = '$password'"; 
			$result = mysqli_query($conn, $sql); 
			$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
			foreach ($user as $user_data) {
				$_SESSION["Login_Status"] = "logged in";
				$_SESSION["UserID"] = $user_data['id'];
				$_SESSION["Role"] = $user_data['Role'];
				
				if($user_data['Role'] == 'admin' or $user_data['Role'] == 'editor'){
					header("Location: dashboard.php");
				}
				
				if($user_data['Role'] == 'user'){
					header("Location: index.php");
				}
			}
			
		}
    }
    ?>

  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center mb-4">Login</h3>
		  
		    <?php if ($error): ?>
                <div class="alert alert-danger">
					<?php echo $error; ?>
                </div>
				
            <?php elseif ($success): ?>
                <div class="alert alert-success">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
				  
				  
          <form method="POST" action="login.php">
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" name = 'phone' class="form-control" id="phone" value="<?php if (isset($phone)) { echo $phone; } ?>" placeholder="Enter Phone Number" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name = 'password' class="form-control" id="password" value="<?php if (isset($password)) { echo $password; } ?>" placeholder="Enter your password" required>
            </div>
            <button type="submit" name = 'submit' class="btn btn-primary w-100">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

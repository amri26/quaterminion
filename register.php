<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['full_name'])) {
	header("Location: index.php");
	exit;
}

if (isset($_POST['submit'])) {
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$password = hash("sha256", $_POST['password']);
	$cpassword = hash("sha256", $_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (full_name, email, password)
					VALUES ('$full_name', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			$valid = $result;
			if ($result) {
				$success_register = "User registration completed!";
				$full_name = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				$error_register = "Something went wrong. Please try again.";
			}
		} else {
			$error_email = "Email already exists.";
		}
	} else {
		$error_password = "Password does not match.";
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/style2.css">

	<title>Register</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Full Name" name="full_name" value="<?php echo $full_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<?php
			if (isset($error_register)) echo "<div class='alert alert-danger'>" . $error_register . "</div>";
			if (isset($error_email)) echo "<div class='alert alert-danger'>" . $error_email . "</div>";
			if (isset($error_password)) echo "<div class='alert alert-danger'>" . $error_password . "</div>";
			if (isset($valid)) echo "<div class='alert alert-success'>" . $success_register . "</div>";
			?>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>

</html>
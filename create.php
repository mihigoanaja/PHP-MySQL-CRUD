<style>
	.new-btn {
		display: block;
		text-align: center;
		box-shadow: 0 0 5px 1px #333 inset;
		padding: 10px;
		font-family: arial;
		font-size: 25px;
		text-decoration: none;
		color: #000;
		font-weight: bold;
	}
	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		min-height: 50%;
	}
	form {
		background-color: #def;
		padding: 20px;
	}
	form>* {
		display: block;
		width: 100%;
		font-family: arial;
		font-size: 25px;
		padding: 10px;
	}
	form input {
		margin-bottom: 10px;
		border-radius: 10px;
		border-width: 0px;
		box-shadow: 0 0 5px 1px #000 inset;
	}
	form input[type="submit"] {
		background-color: #4a5;
		color: #fff;
	}
</style>
<div class="container">
	<div>
		<a  class="new-btn" href="read.php">View All Students</a>
		<?php
			include "connection.php";
			// What to do if a form is submit
			if ($_SERVER["REQUEST_METHOD"]=="GET") {
				if (isset($_GET['class'])) {
					$name=$_GET['name'];
					$class=$_GET['class'];
					$query="INSERT INTO students (name,class) VALUES ('$name','$class')";
					$result=mysqli_query($connection,$query);
					if (isset($result)) {
						echo "<h1>Insertion Successful</h1>";
					}
				}
			}
		?>
		<h1>Register A New Student</h1>
		<form action="create.php" method="GET">
			<label>Name</label>
			<input name="name">
			<label>Class</label>
			<input name="class">
			<input type="submit">
		</form>
	</div>
</div>
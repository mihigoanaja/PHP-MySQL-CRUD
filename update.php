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
	form input[hidden] {
		display: none;
	}
</style>
<div class="container">
	<div>
		<a class="new-btn" href="read.php">View All Students</a>
		<?php
			include "connection.php";
			// What to do if a form is submit
			if ($_SERVER["REQUEST_METHOD"]=="POST") {
				if (isset($_POST['class'])) {
					$id=$_POST['id'];
					$name=$_POST['name'];
					$class=$_POST['class'];
					echo $query="UPDATE students SET name='$name',class='$class' WHERE id=$id;";
					$result=mysqli_query($connection,$query);
					if (!isset($result)) {
						echo "<h1>Updation Failure...</h1>";
					} else {
						//redirect to read.php
						header("location: read.php");
					}
				}
			}
			if ($_SERVER["REQUEST_METHOD"]=="GET") {
				if (isset($_GET['id'])) {
					$id=$_GET['id'];
					$query="SELECT * FROM students WHERE id=$id;";
					$result=mysqli_query($connection,$query);
					if (mysqli_num_rows($result)>0) {
						$row=mysqli_fetch_assoc($result);
						$name=$row["name"];
						$class=$row["class"];
		?>
		<h1>Update Existing Student</h1>
		<form method="POST">
			<input name="id" value="<?=$id?>" hidden>
			<label>Name</label>
			<input name="name" value="<?=$name?>">
			<label>Class</label>
			<input name="class" value="<?=$class?>">
			<input type="submit">
		</form>
		<?php
					}
				}
			}
		?>
	</div>
</div>
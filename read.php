<style>
	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		min-height: 50%;
	}
	table {
		background-color: #def;
		margin-top: 20px;
		font-family: arial;
	}
	th {
		background-color: #4a5;
		color: #fff;
		padding: 10px;
		font-size: 25px;
	}
	td {
		padding: 10px;
		font-size: 25px;
		border-bottom: 1px solid black;
	}
	.btn {
		text-decoration: none;
		padding: 10px;
		border-radius: 5px;
		display: inline block;
		box-shadow: 0 0 5px 1px #333 inset;
	}
	.btn.update {
		background-color: #4a5;
		color: #fff;
	}
	.btn.delete {
		background-color: #f44;
		color: #fff;
	}
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
</style>
<div class="container">
	<div>
		<a class="new-btn" href="create.php">Create New Record</a>
		<table>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>class</th>
				<th>operations</th>
			</tr>
		<?php
			include "connection.php";
			$query="SELECT * FROM students;";
			$result=mysqli_query($connection,$query);
			if (mysqli_num_rows($result)>0) {
				while ($row=mysqli_fetch_assoc($result)) {
					$id=$row["id"];
					$name=$row["name"];
					$class=$row["class"];
					echo "<tr><td>$id</td><td>$name</td><td>$class</td><td><a class='btn update' href='update.php?id=$id'>Update</a>&nbsp;<a class='btn delete' href='delete.php?id=$id'>Delete</a></td></tr>";
				}
			}
		?>
		</table>
	</div>
</div>
<?php
	include "connection.php";
	if ($_SERVER["REQUEST_METHOD"]=="GET") {
		if (isset($_GET["id"])) {
			$id=$_GET["id"];
			$query="DELETE FROM students WHERE id=$id;";
			$result=mysqli_query($connection,$query);
			if (isset($result)) {
				/* Redirect to read.php if deletion is successful */
				header("location: read.php");
			} else {
				echo "<h1>Insertion Failure...</h1>";
			}
		}
	}
?>
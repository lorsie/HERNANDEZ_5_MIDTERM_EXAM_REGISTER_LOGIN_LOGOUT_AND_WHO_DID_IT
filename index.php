<?php 
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
} else {
    // Display the logout link if the user is logged in
    echo '<a href="core/handleForms.php?logoutAUser=1">Logout</a>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bakery Management System</title>
	<link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        font-family: "system-ui";
        background-color: #FFCCEA
    }
    input {
        font-size: 1.5em;
        height: 40px;
        width: 200px;
        background-color: #D4BDAC
    }
    put [type = "submit"]{
        font-weight:bold;
    }
   </style> 
<body>
	<h1>Welcome To Bakery Management System. Add new Bakers!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name: </label> 
			<input type="text" name="firstName">
		</p>
		<p>
			<label for="lastName">Last Name: </label> 
			<input type="text" name="lastName">
		</p>
		<p>
			<label for="bakeshopLocation">Bakeshop Location: </label> 
			<input type="text" name="bakeshopLocation">
		</p>
		<p>
			<label for="emailAddress">Email: </label> 
			<input type="email" name="emailAddress">
			<input type="submit" name="insertBakerBtn">
		</p>
		<p>
			<label for="added_by">Added By: </label> 
			<input type="text" name="added_by">
		</p>
		<p>
			<label for="last_updated">Last Updated: </label> 
			<input type="date" name="last_updated">
		</p>

	</form>
	<?php $getAllBakers = getAllBakers($pdo); ?>
	<?php foreach ($getAllBakers as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
	    <h3>Baker ID: <?php echo $row['bakerID']; ?></h3>
	    <h3>First Name: <?php echo $row['firstName']; ?></h3>
		<h3>Last Name: <?php echo $row['lastName']; ?></h3>
		<h3>Bakeshop Location: <?php echo $row['bakeshopLocation']; ?></h3>
		<h3>Email Address: <?php echo $row['emailAddress']; ?></h3>
		<h3>Added By: <?php echo $row['added_by']; ?></h3>
    	<h3>Last Updated: <?php echo $row['last_updated']; ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewpastries.php?bakerID=<?php echo $row['bakerID']; ?>">View Pastries</a>
			<a href="editbaker.php?bakerID=<?php echo $row['bakerID']; ?>">Edit</a>
			<a href="deletebaker.php?bakerID=<?php echo $row['bakerID']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>

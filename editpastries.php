<?php 
require_once 'core/models.php'; 
require_once 'core/dbConfig.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Pastry</title>
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
	<a href="viewpastries.php?bakerID=<?php echo $_GET['bakerID']; ?>">View The Pastries</a>
	<h1>Edit the Pastry!</h1>

	<?php
	$pastryID = $_GET['pastriesID'];
	$getPastryByID = getPastryByID($pdo, $pastryID);
	
	if ($getPastryByID): // Check if the query was successful
	?>

	<form action="core/handleForms.php?pastriesID=<?php echo $_GET['pastriesID']; ?>&bakerID=<?php echo $_GET['bakerID']; ?>" method="POST">
		<p>
			<label for="pastryName">Pastry Name: </label> 
			<input type="text" name="pastryName" value="<?php echo htmlspecialchars($getPastryByID['pastryName']); ?>">
		</p>
        <p>
			<label for="doughType">Dough Type: </label> 
			<input type="text" name="doughType" value="<?php echo htmlspecialchars($getPastryByID['doughType']); ?>">
		</p>
        <p>
			<label for="sweetnessLevel">Sweetness Level: </label> 
			<input type="text" name="sweetnessLevel" value="<?php echo htmlspecialchars($getPastryByID['sweetnessLevel']); ?>">
		</p>
		<p>
			<label for="price">Price: </label> 
			<input type="number" name="price" value="<?php echo htmlspecialchars($getPastryByID['price']); ?>">
		</p>
		<p>
			<label for="added_by">Added By: </label> 
			<input type="text" name="added_by" value="<?php echo htmlspecialchars($getPastryByID['added_by']); ?>">
		</p>
		<p>
			<label for="last_updated">Last Updated: </label> 
			<input type="date" name="last_updated" value="<?php echo htmlspecialchars($getPastryByID['last_updated']); ?>">
		</p>
		<p>
			<input type="submit" name="editPastryBtn" value="Submit">
		</p>
	</form>

	<?php else: ?>
		<p>Error: Pastry data not found.</p>
	<?php endif; ?>

</body>
</html>

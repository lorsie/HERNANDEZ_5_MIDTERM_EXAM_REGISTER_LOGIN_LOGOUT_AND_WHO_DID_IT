<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
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
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByBakerID = getAllInfoByBakerID($pdo, $_GET['bakerID']); ?>
	<h1>Baker: <?php $getAllInfoByBakerID = getAllInfoByBakerID($pdo, $_GET['bakerID']);
    if ($getAllInfoByBakerID) {
         echo $getAllInfoByBakerID['Baker'];
    } else {
        echo "No baker found or query failed.";}?>
</h1>
	<h1>Add New Pastry!</h1>
	<form action="core/handleForms.php?bakerID=<?php echo $_GET['bakerID']; ?>" method="POST">

		<p>
			<label for="pastryName">Pastry Name: </label> 
			<input type="text" name="pastryName">
		</p>
        <p>
			<label for="doughType">Dough Type: </label> 
			<input type="text" name="doughType">
		</p>
        <p>
			<label for="sweetnessLevel">Sweetness Level: </label> 
			<input type="text" name="sweetnessLevel">
		</p>
		<p>
			<label for="price">Price: </label> 
			<input type="number" name="price">
			<input type="submit" name="insertNewPastryBtn">
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

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Pastry ID</th>
	    <th>Pastry Name</th>
	    <th>Baker</th>
	    <th>Dough Type</th>
        <th>Sweetness Level</th>
	    <th>Price</th>
		<th>Added By</th>
		<th>Last Updated</th>
	    <th>Action</th>
	  </tr>
	  <?php $getPastryByBaker = getPastryByBaker($pdo, $_GET['bakerID']); ?>
      <?php 
	    if (empty($getPastryByBaker)) {
    	    echo "<tr><td colspan='8'>No Pastries found for this Baker.</td></tr>";
    	} 
		?>
	  <?php foreach ($getPastryByBaker as $row) { ?>
	  <tr>
	  	<td><?php echo $row['pastriesID']; ?></td>	  	
	  	<td><?php echo $row['pastryName']; ?></td>	  	
	  	<td><?php echo $row['Baker']; ?></td>	  	
	  	<td><?php echo $row['doughType']; ?></td>
        <td><?php echo $row['sweetnessLevel']; ?></td>	  	
	  	<td><?php echo $row['price']; ?></td>
		<td><?php echo $row['added_by']; ?></td>
		<td><?php echo $row['last_updated']; ?></td>
	  	<td>
	  		<a href="editpastries.php?pastriesID=<?php echo $row['pastriesID']; ?>&bakerID=<?php echo $_GET['bakerID']; ?>">Edit</a>

	  		<a href="deletepastries.php?pastriesID=<?php echo $row['pastriesID']; ?>&bakerID=<?php echo $_GET['bakerID']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>

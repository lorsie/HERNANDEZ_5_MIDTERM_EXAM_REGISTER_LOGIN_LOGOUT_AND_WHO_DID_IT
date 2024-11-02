<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Baker</title>
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
	<?php $getBakerByID = getBakerByID($pdo, $_GET['bakerID']); ?>
	<h1>Edit the Baker!</h1>
	<form action="core/handleForms.php?bakerID=<?php echo $_GET['bakerID']; ?>" method="POST">
		<p>
			<label for="firstName">First Name: </label> 
			<input type="text" name="firstName" value="<?php echo $getBakerByID['firstName']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name: </label> 
			<input type="text" name="lastName" value="<?php echo $getBakerByID['lastName']; ?>">
		</p>
		<p>
			<label for="bakeshopLocation">Bakeshop Location: </label> 
			<input type="text" name="bakeshopLocation" value="<?php echo $getBakerByID['bakeshopLocation']; ?>">
		</p>
        <p>
			<label for="emailAddress">Email: </label> 
			<input type="email" name="emailAddress" value="<?php echo $getBakerByID['emailAddress']; ?>">
			<input type="submit" name="editBakerBtn">
		</p>
		<p>
			<label for="added_by">Added By: </label> 
			<input type="text" name="added_by" value="<?php echo $getBakerByID['added_by']; ?>">
		</p>
		<p>
			<label for="last_updated">Added By: </label> 
			<input type="date" name="last_updated" value="<?php echo $getBakerByID['last_updated']; ?>">
		</p>
	</form>
</body>
</html>

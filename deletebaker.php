<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charseAt="UTF-8">
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
	<h1>Are you sure you want to delete this Baker?</h1>
	<?php $getBakerByID = getBakerByID($pdo, $_GET['bakerID']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
	  <h2>Baker ID: <?php echo $getBakerByID['bakerID']; ?></h2>
		<h2>First Name: <?php echo $getBakerByID['firstName']; ?></h2>
		<h2>Last Name: <?php echo $getBakerByID['lastName']; ?></h2>
		<h2>Bakeshop Location: <?php echo $getBakerByID['bakeshopLocation']; ?></h2>
		<h2>Email Address: <?php echo $getBakerByID['emailAddress']; ?></h2>
    <h2>Added By: <?php echo $getBakerByID['added_by']; ?></h2>
		<h2>Last Updated: <?php echo $getBakerByID['last_updated']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
		<form action="core/handleForms.php?bakerID=<?php echo $_GET['bakerID']; ?>" method="POST">
            <input type="submit" name="deleteBakerBtn" value="Delete">
        </form>
		
		</div>	

	</div>
</body>
</html>

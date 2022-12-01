<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class=header>
		<h1> Welcome to Virus Validate! </h1>
<h4> Please enter the following information to proceed. </h4>
</div>
<?php
	define('DB_HOST','sql109.epizy.com');
	define('DB_NAME','epiz_33095844');
	define('DB_USER','uXNvfTTzUdCI6Y');
	define('DB_PASSWORD','epiz_33095844_virus_validate_gsu_2022');

	function login($firstname, $crn) {
		// Create connection
		$conn = new mysqli(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
		
		// Check connection
		if (!$conn) {
			die('Connection failed: ' . mysqli_connect_error());
		}
	
		$sql = 'SELECT * FROM attendees';
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if ($row['firstname'] == $firstname & $row['crn'] == $crn) {
                    session_start();
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['schedule'] = $row['schedule'];
					setcookie('userid', $row['id'], time() + (86400 * 30), '/');
					header('Location: questionnaire.php');
				}
			}
            echo 'Name and/or CRN is incorrect';
		}
		else {
			echo '0 results';
		}
		$conn->close();
	}
?>
<form method="POST">
	<p></p>
	<label for="name">Name</label><br>
	<input type="text" name="name" placeholder="Your Name"><br>
	<label for="crn">CRN</label><br>
	<input type="text" name="crn"  placeholder="Your CRN"><br>
	<input type="submit" value="submit" class="submit">
</form>

<?php
	if ($_POST['name'] != '' & $_POST['crn'] != '') {
		login($_POST['name'], $_POST['crn']);
	}
?>
<div>
			<img class = "images" src="image/vvlogo.png" alt="logo" />
	</div>
</body>
</html>
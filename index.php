<html>
<body>
<?php
	define('DB_HOST','sql109.epizy.com');
	define('DB_NAME','epiz_33095844');
	define('DB_USER','uXNvfTTzUdCI6Y');
	define('DB_PASSWORD','epiz_33095844_virus_validate_gsu_2022');

    echo "<h1> Welcome to Virus Validate! </h1>";
    echo "<h4> Please enter the following information to proceed. </h4>";

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
	<label for="name">Name:</label><br>
	<input type="text" name="name"><br>
	<label for="crn">CRN:</label><br>
	<input type="text" name="crn"><br>
	<input type="submit" value="submit">
</form>

<?php
	if ($_POST['name'] != '' & $_POST['crn'] != '') {
		login($_POST['name'], $_POST['crn']);
	}
?>
</body>
</html>
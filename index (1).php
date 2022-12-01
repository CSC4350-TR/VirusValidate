<html>
<head>
    <title>Virus Validate</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="header">
		<h1>Welcome to Virus Validate!</h1>
        <h4> Please enter the following information to proceed. </h4>
    </div>

<style>
    #form {
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .text-field {
        //display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .error {
        text-align: center;
        margin: 10px;
        color: white;
        border:3px solid #e84a5f;
        border-radius: 15px;
        background: #f67280;
        padding-top: 30px;
        padding-right: 20px;
        padding-left: 20px;
        padding-bottom: 30px;
        font-family: Montserrat,sans-serif;
        font-size: 20px;
        font-weight: bold;
    }
    input {
        width: 100%;
    }

    .submit {
        height: 50px;
    }
    
</style>

<?php
	define('DB_HOST','sql109.epizy.com');
	define('DB_NAME','epiz_33095844');
	define('DB_USER','uXNvfTTzUdCI6Y');
	define('DB_PASSWORD','epiz_33095844_virus_validate_gsu_2022');

	function login($firstname, $lastname, $crn) {
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
				if ($row['firstname'] == $firstname & $row['lastname'] == $lastname & $row['crn'] == $crn) {
                    session_start();
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['schedule'] = $row['schedule'];
					setcookie('userid', $row['id'], time() + (86400 * 30), '/');
					header('Location: questionnaire.php');
				}
			}
            echo "<p class='error'>Name and/or CRN is incorrect</p>";
		}
		else {
			echo '0 results';
		}
		$conn->close();
	}
?>
<div id="form">
    <form method="POST">
        <div class="text-field">
            <label for="name">First Name</label>
            <input type="text" name="firstname" placeholder="First Name">
            <label for="name">Last Name</label>
            <input type="text" name="lastname" placeholder="Last Name">
            <label for="crn">CRN</label>
            <input type="text" name="crn"  placeholder="Your CRN">
            <input type="submit" value="Submit" class="submit">
        </div>
    </form>
</div>

<?php
	if ($_POST['firstname'] != '' & $_POST['lastname'] != '' & $_POST['crn'] != '') {
		login($_POST['firstname'], $_POST['lastname'], $_POST['crn']);
	}
?>
    <div>
		<img class = "images" src="vvlogo.png" alt="logo" />
	</div>
</body>
</html>
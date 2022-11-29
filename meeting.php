<?php
    if(!isset($_COOKIE['userid'])) {
		header('Location: index.php');
	}
	else {
        if ($_POST['question1'] == 'Yes' || $_POST['question2'] == 'Yes' || $_POST['question4'] == 'No') {
            echo 'Not allowed to meeting';
        }

        else if ($_POST['question5'] == 'Yes') {
            echo 'Allowed to meeting with precautions';
        }
        
        else if ($_POST['question5'] == 'No') {
            echo 'Allowed to meeting';
        }
    }
?>
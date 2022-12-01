<style>
    .positive{
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
    font-size: 30px;
    font-weight: bold;
    }
    
    .negative{
    text-align: center;
    margin: 10px;
    color: #2c786c;
    border:3px solid #cbf078;
    border-radius: 15px;
    background: #e0ffcd;
    padding-top: 30px;
    padding-right: 20px;
    padding-left: 20px;
    padding-bottom: 30px;
    font-family: Montserrat,sans-serif;
    font-size: 30px;
    font-weight: bold;
    }
    .images{
        float:center;
        max-width: 45%;
        max-height: 45%;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
</style>
<?php
    if(!isset($_COOKIE['userid'])) {
		header('Location: index.php');
	}
	else {
        if ($_POST['question1'] == 'Yes' || $_POST['question2'] == 'Yes' || $_POST['question4'] == 'No') { 
            echo '<img class = "images" src="redcheck.png" alt="not allowed" />';
            echo "<p class='positive'>Not allowed to meeting</p>";
           
        }

        else if ($_POST['question5'] == 'Yes') {
            echo '<img class = "images" src="greencheck.png" alt="allowed" />';
            echo "<p class='negative'>Allowed to meeting with precautions</p>";

        }
        
        else if ($_POST['question5'] == 'No') {
            echo '<img class = "images" src="greencheck.png" alt="allowed" />';
            echo "<p class='negative'>Allowed to meeting</p>";
        }
    }
?>
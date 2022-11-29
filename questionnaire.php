<?php
	if(!isset($_COOKIE['userid'])) {
		header('Location: index.php');
	}
	else {
        session_start();
		echo 'Welcome '.$_SESSION['firstname'].' '.$_SESSION['lastname'].'!';
        echo '<br>';
        echo 'You have a meeting on '. $_SESSION['schedule'];
	}
?>

<p>Please complete the below questionnaire</p>
<form action='meeting.php' method='post'>
<ol>
	<li>Have you experienced any of the symptoms in the list below in the past 48 hours?</li>
		<ul>
			<li>Fever or chills</li>
			<li>New or unexplained onset of cough, shortness of breath, or difficulty breathing</li>
			<li>New or unexplained loss of taste or smell</li>
			<li>New or unexplained muscle aches</li>
		</ul>
		<input type='radio' name='question1' value='Yes'>Yes
		<input type='radio' name='question1' value='No'>No
	
	<li>Are you isolating because you tested positive for COVID-19 or are sick and suspect that you have COVID-19 but do not yet have test results?</li>
		<input type='radio' name='question2' value='Yes'>Yes
		<input type='radio' name='question2' value='No'>No
	
	<li>Have you been exposed to the virus that causes COVID-19 in the last 10 days?</li>
		<input type='radio' name='question3' value='Yes'>Yes
		<input type='radio' name='question3' value='No'>No
	
	<li>Did you have a negative COVID-19 test result from a test taken 5 full days after your last exposure to the person who tested positive for COVID-19? Select Yes, if it does not          apply.</li>
		<input type='radio' name='question4' value='Yes'>Yes
		<input type='radio' name='question4' value='No'>No
	
	<li>Have you traveled internationally in the past 10 days?</li>
		<input type='radio' name='question5' value='Yes'>Yes
		<input type='radio' name='question5' value='No'>No
</ol>

<input type='submit' name='submit' value='Submit' onclick='return validateForm()'>

<script>
function validateForm() {
	var question1 = document.getElementsByName('question1');
	var question2 = document.getElementsByName('question2');
	var question3 = document.getElementsByName('question3');
	var question4 = document.getElementsByName('question4');
	var question5 = document.getElementsByName('question5');
	
	if (!(question1[0].checked || question1[1].checked)) {
		alert('Please answer all the questions before submitting');
		return false;
	}
    if (!(question2[0].checked || question2[1].checked)) {
	    alert('Please answer all the questions before submitting');
	    return false;
    }
    if (!(question3[0].checked || question3[1].checked)) {
        alert('Please answer all the questions before submitting');
        return false;
    }
    if (!(question4[0].checked || question4[1].checked)) {
        alert('Please answer all the questions before submitting');
        return false;
    }
    if (!(question5[0].checked || question5[1].checked)) {
        alert('Please answer all the questions before submitting');
        return false;
    }

    else {
        return true;
    }
}
</script>
<style>
.header{
  	box-sizing: border-box;
    background-image: linear-gradient(to right, lightblue, #d59bf6);
    border: 0.5px solid #8594e4;
    text-align: center;
    font-size: 24px;
    color: white;
    font-family: Montserrat,sans-serif;
    border-radius: 20px;
    padding: 8px;
}
.mycss{
	margin: 10px;
    color: #38598b;
    border:1px solid #000;
    border-radius: 15px;
    background: #e7eaf6;
    padding-top: 30px;
    padding-right: 20px;
  	padding-left: 20px;
    padding-bottom: 30px;
    font-family: Montserrat,sans-serif;
    
}
.q{
  margin-left: inherit;
  font-weight: 570;
}

.button-submit {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0px 10px 0px 10px;
}

.submit
{
    //display: inline-block;
    border: 0;
    height: 60px;
    width: 100%;
    border-radius: 5px;
    padding: 10px;
    background-color: #113f67;
    color: white;
    text-shadow: 1px 1px 1px #000;
    font-size: 17px;
    opacity: .7;
    transition: .5;
    cursor: pointer;
}
.submit:hover {
  opacity:1
}
.images
{
    float:right;
    max-width: 11%;
    max-height: 11%;
}
.meeting
{
    border:4px dotted #61c0bf;
    margin: 10px;
    background-color: #e7eaf6;
    color: #5c5470;
    padding-top: 10px;
    padding-right: 20px;
    padding-left: 20px;
    padding-bottom: 10px;
    font-family: Montserrat,sans-serif;
    font-size: 22px; 
}
</style>
<div class = meeting>
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
</div>
<p class='header'>Please complete the below questionnaire</p>
<form action='meeting.php' method='post'>
    <ol class='mycss'>
        <li class='q'>Have you experienced any of the symptoms in the list below in the past 48 hours?</li>
            <ul>
                <li>Fever or chills</li>
                <li>New or unexplained onset of cough, shortness of breath, or difficulty breathing</li>
                <li>New or unexplained loss of taste or smell</li>
                <li>New or unexplained muscle aches</li>
            </ul>
            <input type='radio' name='question1' value='Yes'>Yes
            <input type='radio' name='question1' value='No'>No
        
        <li class='q'>Are you isolating because you tested positive for COVID-19 or are sick and suspect that you have COVID-19 but do not yet have test results?</li>
            <input type='radio' name='question2' value='Yes'>Yes
            <input type='radio' name='question2' value='No'>No
        
        <li class='q'>Have you been exposed to the virus that causes COVID-19 in the last 10 days?</li>
            <input type='radio' name='question3' value='Yes'>Yes
            <input type='radio' name='question3' value='No'>No
        
        <li class='q'>Did you have a negative COVID-19 test result from a test taken 5 full days after your last exposure to the person who tested positive for COVID-19? Select Yes, if it does not          apply.</li>
            <input type='radio' name='question4' value='Yes'>Yes
            <input type='radio' name='question4' value='No'>No
        
        <li class='q'>Have you traveled internationally in the past 10 days?</li>
            <input type='radio' name='question5' value='Yes'>Yes
            <input type='radio' name='question5' value='No'>No
    </ol>
    <div class="button-submit">
        <input class ='submit' type='submit' name='submit' value='SUBMIT' onclick='return validateForm()'>
    </div>

<div>
	<img class = "images" src="vvlogo.png" alt="logo" />
</div>

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
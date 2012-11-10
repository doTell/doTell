<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>doTell!</title>
	<link rel="stylesheet" href="css/global.css" />
	<LINK REL="SHORTCUT ICON" HREF="/images/favicon.ico">
	<meta name="description" content="" />  
	<meta name="robots" content="all" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta property="og:title" content=""/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=""/>
    <meta property="fb:admins" content="ryanfsalerno"/>
	<meta property="og:image" content=""/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			var questionContainer = $('#questioncontainer');

			var allQuestions = [
			    'something you did today',
			    'something that makes you smile',
			    'what you did today',
			    'the color of your poop',
			    'something you are passionate about',
			    'the funniest thing you saw today',
			    'something that scares you',
			    'your favorite song',
			    'your biggest inspiration',
			    'your favorite place in the universe',
			    'the perfect way to spend your day',
			    'something that motivates you'
			];

			var currQuestIndex = 0;
			setInterval(
			    function() {
			        questionContainer.find('.questiontext').fadeOut(function() {
			            $(this).remove();
			        });
			        var newQuestion = $('<div class="questiontext"></div>').css('display', 'none');
			        newQuestion.text(allQuestions[currQuestIndex % allQuestions.length]);
			        questionContainer.append(newQuestion);
			        newQuestion.fadeIn();
			        currQuestIndex++;
			    }, 
			    3000
			);

			var questionTextarea = $('#myquestion');
			$('#questioncontainer').click(function(e) {
			    var currentText = $(this).text();
			    questionTextarea.text(currentText);
			});

		});
	</script>
</head>


<<<<<<< HEAD
	<div id="body">
<p>
<form method="post" action="test">
	phone<input type="text" name="phone">
	message<input type="text" name="message">

	<input type="submit" value="submit">
</form>

</p>

	</div>
=======

<body>

<div class="container">

	<center><h1><span style="color:#FED100">Do Tell!</span></h1></center>
>>>>>>> Welcome view with Ryan's code

<!--THE FORM-->
<?php // Change the css classes to suit your needs    

$attributes = array('class' => 'form-container', 'id' => '');
echo form_open('CI_Controller', $attributes); ?>
	<div class="form-title"><h2></h2></div>
	<p>Do Tell is an experiment that sparks multimedia exchanges amongst teens.</p>
			<input class="form-field" type="tel" name="add_number" placeholder="Phone Number" maxlength="11"/><?php echo set_value('phone'); ?></input><br />
			<input class="form-field" type="tel" name="age" maxlength="2" placeholder="Age" value="<?php echo set_value('age'); ?>"/><br />
			 <input class="form-field-radio" type="radio" name="gender" value="guy" <?php if(strcasecmp(set_value('gender'), guy)==0) { echo "checked=\"checked\"" } ?></input> Guy
			 <input class="form-field-radio" type="radio" name="gender" value="girl" <?php if(strcasecmp(set_value('gender'), girl)==0) { echo "checked=\"checked\"" } ?>/></input> Girl
				<div>Can you send me a photo of...</div>
				<div id="questioncontainer" style="height:40px;"></div>
			 <textarea class="form-field-text" id="myquestion" cols="40" rows="8" type="text" name="add_number" placeholder="Ask someone anything you can think of... You will receive a text with a photo and caption answering your question. It's really awesome." maxlength="160"><?php echo set_value('question'); ?></textarea>
			 
			<input class="submit-button" type="submit" value="Ask Someone" /></input>
		</div>
	</form>
</div>
</body>
</html>
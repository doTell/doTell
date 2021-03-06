<!DOCTYPE html>
<html>

    <head>
        <title>Do Tell</title>
        
        <link rel="stylesheet" type="text/css" href="/assets/css/base.css"/>
        <link rel="stylesheet" href="/assets/css/global.css"/>
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzQf6eMVlF3up8sP3v6KENPcHlza-aqik&sensor=false"></script>
        <script type="text/javascript" src="/assets/js/main.js"></script>
    </head>
    
    <body>
        <header>
            <h1>
                <a href="http://www.dosomething.org"><img class="logo" src="/assets/images/ds-logo.png" alt="Do Something"/></a>
                <div class="site-name"><img src="/assets/images/logo_sm.png" alt="Do Tell"/></div>
            </h1>
            <a class="add-number" href="#">Ask a question to start playing</a>
            
            <!-- From the mobile version that Ryan made -->
            <div class="container">
                <!--THE FORM-->
            	<form class="form-container" action="index.php" method="POST">
            	<p>Do Tell is an experiment that sparks multimedia exchanges amongst teens.</p>
            			<input style="width: 25%; margin-right: 2%;" class="form-field" type="tel" name="area" placeholder="Area code" maxlength="3"/><?php echo set_value('area'); ?></input>
            			<input style="width: 59%;" class="form-field" type="tel" name="phone" placeholder="Phone number" maxlength="8"/><?php echo set_value('phone'); ?></input><br />
            			<input class="form-field" type="tel" name="age" maxlength="2" placeholder="Age" value="<?php echo set_value('age'); ?>"/><br />
            			 <input class="form-field-radio" type="radio" name="gender" value="guy" id="gender_guy" <?php if(strcasecmp(set_value('gender'), "guy")==0) { echo "checked=\"checked\"" } ?>/></input> <label for="gender_guy">Guy</label>
            			 <input style="margin-left: 10px;" class="form-field-radio" type="radio" name="gender" value="girl" id="gender_girl" <?php if(strcasecmp(set_value('gender'), "girl")==0) { echo "checked=\"checked\"" } ?>/></input> <label for="gender_girl">Girl</label>
            				<div>Can you send me a photo of...</div>
            				<div id="questioncontainer" style="height:40px;"></div>
            			 <textarea class="form-field-text" id="myquestion" cols="40" rows="8" type="text" name="question" placeholder="Ask someone anything you can think of... You will receive a text with a photo and caption answering your question. It's really awesome." maxlength="160"><?php echo set_value('question'); ?></textarea>
            			 
            			<input class="submit-button" type="submit" value="Ask Someone" /></input>
            		</div>
            	</form>
            </div>
            
        </header>
        <div id="map-canvas"></div>
    </body>

</html>
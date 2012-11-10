;(function($) {
    var map;
    var answers = [];   // Array of key-value pairs, each with two keys: marker and bubble
    var MARKERS_TO_KEEP_ON_MAP = 1;     // Should be at least 1
    var ANSWER_FETCH_INTERVAL = 5000;   // Time (in ms) between ajax requests
    
    // Runs once, sets up map
    function initializeMap() {
        // Set up map
        var mapOptions = {
            zoom:           4,
            mapTypeId:      google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        
        // Center map on USA
        var country = 'United States of America';
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode( {'address' : country}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
            }
        });
    }
    
    // Runs every time a new answer comes in, and removes old answers from the map
    function addAnswerToMap(markerLatLong, content) {
        // Generate marker
        var marker = new google.maps.Marker({
            animation:      google.maps.Animation.DROP,
            position:       markerLatLong,
            map:            map
        });
    
        // Generate text bubble
        var infoWindow = new google.maps.InfoWindow({
            content: content.replace('<', '&lt;').replace('>', '&gt;')
        });
        infoWindow.open(map, marker);
        
        // Remove old answers from the map
        for (var i=0; i <= answers.length - MARKERS_TO_KEEP_ON_MAP; i++) {
            answers[i].marker.setMap(null);
            answers[i].bubble.close();
        }
        
        // Save this marker/info-window pair to the array we're using to track
        // what's currently on the map.
        answers.push({
            marker: marker,
            bubble: infoWindow
        });
        
        
    }
    
    $(document).ready(function() {
        
        initializeMap();
        
        var signupForm = $('.container');
        $('a.add-number').click(function(e) {
            e.preventDefault();
            if (signupForm.is(':visible')) {
                signupForm.slideUp('fast');
            }
            else {
                signupForm.slideDown('fast');
            }
        });
        
        // Run regularly scheduled ajax requests to get new answers
        setInterval(
            function() {
                var jqXhr = $.ajax({
                    async:      false,
                    dataType:   'json',
                    timeout:    10000,
                    type:       'GET',
                    url:        '/home/update'
                }).done(function(data) {
                                        
                    // Get marker location from zip code
                    var geocoder = new google.maps.Geocoder();
                    var zipCode = data.zipcode.toString();
                    geocoder.geocode( {'address': zipCode}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            // Now we can actually add this to the map,
                            // with location and the content provided by data.text
                            addAnswerToMap(
                                new google.maps.LatLng(
                                    results[0].geometry.location.lat(), 
                                    results[0].geometry.location.lng()
                                ),
                                data.text
                            );
                        }
                    });
                
                });
            
            }, 
            ANSWER_FETCH_INTERVAL
        );
        
    });
    
})(jQuery);


/*
Code for the signup form. All of the below is just copy-pasted from Ryan's computer, so be careful not to make local modifications that then get overwritten by updates to Ryan's work.
*/

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
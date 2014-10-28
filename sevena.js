//Display text using the 7 secret alphabets - 22/12/2009

// for snowstorm
//snowStorm.targetElement = 'head';
//snowStorm.snowColor = '#fff';snowStorm.flakesMaxActive = 96;
//
//
function getBaseName() {
	//returns script to be called to return the same letter of the next alphabet
	//script is assumed to be in same directory as the current file;
	var a = window.location.pathname.split("/");
	a[a.length - 1] = 'getnext.php'; //the script
	return 'http://' + window.location.hostname + a.join("/");
}
;

function addInfoEvents() {
	//events to display info text when clicking the 'info' picture
	var b = $('infobutton'); //the div containing the 'info' image
	var i = $$('div.info');  //the div with the info text

	b.addEvents({
		click: function() {
			//check if rel attribute is 'Close'
			var t = b.getAttribute('rel').indexOf('C');

			if (t < 0) {
				// not 'Close' then display info, change info picture and set rel -> Close
				i.each(function(el) {
					el.tween('height', '240px');
				});	//display info
				b.set('html', '<img src="images/CloseInfo_Icon.png" alt="Close info" title="Close info" />');
				b.set('rel', 'Close');
			}
			else {
				// if 'Close' do the oposite
				i.each(function(el) {
					el.tween('height', '0px');
				});	//hide info
				b.set('html', '<img src="images/Info_Icon.png" alt="Info" title="Further info and instructions..." />');
				b.setAttribute('rel', '');
			}
		}
	});
}
;

function addImgEvents() {
	//events to change the letter picture to that of the next alphabet when clicking on a letter picture
	$$('img.bordered').each(function(el) {
		el.addEvents({
			//	mouseenter: function() {$('head').tween('opacity', 0.5)},
			//	mouseleave: function() {$('head').tween('opacity', 1.0)},
			mouseover: function() {
//				$('msg').set('html', el.get('src'));
			}, //display url of letter image
			click: function() {
				var r = new Request({
					url: getBaseName() + '?current=' + el.get('src'), //get next image url from server
					method: 'get',
					onSuccess: function(response) {
						el.set('src', response); //set letter image source to the response of the request (the url of the new image)
//						$('msg').set('text', response);
					}, //display url
					onFailure: function() {
						$('msg2').set('text', 'failed');
					}
				});
				r.send(/*{current: el.get('src')}*/); //tried with the commented text but no work
			}
		});
	});
}
;

function addTopImgEvents() {
	//events to change the letter picture to that of the next alphabet when clicking on a letter picture
	$$('img.top').each(function(el) {
		el.addEvents({
			click: function() {
				var r = new Request({
					url: getBaseName() + '?current=' + el.get('src'), //get next image url from server
					method: 'get',
					onSuccess: function(response) {
						el.set('src', response); //set letter image source to the response of the request (the url of the new image)
					},
					onFailure: function() {
						$('msg2').set('text', 'failed');
					}
				});
				r.send(/*{current: el.get('src')}*/); //tried with the commented text but no work
			}
		});
	});
}
;

function addBlankEvents() {
	//insert a <br> when clicking a blank between words
	$$('span.blank').each(function(el) {
		el.addEvents({
			click: function() {
				el.set('html', '<br />');
			},
			mouseover: function() {
//				$('msg').set('html', 'blank');
			}
		});
	});
}
;

window.addEvent('domready', function() {
	// First Example
	var el = $('slsize'), //slider changing size
			sz = $('sz'), //input element for size
			el2 = $('slalpha'), //slider changing alphabet
			al = $('al');		//input element for alphabet

	//set width and height of images
	function setImages(size) {
		var w = size * 7 / 8;
		var w2 = w / 2;
		var h = size;

		$$('img.blank').each(function(l) {
			//set size for all blanks
			l.set('width', w2);
			l.set('height', h);
		});
		$$('img.bordered').each(function(l) {
			//set just height for all letters
			//l.set('width', w);
			l.set('height', h);
		});
	}
	// Create the new slider instance
	new Slider(el, el.getElement('.knob'), {
		steps: 200, // There are 200 steps
		range: [30], // Minimum value is 10
		onChange: function(value) {
			// Everytime the value changes, we change the value of the size input element
			sz.set('value', value);
			//and the size of all images
			setImages(value);
		}
	}).set(sz.get('value').toInt());

	// Create the new slider instance
	new Slider(el2, el2.getElement('.knob'), {
		steps: 8, // There are 200 steps
		range: [1], // Minimum value is 10
		snap: true,
		onChange: function(value) {
			// Everytime the value changes, we change the value of the size input element
			al.set('value', value);
			//and the size of all images
			//setImages(value);
		}
	}).set(al.get('value').toInt());

	addImgEvents();
	addBlankEvents();
	addInfoEvents();
	addTopImgEvents();

});

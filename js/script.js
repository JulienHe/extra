
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const order = urlParams.get('order')

if(!order) {
	window.location = '/';
}

//set default degree (360*5)
var degree = 1800;
//number of clicks = 0
var clicks = 0;
var prizesPool;

$(document).ready(function () {

	/*WHEEL SPIN FUNCTION*/
	$('#spin').click(function () {
		var prize = 0;

		$.ajax({
			type: "POST",
			url: 'getPrize.php',
			data: {orderNumber: order},
			success: function (response) {
				prize = parseInt(response);
				/*multiply the degree by number of clicks generate random number between 1 - 360, then add to the new degree*/
				var totalDegree = degree + (prize * 60);

				/*let's make the spin btn to tilt every
				time the edge of the section hits 
				the indicator*/
				var noY = 0, aoY = 0;
				$('#wheel .sec').each(function () {
					var t = $(this);

					var c = 0;
					var n = 700;
					var interval = setInterval(function () {
						c++;
						if (c === n) {
							clearInterval(interval);
						}

						aoY = t.offset().top;
						// console.log(aoY);

						/*23.7 is the minumum offset number that 
						each section can get, in a 30 angle degree.
						So, if the offset reaches 23.7, then we know
						that it has a 30 degree angle and therefore, 
						exactly aligned with the spin btn*/
						if (aoY < 23.89) {
							$('#spin').addClass('spin');
							setTimeout(function () {
								$('#spin').removeClass('spin');
							}, 100);
						}
					}, 10);

					$('#inner-wheel').css({
						'transform': 'rotate(' + totalDegree + 'deg)'
					});

					noY = t.offset().top;

				});
			}
		});
	});


});
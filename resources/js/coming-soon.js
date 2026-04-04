/*
Author       : Dreamstechnologies
Template Name: DreamsFood - Bootstrap Admin Template
*/
(function () {
    "use strict";
	
	if ($('.coming-soon-item').length > 0) {

	// Loop through each countdown section
	document.querySelectorAll('.coming-soon-item').forEach((item) => {

		// Get HTML elements inside each item
		let day = item.querySelector('.days');
		let hour = item.querySelector('.hours');
		let minute = item.querySelector('.minutes');
		let second = item.querySelector('.seconds');

		function setCountdown() {
			// Get date from data attribute or use default
			let countdownDate = item.getAttribute('data-countdown-date')
				? new Date(item.getAttribute('data-countdown-date')).getTime()
				: new Date('December 30, 2025 16:00:00').getTime();

			// Update every second
			let updateCount = setInterval(function () {
				let todayDate = new Date().getTime();
				let distance = countdownDate - todayDate;

				let days = Math.floor(distance / (1000 * 60 * 60 * 24));
				let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				let seconds = Math.floor((distance % (1000 * 60)) / 1000);

				// Update UI
				if (day) day.textContent = days;
				if (hour) hour.textContent = hours;
				if (minute) minute.textContent = minutes;
				if (second) second.textContent = seconds;

				// Expired state
				if (distance < 0) {
					clearInterval(updateCount);
					let parent = item.closest('.comming-soon-pg') || item;
					parent.innerHTML = '<h1>EXPIRED</h1>';
				}
			}, 1000);
		}

		setCountdown();
	});
}
	
})();
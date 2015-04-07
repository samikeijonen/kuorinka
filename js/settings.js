	
	// Nav toggle button
	var button = document.getElementById( 'nav-toggle' );
	
	// Responsive Nav
	var nav = responsiveNav(".main-navigation", { // Selector
		transition: 350,             // Integer: Speed of the transition, in milliseconds
		customToggle: "#nav-toggle", // Selector: Specify the ID of a custom toggle
		init: function () {          // Set ARIA for menu toggle button
			button.setAttribute( 'aria-expanded', 'false' );
			button.setAttribute( 'aria-pressed', 'false' );
			button.setAttribute( 'aria-controls', 'menu-primary' );
		},
		open: function () {
			button.setAttribute( 'aria-expanded', 'true' );
			button.setAttribute( 'aria-pressed', 'true' );
		},
		close: function () {
			button.setAttribute( 'aria-expanded', 'false' );
			button.setAttribute( 'aria-pressed', 'false' );
		},

	});
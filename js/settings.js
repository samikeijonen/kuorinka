	
	// Nav toggle button
	var button = document.getElementById( 'nav-toggle' );
	
	// Load Multileve Responsive Nav if it is enabled
	if ( navSettings.dropdown ) {
		var nav = responsiveNav(".main-navigation", { // Selector
			transition: 350,             // Integer: Speed of the transition, in milliseconds
			customToggle: "#nav-toggle", // Selector: Specify the ID of a custom toggle
			enableDropdown: navSettings.dropdown,             // Boolean: Do we use multi level dropdown
			dropDown: "menu-item-has-children",               // String: Class that is added to link element that have sub menu
			openDropdown: navSettings.expand,                 // String: Label for opening sub menu
			closeDropdown: navSettings.collapse,              // String: Label for closing sub menu
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
	
		} else {
	
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
	
	}
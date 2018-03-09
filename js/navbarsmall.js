
			var Page = (function() {
				
				var config = {
						$bookBlock : $( '#bb-bookblock' ),
						$navNext : $( '#bb-nav-next' ),
						$navPrev : $( '#bb-nav-prev' ),
						$navFirst : $( '#bb-nav-first' ),
						$navLast : $( '#bb-nav-last' )
					},
					init = function() {
						config.$bookBlock.bookblock( {
							speed : 800,
							shadowSides : 0.8,
							shadowFlip : 0.7
						} );
						initEvents();
					},
					initEvents = function() {
						
						var $slides = config.$bookBlock.children();

						// add navigation events
						config.$navNext.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'next' );
							return false;
						} );

						config.$navPrev.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'prev' );
							return false;
						} );

						config.$navFirst.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );

						config.$navLast.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );
						
						// add swipe events
						$slides.on( {
							'swipeleft' : function( event ) {
								config.$bookBlock.bookblock( 'next' );
								return false;
							},
							'swiperight' : function( event ) {
								config.$bookBlock.bookblock( 'prev' );
								return false;
							}
						} );

						// add keyboard events
						$( document ).keydown( function(e) {
							var keyCode = e.keyCode || e.which,
								arrow = {
									left : 37,
									up : 38,
									right : 39,
									down : 40
								};

							switch (keyCode) {
								case arrow.left:
									config.$bookBlock.bookblock( 'prev' );
									break;
								case arrow.right:
									config.$bookBlock.bookblock( 'next' );
									break;
							}

						} );
					};

					return { init : init };

			})();

			$('#nav_home1').click(function(){
				$('.active').removeClass('active');
				$( '#bb-bookblock' ).bookblock( 'jump', 1 );
				$('#nav_home1').addClass('active');
			})

			$('#nav_about1').click(function(){
				$('.active').removeClass('active');
				$( '#bb-bookblock' ).bookblock( 'jump', 2 );
				$('#nav_about1').addClass('active');
			})

			$('#nav_events1').click(function(){
				$( '#bb-bookblock' ).bookblock( 'jump', 3 );
				$('.active').removeClass('active');
				$('#nav_events1').addClass('active');
			})

			$('#nav_attractions1').click(function(){
				$( '#bb-bookblock' ).bookblock( 'jump', 4 );
				$('.active').removeClass('active');
				$('#nav_attractions1').addClass('active');
			})

			$('#nav_sponsors1').click(function(){
				$( '#bb-bookblock' ).bookblock( 'jump', 5 );
				$('.active').removeClass('active');
				$('#nav_sponsors1').addClass('active');
			})


			$('#nav_team1').click(function(){
				$( '#bb-bookblock' ).bookblock( 'jump', 6 );
				$('.active').removeClass('active');
				$('#nav_team1').addClass('active');
			})

			$('#nav_contact1').click(function(){
				$( '#bb-bookblock' ).bookblock( 'jump', 7 );
				$('.active').removeClass('active');
				$('#nav_contact1').addClass('active');
			})

			    // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
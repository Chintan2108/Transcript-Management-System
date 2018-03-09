function showModal(btnid,modalid,spanid) {
		// Get the modal
		var modal = document.getElementById(modalid);

		// Get the button that opens the modal
		var btn = document.getElementById(btnid);

		// Get the <span> element that closes the modal
		var span = document.getElementById(spanid);

		// When the user clicks on the button, open the modal
		{
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
	}	
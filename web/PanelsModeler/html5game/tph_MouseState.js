   /**
     * keeps track of the current active mouse button.
   */
 
	function initActiveButtonWatcher() {

        // create variable to store button states.
        var _activeButton = -1, activeButton = 0

        // function to set the current active button.
        function updateMouseState(e) {

            // update active button.
            activeButton = typeof e.buttons === "number" ? e.buttons : e.which

            // store the last state in order to be able to tell if the state has changed.
            _activeButton = activeButton
        }
		
        // function to get the current active button.
        function getButtonState() { return activeButton }

        // update the button state when the mouse is moved
        // or an item is dragged into the window.
		window.addEventListener("mousedown", updateMouseState, false)
		window.addEventListener("mouseup", updateMouseState, false)
        window.addEventListener("mousemove", updateMouseState, false)
        window.addEventListener("dragover", function() { updateMouseState({which: 1}) }, false)
        window.addEventListener("dragleave", function() { updateMouseState({which: 0}) }, false)

        // expose the getter on the global object.
        window.getButtonState = getButtonState
    }

function HTML5_mouse_check_button(n){
 
             switch (n) {
                case "mb_left":
				if ( getButtonState() == 1){ return true } else { return false }
				break;
				
				case "mb_right":
				if ( getButtonState() == 3){ return true } else { return false }
				break;
				
				case "mb_middle":
				if ( getButtonState() == 2 || getButtonState() == 4){ return true } else { return false }
				break;
				
				case "mb_any":
				if ( getButtonState() !== 0){ return true } else { return false }
				break;
            }
 }

function ShowHide (id, force_state) {
    var $div = document.getElementById(id);
    var state = $div.style.display;
			
    if (!force_state) {
        if (state == 'none') {
            $div.style.display = '';
        } else {
            $div.style.display = 'none';
        }
    } else {
        if (force_state == 'hide') {
            $div.style.display = 'none';
        } else if (force_state == 'show') {
            $div.style.display = '';
        }
    }
}
		
function MultiShowHide (id, force_state) {
    
    var $div = document.getElementsByName(id);
						
    // loop through the array
    for ($i=0; $i<$div.length; $i++) { 
        var state = $div[$i].style.display;
        if (!force_state) {
            if (state == 'none') {
                $div[$i].style.display = '';
            } else {
                $div[$i].style.display = 'none';
            }
        } else {
            if (force_state == 'hide') {
                $div[$i].style.display = 'none';
            } else if (force_state == 'show') {
                $div[$i].style.display = '';
            }
        }
    }
}
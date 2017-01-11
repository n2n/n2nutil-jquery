
n2n.dispatch.registerCallback(function () {
	var enablerElems = document.getElementsByClassName("n2nutil-jquery-enabler");
	var callback = function () {
		updateEnabler(this);
	};
	
	for (var i in enablerElems) {
		enablerElems[i].removeEventListener("click", callback);
		enablerElems[i].addEventListener("click", callback);
		
		updateEnabler(enablerElems[i]);
	}
	
	function updateEnabler(elem) {
		var displayClassName = elem.checked ? 'block' : 'none';
		var groupClassName = elem.getAttribute("data-n2nutil-jquery-enabler-class");
	
		var groupElems = document.getElementsByClassName(groupClassName);
		for (var i in groupElems) {
			groupElems[i].style.display = displayClassName;
		}
	}
});
function validate() {

	var validator = require('modules/validator');

	if (validator.isValidYo(document.getElementById('thing').value)) {
		alert("They're good YOs Brent");
	}
	else {
		alert("BAD!");
	}

}
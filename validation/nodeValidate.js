var validator = require('./modules/validator');

if (validator.isValidYo(process.argv[2])) {
	console.log('good');
	process.exit(0);
}
else {
	console.log('bad');
	process.exit(1);
}
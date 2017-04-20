<?php

$input = escapeshellarg($argv[1]);

exec('node ./nodeValidate.js ' . $input, $output, $result);

if ($result === 0) {
	echo "🎉";
}
else {
	echo "💩";
}
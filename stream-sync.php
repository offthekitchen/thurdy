<?php
// Sync-preview streamer. Add a track id here, then add that filename to the .htaccess deny list.
$tracks = array(
	'immortality-instrumental' => 'Immortality - Instrumental.mp3',
	'immortality-full' => 'Immortality - Full.mp3',
	'afternoon-with-einstein-instrumental' => 'Afternoon With Einstein -  Instrumental.mp3',
	'afternoon-with-einstein-full' => 'Afternoon With Einstein - Full.mp3',
	'drive-myself-insane-instrumental' => 'Drive Myself Insane - Instrumental.mp3',
	'drive-myself-insane-full' => 'Drive Myself Insane - Full.mp3',
	'you-dont-mean-a-thing-instrumental' => 'You Dont Mean a Thing to Me - Instrumental.mp3',
	'you-dont-mean-a-thing-full' => 'You Dont Mean a Thing to Me - Full.mp3',
	'the-loop-instrumental' => 'The Loop - Instrumental.mp3',
	'the-loop-full' => 'The Loop - Full.mp3',
	'youre-so-cute-instrumental' => 'Youre So Cute - Instrumental.mp3',
	'youre-so-cute-full' => 'Youre So Cute - Full.mp3',
);

$trackId = isset($_GET['track']) ? (string) $_GET['track'] : '';
if (!isset($tracks[$trackId])) {
	http_response_code(404);
	header('Content-Type: text/plain; charset=UTF-8');
	echo 'Not found';
	exit;
}

$mp3Dir = realpath(__DIR__ . DIRECTORY_SEPARATOR . 'mp3');
$filePath = ($mp3Dir === false) ? false : realpath($mp3Dir . DIRECTORY_SEPARATOR . $tracks[$trackId]);
$mp3Prefix = ($mp3Dir === false) ? '' : rtrim($mp3Dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
if ($filePath === false || !is_file($filePath) || stripos($filePath, $mp3Prefix) !== 0) {
	http_response_code(404);
	header('Content-Type: text/plain; charset=UTF-8');
	echo 'Not found';
	exit;
}

$size = filesize($filePath);
if ($size === false || $size < 1) {
	http_response_code(404);
	header('Content-Type: text/plain; charset=UTF-8');
	echo 'Not found';
	exit;
}

$start = 0;
$end = $size - 1;
$status = 200;

if (isset($_SERVER['HTTP_RANGE'])) {
	$range = $_SERVER['HTTP_RANGE'];
	if (strpos($range, ',') !== false || !preg_match('/^bytes=(\d*)-(\d*)$/', $range, $matches)) {
		http_response_code(416);
		header("Content-Range: bytes */$size");
		exit;
	}
	if ($matches[1] === '' && $matches[2] === '') {
		http_response_code(416);
		header("Content-Range: bytes */$size");
		exit;
	}
	if ($matches[1] === '') {
		$suffixLength = (int) $matches[2];
		if ($suffixLength < 1) {
			http_response_code(416);
			header("Content-Range: bytes */$size");
			exit;
		}
		$start = max(0, $size - $suffixLength);
	} else {
		$start = (int) $matches[1];
		if ($matches[2] !== '') {
			$end = (int) $matches[2];
		}
	}
	if ($start > $end || $start >= $size) {
		http_response_code(416);
		header("Content-Range: bytes */$size");
		exit;
	}
	$end = min($end, $size - 1);
	$status = 206;
}

$length = $end - $start + 1;

if (function_exists('apache_setenv')) {
	apache_setenv('no-gzip', '1');
}
ini_set('zlib.output_compression', '0');
while (ob_get_level() > 0) {
	ob_end_clean();
}

http_response_code($status);
header('Content-Type: audio/mpeg');
header('Content-Disposition: inline');
header('Accept-Ranges: bytes');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: private');
header('Content-Length: ' . $length);
if ($status === 206) {
	header("Content-Range: bytes $start-$end/$size");
}

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'HEAD') {
	exit;
}

$handle = fopen($filePath, 'rb');
if ($handle === false) {
	exit;
}
fseek($handle, $start);
$remaining = $length;
while ($remaining > 0 && !feof($handle)) {
	$read = ($remaining > 8192) ? 8192 : $remaining;
	$buffer = fread($handle, $read);
	if ($buffer === false || $buffer === '') {
		break;
	}
	echo $buffer;
	$remaining -= strlen($buffer);
	flush();
}
fclose($handle);
exit;

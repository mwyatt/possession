<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$query = urlencode($_GET['query']);
$urls = [];

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "http://www.bing.com/images/search?pq=$query&count=50&q=$query");
$result = curl_exec($ch);

$items = explode("<div class=\"item\">", $result);
unset($items[0]);

foreach ($items as $key => $item) {
    $startMatch = 'href="';
    $startPos = strpos($item, $startMatch) + strlen($startMatch);
    $endPos = strpos($item, '" h=') - $startPos;
    $item = substr($item, $startPos, $endPos);
    $urls[] = $item;
}

?>

<?php foreach ($urls as $url): ?>
    
    <img src="<?php echo $url ?>" width="100" height="100" style="margin:10px;">

<?php endforeach ?>

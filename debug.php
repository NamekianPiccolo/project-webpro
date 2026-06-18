<?php
$html = file_get_contents('error.html');
preg_match('/<body[^>]*>(.*?)<\/body>/si', $html, $m);
echo "BODY: " . substr(strip_tags($m[1] ?? 'Not found'), 0, 500) . "\n";

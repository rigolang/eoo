function curl_download($url, $dir) {
$ch = curl_init($url);
$fp = fopen($dir, "wb");
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
$res=curl_exec($ch);
curl_close($ch);
fclose($fp);
return $res;
}


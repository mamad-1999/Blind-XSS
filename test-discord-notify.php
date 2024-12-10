<?php
$url = "DISCORD_URL";
$ch = curl_init($url);

$payload = json_encode(["content" => "Test message"]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable verbose output
curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:12334"); // Example proxy
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);

$result = curl_exec($ch);

if ($result === false) {
    echo "CURL Error: " . curl_error($ch);
} else {
    echo "Discord Response: " . $result;
}

curl_close($ch);
?>


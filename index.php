<?php
// ====== TELEGRAM BOT TOKEN ======
$token = "6266431477:AAFBseWD60jYNmArKOhDTTPwzUayyDAok5Y";
define("API_KEY", $token);

// ====== TELEGRAM API FUNKSIYA ======
function bot($method, $data = []) {
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}

// ====== UPDATE OLISH ======
$update = json_decode(file_get_contents("php://input"), true);

// ====== TEST JAVOB ======
if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"] ?? "";

    bot("sendMessage", [
        "chat_id" => $chat_id,
        "text" => "✅ BOT ISHLAYAPTI\nSiz yozdingiz: $text"
    ]);
}

<?php

require __DIR__.'/../lib/functions.php';

$id = escape($_GET["id"] ?? "");
$data = fetchById($id);
if (!$data) {
    include __DIR__.'/../template/404.tpl.php';
    // レスポンスヘッダを設定
    header("HTTP/1.1 404 Not Found");

    // レスポンスの種類を指定
    header("Content-Type: text/html; charset=UTF-8");
    exit(0);
}

$formattedData = generatedFormattedData($data);

$assignData = [
    "formattedData" => $formattedData,
];

loadTemplate("question", $assignData);

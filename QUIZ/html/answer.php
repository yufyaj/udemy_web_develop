<?php

$id = $_POST["id"] ?? "";
$selectedAnswer = $_POST["selectedAnswer"] ?? "";

require __DIR__."/../lib/functions.php";

$data = fetchById($id);
if (!$data) {
    // レスポンスヘッダを設定
    header("HTTP/1.1 404 Not Found");

    // レスポンスの種類を指定
    header("Content-Type: text/json; charset=UTF-8");

    $response = [
        "message" => "The specified id could not found.",
    ];
    
    echo json_encode($response);
    
    exit(0);
}
$formattedData = generatedFormattedData($data);
$correctAnswerValue = $formattedData["answers"][$formattedData["correctAnswer"]];

$result = $selectedAnswer === $formattedData["correctAnswer"];

$response = [
    "result" => $result,
    "correctAnswer" => $formattedData["correctAnswer"],
    "correctAnswerValue" => $correctAnswerValue,
    "explanation" => $formattedData["explanation"],
];

// レスポンスの種類を指定
header("Content-Type: text/json; charset=UTF-8");

echo json_encode($response);


 ?>
<?php

function loadTemplate($filename, array $assignData = []) {
    extract($assignData);
    include __DIR__."/../template/".$filename.".tpl.php";
}

function error404(){
    // レスポンスヘッダを設定
    header("HTTP/1.1 404 Not Found");

    // レスポンスの種類を指定
    header("Content-Type: text/html; charset=UTF-8");

    // 404ページを出力
    loadTemplate("404");

    // PHPスクリプトを終了
    exit(0);
}

function generatedFormattedData($data)
{
    $formattedData = [
        "id" => $data[0],
        "question" => escape($data[1]),
        "answers" => [
            "A" => escape($data[2]),
            "B" => escape($data[3]),
            "C" => escape($data[4]),
            "D" => escape($data[5]),
        ],
        "correctAnswer" => escape(strtoupper($data[6])),
        "explanation" => escape($data[7], true)
    ];

    return $formattedData;
}

function escape($value, $nl2br = false) {
    $value = htmlspecialChars($value);
    if ($nl2br) {
        $value = nl2br($value);
    }
    return $value;
}

function fetchAll() {
    // CSVファイルを開く
    $handler = fopen(__DIR__.'/../file/quiz.csv','r');

    // CSVファイルを読み込む
    $isFirst = true;
    $ids = [];
    while ($row = fgetcsv($handler)) {
        // ヘッダーを除外
        if ($isFirst) {
            $isFirst = false;
            continue;
        }
        // 配列に設定する
        array_push($ids, $row[0]);
    }
    
    // CSVファイルを閉じる
    fclose($handler);

    // 配列を返す
    return $ids;
}

function fetchById($id) {
    // CSVファイルを開く
    $handler = fopen(__DIR__.'/../file/quiz.csv','r');
    
    // データを取得
    $question = [];
    while ($row = fgetcsv($handler)) {
        if ($row[0] === $id && isDataRow($row)) {
            $question = $row;
            break;
        }
    }

    // CSVファイルを閉じる
    fclose($handler);
    
    return $question;
}

// データが正しいか確認
function isDataRow(array $row) {
    // カラム数
    if (count($row) !== 8) {
        return false;
    }

    // 空データ
    foreach ($row as $value) {
        if (empty($value)) {
            return false;
        }
    }

    // id
    if (!is_numeric($row[0])) {
        return false;
    }

    // 回答
    $correctAnswer = strtoupper($row[6]);
    $availableAnswers = ["A", "B", "C", "D"];
    if (!in_array($correctAnswer, $availableAnswers)) {
        return false;
    }

    return true;
}
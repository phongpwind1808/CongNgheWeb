<?php
// Đọc tệp câu hỏi
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$answers = [];
$current_question = [];
foreach ($questions as $line) {
    if (strpos($line, "ANSWER:") !== false) {
        // Lấy đáp án đúng
        $current_question[] = trim(substr($line, strpos($line, ":") + 1));
        $answers[] = $current_question[5]; // Lưu đáp án đúng
        $current_question = []; // Reset câu hỏi
    } elseif (strpos($line, "ANSWER") === false) {
        // Phân tách các câu hỏi và đáp án
        $current_question[] = $line;
    }
}

// Tính điểm
$score = 0;
foreach ($_POST as $key => $userAnswer) {
    $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT); // Lấy số câu hỏi từ tên trường
    if (isset($answers[$questionNumber]) && $answers[$questionNumber] === $userAnswer) {
        $score++;
    }
}

// Lưu điểm vào session để sử dụng trong ketqua.php
session_start();
$_SESSION['score'] = $score;
$_SESSION['total'] = count($answers);

// Chuyển hướng tới ketqua.php
header("Location: ketqua.php");
exit();  // Đảm bảo không có mã nào tiếp tục chạy
?>
